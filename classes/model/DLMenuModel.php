<?php
/**
 * Menu model.
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

include_once("DLMenuBaseObject.php");
class DLMenuModel extends DLMenuBaseObject{

	function DLMenuModel(){

	}

	function render(){
		$crlf = "\r\n";
		$output = "<?xml version=\"1.0\"?>{$crlf}";
		$output .= "<DL xmlns:daveligthart.com=\"http://www.daveligthart.com/2007/xml\">{$crlf}";
		$output .= "<MENU>{$crlf}";
		$output .= $this->fetchElements();
		$output .= "</MENU>{$crlf}";
		$output .= "</DL>{$crlf}";

		$this->rendered_output = $output;
	}

	function addMenuItems($menuItems){
		$this->addElement($menuItems);
	}

	function addAppearance($menuAppearance){
		$this->addElement($menuAppearance);
	}

	function addResources($menuResources){
		$this->addElement($menuResources);
	}
}
?>
