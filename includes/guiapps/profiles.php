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
		#myprofile figure {
			overflow: hidden;
			display: block;
			float: left;
			padding: 20px;
		}
			#myprofile figure img {
				width: 120px;
				height: 120px;
				border-radius: 100%;
				margin-bottom: 10px;
				display: block;
			}
			#myprofile figure figcaption {
				width: 120px;
				display: block;
				text-align: center;
				font-size: 12px;
				font-style: italic;
				color: #888;
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
			#myprofile .bio .biografy {
				border-left: 4px solid #ddd;
				padding-left: 10px;
				font-size: 14px;
			}
				#myprofile .bio .biografy:before {
					content: '- <?php echo $lang->profiles->gui->bio; ?>';
					color: #888;
					font-size: 12px;
					font-style: italic;
					display: block;
				}
			#myprofile .details {
				clear: both;
				overflow: hidden;
				padding: 20px;
				padding-top: 0;
			}
				#myprofile .details p {
					border-right: 2px solid #ddd;
					padding-right: 5px;
					margin-left: 20px;
					float: right;
					text-align: right;
					color: #444;
				}
					#myprofile .details p .p {
						font-size: 12px;
						display: block;
					}
					#myprofile .details p .v {
						font-size: 16px;
						display: block;
						color: #000;
					}
			#myprofile .last_activity {
				box-shadow: inset 0 1px 1px rgba(0,0,0,.2);
				background: #f7f6f2 url('<?php echo TOIMG . 'line.png'; ?>') 50px top repeat-y;
				background-size: 8px;
				padding: 10px;
			}
				#myprofile .last_activity h3 {
					font-size: 14px;
					color: #888;
					font-weight: normal;
					text-align: right;
				}
				#myprofile .last_activity article {
					margin: 10px auto;
					background: #eee;
					border: 1px dashed #ddd;
					min-height: 60px;
				}
</style>

<nav class="toolbar">
	<button class="btn"><?php echo $lang->profiles->gui->createprofile; ?></button>
</nav>

<article id="myprofile">
	<div>
		<figure>
			<img src="<?php echo TOAVATARS . $user['avatar']; ?>" />
			<figcaption><?php echo $myrol; ?></figcaption>
		</figure>
		<div class="bio">
			<h3><?php echo $user['name']; ?></h3>
			<h4><span>@</span><?php echo $user['username']; ?></h4>
			<p class="biografy">
				<?php echo $user['bio']; ?>
			</p>
		</div>
	</div>
	<div class="details">
		<p>
			<span class="p"><?php echo $lang->profiles->gui->post; ?></span>
			<span class="v">13</span>
		</p>
		<p>
			<span class="p"><?php echo $lang->profiles->gui->likes; ?></span>
			<span class="v">45</span>
		</p>
		<p>
			<span class="p"><?php echo $lang->profiles->gui->comments; ?></span>
			<span class="v">26</span>
		</p>
	</div>
	<section class="last_activity">
		<h3><?php echo $lang->profiles->gui->activity; ?></h3>

		<article></article>
		<article></article>
		<article></article>
		<article></article>
		<article></article>
	</section>
</article>

<section id="otherProfiles">
</section>

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