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

	'errors' => array(
		'renew_login' => 'Debes iniciar sesi&oacute;n de nuevo.',
		'on_build' => 'La secci&oacute;n {[sec]} está en construcci&oacute;n.'
	),

	'menu' => array(
		'resume' => 'Resumen',
		'inbox' => 'Mensajes',
		'content' => 'Contenido',
		'stats' => 'Estad&iacute;sticas',
		'profiles' => 'Perfiles',
		'activity' => 'Actividad',
		'config' => 'Configuraciones',
		'exit' => 'Salir'
	),

	'roles' => array(
		'admin' => 'Administrador',
		'cdc' => 'Creador de contenido',
		'user' => 'Usuario',
		'demo' => 'Usuario de demostraci&oacute;n',
		'sub' => 'Subscriptor',
		'mod' => 'Moderador',
		'god' => 'Nivel dios'
	),

	'resume' => array(
		'title' => 'Profiles',
		'gui' => array(
			'wellcome' => 'Bienvenido',
			'logout' => 'Salir'
		)
	),

	'profiles' => array(
		'title' => 'Perfiles',
		'gui' => array(
			'myprofile' => 'Mi perfil',
			'bio' => 'Biografía',
			'post' => 'Posts',
			'likes' => 'Likes',
			'comments' => 'Comments',

			'activity' => 'Actividad reciente',
			'seemore' => 'ver m&aacute;s',
			'otherprofiles' => 'Otros perfiles',
			'createprofile' => 'Nuevo usuario'
		)
	)
);

toJsonp($lang, 'lang');

?>