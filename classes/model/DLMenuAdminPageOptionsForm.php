<?php
/**
 * DLMenuAdminPageOptionsForm model object.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.2
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

include_once('DLMenuBaseForm.php');
class DLMenuAdminPageOptionsForm extends DLMenuBaseForm{
	var $dlmenu_backgroundcolor = '8CC3F3';
	var $dlmenu_pagefontcolor = 'F3F3F3';
	var $dlmenu_fontcolor = 'F3F3F3';
	var $dlmenu_shieldcolor = '79A51B';
	var $dlmenu_tabcolor = '8CBE20';

	function DLMenuAdminPageOptionsForm($lazy = false){
		parent::DLMenuBaseForm();
		if($this->setFormValues()){
			$this->saveOptions();
		}
		if(!$lazy)
			$this->loadOptions();
	}

	function getBackgroundColor(){
		return $this->dlmenu_backgroundcolor;
	}

	function getFontColor(){
		return $this->dlmenu_pagefontcolor;
	}

	function getMenuFontColor(){
		return $this->dlmenu_fontcolor;
	}

	function getShieldColor(){
		return $this->dlmenu_shieldcolor;
	}

	function getTabColor(){
		return $this->dlmenu_tabcolor;
	}
}
?>