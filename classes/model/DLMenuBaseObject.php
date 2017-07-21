<?php
/**
 * BaseObject.
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

class DLMenuBaseObject{

	var $rendered_output = "";
	var $rendered = false;
	var $elements = array();
	var $rendered_elements_output = "";
	var $rendered_elements = false;

	function DLMenuBaseObject(){

	}

	/**
	 * Add element.
	 * @param BaseObject $element
	 */
	function addElement($element){
		$this->elements[] = $element;
	}

	/**
	 * @override
	 */
	function render(){

	}

	/**
	 * Render child elements.
	 * @return void
	 */
	function renderElements(){
		$output = "";
		if(is_array($this->elements) && count($this->elements) > 0){
			foreach($this->elements as $element){
				$output .= $element->fetch();
			}
		}
		$this->rendered_elements_output = $output;
	}

	/**
	 * Fetch elements.
	 * @return string rendered elements output
	 */
	function fetchElements(){
		if(!$this->rendered_elements){
			$this->renderElements();
		}
		$this->rendered_elements = true;
		return $this->rendered_elements_output;
	}

	/**
	 * Fetch element.
	 * @return string rendered output
	 */
	function fetch(){
		if(!$this->rendered){
			$this->render();
		}
		$this->rendered = true;
		return $this->rendered_output;
	}
}
?>
