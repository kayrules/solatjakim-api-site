'use strict';

var _CssTask = require('../CssTask');

var _CssTask2 = _interopRequireDefault(_CssTask);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/*
 |----------------------------------------------------------------
 | Less Compilation Task
 |----------------------------------------------------------------
 |
 | This task will compile your Less, including minification and
 | and auto-prefixing. Less is one of the CSS pre-processors
 | supported by Elixir, along with the Sass CSS processor.
 |
 */

Elixir.extend('less', function (src, output, baseDir, options) {
  new _CssTask2.default('less', getPaths(src, baseDir, output), options);
});

/**
 * Prep the Gulp src and output paths.
 *
 * @param  {string|Array} src
 * @param  {string|null}  baseDir
 * @param  {string|null}  output
 * @return {GulpPaths}
 */
function getPaths(src, baseDir, output) {
  return new Elixir.GulpPaths().src(src, baseDir || Elixir.config.get('assets.css.less.folder')).output(output || Elixir.config.get('public.css.outputFolder'), 'app.css');
};