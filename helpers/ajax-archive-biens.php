<?php

add_action("wp_ajax_fetch_biens", "fetch_biens");
add_action("wp_ajax_nopriv_fetch_biens", "fetch_biens");

function fetch_biens() {
    $meta_query = array(
      'relation' => 'AND'
    );

    if(isset($_GET['price_min']) && is_numeric($_GET['price_min'])) {
      array_push($meta_query, array(
        'key' => 'price',
        'value' => $_GET['price_min'],
        'type' => 'NUMERIC',
        'compare' => '>='
      ));
    }

    if(isset($_GET['price_max']) && is_numeric($_GET['price_max'])) {

      array_push($meta_query, array(
        'key' => 'price',
        'type' => 'NUMERIC',
        'value' => $_GET['price_max'],
        'compare' => '<='
      ));

    }

    if(isset($_GET['rooms_min']) && is_numeric($_GET['rooms_min'])) {

      array_push($meta_query, array(
        'key' => 'rooms',
        'type' => 'NUMERIC',
        'value' => $_GET['rooms_min'],
        'compare' => '>='
      ));
    }

    if(isset($_GET['rooms_max']) && is_numeric($_GET['rooms_max'])) {

      array_push($meta_query, array(
        'key' => 'rooms',
        'type' => 'NUMERIC',
        'value' => $_GET['rooms_max'],
        'compare' => '<='
      ));
      
    }

    if(isset($_GET['surface_min']) && is_numeric($_GET['surface_min'])) {

      array_push($meta_query, array(
        'key' => 'surface',
        'type' => 'NUMERIC',
        'value' => $_GET['surface_min'],
        'compare' => '>='
      ));
    }

    if(isset($_GET['surface_max']) && is_numeric($_GET['surface_max'])) {

      array_push($meta_query, array(
        'key' => 'surface',
        'type' => 'NUMERIC',
        'value' => $_GET['surface_max'],
        'compare' => '<='
      ));
      
    }

    if( $_GET['type'] === 'rent') {
      array_push($meta_query, array(
        'key' => 'rent',
        'value' => $_GET['type'] === 'rent' ? 'rent' : 'sale',
        'compare' => '=='
      ));
    }else{
      array_push($meta_query, array(
        'key' => 'rent',
        'value' => 'rent',
        'compare' => '!='
      ));
    }

    if($_GET['orderby'] === 'price') {
      $meta_key = 'price';
      $way = 'ASC';
    }else{
      $meta_key = 'date';
      $way = 'ASC';
    }

    $args = array(
        'post_type' => 'biens',
        'post_status' => 'publish',
        'posts_per_page' => 100,
        'meta_query' => $meta_query,
        'orderby' => 'meta_value',
        'meta_key' => $meta_key,
        'order' => $way
    ); 

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="p-relative bien archive-post-hover apparition-3 anim-300" data-price="<?= get_field('prix') ?>" data-gps="<?= get_field('lat') ?>,<?= get_field('lng') ?>">
              <a class="w-auto" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
                    <h3 class="fs-22 fw-600"><?php the_title(); ?></h3>
                    <div class="d-flex mb-20">
                      <span class="text-grey fs-13 mr-10"><?php the_field('superficie'); ?> M2</span>
                      <span class="text-grey fs-13"><?php the_field('nb_chambres'); ?> chambres</span>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="fs-15 text-black mw-80">
                        <?php echo excerpt('30'); ?>
                      </div>
                      <div class="w-auto">
                        <span class="fw-600 fs-15"><?php the_field('price'); ?> €</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="d-flex archive-arrows justify-content-between">
                <button class="archive-slide-prev" type="button"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-slider-left.svg" alt="arrow slider boutique immobilier bordeaux"/></button>
                <button class="archive-slide-next" type="button"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-slider-right.svg" alt="arrow slider boutique immobilier bordeaux"/></button>
              </div>
            </div>
      <?php endwhile; ?>
    <?php endif;
}