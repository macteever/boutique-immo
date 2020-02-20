<?php /* Template Name: edited */
   get_header(); ?>

<?php
    require get_template_directory().'/biens/Biens_controller.php';

    $post_id = htmlspecialchars($_GET['id']);

    if(!isset($_GET['id']) || get_post($post_id) == null || get_post_field( 'post_author', $post_id ) != get_current_user_id()) {
        echo 'rejeté';
        exit(0);
    }

    $keys = ['surface', 'bedrooms', 'rooms', 'city', 'place', 'adress', 'pictures', 'email', 'heat', 'price', 'title'];
    $form_valid = true;

    foreach ($keys as $key) {
        if(!isset($_POST[$key])){
            $form_valid = false;
        } else {
            $$key = htmlspecialchars($_POST[$key]);
        }
    }

    if ($form_valid) {
        $bien = new Bien($title, get_post_field( 'post_author', $post_id ), $rooms, $bedrooms, $surface, $heat, $price, $adress, [], 'no def', $post_id);
        var_dump($bien);
        $controller = new BiensController();
        $controller->update($bien);
        echo 'le bien a été modifié, il sera publié après vérification';
    }else{
        echo 'erreur';
    }
?>
<?php

