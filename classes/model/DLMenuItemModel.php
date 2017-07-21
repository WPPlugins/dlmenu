<?php
/**
 * MenuItem model.
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
include_once('DLMenuResourcesModel.php');
class DLMenuItemModel extends DLMenuBaseObject{
	var $url;
	var $title = "no title";
	var $description = "no description";
	var $enabled = true;
	var $color = "0xFFFFFF";
	var $bgcolor;
	var $fontSize = "12";
	var $cornerRadius;
	var $useShadow;
	var $type = "tab"; //tab,default;
	var $x = 10;
	var $y = 0;
	var $transition; //easeOutElastic, easeOutBack, easeOutQuad, ..
	var $handler = "menu";

	function DLMenuItemModel($y, $title, $description, $url, $fontColor = "0xFFFFFF", $fontSize = 12){
		$this->y = $y;
		$this->title = $title;
		$this->description = $description;
		$this->url = $url;
		$this->color = $fontColor;
		$this->fontSize = $fontSize;
	}

	function render(){
		$crlf = "\r\n";
		$output = "<MENUITEM x=\"{$this->x}\" y=\"{$this->y}\" type=\"{$this->type}\">{$crlf}";

		/**
		 * @todo transition implementation.
		 */
		if(isset($this->transition)){
			$output .= "<MOVE x=\"{$this->x}\" y=\"{$this->y}\" duration=\"4\" type=\"{$this->transition}\" />{$crlf}";
		}
		$output .= "<TITLE>{$this->title}</TITLE>{$crlf}";
		$output .= "<CONTENT>{$this->description}</CONTENT>{$crlf}";
		if($this->url !="")
			$output .= "<URL handler=\"{$this->handler}\">{$this->url}</URL>{$crlf}";
		if($this->color!="" && $this->fontSize > 0)
			$output .= "<TEXT size=\"{$this->fontSize}\" color=\"{$this->color}\" />{$crlf}";
		$output .= $this->fetchElements();
		$output .= "</MENUITEM>{$crlf}";

		$this->rendered_output = $output;
	}

	/**
	 * Get X.
	 * @return integer	x
	 */
	function getX(){
		return $this->x;
	}

	/**
	 * Set X.
	 * @param	integer	$x;
	 */
	function setX($x){
		$this->x = $x;
	}

	/**
	 * Get Y.
	 * @return integer y
	 */
	function getY(){
		return $this->y;
	}

	/**
	 * Set Y.
	 * @param	integer	$y;
	 */
	function setY($y){
		$this->y = $y;
	}

	/**
	* Set the goto url.
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

	/**
	 * Set is enabled.
	 * @param	boolean 	enabled
	 */
	function setEnabled($enabled){
		$this->enabled = $enabled;
	}
	/**
	 * Get enabled.
	 * @return boolean enabled
	 */
	function getEnabled(){
		return $this->enabled;
	}

	/**
	 * Set the color.
	 * @param	string	$color
	 */
    function setColor($color){
		$this->color = $color;
	}

	/**
	 * Get the backgroundcolor.
	 * @return bgColor
	 */
	function getColor(){
		return $this->color;
	}

	/**
	 * Get Background color.
	 * @return	string	bgcolor
	 */
	function getBgColor(){
		return $this->bgcolor;
	}

	/**
	 * Set Backgroundcolor.
	 * @param	string	bgcolor
	 */
	function setBgColor($bgcolor){
		$this->bgcolor = $bgcolor;
	}

	/**
	 * Set Corner Radius.
	 * @param	integer cornerRadius
	 */
	function setCornerRadius($cornerRadius){
		$this->cornerRadius = $cornerRadius;
	}

	/**
	 * Get Corner Radius.
	 * @return integer cornerRadius
	 */
	function getCornerRadius(){
		return $this->cornerRadius;
	}

	/**
	 * Get Use Shadow.
	 * @return boolean useShadow
	 */
	function getUseShadow(){
		return $this->useShadow;
	}

	/**
	 * Set Use Shadow.
	 * @param	useShadow
	 */
	function setUseShadow($useShadow){
		$this->useShadow = $useShadow;
	}

	/**
	 * Add Resource To Menu Item.
	 * @param MenuResource menuResource
	 */
	function addMenuResource($menuResource){
		$this->menuResourceArray[] = menuResource;
	}
	/**
	 * Get Menu Resources.
	 * @return array	menuResources
	 */
	function getMenuResources(){
		return $this->menuResourceArray;
	}

	/**
	 * Add menu item.
	 * @param MenuItem	menuItem
     */
	function addMenuItem($menuItem){
		$this->menuItems[] = $menuItem;
	}
	/**
	 * Get all menu items.
	 * @return	array menuItems
	 */
	function getMenuItems(){
		return $this->menuItems;
	}

	/**
	 * Get Type.
     * @return string	type
     */
	function getType(){
		return $this->type;
	}

	/**
	 * Set Type.
	 * @param string	$type tab|default
	 */
	function setType($type = "tab"){
		$this->type = type;
	}
}
?>
