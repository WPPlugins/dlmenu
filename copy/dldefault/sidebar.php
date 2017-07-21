	<div id="sidebar">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			<?php _e('Please use the dynamic sidebar.', 'kubrick'); ?>

			<?php endif; ?>
		</ul>
	</div>

