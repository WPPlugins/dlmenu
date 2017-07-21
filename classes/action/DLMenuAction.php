<?php
/**
 * DLMenuAction.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.2
 * @package dlmenu
 * @subpackage action
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
class DLMenuAction{

	var $menu;
	var $context;

	function DLMenuAction($args = array()){
		$this->context = &$args['context'];
	}

	function fetchMenu(){
		global $wp_version;

		include_once("{$this->context->plugin_base}/classes/model/DLMenuModel.php");
		include_once("{$this->context->plugin_base}/classes/model/DLMenuAppearanceModel.php");
		include_once("{$this->context->plugin_base}/classes/model/DLMenuItemModel.php");
		include_once("{$this->context->plugin_base}/classes/model/DLMenuItemsModel.php");
		include_once("{$this->context->plugin_base}/classes/model/DLMenuResourceModel.php");
		include_once("{$this->context->plugin_base}/classes/model/DLMenuResourcesModel.php");

		/**
		 * Get Configuration options.
		 */
		$blogTitle = stripslashes(get_option('blogname'));
		$menu_width = get_option('dlmenu_width');
		$menu_height = get_option('dlmenu_height');
		$tabColor = '0x'.get_option('dlmenu_tabcolor');
		$shieldColor = '0x'.get_option('dlmenu_shieldcolor');
		$fontColor = '0x'.get_option('dlmenu_fontcolor');
		$fontSize = get_option('dlmenu_fontsize');
		$font_path = get_bloginfo('wpurl').'/wp-content/plugins/'.'dlmenu'.get_option('dlmenu_font_path');
		$tab_y = get_option('dlmenu_tab_y');
		$tab_x = get_option('dlmenu_tab_spacing');
		$headerimage_path = get_option('dlmenu_headerimage_path');
		$headerimage_x = get_option('dlmenu_headerimage_x');
		$headerimage_y = get_option('dlmenu_headerimage_y');
		$tabRadius = get_option('dlmenu_radius');
		$tabShadow = get_option('dlmenu_shadow');
		$blogTitle = stripslashes(get_option('dlmenu_blogtitle'));
		$blogSubtitle = stripslashes(get_option('dlmenu_blogsubtitle'));
		$videoClickUrl = get_option('dlmenu_video_click_url');
		$video_path = get_option('dlmenu_video_path');
		$video_width = get_option('dlmenu_video_width');
		$video_height = get_option('dlmenu_video_height');
		$video_behavior = get_option('dlmenu_video_behavior');
		$video_orientation = get_option('dlmenu_video_orientation');

		/**
		* Set front page.
		*/
		$front_page_id = null;
		if($wp_version >= 2.5){
			if('page' == get_option('show_on_front')) {
				$front_page_id = get_option('page_on_front');
			}
		}

		/**
		 * Set Video Coords.
		 */
		$video_x = 0;
		$video_y = 0;
		switch($video_orientation){
			default:
			case 'top-left':
				$video_x = 0;
				$video_y = 0;
			break;
			case 'top-center':
				$video_x = ($menu_width / 2) - ($video_width / 2);
				$video_y = 0;
			break;
			case 'top-right':
				$video_x = ($menu_width - $video_width);
				$video_y = 0;
			break;
			case 'middle-left':
				$video_x = 0;
				$video_y = ($menu_height / 2) - ($video_height / 2);
			break;
			case 'middle-center':
				$video_x = ($menu_width / 2) - ($video_width / 2);
				$video_y = ($menu_height / 2) - ($video_height / 2);
			break;
			case 'middle-right':
				$video_x = ($menu_width - $video_width);
				$video_y = ($menu_height / 2) - ($video_height / 2);
			break;
			case 'bottom-left':
				$video_x = 0;
				$video_y = ($menu_height - $video_height);
			break;
			case 'bottom-center':
				$video_x = ($menu_width / 2) - ($video_width / 2);
				$video_y = ($menu_height - $video_height);
			break;
			case 'bottom-right':
				$video_x = ($menu_width - $video_width);
				$video_y = ($menu_height - $video_height);
			break;
		}

		/**
		 * Prepare menu.
		 */
		$this->menu = new DLMenuModel;
		$menuAppearance = new DLMenuAppearanceModel($font_path);
		$menuResources = new DLMenuResourcesModel;

		if($headerimage_path != ''){
			$r = new DLMenuResourceModel('image',
				$headerimage_path,$headerimage_x,$headerimage_y);
			$menuResources->addElement($r);
		}

		if($videoClickUrl != '' && $video_path != ''){
			$menuResource = new DLMenuResourceModel('flv', $video_path, $video_x, $video_y);
			$menuResource->setUrl($videoClickUrl);
			$menuResource->setWidth($video_width);
			$menuResource->setHeight($video_height);
			$menuResource->setBehavior($video_behavior);
			$menuResources->addElement($menuResource);
		}

		$subTitleFontSize = 30;
		if($blogTitle != ''){
			$fSize = 60;
			//$t_w = strlen($blogTitle) * ($fSize / 2.2);
			$t_y = round($menu_height / 2.3);
			$t_x = 0; //align center.
			//$t_x = ($menu_width / 2)  - ($t_w / 2);
			$menuResource_title = new DLMenuResourceModel('text', '', $t_x, $t_y - $fSize);
			$menuResource_title->setTitle($blogTitle);
			$menuResource_title->setFontColor($fontColor);
			$menuResource_title->setFontSize($fSize);
			$menuResources->addElement($menuResource_title);
			//video doesnt work when adding text header.
		}

		if($blogSubtitle != ''){
			$s_y = round($t_y + ($subTitleFontSize * 2.2));
			$s_x = 0; //align center.
			/*$s_w = (strlen($blogSubtitle) * ($subTitleFontSize / 2));
			$s_x = ($menu_width / 2) - ($s_w / 2);*/

			$menuResource_subtitle = new DLMenuResourceModel('text', '', $s_x, round($s_y - 50));
			$menuResource_subtitle->setTitle($blogSubtitle);
			$menuResource_subtitle->setFontColor($fontColor);
			$menuResource_subtitle->setFontSize($subTitleFontSize);
			$menuResources->addElement($menuResource_subtitle);
		}

		$menuItems = new DLMenuItemsModel($shieldColor,15);

		// Set front page url.
		$frontPageUrl = '?page=home&dlmenu';
		if(null != $front_page_id){
			$frontPageUrl = '?page_id=' . $front_page_id . '&dlmenu';
		}

		// Add home page
		$menuItem_home = new DLMenuItemModel($tab_y, 'Home', 'home', $frontPageUrl, $fontColor, $fontSize);
		$menuItem_home->setX($tab_x);
		$appearance_home = new DLMenuAppearanceModel(null,$tabColor,$tabRadius,$tabShadow);
		$menuItem_home->addElement($appearance_home);
		$menuItems->addElement($menuItem_home);

		// Sort on Menu Order.
		$pages = get_pages('sort_column=menu_order');

		/**
		 * Convert all wordpress pages to tabbed menu items.
		 */
		foreach($pages as $page){
			$title = $page->post_title;
			$description = $page->post_title;
			$post_slug = $page->post_name;
			$id = $page->ID;
			$url = $page->guid.'&dlmenu';
			$is_child = ($page->post_parent > 0);
			if(!$is_child) {
				$children = get_page_children($id, $pages);
				$appearance = new DLMenuAppearanceModel(null, $tabColor, $tabRadius, $tabShadow);
				$menuItem = new DLMenuItemModel($tab_y,$title, $description, $url, $fontColor, $fontSize);
				$menuItem->setX($tab_x);
				$menuItem->addElement($appearance);
				if(count($children) > 0){
					$childMenuItems = new DLMenuItemsModel(null,null);
					foreach($children as $child){
						$child_id = $child->ID;
						$child_menuItem = new DLMenuItemModel($tab_y, $child->post_title, $child->post_title, $child->guid.'&dlmenu', $fontColor, $fontSize);
						if($child_id > 0){
							$childMenuItems->addElement($child_menuItem);
						}
					}
					$menuItem->addElement($childMenuItems);
				}
				$menuItems->addElement($menuItem);
			}
		}
		$this->menu->addAppearance($menuAppearance);
		$this->menu->addResources($menuResources);
		$this->menu->addMenuItems($menuItems);
		return $this->menu->fetch();
	}
}
?>