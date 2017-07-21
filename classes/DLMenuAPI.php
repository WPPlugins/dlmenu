<?php
/**
 * DLMenu API.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package dlmenu
 * @license http://www.gnu.org/licenses/gpl.html GPL
 */

 /**
  	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class DLMenuAPI{

	var $plugin_name = 'dlmenu';

	/**
	 * Constructor.
	 */
	function DLMenuAPI(){
	}

	/**
	 * Is Ajax?.
	 * @return boolean isAjax
	 */
	function isAjax(){
		return ereg('dlmenu', $_SERVER['QUERY_STRING']);
	}

	/**
	 * Renders a section of user display code.  The code is first checked for in the current theme display directory
	 * before defaulting to the plugin
	 *
	 * @param string $ug_name Name of the admin file (without extension)
	 * @param string $array Array of variable name=>value that is available to the display code (optional)
	 * @return void
	 **/
	function render ($ug_name, $ug_vars = array (), $action = null){
		foreach ($ug_vars AS $key => $val)
			$$key = $val;

		if (file_exists (TEMPLATEPATH."/view/{$this->plugin_name}/$ug_name.php"))
			include (TEMPLATEPATH."/view/{$this->plugin_name}/$ug_name.php");
		else
			echo "<p>Rendering of template $ug_name.php failed</p>";
	}
}
?>