<?php
/**
 * MenuAppearance model.
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
class DLMenuAppearanceModel extends DLMenuBaseObject{

	var $fontSrcUri;
	var $bgColor = "0x000000";
	var $cornerRadius = 5;
	var $useShadow = true;

	function DLMenuAppearanceModel($fontSrcUri, $bgColor = "0x000000", $cornerRadius = 5, $useShadow = true){
		$this->fontSrcUri = $fontSrcUri;
		$this->bgColor = $bgColor;
		$this->cornerRadius = $cornerRadius;
		$this->useShadow = $useShadow;
	}

	function render(){
		$crlf = "\r\n";
		$output = "<APPEARANCE>{$crlf}";
		if(isset($this->fontSrcUri) && $this->fontSrcUri != null){
			$output .="<FONT src=\"{$this->fontSrcUri}\" />{$crlf}";
		}
		else{
			$output .= "<BGCOLOR>{$this->bgColor}</BGCOLOR>{$crlf}";
			$output .= "<RADIUS>{$this->cornerRadius}</RADIUS>{$crlf}";

			if($this->useShadow){
				$output .= "<SHADOW>true</SHADOW>{$crlf}";
			}
			else {
				$output .= "<SHADOW>false</SHADOW>{$crlf}";
			}
		}
		$output .= $this->fetchElements();
		$output .= "</APPEARANCE>{$crlf}";
		$this->rendered_output = $output;
	}

	/**
	 * Get Font Src Uri.
	 * @return string fontSrcUri
	 */
	function getFontSrcUri(){
		return $this->fontSrcUri;
	}

	/**
	 * Set Font Src Uri.
	 * @param	string	$fontSrcUri
	 */
	function setFontSrcUri($fontSrcUri){
		$this->fontSrcUri = $fontSrcUri;
	}

	/**
	 * Set Backgroundcolor.
	 * @param	string	$bgColor
	 */
	function setBgColor($bgColor){
		$this->bgColor = bgColor;
	}

	/**
	 * Get Backgroundcolor.
	 * @return string bgColor
	 */
	function getBgColor(){
		return $this->bgColor;
	}
}
?>