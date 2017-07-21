<?php
$submenu = array(
	"page_options"		=>	__('Colors', 'dlmenu'),
	"header_options"	=>	__('Header', 'dlmenu'),
	"dlmenu_options"	=>	__('Menu',   'dlmenu'),
	"blog_options"		=>	__('Title',   'dlmenu'),
	"help"				=>	__('Help',   'dlmenu')
);
$default = "page_options";
include_once("blocks/submenu.php");
?>
