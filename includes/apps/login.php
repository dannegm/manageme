<?php
include_once('../../config.php');
include_once(INCLASS . 'user.php');

$user = new User ();
if (isset($_POST['username']) && isset($_POST['password'])) {
	$doLogin = $user->login($_POST);
	if ($doLogin) {
		echo "success:{$_POST['username']}";
	} else {
		echo "error:{$user->error()}";
	}
} else {
	echo "error:No se recibió ningun dato";
}
?>