<?php
// Registrar usuario

include_once('../../config.php');
include_once(INCLASS . 'user.php');

if (isset($_COOKIE['user'])) {
	$u = new User ();
	$u->logout($_COOKIE);
}