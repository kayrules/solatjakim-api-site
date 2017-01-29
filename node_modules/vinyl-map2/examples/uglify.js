'use strict';
var uglify = require('uglify-js'),
  map = require('../'),
  gulp = require('gulp');

gulp.task('minify', function () {
  var minify = map(function (code) {
    // file contents are handed
    // over as buffers
    code = code.toString();

    return uglify.minify(code, {
      fromString: true
    }).code;
  });

  return gulp.src(['./index.js'])
    .pipe(minify)
    .pipe(gulp.dest('./dist'));
});
