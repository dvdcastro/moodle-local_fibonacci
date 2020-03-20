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

namespace local_fibonacci\api;

defined('MOODLE_INTERNAL') || die();

/**
 * Fibonacci helper.
 * @copyright Copyright (c) 2020 Blackboard Inc.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class fibonacci_helper {

    /**
     * @var fibonacci_helper|null
     */
    private static $instance;

    /**
     * fibonacci_helper constructor.
     */
    private function __construct() {}

    /**
     * @return fibonacci_helper
     */
    public static function get_instance(): fibonacci_helper {
        if (self::$instance === null) {
            self::$instance = new fibonacci_helper();
        }

        return self::$instance;
    }

    /**
     * @param $n
     * @return int
     */
    public function calculate($n): int {
        if ($n === 0) {
            return 0;
        }

        if ($n === 1) {
            return 1;
        }

        return $this->calculate($n - 2) + $this->calculate($n - 1);
    }
}
