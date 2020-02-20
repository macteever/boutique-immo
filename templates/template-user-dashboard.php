<?php /* Template Name: user-dashboard */
get_header(); ?>
<?php
// require get_template_directory().'/biens/Biens_controller.php';
// $controller = new BiensController();
// $biens = $controller->get_from_current_user();

// foreach($biens as $bien) {
//     $post_id = $bien->getId();
//     $title = $bien->getTitle();
//     $nb_rooms = $bien->getRooms();
//     $nb_bedrooms = $bien->getBedrooms();
//     $heat = $bien->getHeat();
//     $size = $bien->getSize();
//     $price = $bien->getPrice();
//     $adress = $bien->getAdress();
//     $more = $bien->getMore(); // not implemented yet

//     echo $title;
    // TODO: get user data ===> https://developer.wordpress.org/reference/functions/get_userdata/
?>
<!-- <a href="<? //get_post_permalink($post_id); ?>">show</a>
<?php
// }
 ?> -->


<!--- TEST UPDATE USER INFOS -->
<?php 
/* Get user info. */
global $current_user, $wp_roles;

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    // if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
    //     if ( $_POST['pass1'] == $_POST['pass2'] )
    //         wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
    //     else
    //         $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    // }
    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );

    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->ID )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }
    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    
    /* EXTRA FIELDS  */
    if ( !empty( $_POST['company'] ) )
        update_user_meta($current_user->ID, 'company', esc_attr( $_POST['company'] ) );
    if ( !empty( $_POST['user_adress'] ) )
        update_user_meta($current_user->ID, 'user_adress', esc_attr( $_POST['user_adress'] ) );
    if ( !empty( $_POST['zip_code'] ) )
        update_user_meta($current_user->ID, 'zip_code', esc_attr( $_POST['zip_code'] ) );
    if ( !empty( $_POST['city'] ) )
        update_user_meta($current_user->ID, 'city', esc_attr( $_POST['city'] ) );
    if ( !empty( $_POST['phone'] ) )
        update_user_meta($current_user->ID, 'phone', esc_attr( $_POST['phone'] ) );
   
    /* EXTRA FIELDS ACF */ 
    // if ( !empty( $_POST['adresse'] ) )
    // update_field('adresse', $_POST['adresse'], $current_user->ID);

    /* Redirect so the page will show updated info.*/
    /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        echo '<div class="update-user-confirm"><span>Vos informations ont été mis à jour</span></div>';
        //exit;
    }
}
?>

<!--- END TEST -->
<main role="main" class="user-main">
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 dashboard-title">
                <?php
                    // if ( function_exists('yoast_breadcrumb') ) {
                    // yoast_breadcrumb( '<p class="text-immo fs-15 mb-0" id="breadcrumbs">','</p>' );
                    // }
                    ?>
                    <h1 class="fs-72 fw-700 mt-0 mb-0"><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row justify-content-between pt-30">
                <aside class="col-xl-auto col-lg-auto col-12 d-flex flex-column">
                    <div>
                        <ul class="pl-0">
                            <li class="dashboard-tab active"><a class="d-flex align-items-center fs-17" href="#my-estates"><i class="material-icons text-immo fs-24 mr-15">view_list</i>Mes annonces</a></li>
                            <li class="dashboard-tab"><a class="d-flex align-items-center fs-17" href="#post-estate"><i class="material-icons text-immo fs-24 mr-15">post_add</i>Poster une annonce</a></li>
                            <li class="dashboard-tab"><a class="d-flex align-items-center fs-17" href="#my-infos"><i class="material-icons text-immo fs-24 mr-15">account_box</i>Mes informations</a></li>
                            <li class="dashboard-tab"><a class="d-flex align-items-center fs-17" href="#my-documents"><i class="material-icons text-immo fs-24 mr-15">move_to_inbox</i>Boîte de reception</a></li>
                            <li class=""><a class="d-flex align-items-center fs-17" href="<?php echo wp_logout_url(); ?>"><i class="material-icons text-immo fs-24 mr-15">exit_to_app</i>Déconnexion</a></li>
                        </ul>
                    </div>
                </aside>
                <div class="col-xl-9 col-lg-9 col-12 apparition-2 dashboard-tab-content">
                    <!-- MES ANNONCES -->
                    <section id="my-estates">
                        <?php
                        $user_id = get_current_user_id();

                        $myposts = get_posts(array(
                            'post_type' => 'biens',
                            'author' => $user_id,
                            'posts_per_page' => 3
                        ));
                        if (!empty($myposts)) {
                            foreach ( $myposts as $post ) : setup_postdata( $post );
                            ?>
                            <div class="p-relative archive-post-hover apparition-3 anim-300">

                                    <div class="col-12 archive-post anim-300 d-flex mb-30 p-relative">
                                        <div class="slider-archive-biens p-relative">
                                            <?php echo get_the_post_thumbnail( $post->ID, 'full ' ); ?>
                                            <?php if ( have_rows('galerie_img') ): ?>
                                                <?php while ( have_rows('galerie_img') ) : the_row(); ?>

                                                        <?php
                                                        // repeater galerie single biens
                                                        $image = get_sub_field('img');
                                                        if ( !empty($image) ): ?>
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                                        <?php endif; ?>

                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="archive-post-content d-flex flex-column justify-content-center">
                                            <?php $term_list = wp_get_post_terms($post->ID, 'taxonomy-biens', array("fields" => "all"));
                                            foreach($term_list as $term_single) {?>
                                            <span class="fs-12 fw-600 uppercase text-immo"><?php echo $term_single->name; ?></span>
                                            <?php } ?>
                                            <h3 class="fs-22 fw-600 source-sans"><?php the_title(); ?></h3>
                                            <div class="d-flex">
                                                <span class="text-grey fs-13 mr-10"><?php the_field('surface'); ?> m2</span>
                                                <span class="text-grey fs-13"><?php the_field('rooms'); ?> pièce(s)</span>
                                            </div>
                                            <span class="fw-600 fs-15"><?php the_field('price'); ?> €</span>
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div class="fs-15 text-black fw-300">
                                                    <?php echo excerpt('30'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-estate-data d-flex flex-column justify-content-center ml-auto pr-30">
                                            <div class="d-flex align-items-center justify-content-center mb-15">
                                                <a class="d-flex flex-column align-items-center" href="<?php the_permalink(); ?>"><i class="material-icons text-grey fs-20">edit</i><span class="fs-14">Editer</span></a></div>
                                            <div class="d-flex align-items-center justify-content-center mt-15">
                                                <?php 
                                                if( !(get_post_status() == 'trash') ) : ?>
                                                    <a class="d-flex flex-column align-items-center" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien : <?php echo get_the_title() ?> ?')"href="<?php echo get_delete_post_link( $post->ID ); ?>"> <i class="material-icons text-red">restore_from_trash</i><span class="fs-14">Supprimer</span></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <?php
                            endforeach;
                            ?>
                            <?php wp_reset_postdata();
                            } else { ?>
                            <div class="my-estates-empty">
                                <h2 class="fw-700 fs-24">Aucunes annonces en ligne</h2>
                            </div>
                        <?php }
                        ?>
                    </section>
                    <!-- POSTER ANNONCE -->
                    <?php get_template_part("includes/form-deposer"); ?>
                    <!-- INFORMATIONS -->
                    <section id="my-infos">
                        <h3 class="fs-18 fw-600 mb-20">Mes informations :</h3>
                        <?php 
                        $user_info = wp_get_current_user(); 
                        $user_id = get_current_user_id();
                        ?> 
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>">
                            <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                                <div class="d-flex">
                                    <div class="d-flex flex-column w-100">
                                        <label for="" class="text-grey fs-15">Nom *</label>
                                        <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" >
                                    </div>
                                    <div class="d-flex flex-column ml-10 w-100">
                                        <label for="" class="text-grey fs-15">Prénom *</label>
                                        <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="" class="text-grey fs-15">Nom de la société *</label>
                                    <input type="text" name="company" id="company" value="<?php the_author_meta('company', $current_user->ID ); ?>">
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="" class="text-grey fs-15">Adresse *</label>
                                    <input type="text" name="user_adress" id="user_adress" value="<?php the_author_meta('user_adress', $current_user->ID ); ?>">
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column w-100">
                                        <label for="" class="text-grey fs-15">Code postal *</label>
                                        <input type="text" name="zip_code" id="zip_code" value="<?php the_author_meta('zip_code', $current_user->ID ); ?>">
                                    </div>
                                    <div class="d-flex flex-column ml-10 w-100">
                                        <label for="" class="text-grey fs-15">Ville *</label>
                                        <input type="text" name="city" id="city" value="<?php the_author_meta('city', $current_user->ID ); ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="" class="text-grey fs-15">Téléphone *</label>
                                    <input type="tel" name="phone" id="phone" value="<?php the_author_meta('phone', $current_user->ID ); ?>">
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="" class="text-grey fs-15">Email *</label>
                                    <input class="text-input" name="email" type="text" id="email" placeholder="<?php echo $order_data['user_email'] = $user_info->user_email; ?>" type="email" name="" id="">
                                </div>
           
                                <div class="d-flex w-100 mt-30">
                                    <!-- <input class="fs-17 w-100" type="submit" value="Modifier"> -->
                                    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Modifier', 'profile'); ?>" />
                                    <?php wp_nonce_field( 'update-user' ) ?>
                                    <input name="action" type="hidden" id="action" value="update-user" />
                                </div>
                            </form><!-- #adduser -->
                        </div><!-- .hentry .post -->
                        <?php endwhile; ?>
                        <?php else: ?>
                            <p class="no-data">
                                <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
                            </p><!-- .no-data -->
                        <?php endif; ?>
                    </section>
                    <!-- BOITE RECEPTION -->
                    <section id="my-documents">
                        <h3 class="fs-18 fw-600 mb-20 source-sans">Mes documents :</h3>
                        <div class="d-flex w-100 mt-30 justify-content-center">
                            <?php if ( get_field('user_document', 'option') ) : ?>
                                <a target="_blank" class="btn-immo fs-17 mx-auto" href="<?php the_field('user_document', 'option'); ?>" >Télecharger mon document</a>
                            <?php endif; ?>
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>