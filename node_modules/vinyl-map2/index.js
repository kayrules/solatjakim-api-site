'use strict';
var through = require('through2'),
  newFrom = require('new-from'),
  bl = require('bl');

function map(fn) {
  var done = null,
    pending = 0,
    stream;

  return stream = through.obj(write, flush);

  function write(file, _, next) {
    if (typeof file !== 'object') {
      return;
    }

    if (!('contents' in file)) {
      return push(file, next);
    }

    if (file.isNull()) {
      return push(file, next);
    }

    if (file.isBuffer()) {
      return mapFile(file, next);
    }

    // should be a stream by
    // this point...
    pending++;
    file.contents.pipe(bl(function (err, result) {
      if (err) {
        return stream.emit('error', err);
      }

      mapFile(file, next, result);
      check(--pending);
    }));
  }

  function postMap(file, next, contents, mapped) {
    if (mapped === undefined) {
      mapped = contents;
    }

    if (file.isBuffer()) {
      file.contents = new Buffer(mapped);
    }

    if (file.isStream()) {
      file.contents = newFrom([mapped]);
    }

    push(file, next);
  }

  function mapFile(file, next, contents) {
    var mapped;

    file = file.clone();
    contents = arguments.length < 3 ? file.contents : contents;

    if (fn.length === 3) {
      // contents, filename, done (async)
      fn(contents, file.path, function (err, mapped) {
        if (err) {
          stream.emit('error', err);
        } else {
          postMap(file, next, contents, mapped);
        }
      });
    } else {
      // contents and/or filename (sync)
      try {
        mapped = fn(contents, file.path);
      } catch (err) {
        return stream.emit('error', err);
      }

      postMap(file, next, contents, mapped);
    }
  }

  function push(file, next) {
    stream.push(file);
    next();
  }

  function flush(cb) {
    check(done = cb);
  }

  function check() {
    if (!pending && done) {
      done();
    }
  }
}

module.exports = map;
