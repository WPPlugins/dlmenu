<?php
/**
 * MenuItems model.
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

include_once('DLMenuBaseObject.php');
class DLMenuItemsModel extends DLMenuBaseObject{

	var $shieldColor = '0x999999';
	var $borderHeight = 15;

	function DLMenuItemsModel($shieldColor = '0x999999', $borderHeight = 15){
		$this->shieldColor = $shieldColor;
		$this->borderHeight = $borderHeight;
	}

	function render(){
		$crlf = "\r\n";
		if($this->shieldColor != null && $this->borderHeight != null){
			$options = "shieldcolor=\"{$this->shieldColor}\" borderheight=\"{$this->borderHeight}\"";
		}
		$output = "<MENUITEMS {$options}>{$crlf}";
		$output .= $this->fetchElements();
		$output .="</MENUITEMS>{$crlf}";
		$this->rendered_output = $output;
	}

	function setShieldColor($shieldColor){
		$this->shieldColor = $shieldColor;
	}

	function getShieldColor(){
		return $this->shieldColor;
	}

	function setBorderHeight($borderHeight){
		$this->borderHeight = $borderHeight;
	}

	function getBorderHeight(){
		return $this->borderHeight;
	}
}
?>
