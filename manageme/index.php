<?php
include_once('../config.php');
include_once(INCLASS . 'user.php');

if (!isset($_COOKIE['user'])) {
	//header('Location: login.php');
	var_dump($_COOKIE);
} else {
	$u = new User ();
	$isLogin = $u->login($_COOKIE['user']);
	if ($isLogin) {
		$lang = file_get_contents(INLANGS . LANG . '.php');
			$lang = json_decode($lang);

		$user = $u->getInfo($_COOKIE['user']);
?>
<!doctype html>
<!-- [ <?php echo $lang->copyright; ?> - http://dannegm.pro ] -->
<html lang="<?php echo LANG; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $lang->title; ?></title>

	<link rel="stylesheet/less" href="<?php echo TOLESS . 'dashboard.less'; ?>" />

	<script src="<?php echo TOJS . 'jquery.min.js'; ?>"></script>
	<script src="<?php echo TOJS . 'less.min.js'; ?>"></script>
</head>
<body>

<header id="header">
	<h1>Dannegm</h1>
	<h2><?php echo $lang->title; ?></h2>
</header>

<nav>
	<ul id="sideMenu">
		<li class="active">
			<i class="resume"></i>
			<span><?php echo $lang->menu->resume; ?></span>
		</li>
		<li>
			<i class="inbox"></i>
			<span><?php echo $lang->menu->inbox; ?></span>
		</li>
		<li>
			<i class="article"></i>
			<span><?php echo $lang->menu->articles; ?></span>
		</li>
		<li>
			<i class="stats"></i>
			<span><?php echo $lang->menu->stats; ?></span>
		</li>
		<li>
			<i class="profiles"></i>
			<span><?php echo $lang->menu->profiles; ?></span>
		</li>
		<li>
			<i class="activity"></i>
			<span><?php echo $lang->menu->activity; ?></span>
		</li>

		<li class="separador"></li>

		<li>
			<i class="config"></i>
			<span><?php echo $lang->menu->config; ?></span>
		</li>
		<li>
			<i class="exit"></i>
			<span><?php echo $lang->menu->exit; ?></span>
		</li>
	</ul>
</nav>

<header id="secTitle">
		<h2 class="resume active"><?php echo $lang->menu->resume; ?></h2>
</header>

<section id="resume">
</section>

</body>
</html>
<?php
	} else {
		die ($user->error());
		header('Location: login.php');
	}
}
?>