<?php
// Registrar usuario

include_once('../../config.php');
include_once(INCLASS . 'user.php');

$newUser = array(
	'username' => 'dannegm',
	'password' => 'zaexsrcdt',
	'name' => 'Daniel García',
	'email' => 'danneg.m@gmail.com'
);

$user = new User ();
$reg = $user->register( $newUser );
if ( $reg ) {
	echo "Se registro usuario {$newUser['username']}";
} else {
	echo $user->error();
}