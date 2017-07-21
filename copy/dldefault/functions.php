<?php
/**
 * Functions.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 */

/**
 * Load the locale. The translation resides in the theme 'locale' directory.
 *
 * In wp-config.php change to following value 'en_US'
 * to your preferred locale:
 *
 * define ('WPLANG', 'en_US');
 *
 * Be certain that you have placed your wordpress translation
 * into wp-includes/languages/ directory. Otherwise
 */
function dlLoadThemeLocale(){
	$locale = get_locale();
	if ( empty($locale) )
		$locale = 'en_US';
	$mofile = TEMPLATEPATH."/locale/$locale.mo";
	load_textdomain ('kubrick', $mofile);
}
dlLoadThemeLocale();
/**
 * Register sidebar.
 */
if ( function_exists('register_sidebar') ){
	register_sidebar();
}

/**
 * Show next posts.
 */
function dl_show_next_posts(){
		ob_start();
		next_posts_link(__('Next posts &raquo;','kubrick') );
		$c = ob_get_contents();
		ob_end_clean();
		$str=preg_replace('#(href)="(.*?)"#i','$1=\'javascript:menu("$2");\'',$c);
		echo $str;
}
/**
 * Show
 */
function dl_show_prev_posts(){
		ob_start();
		previous_posts_link(__('&laquo; Previous posts','kubrick') );
		$c = ob_get_contents();
		ob_end_clean();
		$str=preg_replace('#(href)="(.*?)"#i','$1=\'javascript:menu("$2");\'',$c);
		echo $str;
}
?>