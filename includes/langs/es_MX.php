<?php
include_once('../php/functions.php');

$thisYear = date('Y');

$lang = array(
	'lang' => 'Espa&ntilde;ol - M&eacute;xico',
	'copyright' => "Desarrollado por Dannegm &copy; {$thisYear}",
	'title' => 'Manageme',

	'login' => array(
		'wellcome' => array(
			'title' => 'Iniciar sesi&oacute;n',
			'text' => 'Ingresa tu nombre de usuario y contrase&ntilde;a para poder acceder.'
		),
		'form' => array(
			'username' => 'Usuario',
			'password' => 'Contrase&ntilde;a',
			'login' => 'Entrar',
			'keep_login' => 'Recu&eacute;rdame',
			'forgoten_pass' => 'Olvid&eacute; mi contrase&ntilde;a'
		),
		'error' => array(
			'invalid_data' => 'Los datos son incorrectos, por favor verif&iacute;calos e intentalo de nuevo.',
			'empty_data' => 'Debes escribir tu usuario y contrase&ntilde;a.'
		)
	),

	'menu' => array(
		'resume' => 'Resumen',
		'inbox' => 'Mensajes',
		'articles' => 'Art&iacute;culos',
		'stats' => 'Estad&iacute;sticas',
		'profiles' => 'Perfiles',
		'activity' => 'Actividad',
		'config' => 'Configuraciones',
		'exit' => 'Salir'
	)
);

toJsonp($lang, 'lang');

?>