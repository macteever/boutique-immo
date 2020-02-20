<ul class="tab-group pl-0 mb-20">
	<li class="thirsty text-immo register-tab active fs-13 text-grey text-left"><a href="#register-form">Créer mon compte</a></li>
	<!-- <li class="tab"><a href="#inscription">S'inscrire</a></li> -->
	<li class="thirsty text-immo register-tab fs-13 text-grey text-left"><a href="#connect-form">Se connecter</a></li>
</ul>
<div class="register-tab-content">
	<div id="register-form">
		<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

			<div id="inscription" class="tab_content_login">
				<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
					<div class="username d-flex flex-column align-items-start">
						<label class="fs-15" for="user_login"><?php _e('Username'); ?>: </label>
						<input class="w-100" type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
					</div>
					<div class="password d-flex flex-column align-items-start">
						<label class="fs-15" for="user_email"><?php _e('Mail'); ?>: </label>
						<input class="w-100" type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
					</div>
					<div class="login_fields">
						<?php  do_action('register_form'); ?>
						<input type="submit" name="user-submit" value="<?php _e('Je m\'inscris'); ?>" class="user-submit fs-17 mt-15" tabindex="103" />
						<?php $register = $_GET['register']; if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>
						<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?register=true" />
						<input type="hidden" name="user-cookie" value="1" />
					</div>
				</form>
			</div>

		<?php } else { // is logged in ?>

		<?php } ?>

	</div>
	<div id="connect-form">
		<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
			<div class="username text-left d-flex flex-column align-items-start">
				<label class="text-grey fs-15" for="user_login"><?php _e('Username'); ?>: </label>
				<input class="w-100" type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
			</div>
			<div class="password text-left d-flex flex-column align-items-start">
				<label class="text-grey fs-15" for="user_pass"><?php _e('Password'); ?>: </label>
				<input class="w-100" type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
			</div>
			<div class="login_fields">
				<div class="rememberme d-flex text-grey fs-13">
					<label class="w-100 d-flex align-items-center" for="rememberme">
						<input class="mb-0" type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> <span class="ml-15 fs-15">Se souvenir</span>
					</label>
				</div>
				<?php do_action('login_form'); ?>
				<input type="submit" name="user-submit" value="<?php _e('Se connecter'); ?>" tabindex="14" class="user-submit fs-17 mt-15" />
				<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" />
				<input type="hidden" name="user-cookie" value="1" />
			</div>
		</form>
	</div>
</div>