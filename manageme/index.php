<?php
include_once('../config.php');
include_once(INCLASS . 'user.php');

if (!isset($_COOKIE['user'])) {
	header('Location: login.php');
} else { 
	$u = new User ();
	$isLogin = $u->login($_COOKIE['user']);
	if ($isLogin) {
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
	<script>
		function loadContent (site, title) {
			$('#loadContent').html('<img id="loader" src="<?php echo TOIMG . 'loader.gif'; ?>" />');
			$('#secTitle h2').hide();
			$('#sideMenu li').removeClass('active');
			switch ( site ) {
				case 'resume':
					$('#loadContent').load('<?php echo TOGUIAPPS . "resume.php"; ?>');
					$('.h2resume').show();
					$('#sideMenu .toResume').addClass('active');
					break;
				case 'inbox':
					$('#loadContent').load('<?php echo TOGUIAPPS . "onbuild.php?t=Inbox"; ?>');
					$('.h2inbox').show();
					$('#sideMenu .toInbox').addClass('active');
					break;
				case 'content':
					$('#loadContent').load('<?php echo TOGUIAPPS . "onbuild.php?t=Content"; ?>');
					$('.h2content').show();
					$('#sideMenu .toContent').addClass('active');
					break;
				case 'stats':
					$('#loadContent').load('<?php echo TOGUIAPPS . "onbuild.php?t=Stats"; ?>');
					$('.h2stats').show();
					$('#sideMenu .toStats').addClass('active');
					break;
				case 'profiles':
					$('#loadContent').load('<?php echo TOGUIAPPS . "profiles.php"; ?>');
					$('.h2profiles').show();
					$('#sideMenu .toProfiles').addClass('active');
					break;
				case 'activity':
					$('#loadContent').load('<?php echo TOGUIAPPS . "onbuild.php?t=Activity"; ?>');
					$('.h2activity').show();
					$('#sideMenu .toActivity').addClass('active');
					break;
				case 'config':
					$('#loadContent').load('<?php echo TOGUIAPPS . "onbuild.php?t=Config"; ?>');
					$('.h2config').show();
					$('#sideMenu .toConfig').addClass('active');
					break;
				default:
					$('#loadContent').load('<?php echo TOGUIAPPS; ?>' + site);
					$('.h2default').text(title).show();
					break;
			}
		}
		function init () {
			loadContent('resume');

			$('.toResume').live('click', function(e){
				e.preventDefault();
				loadContent('resume');
			});
			$('.toInbox').live('click', function(e){
				e.preventDefault();
				loadContent('inbox');
			});
			$('.toContent').live('click', function(e){
				e.preventDefault();
				loadContent('content');
			});
			$('.toStats').live('click', function(e){
				e.preventDefault();
				loadContent('stats');
			});
			$('.toProfiles').live('click', function(e){
				e.preventDefault();
				loadContent('profiles');
			});
			$('.toActivity').live('click', function(e){
				e.preventDefault();
				loadContent('activity');
			});
			$('.toConfig').live('click', function(e){
				e.preventDefault();
				loadContent('config');
			});

			$('.logout').live('click', function() {
				$.get('<?php echo TOAPPS . "logout.php"; ?>',{},function(){ window.location.href = 'login.php'; });
			});
		}
		jQuery(document).ready(init);
	</script>
</head>
<body>

<header id="header">
	<h1>Dannegm</h1>
	<h2><?php echo $lang->title; ?></h2>
</header>

<nav id="primaryMenu">
	<ul id="sideMenu">
		<li class="toResume active">
			<i class="resume"></i>
			<span><?php echo $lang->menu->resume; ?></span>
		</li>
		<li class="toInbox">
			<i class="inbox"></i>
			<span><?php echo $lang->menu->inbox; ?></span>
		</li>
		<li class="toContent">
			<i class="content"></i>
			<span><?php echo $lang->menu->content; ?></span>
		</li>
		<li class="toStats">
			<i class="stats"></i>
			<span><?php echo $lang->menu->stats; ?></span>
		</li>
		<li class="toProfiles">
			<i class="profiles"></i>
			<span><?php echo $lang->menu->profiles; ?></span>
		</li>
		<li class="toActivity">
			<i class="activity"></i>
			<span><?php echo $lang->menu->activity; ?></span>
		</li>
		<li class="toConfig">
			<i class="config"></i>
			<span><?php echo $lang->menu->config; ?></span>
		</li>
		<li class="logout">
			<i class="exit"></i>
			<span><?php echo $lang->menu->exit; ?></span>
		</li>
	</ul>
</nav>

<header id="secTitle">
		<h2 class="h2resume active"><?php echo $lang->menu->resume; ?></h2>
		<h2 class="h2inbox active"><?php echo $lang->menu->inbox; ?></h2>
		<h2 class="h2content active"><?php echo $lang->menu->content; ?></h2>
		<h2 class="h2stats active"><?php echo $lang->menu->stats; ?></h2>
		<h2 class="h2profiles active"><?php echo $lang->menu->profiles; ?></h2>
		<h2 class="h2activity active"><?php echo $lang->menu->activity; ?></h2>
		<h2 class="h2config active"><?php echo $lang->menu->config; ?></h2>
</header>

<section id="loadContent">
</section>

</body>
</html>
<?php
	} else {
		//die ($u->error());
		header('Location: login.php');
	}
}
?>