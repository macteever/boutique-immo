<div id="login-register-password">

	<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

	<ul class="tab-group pl-0">
		<li class="tab active fs-13 text-grey text-left"><a href="#se_connecter">Se connecter</a></li>
		<!-- <li class="tab"><a href="#inscription">S'inscrire</a></li> -->
		<li class="tab fs-13 text-grey text-left"><a href="#reset_password">Mot de passe perdu ?</a></li>
	</ul>
	<div class="tab-content">
		<div id="se_connecter" class="tab_content_login">

			<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

			<h3>Bravo !</h3>
			<p class="fs-13 text-grey text-left">Vous pouvez maintenant vous connecter</p>

			<?php } elseif ($reset == true) { ?>

			<h3 class="fs-15 text-left">Demande validée</h3>
			<p class="fs-13 text-grey text-left">Vérifiez vos mails pour réinitialiser votre mot de passe</p>

			<?php } ?>

			<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
				<div class="username text-left">
					<label class="text-grey fs-13" for="user_login"><?php _e('Username'); ?>: </label>
					<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
				</div>
				<div class="password text-left">
					<label class="text-grey fs-13" for="user_pass"><?php _e('Password'); ?>: </label>
					<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
				</div>
				<div class="login_fields">
					<div class="rememberme d-flex text-grey fs-13">
						<label class="w-100 d-flex align-items-center" for="rememberme">
							<input class="mb-0" type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> <span class="ml-15">Se souvenir</span>
						</label>
					</div>
					<?php do_action('login_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Se connecter'); ?>" tabindex="14" class="user-submit" />
					<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
			<button id="anim-modal" class="btn-register fs-15 brd-none text-grey text-center mt-10">Pas encore inscrit ?</button>
		</div>
		<!-- div inscritpion -->
		<div id="reset_password" class="tab_content_login">
			<p class="fs-13 text-grey text-left">Entrez votre identifiant ou votre mail pour réinitialiser votre mot de passe.</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username text-left">
					<label  for="user_login" class="hide fs-13 text-grey"><?php _e('Identifiant ou Email'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Réinitialiser'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
	</div>

	<?php } else { // is logged in ?>

	<?php } ?>

</div>