<?php
if($submenu != null && !is_array($submenu)){
	$submenu = array();
}
if(!isset($sub) || $sub == ""){
	$sub = $default;
}
?>
<ul id="submenu">
  <?php foreach($submenu as $key=>$value): ?>
  <?php $s = strtolower($key); ?>
  <li><a <?php if ($sub == "" || $sub == "{$s}") echo 'class="current"'; ?>href="<?php echo $url ?>&amp;sub=<?php echo $s; ?>"><?php _e ($value, 'dlmenu') ?></a></li>
  <?php endforeach; ?>
</ul>