'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _fs = require('fs');

var _fs2 = _interopRequireDefault(_fs);

var _lodash = require('lodash');

var _gulpFilter = require('gulp-filter');

var _gulpFilter2 = _interopRequireDefault(_gulpFilter);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var gulpWebpack = void 0;

var WebpackTask = function (_Elixir$Task) {
    _inherits(WebpackTask, _Elixir$Task);

    /**
     * Create a new JavaScriptTask instance.
     *
     * @param  {string}      name
     * @param  {GulpPaths}   paths
     * @param  {object|null} options
     */

    function WebpackTask(name, paths, options) {
        _classCallCheck(this, WebpackTask);

        var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(WebpackTask).call(this, name, null, paths));

        _this.options = options;

        if (_fs2.default.existsSync('webpack.config.js')) {
            _this.userWebpackConfig = require(process.cwd() + '/webpack.config.js');
        }
        return _this;
    }

    /**
     * Lazy load the task dependencies.
     */


    _createClass(WebpackTask, [{
        key: 'loadDependencies',
        value: function loadDependencies() {
            gulpWebpack = require('webpack-stream');
        }

        /**
         * Build up the Gulp task.
         */

    }, {
        key: 'gulpTask',
        value: function gulpTask() {
            var jsFiles = (0, _gulpFilter2.default)(['**/*.js'], { restore: true });
            return gulp.src(this.src.path).pipe(this.webpack()).on('error', this.onError()).pipe(jsFiles).pipe(this.minify()).on('error', this.onError()).pipe(jsFiles.restore).pipe(this.saveAs(gulp)).pipe(this.onSuccess());
        }

        /**
         * Run the files through Webpack.
         */

    }, {
        key: 'webpack',
        value: function webpack() {
            this.recordStep('Transforming ES2015 to ES5');
            this.recordStep('Writing Source Maps');

            return gulpWebpack(this.mergeConfig(), require('webpack'));
        }

        /**
         * Merge the Webpack config.
         *
         * @return {object}
         */

    }, {
        key: 'mergeConfig',
        value: function mergeConfig() {
            var defaultConfig = {
                output: { filename: this.output.name }
            };

            return (0, _lodash.mergeWith)(defaultConfig, Elixir.webpack.config, this.userWebpackConfig, this.options, function (objValue, srcValue) {
                if ((0, _lodash.isArray)(objValue)) {
                    return objValue.concat(srcValue);
                }
            });
        }
    }]);

    return WebpackTask;
}(Elixir.Task);

exports.default = WebpackTask;