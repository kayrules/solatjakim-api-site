# vinyl-map2

[![Circle CI](https://circleci.com/gh/yoshokatana/vinyl-map2/tree/master.svg?style=svg)](https://circleci.com/gh/yoshokatana/vinyl-map2/tree/master)

Map [vinyl](https://github.com/wearefractal/vinyl) files' contents as strings, so you can easily use existing code without needing yet another [gulp](https://github.com/gulpjs/gulp) plugin!

Essentially, with the hope of reducing the number of gulp plugins out there which are *just* doing this:

``` javascript
var through = require('through'),
  uglify = require('uglify-js');

module.exports = function() {
  return through(function(file) {
    if (file.isNull()) return this.queue(file);
    if (file.isStream()) throw new Error('no support');

    file.contents = file.contents.toString();

    var minified = uglify.minify(file.contents, {
      fromString: true
    })

    file = file.clone();
    file.contents = new Buffer(minified.code);
    this.queue(file);
  });
}
```

Of course, sometimes that's fine too, but this might help save some complexity for when it's too much hassle. It also takes care of the differences between handling Buffer, Stream and null values for your `file.contents`.

## Usage

```
npm install --save vinyl-map2
```

Here's a simple example, using gulp:

``` javascript
var uglify = require('uglify-js'),
  map = require('vinyl-map2'),
  gulp = require('gulp');

gulp.task('minify', function() {
  var minify = map(function(code, filename) {
    // file contents are handed
    // over as buffers
    code = code.toString();

    return uglify.minify(code, {
      fromString: true
    }).code;
  })

  return gulp.src(['./index.js'])
    .pipe(minify)
    .pipe(gulp.dest('./dist'));
})
```

## API

### `map(mapper(contents, filename[, done]))`

Returns a transform stream that takes vinyl files as input and spits out their modified copies as output.

`mapper` is a function which will be called once for each file, with three arguments:

* `contents` is a string or [Buffer](http://nodejs.org/api/buffer.html)
* `filename` is the value of `file.path`, which should generally be the file's
  absolute path. Might be convenient if you want to filter based on file
  extension etc.
* `done` is an _optional_ callback function. If your `mapper` function has a third argument, it will be called asynchronously. If not, the `mapper` will be called synchronously.

The `mapper` function is expected to return a modified string value for the updated file contents. If nothing is returned, no modifications will be made to the file contents, but the output file will be cloned.

If you run the `mapper` function asynchronously (by passing in a third `done` argument), you must call it instead of returning the file contents. It is a node-style callback: `done(err, contents)`

## License

MIT. See [LICENSE.md](http://github.com/yoshokatana/vinyl-map2/blob/master/LICENSE.md) for details.

## Contributing

This project was forked from [hughsk/vinyl-map](https://github.com/hughsk/vinyl-map), and will be actively maintained. I welcome contributions in the form of both bug reports and pull requests!

Fork the project and submit a PR on a branch that is not named `master`. We use linting tools and unit tests, which are built constantly using continuous integration. If you find a bug, it would be appreciated if you could also submit a branch with a failing unit test to show your case.
