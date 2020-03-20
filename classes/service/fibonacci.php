<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_fibonacci\service;

use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;
use local_fibonacci\api\fibonacci_helper;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../../../lib/externallib.php');

/**
 * Fibonacci service.
 * @copyright Copyright (c) 2020 Blackboard Inc.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class fibonacci extends external_api {
    /**
     * @return external_function_parameters
     */
    public static function service_parameters() {
        $parameters = [
            'n' => new external_value(PARAM_INT, 'n', VALUE_REQUIRED),
        ];
        return new external_function_parameters($parameters);
    }

    /**
     * @return external_single_structure
     */
    public static function service_returns() {
        return new external_single_structure([
            'result' => new external_value(PARAM_INT, 'Result of calculating fibonacci')
        ]);
    }

    /**
     * @param $n
     * @return array
     */
    public static function service($n) {
        return ['result' => fibonacci_helper::get_instance()->calculate($n)];
    }
}
