<?php
/**
 * DLMenuFrontEndAction.
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

class DLMenuFrontEndAction extends DLMenuWPPlugin{
	var $frontEndQuestionForm = null;
	var $tabIndex = 1;
	/**
	 * DLMenuFrontEndAction.
	 * @param String $plugin_name
	 * @param String $plugin_base
	 */
	function DLMenuFrontEndAction($plugin_name, $plugin_base){
		$this->plugin_name = $plugin_name;
		$this->plugin_base = $plugin_base;

		/**
		 * Load the xml menu configuration.
		 */
		if(dlIsRequestParameter("menu_xml")){
			include_once($this->plugin_base."/classes/action/DLMenuAction.php");
			$action = new DLMenuAction(array("context"=>&$this));
			$this->render("dlmenu.xml",array(),$action);
			exit;
		} else {
			//wp_enqueue_script('jquery');

			// Change template to dldefault
			//$this->add_filter('stylesheet','get_stylesheet');
			//$this->add_filter('template','get_template');
			$this->add_filter('wp_head');
			$this->add_filter('wp_list_pages', 'list_pages_filter');
			//$this->add_filter('wp_list_categories','list_cat_filter');
		}
	}

	/**
	 * Render header.
	 * @access private
	 */
	function wp_head(){
		$this->render('dlmenu_head',array("plugin_name"=>$this->plugin_name));
	}

	/**
	 * Render content.
	 * @access private
	 */
	function the_content(){
		$this->render('dlmenu_main');
	}

	/**
	 * On Init.
	 * @access private
	 */
	function init(){

	}

	/**
	 * Render view.
	 */
	function renderView(){
	}

	/**
	 * List pages callback.
	 * @return Array replaced matches
	 */
	function list_pages_callback($input){
		$_0 = $input[0];
		$_1 = $input[1];
		$_2 = $input[2];

		$url = "href=\"$_2\" onclick=\"javascript:menu('$_2&amp;dlmenu',{$this->tabIndex});return false;\"";

		$matches = array();

		preg_match_all("#page_id=([0-9]*)&amp;#i", $url, $matches);

		$is_child = false;

		$has_children = false;

		if(isset($matches[1])){
			$page_id = $matches[1][0];

			$current_page = get_page($page_id);

			$pages = get_pages();

			foreach($pages as $page){
				$is_child = ( $current_page && $page->ID == $current_page->post_parent ); // has parent?
				if($is_child){
					$has_children = true;
					$index = $this->tabIndex - 1;
					$url = "href=\"$_2\" onclick=\"javascript:menu('$_2&amp;dlmenu',{$index});return false;\"";
				}
			}
		}

		if(!$has_children){
			$this->tabIndex++;
		}

		return $url;
	}


	/**
	 * List pages filter.
	 * @param	string	$text
	 * @return	string	replaced text
	 * @access private
	 */
	function list_pages_filter($text){
		$str=preg_replace_callback('#(href)="(.*?)"#i',array($this, 'list_pages_callback'),$text);
		return $str;
	}

	/**
	 * List cat filter.
	 * @param	string	$text
	 * @return	string	replaced text
	 * @access private
	 */
	function list_cat_filter($text){
		$str=preg_replace('#(href)="(.*?)"#i','$1=\'javascript:menu("$2&amp;dlmenu");\'',$text);
		return $str;
	}

	/**
	 * Get stylesheet path.
	 * @param	string	$stylesheet
	 * @return string path to stylesheet
	 * @access private
	 */
	function get_stylesheet($stylesheet) {
		return "dldefault";
	}

	/**
	 * Get template path.
	 * @param	string	$template
	 * @return string path to template
	 * @access private
	 */
	function get_template($template) {
		return "dldefault";
	}
}
?>