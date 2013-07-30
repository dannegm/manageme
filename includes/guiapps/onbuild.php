<?php
include_once('../../config.php');
include_once(INCLASS . 'user.php');
?>
<blockquote>
<?php
	$txt = $lang->errors->on_build;
	$txt = str_replace('{[sec]}', "<strong>{$_GET['t']}</strong>", $txt);
	echo $txt;
?>
</blockquote>