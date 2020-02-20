<?php

// add password fields for users
add_action('register_form', 'add_password_fields');

function add_password_fields(){
    ?>
    <label for="user_password">Mot de passe</label><br>
    <input name="user_password" id="user_password" required type="password" class="input" size="20">

    <label for="user_confirm">Confirmation mot de passe</label><br>
    <input name="user_confirmation" id="user_confirmation" required type="password" class="input" size="20">
    <?php
}

// validate password for users
add_action('registration_errors', 'check_for_password_errors', 10, 3);

function check_for_password_errors($errors, $sanitized_user_login, $user_email){
    if(!isset($_POST['user_password'])){
        $errors->add('no_password_error', "Erreur, vous n'avez pas fourni de mot de passe");
        return $errors;
    }

    if($_POST['user_password'] != $_POST['user_confirmation']){
        $errors->add('password_mismatch_error', "Erreur, le mot de passe entré ne correspond pas à la confirmation");
        return $errors;
    }

    return $errors;
}

// finally set the password for the registered user
add_action( 'user_register', 'set_pass_in_registration', 10, 4 );

function set_pass_in_registration($user_id){
    if (isset( $_POST['user_password']))
        wp_set_password( $_POST['user_password'], $user_id );
}


add_filter( 'wp_new_user_notification_email_admin', 'custom_wp_new_user_notification_email', 10, 3 );

function custom_wp_new_user_notification_email($wp_new_user_notification_email, $user, $blogname){
    return $wp_new_user_notification_email;
}