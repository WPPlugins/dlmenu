<?php
/**
 * DLMENU API.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
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
include_once('classes/DLMenuAPI.php');

$dlmenu_api = new DLMenuAPI;

/**
 * Load page.
 * @param String $page
 */
function dlmenu_api_load_page($page){
	global $dlmenu_api;

	$dlmenu_cur_page = $page;

	$dlmenu_api->render('header');
	if($dlmenu_api->isAjax()){
		if('' == $page){
			$dlmenu_api->render('content');
		} else {
			$dlmenu_api->render($dlmenu_cur_page);
		}
	} else {
		echo '&nbsp;<!-- IE FIX /-->'; //ie fix: layout div empty

		if(!function_exists('renderDLMenu')) {
			_e('DL-MENU plugin is not acivated.','dlmenu');
			echo '&nbsp;';
			$act_url = get_bloginfo('wpurl')."/wp-admin/plugins.php";
			_e('Please','dlmenu');
			echo "&nbsp;<a href=\"{$act_url}\" target=\"_self\">";
			_e('activate','dlmenu');
			echo '</a>';
		}
	}

	if(!$dlmenu_api->isAjax()){
		$dlmenu_api->render('footer');
		echo '</body>';
		echo "\n";
		echo '</html>';
	}
}
?>