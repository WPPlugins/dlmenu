<?php
/**
 * DLMenuAdminBlogAction.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.2
 * @package dlmenu
 * @subpackage action
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

class DLMenuAdminBlogAction extends DLMenuWPPlugin{
	var $adminBlogOptionsForm = null;

	/**
	 * DLAdminHeaderAction constructor.
	 * @access public
	 */
	function DLMenuAdminBlogAction($plugin_name, $plugin_base){
		$this->plugin_name = $plugin_name;
		$this->plugin_base = $plugin_base;

		$this->adminBlogOptionsForm = new DLMenuAdminBlogOptionsForm($_REQUEST["post"]);
	}

	/**
	 * Render view.
	 * @param integer $type
	 * @access public
	 */
	function render($type = 0){
		if($this->adminBlogOptionsForm->isSaved()){
			$this->render_message(__('Saved'), 'dlmenu');
		}
		$this->render_admin('admin_blog_options',
				array("form"=>$this->adminBlogOptionsForm), $this);
	}
}
?>