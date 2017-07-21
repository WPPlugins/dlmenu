<?php if($_REQUEST['sub'] == 'dlmenu_options') { ?>
<!--SLIDER CONTROL-->
<link rel="stylesheet" href="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/slider/css/luna/luna.css" type="text/css" charset="utf-8"/>
<script type="text/javascript" src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/slider/js/range.js"></script>
<script type="text/javascript" src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/slider/js/timer.js"></script>
<script type="text/javascript" src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/slider/js/slider.js"></script>
<!--/SLIDER CONTROL-->
<?php } ?>
<?php if($_REQUEST['sub'] == 'page_options' || !isset($_REQUEST['sub'])) { ?>
<script type="text/javascript" src="<?php bloginfo ('wpurl') ?>/wp-content/plugins/dlmenu/resources/js/dl_menu_admin.js"></script>
<?php } ?>
