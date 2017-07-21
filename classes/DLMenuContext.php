<?php
/**
 * DLMenuContext.
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

/**
 * Includes.
 */
include_once('util/dl.menu.utils.php');
include_once('util/DLMenuRSSReader.php');
include_once('util/DLMenuWPPlugin.php');
include_once('model/DLMenuKulerModel.php');
include_once('model/DLMenuOptionsModel.php');
include_once('model/DLMenuAdminHeaderOptionsForm.php');
include_once('model/DLMenuAdminMenuOptionsForm.php');
include_once('model/DLMenuAdminPageOptionsForm.php');
include_once('model/DLMenuAdminBlogOptionsForm.php');
include_once('action/DLMenuAdminAction.php');
include_once('action/DLMenuAdminHeaderAction.php');
include_once('action/DLMenuAdminPageAction.php');
include_once('action/DLMenuAdminMenuAction.php');
include_once('action/DLMenuAdminBlogAction.php');
include_once('action/DLMenuAdminHelpAction.php');
include_once('action/DLMenuFrontEndAction.php');
include_once('DLMenuKulerAPI.php');

class DLMenuContext extends DLMenuWPPlugin{
	/**
	 * @var AdminAction admin action handler
	 */
	var $adminAction = null;

	/**
	 * @var FrontEndAction frontend action handler
	 */
	var $frontEndAction = null;

	/**
	 * DLContext constructor.
	 * @access public
	 */
	function DLMenuContext($cur_file_path){
		$this->register_plugin('dlmenu', $cur_file_path);

		if (is_admin()) {
			$this->adminAction = new DLMenuAdminAction($this->plugin_name, $this->plugin_base);
		} else{
			$this->frontEndAction = new DLMenuFrontEndAction($this->plugin_name, $this->plugin_base);
		}
	}

	/**
	 * Render menu.
	 * @access public
	 */
	function renderMenu(){
		$this->frontEndAction->the_content();
	}
}
?>