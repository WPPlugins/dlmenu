<?php
/**
 * Add Slider.
 * @param integer $v slider value
 * @param integer $min minimum value
 * @param integer $max maximum value
 * @param String $element_id
 */
$slider_id = 0;
function addSlider($v, $min, $max, $element_id){
	global $slider_id;
	$slider_id++;
?>
	<div class="slider" id="slider-<?php echo $slider_id; ?>" tabIndex="1" style="width:auto;">
		<input class="slider-input" id="slider-input-<?php echo $slider_id; ?>"/>
	</div>
	<input autocomplete="off" id="<?php echo $element_id; ?>" type="text" size="4" maxlength="4" name="<?php echo $element_id; ?>" onchange="s<?php echo $slider_id; ?>.setValue(parseInt(this.value))"/>
	<script type="text/javascript">
	// <![CDATA[
	var s<?php echo $slider_id; ?> = new Slider(document.getElementById("slider-<?php echo $slider_id; ?>"), document.getElementById("slider-input-<?php echo $slider_id; ?>"));
	s<?php echo $slider_id; ?>.onchange = function () {
		document.getElementById("<?php echo $element_id; ?>").value = s<?php echo $slider_id; ?>.getValue();
	};
	s<?php echo $slider_id; ?>.setValue(parseInt(<?php echo $v; ?>));
	s<?php echo $slider_id; ?>.setMinimum(parseInt(<?php echo $min; ?>));
	s<?php echo $slider_id; ?>.setMaximum(parseInt(<?php echo $max; ?>));
	// ]]>
	</script>
<?php } ?>

<div class="wrap" style="min-height:200px;">
	<h2><?php _e ('Menu options', 'dlmenu'); ?></h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
	<?php echo $form->htmlFormId(); ?>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<th scope="row">
				<label for="dlmenu_width"><?php _e('Width','dlmenu'); ?>:</label>
			</th>
			<td>
				<input value="<?php echo $form->getWidth(); ?>" id="dlmenu_width" type="text" size="4" maxlength="4" name="dlmenu_width" />
				<br/>
				<?php _e('Enter width in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_height"><?php _e('Height','dlmenu'); ?>:</label>
			</th>
			<td>
				<input value="<?php echo $form->getHeight(); ?>" id="dlmenu_height" type="text" size="4" maxlength="4" name="dlmenu_height" />
				<br/>
				<?php _e('Enter height in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_font_path"><?php _e('Font','dlmenu'); ?>:</label>
			</th>
			<td>
				<select name="dlmenu_font_path">
					<?php
					$font_path = $form->getFontPath();
					$font_dir = '/resources/fonts';
					$font_paths = array(
					    'lucinda' 	=> "{$font_dir}/lucinda.swf",
						'arial'		=> "{$font_dir}/arial.swf",
						'garamond'	=> "{$font_dir}/garamond.swf",
						'myriad'	=> "{$font_dir}/myriad.swf",
						'tahoma'	=> "{$font_dir}/tahoma.swf",
						'verdana'	=> "{$font_dir}/verdana.swf"
					);
					foreach($font_paths as $fontname=>$path){
						if($font_path == $path){
							$selected = " selected=\"selected\"";
						} else{
							$selected = '';
						}
						echo "<option value=\"{$path}\"{$selected}>{$fontname}</option>";
					}
					?>
				</select>
				<br/>
				<?php _e('Choose font','dlmenu'); ?>
			</td>
		</tr>

		<tr>
			<th scope="row">
				<label for="slider-converted-value"><?php _e('Fontsize','dlmenu'); ?>:</label>
			</th>
			<td>
				<?php addSlider($form->getFontSize(),9,100,'dlmenu_fontsize'); ?>
				<br/>
				<?php _e('Choose fontsize','dlmenu'); ?>
			</td>
		</tr>

		<tr>
			<th scope="row">
				<label for="dlmenu_tab_y"><?php _e('Tab position y','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_tab_y" value="<?php echo $form->getTabY(); ?>"/>
				<br/>
				<?php _e('Set menu tab y position','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_radius"><?php _e('Tab corner radius','dlmenu'); ?>:</label>
			</th>
			<td>
				<?php addSlider($form->getTabRadius(),1,50,'dlmenu_radius'); ?>
				<br/>
				<?php _e('Set tab corner radius in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_shadow"><?php _e('Tab shadow','dlmenu'); ?>:</label>
			</th>
			<td>
				<select name="dlmenu_shadow">
					<?php
							$shadow = $form->getTabShadow();

							settype($shadow,"int");

							if($shadow == 0){
								$selected = " selected=\"selected\"";
							} else{
								$selected = "";
							}

							echo "<option value=\"0\"{$selected}>Off</option>";

							if($shadow == 1){
								$selected = " selected=\"selected\"";
							}
							else{
								$selected = "";
							}
							echo "<option value=\"1\"{$selected}>On</option>";;

					?>
				</select>
				<br/>
				<?php _e('Turn shadow on/off','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_tab_spacing"><?php _e('Tab spacing','dlmenu'); ?>:</label>
			</th>
			<td>
				<?php addSlider($form->getTabSpacing(),1,100,'dlmenu_tab_spacing'); ?>
				<br/>
				<?php _e('Set tab spacing in pixels','dlmenu'); ?>
			</td>
		</tr>
		</tr>
			<tr>
			<th scope="row">
				<label for="dlmenu_submenu_width"><?php _e('Tab submenu width','dlmenu'); ?>:</label>
			</th>
			<td>
				<?php addSlider($form->getSubmenuWidth(),50,1000,'dlmenu_submenu_width'); ?>
				<br/>
				<?php _e('Set tab submenu width in pixels','dlmenu'); ?>
			</td>
		</tr>
	</table>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes','dlmenu'); ?>" />
	</p>

	<script type="text/javascript">
	// <![CDATA[
	window.onresize = function () {
		<?php global $slider_id; echo "\r\n"; for($i=1;$i<=$slider_id;$i++){echo "s{$i}.recalculate();\r\n";} ?>
	};
	// ]]>
	</script>

	</form>
</div>
<?php include_once("blocks/footer.php"); ?>