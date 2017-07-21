<?php
/*
Plugin Name: DL-MENU
Plugin URI: http://www.daveligthart.com/dlmenu
Description: Flash Dynamic Tab Menu with submenus and <a href="http://en.wikipedia.org/wiki/AJAX" target="_blank">AJAX</a> support. A dynamic TAB menu and submenus are automatically generated from your Wordpress pages. The DL-MENU uses the <a href="http://kuler.adobe.com/" target="_blank>Adobe Kuler API</a> for dynamic coloring your whole website.  Changing the header image and header videos (ads) are supported aswell. This plugin is localized and supports multiple languages. <a href="http://www.daveligthart.com/plugins/dlmenu" target="_blank">DL-MENU</a>.
Version: 1.1
Author: Dave Ligthart <info@daveligthart.com>
Author URI: http://daveligthart.com
Min WP Version: 2.2
Max WP Version: 2.6
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

/**
 * Defines.
 */
define("DLMENU_DB_VERSION","1.0");
define("DLMENU_VERSION","1.0");

/**
 * Includes.
 */
include_once('lib/dlmenu.lib.properties.php');
include_once('classes/DLMenuContext.php');

/** @var DLMenuContext Instance of dlmenu */
$dlmenu = new DLMenuContext(__FILE__);

/**
 * Get content.
 * @access public
 */
function dlMenuContent(){
	include_once("view/dlmenu/dlmenu_content.php");
}

/**
 * Render menu.
 * @access public
 */
function renderDLMenu(){
	global $dlmenu;
	$dlmenu->renderMenu();
}
?>
