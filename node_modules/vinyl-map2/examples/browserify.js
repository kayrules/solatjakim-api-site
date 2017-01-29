'use strict';
var gulp = require('gulp'),
  browserify = require('browserify'),
  map = require('vinyl-map2');

gulp.task('browserify', function () {
  return gulp.src('./scripts/*.js')
    .pipe(map(function (code, filename, done) {
      var b, compiled;

      if (code.indexOf('require(') > -1) {
        // this bit of code is written in node format. browserify it!
        b = browserify({
          entries: filename,
          debug: true
        });
        compiled = '';

        // browserify gives us a stream of data we can listen to
        b.bundle().on('data', function (chunk) {
          compiled += chunk;
        }).on('end', function () {
          done(null, compiled); // when it's done, call done() with the final code
        });
      } else {
        done(null, code); // pass through non-browserify js files
      }
    }))
    .pipe(gulp.dest('dist/js'));
    // put all the files in a directory
});
