<?php
/**
 * String utils.
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
/**
 * Test if string begins with.
 * @param string $str
 * @param string $sub
 * @return boolean test
 * @access public
 */
function dlStringBeginsWith( $str, $sub ) {
   $str = strtolower($str);
   $sub = strtolower($sub);
   if(( substr( $str, 0, strlen( $sub ) ) == $sub ))return true;
   return false;
}

/**
 * Test if string ends with.
 * @param string $str
 * @param string $sub
 * @return boolean test
 * @access public
 */
function dlStringEndsWith( $str, $sub ) {
   $str = strtolower($str);
   $sub = strtolower($sub);
   if(( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub ))return true;
   return false;
}
/**
 * Test if string contains.
 * @param string $str
 * @param string $sub
 * @return boolean test
 * @access public
 */
function dlStringContains($str,$sub){
	if(stristr($str, $sub) == false)return false;
	return true;
}
/**
 * Test if strings are equal.
 * @param string $str1
 * @param string $str2
 * @return boolean equal
 * @access public
 */
function dlStringEquals($str1,$str2){
	return ($str1 == $str2);
}

/**
 * Strip tags.
 * @param	string	$tag
 * @param	string	$string
 * @return	string
 */
function dlStripTags($tag, $string) {
    $regExp = "<" . "$tag" . "[^>]*>";
    $string = str_replace("</$tag>", "", $string);
    $string = ereg_replace($regExp, "", $string);
    return $string;
}
?>