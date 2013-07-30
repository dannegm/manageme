<?php

	//Rutas
	define('SUBDIR', 'manageme/');
	define('DOMAIN', $_SERVER['SERVER_NAME'] . '/' . SUBDIR);
	define('DURL', 'http://' . DOMAIN);
	define("PATH", dirname(__FILE__) . "/");

	define('INPHP', PATH . 'includes/php/');
	define('INCLASS', PATH . 'includes/class/');
	define('INAPPS', PATH . 'includes/apps/');

	define('INLANGS', DURL . 'includes/langs/');
	define('TOAPPS', DURL . 'includes/apps/');
	define('TOGUIAPPS', DURL . 'includes/guiapps/');
	define('TOPHP', DURL . 'includes/php/');
	define('TOJS', DURL . 'includes/js/');
	define('TOLESS', DURL . 'includes/less/');
	define('TOIMG', DURL . 'includes/img/');
	define('TOAVATARS', DURL . 'includes/avatars/');

	// Configuración regional

	date_default_timezone_set("America/Mexico_City");
	define('LANG', 'es_MX');

	//Conexión MySQL
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_BASEDATA', 'manageme');

	//Prefijo
	define('PREFIX', 'dnn_');

	//Base de datos
	define('TB_USERS', PREFIX . 'users');

	include_once(INPHP . 'functions.php');

	global $lang;
	$lang = file_get_contents(INLANGS . LANG . '.php');
		$lang = json_decode($lang);

?>