<?php
include_once('../php/functions.php');

$thisYear = date('Y');

$lang = array(
	'lang' => 'English - US',
	'copyright' => "Development by Dannegm &copy; {$thisYear}",
	'title' => 'Manageme',

	'login' => array(
		'wellcome' => array(
			'title' => 'Sign In',
			'text' => 'Insert your username and your password to sign in.'
		),
		'form' => array(
			'username' => 'Username',
			'password' => 'Password',
			'login' => 'Sign in',
			'keep_login' => 'Remember me',
			'forgoten_pass' => 'Forgot my password'
		),
		'error' => array(
			'invalid_data' => 'Your login data is wrong.',
			'empty_data' => 'You must write your login data.'
		)
	),

	'menu' => array(
		'resume' => 'Resume',
		'inbox' => 'Inbox',
		'articles' => 'Articles',
		'stats' => 'Statistics',
		'profiles' => 'Profiles',
		'activity' => 'Activity',
		'config' => 'Settings',
		'exit' => 'Sign out'
	)
);

toJsonp($lang, 'lang');

?>