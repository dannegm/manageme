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

	'errors' => array(
		'renew_login' => 'You must login again.',
		'on_build' => 'The section {[sec]} is under build.'
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

	'roles' => array(
		'admin' => 'Administrator',
		'cdc' => 'Content creator',
		'user' => 'User',
		'demo' => 'Demostration user',
		'sub' => 'Subscriptor',
		'mod' => 'Moderator',
		'god' => 'God level'
	),

	'resume' => array(
		'title' => 'Profiles',
		'gui' => array(
			'wellcome' => 'Wellcome',
			'logout' => 'Sign out'
		)
	),

	'profiles' => array(
		'title' => 'Profiles',
		'gui' => array(
			'myprofile' => 'My profile',
			'bio' => 'Biografy',
			'post' => 'Posts',
			'likes' => 'Likes',
			'comments' => 'Comments',

			'activity' => 'Last activity',
			'seemore' => 'see more',
			'otherprofiles' => 'Another profiles',
			'createprofile' => 'New user'
		)
	)
);

toJsonp($lang, 'lang');

?>