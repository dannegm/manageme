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
		'content' => 'Content',
		'stats' => 'Statistics',
		'profiles' => 'Profiles',
		'activity' => 'Activity',
		'config' => 'Settings',
		'exit' => 'Sign out'
	),

	'profiles' => array(
		'title' => 'Profiles',
		'description' => 'You can manage the users register into you website',
		'gui' => array(
			'myprofile' => 'My Profile',
			'bio' => 'Biografy',
			'activity' => 'Last activity',
			'seemore' => 'see more',
			'otherprofiles' => 'Another users',
			'createprofile' => 'New user'
		)
	)
);

toJsonp($lang, 'lang');

?>