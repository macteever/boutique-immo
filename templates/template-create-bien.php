<?php /* Template Name: Depose */
   get_header(); ?>
<?php require get_template_directory().'/biens/Biens_controller.php' ?>
<div class="d-none">
<?php
    
    $keys = ['DPE', 'GES', 'type', 'phone', 'global_state', 'rent','surface', 'rooms', 'city', 'adress', 'heat', 'price', 'description', 'title'];
    $form_valid = true;

    foreach ($keys as $key) {
        if(!isset($_POST[$key])){
            echo $key . " n'est pas défini \n";
            $form_valid = false;
        } else {
            $$key = htmlspecialchars($_POST[$key]);
        }
    }

    if ($form_valid) {
        $params = array(
            'id' => null,
            'author_id' => get_current_user_id(),
            'type' => $type,
            'rent' => $rent,
            'surface' => $surface,
            'title' => $title,
            'description' => $description,
            'rooms' => $rooms,
            'heat_mode' => $heat,
            'city' => $city,
            'adress' => $adress,
            'DPE' => $DPE,
            'GES' => $GES,
            'global_state' => $global_state,
            'phone' => $phone,
            'price' => $price,
            'geoPosition' => 'no def'
        );
        $bien = BienFactory::bienFromArray($params);

        $controller = new BiensController();
        $controller->save($bien, $_FILES);
        $data_confirm = 'Votre bien a été soumis, il sera publié après vérification';
    }else{
        $data_error = 'Une erreur s\'est produite, veuillez réessayer ';
    }
?>
</div>
<main role="main" class="main-confirm">
	<section class="container-fluid confirm-top">
		 <div class="container">
				<div class="row flex-column">
					<div class="col-12 mx-auto">
                        <h1 class="fw-700 apparition-2 fs-52 text-immo lh-1 text-center"><?php the_title(); ?></h1>
                        <p class="fs-18 lh-22 text-center">
                            <?php 
                                echo $data_confirm; 
                                echo $data_error;
                            ?>
                        </p>
                    </div>
                    <div class="col-12 text-center mt-30">
                        <a class="btn-immo fs-18" href="<?php echo home_url(); ?>">Retour à l'accueil</a>
                        <a class="btn-immo-light fs-18" href="<?php echo home_url() . '/biens'; ?>">Voir les biens</a>
                    </div>
				</div>
		 </div>
	</section>
	
</main>
<?php get_footer(); ?>