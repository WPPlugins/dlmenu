<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if(!function_exists('renderDLMenu')): ?>

	<?php
	/** Alternative to dlmenu **/
	$margintop = 20;
	$marginbottom = 20;
	$padding = 30;
	$paddingtop = 15;
	$navbg_y = (200-38 + $margintop + $paddingtop);
	$page_bgcolor = 'FFFFFF';
	$page_fontcolor = '000000';
	$menu_width = 780;
	$menu_height = 200;
	$shieldcolor = 'FFFFFF';
	$tabcolor = '000000';
	$fontcolor = 'FFFFFF';
	$submenu_width = 200;
	?>

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
		position:relative;
		float:right;
		top:0px;
	}

	#dl_footer{
		position:relative;
		top:10px;
		height:100%;
		min-height:100px;
		clear:both;
		width:<?php echo $menu_width ?>px;
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
		background-color: #<?php echo $shieldcolor ?>;
	}
	#header{
		height:<?php echo $menu_height; ?>;

	}
	</style>
	<?php endif; ?>

<?php wp_head(); ?>
</head>

<body>

<!-- Start overlay /-->
<div id="dl_overlay">

	<!-- Start page /-->
	<div id="dl_page">

		<!-- Start header /-->
		<div id="header">
		<?php
		if(function_exists('renderDLMenu')) {
			renderDLMenu();
		} else {
			echo '<img src="'.get_bloginfo('wpurl').'/wp-content/themes/dldefault/images/header.jpg"' . '/>';
		}
		?>
		</div>
		<!-- End header /-->
