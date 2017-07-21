<?php
/**
 * DLMenuBaseForm.
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

class DLMenuBaseForm {

	/** @var array exclude vars from save */
	var $exclude_vars = array();

	/**
	 * BaseForm.
	 */
	function DLMenuBaseForm(){
	}

	/**
	 * Fetch html form identifier html.
	 * @return String html
	 * @access public
	 */
	function htmlFormId(){
		return "<input type=\"hidden\" name=\"form_name\" id=\"form_name\" value=\"".get_class($this)."\" />\n";
	}

	/**
	 * Is valid form?
	 * @return boolean is valid
	 * @access public
	 */
	function isValidForm(){
		return ($_POST['form_name'] == get_class($this));
	}

	/**
	 * Set form values.
	 * @return	boolean succes
	 * @access protected
	 */
	function setFormValues(){
		/**
		 * Check if the right form is submitted.
		 */
		if(!empty($_POST) && $this->isValidForm()){
			foreach($_POST as $key=>$value){
				$this->$key = $value;
			}
			return true;
		}
		return false;
	}
	/**
	 * Exclude vars from save.
	 * @param array $names variable names
	 * @access protected
	 */
	function setExcludeVars($names = array()){
		$this->exclude_vars = $names;
	}

	/**
	 * Get excluded vars.
	 * @return array excluded vars
	 * @access protected
	 */
	function getExcludeVars(){
		return $this->exclude_vars;
	}

	/**
	 * Get class vars.
	 * @return	array	class variables with values
	 * @access protected
	 */
	function getClassVars(){
		$class_vars = get_object_vars($this);
		return $class_vars;
	}

	/**
	 * Save form values to database.
	 * @param integer $post_id
	 * @access protected
	 */
	function save($post_id){
		if($post_id > 0){
			$class_vars = $this->getClassVars();
			foreach($class_vars as $key=>$value){
				if(!in_array($key, $this->exclude_vars)) {
					if(!update_post_meta($post_id, $key, $value)){
						// if failed add the meta.
						if(!add_post_meta($post_id, $key, $value)){

						}
					}
					else {

					}
				}
			}
		}
	}

	/**
	 * Delete post.
	 * @param integer $post_id
	 * @return Object post
	 * @access protected
	 */
	function delete($post_id){
		if($post_id != "" && $post_id > 0)
			return wp_delete_post($post_id);
	}

	/**
	 * Load form values from database.
	 * @param integer $post_id
	 * @access protected
	 */
	function load($post_id){
		if($post_id > 0){
			$class_vars = $this->getClassVars();
			foreach($class_vars as $key=>$value){
				$this->$key = $this->loadItem($post_id, $key);
			}
		}
	}

	/**
	 * Load single form value.
	 * @param	integer	$post_id
	 * @param	integer $key
	 * @access protected
	 */
	function loadItem($post_id, $key){
		return get_post_meta($post_id, $key, true);
	}

	/**
	 * Save options.
	 * @param boolean $force force save, optional
	 * @access protected
	 */
	function saveOptions($force = false){
		if(!empty($_POST) || $force){
			$class_vars = $this->getClassVars();
			foreach($class_vars as $key=>$value){
				if($key != "" && !in_array($key, $this->exclude_vars)) {
					if(!update_option($key, $value)){
						if(!add_option($key, $value)){

						}
					}
					else{

					}
				}
			}
		}
	}

	/**
	 * Load options.
	 * @access protected
	 */
	function loadOptions(){
		$class_vars = $this->getClassVars();
		foreach($class_vars as $key=>$value){
			$this->$key = $this->loadOption($key);
		}
	}

	/**
	 * Load option.
	 * @param String $key option key
	 * @return String option value
	 * @access protected
	 */
	function loadOption($key){
		return stripslashes(get_option($key));
	}

	/**
	 * Is saved?
	 * @return boolean isSaved
	 * @access protected
	 */
	function isSaved(){
		if($_POST){
			return true;
		}
		return false;
	}
}
?>