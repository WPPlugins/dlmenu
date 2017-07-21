<?php
/**
 * Kuler model object.
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
class DLMenuKulerModel extends DLMenuBaseObject {

	var $title_parent;
	var $title;
	var $author;
	var $url;
	var $rating;
	var $thumb_url; //png
	var $tags = array();
	var $date;

	var $hex_1;
	var $hex_2;
	var $hex_3;
	var $hex_4;
	var $hex_5;

	function DLMenuKulerModel(){
		parent::DLMenuBaseObject();
	}

	function setTitleParent($title_parent){
		$this->title_parent = $title_parent;
	}

	function setTitle($title){
		$this->title = $title;
	}

	function setAuthor($author){
		$this->author = $author;
	}

	function setURL($url){
		$this->url = $url;
	}

	function setRating($rating){
		$this->rating = $rating;
	}

	function addTag($tag){
		$this->tags[] = $tag;
	}

	function setThumbURL($thumb_url){
		$this->thumb_url = $thumb_url;
	}

	function setHex1($hex){
		$this->hex_1 = $hex;
	}

	function setHex2($hex){
		$this->hex_2 = $hex;
	}

	function setHex3($hex){
		$this->hex_3 = $hex;
	}

	function setHex4($hex){
		$this->hex_4 = $hex;
	}

	function setHex5($hex){
		$this->hex_5 = $hex;
	}

	function getTitleParent(){
		return $this->title_parent;
	}

	function getTitle(){
		return $this->title;
	}

	function getAuthor(){
		return $this->author;
	}

	function getRating(){
		return $this->rating;
	}

	function getTags(){
		return $this->tags;
	}

	function getThumbURL(){
		return $this->thumb_url;
	}

	function getURL(){
		return $this->url;
	}

	function getHex1(){
		return $this->hex_1;
	}

	function getHex2(){
		return $this->hex_2;
	}

	function getHex3(){
		return $this->hex_3;
	}

	function getHex4(){
		return $this->hex_4;
	}

	function getHex5(){
		return $this->hex_5;
	}
}
?>
