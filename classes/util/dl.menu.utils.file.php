<?php
/**
 * File Utils.
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
 * Get the contents of a dir.
 * @param string $path (default current)
 * @return string[] files
 * @access public
 */
function dlGetDirContents($path = "."){
	$files = array();
	$dir = dir($path);
	while($file = $dir->read()){
		if($file!="." && $file!=".."){
			if(!StringEndsWith($path,"/"))
				$dp = $path."/".$file;
			else $dp = $path.$file;
			if(!is_dir($dp))
				$files[] = $file;
		}
	}
	return $files;
}

/**
 * Load jpg image.
 * @return object image
 * @access public
 */
function dlLoadJpeg($imgname) {
   $im = null;
    if (function_exists('imagecreatefromjpeg') ){
		$im = @imagecreatefromjpeg($imgname); /* Attempt to open */
	    if (!$im) { /* See if it failed */
	        $im  = imagecreatetruecolor(150, 30); /* Create a black image */
	        $bgc = imagecolorallocate($im, 255, 255, 255);
	        $tc  = imagecolorallocate($im, 0, 0, 0);
	        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
	        /* Output an errmsg */
	        imagestring($im, 1, 5, 5, "Error loading $imgname", $tc);
	    }
	}
    return $im;
}
?>