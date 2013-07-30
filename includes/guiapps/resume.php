<?php
include_once('../../config.php');
include_once(INCLASS . 'user.php');

if (isset($_COOKIE['user'])) {
	$u = new User ();
	$isLogin = $u->login($_COOKIE['user']);
	if ($isLogin) {
		$user = $u->getInfo($_COOKIE['user']);
		$myrol = rol2text($user['rol'], $lang);
?>
<style>
	#myprofile {
		margin: 10px;
		border: 1px solid #eee;
		background: #fff;
		box-shadow: 0 0 1px rgba(0,0,0,.2);
		border-radius: 3px;
		overflow: hidden;
		display: block;
		width: 500px;
		float: left;
	}
		#myprofile h1 {
			font-size: 28px;
			margin: 10px 20px 0 20px;
			color: #888;
			font-weight: normal;
		}
		#myprofile figure {
			overflow: hidden;
			display: block;
			float: left;
			padding: 20px;
			padding-right: 0;
		}
			#myprofile figure img {
				width: 60px;
				height: 60px;
				border-radius: 100%;
				display: block;
			}
		#myprofile .bio {
			overflow: hidden;
			padding: 20px;
		}
			#myprofile .bio h3 {
				font-size: 24px;
				font-weight: normal;
			}
			#myprofile .bio h4 {
				font-size: 14px;
				font-weight: normal;
				color: #000;
				margin-bottom: 10px;
			}
				#myprofile .bio h4 span {
					font-weight: bold;
					color: #888;
				}
</style>

<nav class="toolbar">
	<a href="#" class="btn logout"><?php echo $lang->resume->gui->logout; ?></a>
</nav>

<article id="myprofile">
	<h1><?php echo $lang->resume->gui->wellcome; ?></h1>
	<div>
		<figure>
			<img src="<?php echo TOAVATARS . $user['avatar']; ?>" />
		</figure>
		<div class="bio">
			<h3><?php echo $user['name']; ?></h3>
			<h4><span>@</span><?php echo $user['username']; ?></h4>
		</div>
	</div>
</article>

<?php
	} else {
?>
<blockquote>
	<?php echo $lang->errors->renew_login; ?>
</blockquote>
<?php
	}
}
?>