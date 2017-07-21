<?php
$isAjax = ereg("dlmenu", $_SERVER['QUERY_STRING']);

if(!$isAjax):
	get_header();
	if(!isset($sidebar)){
		$sidebar = true;
	}
?>
<?php if($sidebar): ?>
		<!-- Start sidebar /-->
		<div id="dl_sidebar">
			<?php get_sidebar(); ?>
		</div>
		<!-- End sidebar /-->
<?php endif; ?>
		<div style="display:none;"><?php // SEO fix.
		global $dlmenu_api;
		global $dlmenu_cur_page;
		if('' == trim($page)){
			$dlmenu_api->render('content');
		} else {
			$dlmenu_api->render($dlmenu_cur_page);
		}
		?></div>
		<!-- Start content /-->
		<div id="dl_content">
<?php endif; ?>