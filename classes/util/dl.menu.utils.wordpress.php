<?php
/**
 * Wordpress utils.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @license http://www.gnu.org/licenses/gpl.html GPL
 */

 /**
  	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
function dlGetBaseDir(){
	ob_start();
	bloginfo ('wpurl');
	$wp_url = ob_get_contents();
	ob_end_clean();
	$b = explode("/",$wp_url);
	$wp_rel_base = "/".$b[count($b)-1];
	return $wp_rel_base;
}
/**
 * Get Wordpress Context.
 */
function dlGetWordpressContext(){
	ob_start();
	wp_head();
	ob_end_clean();
}

/**
 * Get Page Content By Title.
 * @param 	string 	$title
 */
function dlGetPageContentByTitle($title){
	if($title == ""){
		return "";
	}
	$page = get_page_by_title($title);
	return $page->post_content;
}

/**
 * Get Page Content By Id.
 * @param 	integer 	$id
 * @return string post content
 */
function dlGetPageContentById($id){
	if($id <= 0){
		return "";
	}

	$page = get_page($id);

	//print_r($page);
	return $page->post_content;
}
/**
 * Get url.
 * @return string page url
 */
function dlGetPageUrl() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	return $pageURL;
}
/**
 * Get page domain url.
 * @return string $pageURL
 */
function dlGetPageDomainUrl() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"];
 	}
 	return $pageURL;
}
/**
 * Convert link to menu link.
 * @param $text html
 */
function dlConvertToMenuLink($text, $isURL = false){
	if(!$isURL){ // parse tag.
		return preg_replace('#(href)="(.*?)"#i','$1=\'javascript:menu("$2&amp;dlmenu");\'',$text);
	}
	else{
		// parse url.
		return str_replace($text, "javascript:menu('{$text}?dlmenu');", $text);
	}
}

function has_parent($post, $post_id) {
 	if ($post->ID == $post_id) return true;
  	else if ($post->post_parent == 0) return false;
  	else return has_parent(get_post($post->post_parent),$post_id);
}
?>
