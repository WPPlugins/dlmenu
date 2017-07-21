<?php
/**
 * DLAdminHeaderOptionsForm model object.
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
class DLMenuAdminHeaderOptionsForm extends DLMenuBaseForm{

	/**
	 * Header Image.
	 */
	var $dlmenu_headerimage_path;
	/** @var integer image position x */
	var $dlmenu_headerimage_x = 0;
	/** @var integer image position y */
	var $dlmenu_headerimage_y = 0;
	/** @var String path to video. */
	var $dlmenu_video_path = '';
	/** @var String video click url. */
	var $dlmenu_video_click_url = 'http://www.daveligthart.com';
	/** @var integer video width */
	var $dlmenu_video_width = 780;
	/** @var integer video height. */
	var $dlmenu_video_height = 200;
	/** @var String video orientation. */
	var $dlmenu_video_orientation = 'top-left';
	/** @var boolean video repeat. */
	var $dlmenu_video_repeat;
	/** @var String behavior. */
	var $dlmenu_video_behavior = 'repeat';

	/**
	 * DLMenuAdminHeaderOptionsForm.
	 */
	function DLMenuAdminHeaderOptionsForm($lazy = false){
		parent::DLMenuBaseForm();
		if($this->setFormValues()){
			if($this->getVideoRepeat() > -1) {
				if($this->getVideoRepeat() == 0) {
					$this->dlmenu_video_behavior = '';
				} else {
					$this->dlmenu_video_behavior = 'repeat';
				}
			}
			$this->resizeMenuHeightFromImageDimensions();
			$this->saveOptions();
		}
		if(!$lazy){
			$this->loadOptions();
		}

		if('' == $this->dlmenu_headerimage_path){
			$this->dlmenu_headerimage_path = get_bloginfo('wpurl').'/wp-content/plugins/dlmenu/resources/images/header.jpg';
		}
	}

	/**
	 * Resize dlmenu height based on image dimensions.
	 * @return boolean menu height saved
	 * @access protected
	 */
	function resizeMenuHeightFromImageDimensions(){
		$success = false;
		if(function_exists('getimagesize')){
			$path = $this->getHeaderImagePath();
			if('' != $path){
				list($width, $height, $type, $attr) = @getimagesize($path);
				if($height > 0){
					$menuOptionsForm = new DLMenuAdminMenuOptionsForm();
					$menuOptionsForm->dlmenu_width = $width;
					$menuOptionsForm->dlmenu_height = $height + 65;
					$menuOptionsForm->determineTabPosition();
					$menuOptionsForm->setExcludeVars(array());
					$menuOptionsForm->saveOptions(true);
				}
			}
		}
		return $success;
	}

	/**
	 * Get Header Image Path.
	 * @return String path
	 * @access public
	 */
	function getHeaderImagePath(){
		$path = htmlspecialchars($this->dlmenu_headerimage_path);
		return $path;
	}

	/**
	 * Get header image x position.
	 * @return integer x
	 * @access public
	 */
	function getHeaderImageX(){
		return htmlspecialchars($this->dlmenu_headerimage_x);
	}

	/**
	 * Get header image y position.
	 * @return integer y
	 * @access public
	 */
	function getHeaderImageY(){
		return htmlspecialchars($this->dlmenu_headerimage_y);
	}

	/**
	 * Get path to video.
	 * @return String path to video
	 * @access public
	 */
	function getVideoPath(){
		return htmlspecialchars($this->dlmenu_video_path);
	}

	/**
	 * Get video click url.
	 * @return String click url
	 * @access public
	 */
	function getVideoClickUrl(){
		return htmlspecialchars($this->dlmenu_video_click_url);
	}

	/**
	 * Get video width.
	 * @return integer width of video
	 * @access public
	 */
	function getVideoWidth(){
		return htmlspecialchars($this->dlmenu_video_width);
	}

	/**
	 * Get video height.
	 * @return integer height of video
	 * @access public
	 */
	function getVideoHeight(){
		return htmlspecialchars($this->dlmenu_video_height);
	}

	/**
	 * Get video orientation.
	 * @return String orientation
	 * @access public
	 */
	function getVideoOrientation(){
		return htmlspecialchars($this->dlmenu_video_orientation);
	}

	/**
	 * Get video repeat.
	 * @return boolean video repeat
	 * @access public
	 */
	function getVideoRepeat(){
		$this->dlmenu_video_repeat = 0;
		if($this->dlmenu_video_behavior == "repeat"){
			$this->dlmenu_video_repeat = 1;
		}
		return htmlspecialchars($this->dlmenu_video_repeat);
	}
}
?>