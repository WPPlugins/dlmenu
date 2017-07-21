<?php
/**
 * Kuler API.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package dlmenu
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
class DLMenuKulerAPI {

	/** @var String kuler host **/
	var $kuler_host = 'kuler.adobe.com';
	/** @var integer kuler port number **/
	var $kuler_port = 80;
	/** @var String kuler path **/
	var $kuler_path = '/kuler/API/rss/get.cfm';

	/**
	 * DLMenuKulerAPI.
	 */
	function DLMenuKulerAPI(){
	}

	/**
	 * Get list.
	 * @return array list
	 */
	function getList($params = '?listtype=popular&timespan=30&itemsPerPage=20'){
		$results = $this->getResults($params);
		$kulerModelObjects = array();
		if(is_array($results)){
			$items = $results['items'];
			if(is_array($items) && count($items) > 0){
				foreach($items as $item){
					if(is_array($item)){
						$mo = new DLMenuKulerModel();
						$mo->setTitleParent($results['title']);

						if(sscanf(strtolower($item['title']), "theme title: %s" , $title)){
							$mo->setTitle($title);
						}

						$mo->setURL($item['guid']);

						/**
						 * Parse description for hex colors.
						 */
						$desc =  strip_tags(html_entity_decode(strtolower(trim($item['description']))));
						$hex_arr = explode('hex:', $desc);
						if(sscanf($hex_arr[1],
							"%6s, %6s, %6s, %6s, %6s",
							$hex1, $hex2, $hex3, $hex4, $hex5) ){
								$mo->setHex1($hex1);
								$mo->setHex2($hex2);
								$mo->setHex3($hex3);
								$mo->setHex4($hex4);
								$mo->setHex5($hex5);
						}
						$artist_arr = explode('artist:', $desc);
						if(sscanf($artist_arr[1], "%s", $artist)){
							$mo->setAuthor($artist);
						}

						$kulerModelObjects[] = $mo;
					}
				}
			}
		}
		return $kulerModelObjects;
	}

	/**
	 * kulerRequest.
	 * @param String $params
	 * @access protected
	 */
	function getResults($params = '?listtype=rating'){
		$rss_url = "http://{$this->kuler_host}{$this->kuler_path}";
		$rss_params = $params;

		$rss = new DLMenuRssReader;
		$rss->cache_dir = ABSPATH . '/wp-content/cache';
		$rss->cache_time = 3600;
		$rss->date_format = 'U';

		$results = $rss->Get("{$rss_url}{$rss_params}");

		return $results;
	}
}
?>