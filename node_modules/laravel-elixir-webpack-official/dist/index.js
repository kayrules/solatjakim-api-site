'use strict';

var _lodash = require('lodash');

var _WebpackTask = require('./WebpackTask');

var _WebpackTask2 = _interopRequireDefault(_WebpackTask);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/*
 |----------------------------------------------------------------
 | Webpack
 |----------------------------------------------------------------
 |
 | This task will allow you to use ES2015 code in any browser.
 | It leverages Webpack and Buble to transform and compile
 | your code into a single entry point for the browser.
 |
 */

Elixir.webpack = {
    config: {
        watch: Elixir.isWatching(),
        watchOptions: {
            poll: true,
            aggregateTimeout: 500,
            ignored: /node_modules/
        },
        devtool: Elixir.config.sourcemaps ? 'eval-cheap-module-source-map' : '',
        module: {
            loaders: [{ test: /\.js$/, loader: 'buble', exclude: /node_modules/ }]
        },
        stats: {
            assets: false,
            version: false
        }
    },

    mergeConfig: function mergeConfig(newConfig) {
        return this.config = (0, _lodash.mergeWith)(this.config, newConfig, function (objValue, srcValue) {
            if ((0, _lodash.isArray)(objValue)) {
                return objValue.concat(srcValue);
            }
        });
    }
};

Elixir.extend('webpack', function (scripts, output, baseDir, options) {
    new _WebpackTask2.default('webpack', getPaths(scripts, baseDir, output), options);
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
    return new Elixir.GulpPaths().src(src, baseDir || Elixir.config.get('assets.js.folder')).output(output || Elixir.config.get('public.js.outputFolder'), 'all.js');
}