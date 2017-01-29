'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _TaskReporter2 = require('./TaskReporter');

var _TaskReporter3 = _interopRequireDefault(_TaskReporter2);

var _cliTable = require('cli-table');

var _cliTable2 = _interopRequireDefault(_cliTable);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MinimalTaskReporter = function (_TaskReporter) {
    _inherits(MinimalTaskReporter, _TaskReporter);

    function MinimalTaskReporter() {
        _classCallCheck(this, MinimalTaskReporter);

        return _possibleConstructorReturn(this, (MinimalTaskReporter.__proto__ || Object.getPrototypeOf(MinimalTaskReporter)).apply(this, arguments));
    }

    _createClass(MinimalTaskReporter, [{
        key: 'makeTable',


        /**
         * Create the table rows.
         */
        value: function makeTable() {
            return new _cliTable2.default({
                head: ['Task', 'Source Files', 'Destination']
            });
        }

        /**
         * Add any number of rows to the table.
         *
         * @param {Table} table
         * @param {array} tasks
         */

    }, {
        key: 'addRows',
        value: function addRows(table, tasks) {
            var _this2 = this;

            tasks.forEach(function (task) {
                var row = ['mix.' + task.name + '()'];

                if (task.src && task.output) {
                    row.push(_this2.src(task), task.output.path || task.output);
                }

                table.push(row);
            });
        }
    }]);

    return MinimalTaskReporter;
}(_TaskReporter3.default);

exports.default = MinimalTaskReporter;