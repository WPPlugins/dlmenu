<div class="wrap" style="min-height:200px;">
	<h2><?php _e('Header options', 'dlmenu'); ?></h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
	<?php echo $form->htmlFormId(); ?>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<th scope="row">
				<label for="dlmenu_headerimage_path"><?php _e('Image preview','dlmenu'); ?>:</label>
			</th>
			<td>
				<img src="<?php echo $form->getHeaderImagePath(); ?>" alt="dlmenu header image" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_headerimage_path"><?php _e('Image path','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" id="dlmenu_headerimage_path" name="dlmenu_headerimage_path" value="<?php echo $form->getHeaderImagePath(); ?>" />
				<br/>
				<?php _e('Enter header image path','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_headerimage_x"><?php _e('Image position x','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_headerimage_x" value="<?php echo $form->getHeaderImageX(); ?>"/>
				<br/>
				<?php _e('Enter position x in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_headerimage_x"><?php _e('Image position y','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_headerimage_y" value="<?php echo $form->getHeaderImageY(); ?>"/>
				<br/>
				<?php _e('Enter position y in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_path"><?php _e('Video path','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_video_path" id="dlmenu_video_path" value="<?php echo $form->getVideoPath(); ?>"/>
				<br/>
				<?php _e('Enter path to video','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_click_url"><?php _e('Video click url','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_video_click_url" id="dlmenu_video_click_url" value="<?php echo $form->getVideoClickUrl(); ?>"/>
				<br/>
				<?php _e('Enter click url','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_width"><?php _e('Video width','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_video_width" id="dlmenu_video_width" value="<?php echo $form->getVideoWidth(); ?>"/>
				<br/>
				<?php _e('Enter video width in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_height"><?php _e('Video height','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_video_height" id="dlmenu_video_height" value="<?php echo $form->getVideoHeight(); ?>"/>
				<br/>
				<?php _e('Enter video height in pixels','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_orientation"><?php _e('Video orientation','dlmenu'); ?>:</label>
			</th>
			<td>
				<select name="dlmenu_video_orientation">
				<?php
				$video_orientation = $form->getVideoOrientation();
				$video_orientation_array = array(
					'top-left',
					'top-center',
					'top-right',
					'middle-left',
					'middle-center',
					'middle-right',
					'bottom-left',
					'bottom-center',
					'bottom-right'
				);
				foreach($video_orientation_array as $o){
					if($video_orientation == $o){
						$selected = "selected=\"selected\"";
					} else {
						$selected = "";
					}
					echo "<option value=\"{$o}\"{$selected}>{$o}</option>";
				}
				?>
				</select>
				<br/>
				<?php _e('Choose video orientation','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_video_repeat"><?php _e('Video repeat','dlmenu'); ?>:</label>
			</th>
			<td>
				<select name="dlmenu_video_repeat">
					<?php
					$video_repeat = $form->getVideoRepeat();
					settype($video_repeat,'int');
					if($video_repeat == 0){
						$selected = " selected=\"selected\"";
					} else {
						$selected = "";
					}
					echo "<option value=\"0\"{$selected}>Off</option>";
					if($video_repeat == 1){
						$selected = " selected=\"selected\"";
					} else {
						$selected = "";
					}
					echo "<option value=\"1\"{$selected}>On</option>";;
					?>
				</select>
				<br/>
				<?php _e('Turn video repeat on/off','dlmenu'); ?>
			</td>
		</tr>

	</table>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes','dlmenu'); ?>" />
	</p>
	</form>
</div>
<?php include_once("blocks/footer.php"); ?>