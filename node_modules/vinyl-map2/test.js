'use strict';
var test = require('tape'),
  tapSpec = require('tap-spec'),
  gulp = require('gulp'),
  util = require('gulp-util'),
  fs = require('fs'),
  map = require('./');

// pretty tests~
test.createStream()
  .pipe(tapSpec())
  .pipe(process.stdout);

test('null streams are just passed on', function (t) {
  var stream = map(function () {
    t.fail('should not get called');
  });

  gulp.src('no-files-here')
    .pipe(stream)
    .pipe(util.buffer(function (e, files) {
      t.equal(files.length, 0, 'should have no files');
      t.end();
    }));
});

test('buffer streams are passed a buffer', function (t) {
  var src = fs.readFileSync(__filename),
    stream = map(function (contents) {
      t.ok(Buffer.isBuffer(contents), 'contents are a buffer');
      t.deepEqual(contents, src, 'buffer contents are correct');
      return contents;
    });

  gulp.src(__filename)
    .pipe(stream)
    .pipe(util.buffer(function (e, files) {
      t.equal(e, null, 'should have no errors');
      t.equal(files.length, 1, 'should have one file');
      t.end();
    }));
});

test('modifying buffer streams', function (t) {
  var src = fs.readFileSync(__filename),
    stream = map(function (contents) {
      t.ok(Buffer.isBuffer(contents), 'contents are a buffer');
      t.deepEqual(contents, src, 'buffer contents are correct');
      return contents.toString().toUpperCase();
    });

  gulp.src(__filename)
    .pipe(stream)
    .pipe(util.buffer(function (e, files) {
      var file = files[0];

      t.ok(Buffer.isBuffer(file.contents), 'output contents are a buffer');
      t.equal(file.contents.toString(), src.toString().toUpperCase(), 'output contents match');
      t.end();
    }));
});

test('multiple buffers in a pipeline', function (t) {
  var src = fs.readFileSync(__filename);

  t.plan(7);

  function createStream() {
    return map(function (contents) {
      t.ok(Buffer.isBuffer(contents), 'contents are a buffer');
      t.deepEqual(contents, src, 'buffer contents are correct');
    });
  }

  gulp.src(__filename)
    .pipe(createStream())
    .pipe(createStream())
    .pipe(createStream())
    .pipe(util.buffer(function (e, files) {
      t.equal(files.length, 1, 'should have one file');
      t.end();
    }));
});

test('async with third arg passed in', function (t) {
  var src = fs.readFileSync(__filename),
    stream = map(function (contents, filename, done) {
      t.ok(Buffer.isBuffer(contents), 'contents are a buffer');
      t.deepEqual(contents, src, 'buffer contents are correct');
      done(null, contents.toString().toUpperCase());
    });

  t.plan(4);

  gulp.src(__filename)
    .pipe(stream)
    .pipe(util.buffer(function (e, files) {
      var file = files[0];

      t.ok(Buffer.isBuffer(file.contents), 'output contents are a buffer');
      t.equal(file.contents.toString(), src.toString().toUpperCase(), 'output contents match');
      t.end();
    }));
});

test('async emits error if passed to done', function (t) {
  var stream = map(function (contents, filename, done) {
    done(new Error('should be caught'));
  });

  t.plan(1);

  gulp.src(__filename)
    .pipe(stream)
    .on('error', function (e) {
      t.ok(e, 'error was caught and emitted');
    })
    .pipe(util.buffer(function () {
      t.end();
    }));
});
