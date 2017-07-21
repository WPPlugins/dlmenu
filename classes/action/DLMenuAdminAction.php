<?php
/**
 * DLAdminAction.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
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

/**
 * Includes.
 */

/**
 * AdminAction.
 */
class DLMenuAdminAction extends DLMenuWPPlugin{

	var $plugin_rel_base = "/wp-content/plugins/dlmenu";

	/**
	 * AdminAction.
	 */
	function DLMenuAdminAction($plugin_name, $plugin_base){
		$this->plugin_name = $plugin_name;
		$this->plugin_base = $plugin_base;

		wp_enqueue_script('prototype');
		wp_enqueue_script('scriptaculous');

		/**
		 * Handle wordpress actions.
		 */
		$this->add_action('activate_'.trim( $_GET['plugin']) ,'activate'); //plugin activation.
		$this->add_action('admin_head'); // header rendering.
		$this->add_action('admin_menu'); // menu rendering.
		$this->add_action('switch_theme');
	}

	/**
	 * Render admin views.
	 * Called by admin_menu.
	 * @access private
	 */
	function renderView() {
		$sub = $this->getAction();
		$url = $this->getActionUrl();

		// Display submenu
		$this->render_admin('admin_submenu', array ('url' => $url, 'sub' => $sub));

		/**
		 * Show view.
		 */
		switch($sub){
			default:
			case "page_options":
				$this->admin_page_options();
			break;
			case "dlmenu_options":
				$this->admin_dlmenu_options();
			break;
			case "options":
				$this->admin_options();
			break;
			case "blog_options":
				$this->admin_blog_options();
			break;
			case "header_options":
				$this->admin_header_options();
			break;
			case "help":
				$this->admin_help();
			break;
		}
	}

	/**
	 * Swith theme.
	 * @access private
	 */
	function switch_theme(){
		//$dir = PLUGINPATH;
		//$template_dir = TEMPLATEPATH;
		//$r = rand(1,6);
		//@copy($dir."/dlmenu/resources/images/screenshots/screenshot_{$r}.png",
			//$template_dir."/screenshot.png");
	}

	/**
	 * Activate plugin.
	 * @access private
	 */
	function activate() {
		//delete_option('dlmenu_activated');

		$activated = get_option("dlmenu_activated");

		/**
		 * Save default options.
		 */
		if($activated == null){
			/**
			 * Create database.
			 */
			//$this->dlmenu_install();
			update_option('dlmenu_blogtitle', get_option('blogname'));
			update_option('dlmenu_blogsubtitle', get_option('blogdescription'));
			update_option('dlmenu_activated', 1);

			$m_of = new DLMenuAdminMenuOptionsForm(true);
			$b_of = new DLMenuAdminMenuOptionsForm(true);
			$h_of = new DLMenuAdminHeaderOptionsForm(true);
			$p_of = new DLMenuAdminPageOptionsForm(true);

			$m_of->saveOptions(true);
			$b_of->saveOptions(true);
			$h_of->saveOptions(true);
			$p_of->saveOptions(true);
		}
	}

	/**
	 * Execute installer.
	 */
	function dlmenu_install(){
		global $wpdb;
		global $wp_version;

		$table_name = $wpdb->prefix . "dlmenu";
		// Table already created?
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
			// Not, create table.
			$sql = "";

			if($wp_version >= 2.3) {
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			} else{
				require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
			}
      		dbDelta($sql);

			// add database version.
			if(defined("DLMENU_DB_VERSION")){
				add_option("dlmenu_db_version", DLMENU_DB_VERSION);
			}

			// add revision version.
			if(defined("DLMENU_VERSION")){
				add_option("dlmenu_version", DLMENU_VERSION);
			}

		}
	}

	/**
	 * Execute upgrade.
	 * TODO: add upgrade sql.
	 */
	function dlmenu_upgrade() {
		global $wpdb;
		global $wp_version;
		if(defined("DLMENU_DB_VERSION")){
			$installed_ver = get_option( "dlmenu_db_version" );
			if($installed_ver != DLMENU_DB_VERSION) {
     			$upgrade_sql = "";
      			if($wp_version >= 2.3) {
					require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				} else{
					require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
				}
				dbDelta($upgrade_sql);
				update_option("dlmenu_db_version", DLMENU_DB_VERSION);
 			}
		}
	}

	/**
	 * Render header.
	 * @access private
	 */
	function admin_head(){
		$this->render_admin('admin_head',array("plugin_name"=>$this->plugin_name));
	}

	/**
	 * Create menu entry for admin.
	 * @return	void
	 * @access private
	 */
	function admin_menu(){
		// change theme picture
		//$this->switch_theme();

		if (function_exists('add_theme_page')) {
			add_theme_page(
			__("DL-MENU", 'dlmenu'),
			__("DL-MENU", 'dlmenu'),
			10,
			basename($this->plugin_base),
			array (&$this, "renderView"));
		}
	}

	/**
	 * Display the dlmenu options page.
	 * @return void
	 * @access private
	 */
	function admin_dlmenu_options(){
		$a = new DLMenuAdminMenuAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}

	/**
	 * Display the header options page.
	 * @return void
	 * @access private
	 */
	function admin_header_options(){
		$a = new DLMenuAdminHeaderAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}

	/**
	 * Display the page options page.
	 * @return void
	 * @access private
	 */
	function admin_page_options(){
		$a = new DLMenuAdminPageAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}

	/**
	 * Display the blog options page.
	 * @return void
	 * @access private
	 */
	function admin_blog_options(){
		$a = new DLMenuAdminBlogAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}

	/**
	 * Display main view.
	 * @access private
	 */
	function admin_main(){
		$a = new DLMenuAdminMenuAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}

	/**
	 * Display the help page.
	 * @return void
	 * @access private
	 */
	function admin_help(){
		$a = new DLMenuAdminHelpAction($this->plugin_name, $this->plugin_base);
		$a->render();
	}
}
?>