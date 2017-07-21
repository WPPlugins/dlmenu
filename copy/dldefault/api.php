<?php
/**
 * DL-MENU API include.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 */
$dlmenu_api_path = ABSPATH . 'wp-content/plugins/dlmenu/dlmenu_api.php';
if(file_exists($dlmenu_api_path)){
	include_once($dlmenu_api_path);
} else {

	$act_url = get_bloginfo('wpurl')."/wp-admin/plugins.php";

	echo '<html><head><title>DL-MENU plugin not yet installed.</title></head><body>';

	echo '<p style="background-color:#cccccc;border:2px solid green;padding:20px;margin:20px;">';

	echo '<strong>';

	_e(' The DL-MENU plugin '. "isn't" . ' installed yet.', 'kubrick');

	echo '</strong>';

	echo '<br/>';

	echo '<ul>';

	echo '<li>';

	_e('Please copy the "dlmenu" directory (which is packed along with this theme)', 'kubrick');

	_e(' to your "wp-content/plugins" folder', 'kubrick');

	_e(' or download it ', 'kubrick');

	echo '<a href="http://www.daveligthart.com/plugins/dlmenu" target="_blank" title="Download DL-MENU">';

	_e(' here', 'kubrick');

	echo '</a>';

	echo '.';

	echo '</li>';

	echo '<li>';

	_e('Go to ', 'kubrick');

	echo "<a href=\"{$act_url}\" target=\"_self\">";

	_e('wp-admin', 'kubrick');

	echo '</a>';

	_e(' to activate the plugin', 'kubrick');

	echo '.';

	echo '</li>';

	echo '</ul>';

	echo '</p></body></html>';

	exit;
}
?>
