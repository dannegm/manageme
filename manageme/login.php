<?php
include_once('../config.php');
include_once(INCLASS . 'user.php');

if (isset($_COOKIE['token'])) {
	$user = new User ();
	$isLogin = $user->login($_COOKIE['user']);
	if ($isLogin) {
		header('Location: index.php');
	} else {
		die ($user->error());
	}
} else {
	$lang = file_get_contents(INLANGS . LANG . '.php');
		$lang = json_decode($lang);
?>
<!doctype html>
<!-- [ <?php echo $lang->copyright; ?> - http://dannegm.pro ] -->
<html lang="<?php echo LANG; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $lang->login->wellcome->title; ?></title>

	<link rel="stylesheet/less" href="<?php echo TOLESS . 'dashboard.less'; ?>" />

	<script src="<?php echo TOJS . 'jquery.min.js'; ?>"></script>
	<script src="<?php echo TOJS . 'less.min.js'; ?>"></script>
	<script>
		function error (txt) {
			$('#formLogin').removeClass('animateFormLoginError');
			$('#formLogin').addClass('animateFormLoginError');
			$('.error').html(txt).fadeIn();
		}
		function islogin (r) {
			var res = r.split(':');
			console.log(r);
			if (res[0] === "error") {
				error(res[1]);
			} else {
				window.location.href = 'index.php';
			}
		}
		function submit (e) {
			e.preventDefault();
			var keep = 'nope';
			if ( $('#keep').is(':checked') ) { keep = 'keep'; }

			$.post( '<?php echo TOAPPS . "login.php"; ?>', {
				'username': $('#username').val(),
				'password': $('#password').val(),
				'keep': keep
			}, islogin);
		}
		function init () {
			$('#doLogin').click(submit);
		}
		$(document).ready(init);
	</script>
</head>
<body id="login">

<header id="header">
	<h1>Dannegm</h1>
	<h2><?php echo $lang->title; ?></h2>
</header>

<section id="formLogin">
	<h3><?php echo $lang->login->wellcome->title; ?></h3>
	<p><?php echo $lang->login->wellcome->text; ?></p>

	<form action="<?php echo TOAPPS . 'login.php'; ?>" method="post">
		<div>
			<span class="error">
				<?php echo $lang->login->error->invalid_data; ?>
			</span>
		</div>
		<div>
			<label><?php echo $lang->login->form->username; ?></label>
			<input type="text" id="username" name="username" placeholder="<?php echo $lang->login->form->username; ?>" />
		</div>
		<div>
			<label><?php echo $lang->login->form->password; ?></label>
			<input type="password" id="password" mane="password" placeholder="<?php echo $lang->login->form->password; ?>" />
		</div>
		<div>
			<label for="keep">
				<input type="checkbox" id="keep" name="keep" />
				<?php echo $lang->login->form->keep_login; ?>
			</label>
			<button id="doLogin">
				<?php echo $lang->login->form->login; ?>
			</button>
		</div>
		<p class="mini"><a href="#"><?php echo $lang->login->form->forgoten_pass; ?></a></p>
	</form>
	<h4><?php echo $lang->copyright; ?></h4>
</section>

</body>
</html>
<?php } ?>