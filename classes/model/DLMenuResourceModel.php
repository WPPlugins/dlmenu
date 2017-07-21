<?php
/**
 * MenuResource model.
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
class DLMenuResourceModel extends DLMenuBaseObject{
	var $type = 'image'; //flv,text
	var $src;
	var $x;
	var $y;
	var $fontSize = 12;
	var $fontColor = '0x000000';
	var $width;
	var $height;
	var $handler = 'video_click';
	var $url;
	var $behavior;
	var $title;

	function DLMenuResourceModel($type, $src, $x, $y){
		$this->type = $type;
		$this->src = $src;
		$this->x = $x;
		$this->y = $y;
	}

	function render(){
		$crlf = "\r\n";

		if('image' == $this->type) {
			$output = "<RESOURCE type=\"{$this->type}\" src=\"{$this->src}\" x=\"{$this->x}\" y=\"{$this->y}\" />{$crlf}";
		}
		else if('flv' == $this->type) {
			$output = "<RESOURCE type=\"{$this->type}\" src=\"{$this->src}\" width=\"{$this->width}\" height=\"{$this->height}\" x=\"{$this->x}\" y=\"{$this->y}\" behavior=\"{$this->behavior}\">{$crlf}";
			$output.= "<URL handler=\"{$this->handler}\">{$this->url}</URL>{$crlf}";
			$output .= "</RESOURCE>{$crlf}";
		}
		else if('text' == $this->type) {
			$output = "<RESOURCE type=\"{$this->type}\" x=\"{$this->x}\" y=\"{$this->y}\">{$crlf}";
			$output .= "<TEXT size=\"{$this->fontSize}\" color=\"{$this->fontColor}\" />{$crlf}";
			$output .= "<TITLE>{$this->title}</TITLE>{$crlf}";
			$output .= "</RESOURCE>{$crlf}";
		}

		$output .= $this->fetchElements();
		$this->rendered_output = $output;
	}

	function setType($type){
		$this->type = $type;
	}

	function getType(){
		return $this->type;
	}

	function setSrc($src){
		$this->src = $src;
	}

	function getSrc(){
		return $this->src;
	}

	function getX(){
		return $this->x;
	}

	function setX($x){
		$this->x = $x;
	}

	function getY(){
		return $this->y;
	}

	function setY($y){
		$this->y = $y;
	}

	function setWidth($width){
		$this->width = $width;
	}

	function getWidth(){
		return $this->width;
	}

	function setHeight($height){
		$this->height = $height;
	}

	function getHeight(){
		return $this->height;
	}

	/** Set the goto url.
	 * @param string	$url
	 */
	function setUrl($url){
		$this->url = $url;
	}

	/**
	 * Get the url to goto.
	 * @return string url
	 */
	function getUrl(){
		return $this->url;
	}

	/**
	 * Set the title of the ad.
	 * @param	string	$title
	 */
	function setTitle($title){
		$this->title = $title;
	}

	/**
	 * Get the ad title.
	 * @return string title
	 */
	function getTitle(){
		return $this->title;
	}

	function setFontColor($fontColor){
		$this->fontColor = $fontColor;
	}

	function getFontColor(){
		return $this->fontColor;
	}

	function setFontSize($fontSize){
		$this->fontSize = $fontSize;
	}

	function getFontSize(){
		return $this->fontSize;
	}

	function setBehavior($behavior = 'repeat'){
		$this->behavior = $behavior;
	}

	function getBehavior(){
		return $this->behavior;
	}
}
?>