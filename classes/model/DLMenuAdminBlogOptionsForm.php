<?php
/**
 * DLMenuAdminBlogOptionsForm model object.
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

include_once('DLMenuBaseForm.php');
class DLMenuAdminBlogOptionsForm extends DLMenuBaseForm{
	var $dlmenu_blogtitle;
	var $dlmenu_blogsubtitle;

	function DLMenuAdminBlogOptionsForm($lazy = false){
		parent::DLMenuBaseForm();
		if($this->setFormValues()){
			$this->saveOptions();
		}
		if(!$lazy)
			$this->loadOptions();
	}

	function getBlogTitle(){
		return $this->dlmenu_blogtitle;
	}

	function getBlogSubtitle(){
		return $this->dlmenu_blogsubtitle;
	}

}
?>