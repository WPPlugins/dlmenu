<div class="wrap" style="min-height:200px;">
	<h2><?php _e ("Blog options", "Blog options"); ?></h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
	<?php echo $form->htmlFormId(); ?>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<th scope="row">
				<label for="dlmenu_blogtitle"><?php _e('Blog title','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_blogtitle" value="<?php echo $form->getBlogTitle(); ?>"/>
				<br/>
				<?php _e('Enter blog title','dlmenu'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="dlmenu_blogsubtitle"><?php _e('Blog subtitle','dlmenu'); ?>:</label>
			</th>
			<td>
				<input type="text" name="dlmenu_blogsubtitle" value="<?php echo $form->getBlogSubtitle(); ?>"/>
				<br/>
				<?php _e('Enter blog subtitle','dlmenu'); ?>
			</td>
		</tr>
	</table>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes','dlmenu'); ?>" />
	</p>
	</form>
</div>
<?php include_once("blocks/footer.php"); ?>
