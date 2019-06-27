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

/**
 * Savoir : Calendar Upcoming modified version
 *
 * @package    block_savoir_mycourses
 * @copyright  Laurent David <laurent@call-learning.fr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
include_once($CFG->dirroot . '/blocks/myoverview/block_myoverview.php');
include_once($CFG->dirroot . '/blocks/myoverview/lib.php');

class block_savoir_mycourses extends block_myoverview {

    function init() {
        $this->title = get_string('plugin:title', 'block_savoir_mycourses');
    }
    /**
     * Returns the contents.
     *
     * @return stdClass contents of block
     */
    public function get_content() {
        if (isset($this->content)) {
            return $this->content;
        }

        $renderable = new \block_myoverview\output\main(BLOCK_MYOVERVIEW_TIMELINE_VIEW);
        $renderer = $this->page->get_renderer('block_savoir_mycourses');

        $this->content = new stdClass();
        $this->content->text = $renderer->render($renderable);
        $this->content->footer = '';

        return $this->content;
    }

}
