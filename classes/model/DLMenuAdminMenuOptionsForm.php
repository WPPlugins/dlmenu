<?php
/**
 * DLAMenudminMenuOptionsForm model object.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package dlmenu
 * @subpackage model
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
include_once("DLMenuBaseForm.php");
class DLMenuAdminMenuOptionsForm extends DLMenuBaseForm{
	var $dlmenu_width = 780;
	var $dlmenu_height = 290;
	var $dlmenu_font_path = '/resources/fonts/lucinda.swf';
	var $dlmenu_fontsize = 40;
	var $dlmenu_tab_y = 220;
	var $dlmenu_radius = 5;
	var $dlmenu_shadow = 1;
	var $dlmenu_tab_spacing = 10;
	var $dlmenu_submenu_width = 100;

	/**
	 * DLMenuAdminMenuOptionsForm.
	 */
	function DLMenuAdminMenuOptionsForm($lazy = false){
		parent::DLMenuBaseForm();
		if($this->setFormValues()){
			$this->determineTabPosition();
			$this->saveOptions();
		}
		if(!$lazy) {
			$this->loadOptions();
		}
	}

	/**
	 * Set Tab Position Y.
	 * Determine tab position.
	 */
	function determineTabPosition(){
		if($this->getFontSize() > 20){
			$this->dlmenu_tab_y = ($this->getHeight() - 50) - ($this->getFontSize()- 20);
		} else {
			$this->dlmenu_tab_y = ($this->getHeight() - 50) + (20 - $this->getFontSize());
		}
	}

	/**
	 * @access public
	 */
	function getWidth(){
		return $this->dlmenu_width;
	}

	/**
	 * @access public
	 */
	function getHeight(){
		return $this->dlmenu_height;
	}

	/**
	 * @access public
	 */
	function getFontPath(){
		return $this->dlmenu_font_path;
	}

	/**
	 * @access public
	 */
	function getFontSize(){
		return $this->dlmenu_fontsize;
	}

	/**
	 * @access public
	 */
	function getTabY(){
		return $this->dlmenu_tab_y;
	}

	/**
	 * @access public
	 */
	function getTabRadius(){
		return $this->dlmenu_radius;
	}

	/**
	 * @access public
	 */
	function getTabShadow(){
		return $this->dlmenu_shadow;
	}

	/**
	 * @access public
	 */
	function getTabSpacing(){
		return $this->dlmenu_tab_spacing;
	}

	/**
	 * @access public
	 */
	function getSubmenuWidth(){
		return $this->dlmenu_submenu_width;
	}
}
?>