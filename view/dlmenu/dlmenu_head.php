<?php
/**
 * Header template.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.2
 */
?>

<?php
global $wp_version;

$plugin_url = get_bloginfo('wpurl').'/wp-content/plugins/dlmenu';
$margintop = 20;
$marginbottom = 20;
$padding = 30;
$paddingtop = 15;
$navbg_y = (get_option("dlmenu_height")-38 + $margintop + $paddingtop);
$page_bgcolor = get_option("dlmenu_backgroundcolor");
$page_fontcolor = get_option("dlmenu_pagefontcolor");
$menu_width = get_option("dlmenu_width");
$menu_height = get_option("dlmenu_height");
$shieldcolor = get_option("dlmenu_shieldcolor");
$tabcolor = get_option("dlmenu_tabcolor");
$fontcolor = get_option("dlmenu_fontcolor");
$submenu_width = get_option("dlmenu_submenu_width");
?>

<?php
$query_string = trim($_SERVER['QUERY_STRING']);
if($query_string != ""){
	$query_string = "&". $query_string;
}
?>

<?php
/**
 * Set front page.
 */
$front_page_id = null;
if($wp_version >= 2.5){ // from wordpress version 2.5
	if('page' == get_option('show_on_front')) {
		$front_page_id = get_option('page_on_front');
	}
}
$frontPageUrl = '?page=home';
if(null != $front_page_id){
	$frontPageUrl = '?page_id=' . $front_page_id;
}
?>

<script src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/swfobject1-5/swfobject.js" language="javascript" type="text/javascript"></script>
<script src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/dl_menu.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	var wp_base = "<?php echo $plugin_url; ?>";
	var menu_width = <?php echo $menu_width; ?>;
	var menu_height = <?php echo $menu_height; ?>;
	var submenu_width = <?php echo ($submenu_width!='')?$submenu_width:150; ?>;
	dlInit("<?php echo $frontPageUrl;?><?php echo $query_string; ?>",menu_width,menu_height,wp_base,submenu_width,'<?php echo $tabcolor; ?>','<?php echo $fontcolor; ?>');
});
</script>
<style type="text/css">
body {
	background-color: #<?php echo $page_bgcolor; ?>;
	color: #<?php echo $page_fontcolor ?>;
	font-size: 11px;
	font-family: Verdana, Arial, SunSans-Regular, Sans-Serif;
	width:100%;
	margin:<?php echo $margintop; ?>px 0px 0px 0px;
	padding:0px;
}
body a{
	color: #<?php echo $page_fontcolor; ?>;
	text-decoration:underline;
}

#dl_overlay {
	width:<?php echo $menu_width + $padding; ?>px;
	margin:0 auto;
	background-color: #<?php echo $shieldcolor; ?>;
}

#dl_page{
	width:<?php echo $menu_width; ?>px;
	margin:0px auto;
}

#dl_header_bg {
	position:absolute;
	top:0px;
	width:100%;
	height:<?php echo $menu_height - 38; ?>px;
}

#dl_nav_bg #dl_shield{
	background-color: #<?php echo $shieldcolor ?>;
	height:24px;
}

#dl_nav_bg #dl_tabbar{
	background-color:#<?php echo $tabcolor ?>;
	height:14px;
}

#dl_sidebar{
	float:right;
	margin:0px 0px 15px 20px;
	width:<?php echo ($menu_width / 4); ?>px;
}

#dl_footer{
	padding:0px;
	margin:0px;
	height:80px;
	min-height:80px;
	clear:both;
	width:<?php echo $menu_width; ?>px;
}

#dl_menu{
	padding-top:<?php echo $paddingtop; ?>px;
	margin-bottom:<?php echo $marginbottom; ?>px;
	width:100%;
}

#footer {
	background-color: #<?php echo $tabcolor ?>;
	color: #<?php echo $fontcolor; ?>;
	border: none;
}

#footer a{
	width:<?php echo $menu_width ?>px;
	color:#<?php echo $fontcolor ?>;
}

#sidebar{
	background-color:#<?php echo $tabcolor ?>;
	padding:10px 20px 20px 20px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/css/dlmenu.css" />