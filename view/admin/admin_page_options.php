<?php
/**
 * Draw box.
 */
function drawBox($color, $size = 10){
	echo '<div style="margin:0px;float:left;';
	echo "width:{$size}px;height:{$size}px;background-color:#{$color}\"";
	echo '>&nbsp;</div>';
}

/**
 * Draw kuler list.
 */
function drawKulerList($kuler, $type = 'popular'){
	$boxsize = 30;
	$kulerList = null;

	switch($type){
		default:
		case 'popular':
			$kulerList = $kuler->getList('?listtype=popular&timespan=30&itemsPerPage=20');
		break;
		case 'random':
			$kulerList = $kuler->getList('?listtype=random&itemsPerPage=20');
		break;
	}

	if($kulerList != null && is_array($kulerList)){

		$colorscheme_id = 0;

		echo '<div style="margin-top:5px;border:1px solid #cccccc;padding:10px;background-color:#ffffff;position:absolute;z-index:2000;left:50%;">';

		echo '<img src="http://wwwimages.adobe.com/labs.adobe.com/cdn/wiki/images/9/95/Kuler_api_50px.jpg" alt="Colored by Adobe Kuler" />';

		echo '<div style="text-align:center;font-size:x-small;">' .'Created by <a href="http://www.daveligthart.com" ' . 'target="_blank">Dave Ligthart</a> &copy; ' . date('Y') . '</div>';

		echo '<br style="clear:both;"/>';

		echo '<ul style="list-style-type:none;margin:0px;padding:0px;">' .
				'<li style="float:left;">';
		echo '<a href="' . $_SERVER['REQUEST_URI'] . '&kuler=popular" target="_self">' . __('Show Popular', 'kubrick') . '</a>';
		echo '&nbsp;|&nbsp;</li> ' .
				'<li style="float:left;">&nbsp;';
		echo '<a href="' . $_SERVER['REQUEST_URI'] . '&kuler=random" target="_self">' . __('Show Random', 'kubrick') . '</a>';
		echo '</li>' .
			'</ul>';

		foreach($kulerList as $kulerObject){

			$hex1 = $kulerObject->getHex1();
			$hex2 = $kulerObject->getHex2();
			$hex3 = $kulerObject->getHex3();
			$hex4 = $kulerObject->getHex4();
			$hex5 = $kulerObject->getHex5();

			echo '<div style="clear:both;">';

			echo "<span id=\"kuler_cs_{$colorscheme_id}\" " .
					"onclick=\"javascript:changeColorScheme('{$colorscheme_id}','{$hex1}','{$hex2}','{$hex3}','{$hex4}','{$hex5}');\" " .
					"style=\"height:{$boxsize};min-height:{$boxsize};border:2px solid black;cursor:pointer;cursor:hand;\">";

			drawBox($hex1, $boxsize);
			drawBox($hex2, $boxsize);
			drawBox($hex3, $boxsize);
			drawBox($hex4, $boxsize);
			drawBox($hex5, $boxsize);

			echo '</span>';

			echo '<strong style="margin-left:10px;">' .
				$kulerObject->getTitle() .
				'</strong> by ';

			echo "<a href=\"" . $kulerObject->getURL() . "\" target=\"_blank\" style=\"font-style:italic;\">";

			echo $kulerObject->getAuthor() . '</a>';

			echo '</div>';

			$colorscheme_id++;
		}

		echo '</div>';
	}
}
?>

<div class="wrap" style="height:750px;">
	<h2><?php _e('Color options', 'dlmenu'); ?></h2>
	<?php drawKulerList($kuler, $_REQUEST['kuler']); ?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
	<?php echo $form->htmlFormId(); ?>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<th scope="row">
				<label for="dlmenu_backgroundcolor"><?php _e('Background Color','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text"  name="dlmenu_backgroundcolor" id="c1" value="<?php echo $form->getBackgroundColor(); ?>"/>
				<br/>
				<?php _e('Enter backgroundcolor hex e.g 000000','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_pagefontcolor"><?php _e('Font Color','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text"  name="dlmenu_pagefontcolor" id="c2" value="<?php echo $form->getFontColor(); ?>"/>
				<br/>
				<?php _e('Enter fontcolor hex e.g CCCCCC','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_shieldcolor"><?php _e('Tab Shield Color','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text"  name="dlmenu_shieldcolor" id="c3" value="<?php echo $form->getShieldColor(); ?>"/>
				<br/>
				<?php _e('Enter shieldcolor hex e.g CCCCCC','dlmenu'); ?>

			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_tabcolor"><?php _e('Tab Color','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text"  name="dlmenu_tabcolor" id="c4" value="<?php echo $form->getTabColor(); ?>"/>
				<br/>
				<?php _e('Enter tabcolor hex e.g CCCCCC','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_fontcolor"><?php _e('Tab Font Color','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text"  name="dlmenu_fontcolor" id="c5" value="<?php echo $form->getMenuFontColor(); ?>" onclick=""/>
				<br/>
				<?php _e('Enter fontcolor hex e.g CCCCCC','dlmenu'); ?>
			</td>
		</tr>

	</table>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes','dlmenu'); ?>" />
	</p>

	</form>

</div>

<script type="text/javascript"><!--
	var shieldcolor = document.getElementById("c3");
	var tabcolor =  document.getElementById("c4");
	var fontcolor = document.getElementById("c2");
	var pagefontcolor = document.getElementById("c5");
	var backgroundcolor = document.getElementById("c1");

	shieldcolor.style.backgroundColor = "#" + shieldcolor.value;
	tabcolor.style.backgroundColor = "#" + tabcolor.value;
	fontcolor.style.backgroundColor = "#" + fontcolor.value;
	pagefontcolor.style.backgroundColor = "#" + pagefontcolor.value;
	backgroundcolor.style.backgroundColor = "#" + backgroundcolor.value;

	function randomOrderSort(){
		return (Math.round(Math.random())-0.5);
	}

	function changeColorScheme(cs_id, a,b,c,d,e){

		var cs_colors = new Array(a,b,c,d,e);

		cs_colors.sort(randomOrderSort);

		var cs = "kuler_cs_" + cs_id;

		for(var i_c=0;i_c<20;i_c++){
			var el = document.getElementById("kuler_cs_" + i_c);
			if(null != el) {
				el.style.borderColor = 'black';
			}
		}

		document.getElementById(cs).style.borderColor = 'magenta';

		shieldcolor.value = cs_colors[0];
		tabcolor.value = cs_colors[1];
		fontcolor.value = cs_colors[2];
		pagefontcolor.value = cs_colors[3];
		backgroundcolor.value = cs_colors[4];

		shieldcolor.style.backgroundColor = "#" + cs_colors[0];
		tabcolor.style.backgroundColor = "#" + cs_colors[1];
		fontcolor.style.backgroundColor = "#" + cs_colors[2];
		pagefontcolor.style.backgroundColor = "#" + cs_colors[3];
		backgroundcolor.style.backgroundColor = "#" + cs_colors[4];

		var page = new Page();
		if(page.checkForDark(cs_colors[1]) && page.checkForDark(cs_colors[2])){
			if(!page.checkForDark(cs_colors[3])){
				fontcolor.value = cs_colors[3];
			} else {
				fontcolor.value = "FFFFFF";
			}
		}

		if(page.checkForDark(cs_colors[3]) && page.checkForDark(cs_colors[0])){
			if(!page.checkForDark(cs_colors[2])){
				pagefontcolor.value = cs_colors[2];
			} else {
				pagefontcolor.value = "FFFFFF";
			}
		}
	}
//--></script>

<?php include_once("blocks/footer.php"); ?>