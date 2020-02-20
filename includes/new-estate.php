<div class="container">
  <div class="row biens-related-child">
    <div class="col-12 pr-30">
      <h3 class="fs-28 after-short-immo fw-600">Nouveautés</h3>
    </div>
    <?php
    $myposts = get_posts(array(
      'showposts' => 3,
      'post_type' => 'biens',
      'orderby'  => 'name',
      'order'     => 'ASC'
    ));
    foreach ( $myposts as $post ) : setup_postdata( $post );
    ?>
    <div class=" col-xl-4 col-lg-4 col-12 bien-related-thumbnail mt-15 mb-15">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <div class="anim-300 p-relative">
          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="boutique immobilier agence immobilière bordeaux">
          <div class="text-white anim-300 thumbnail-related-title">
            <div class="fs-14 text-gold text-right">
              <?php $term_list = wp_get_post_terms($post->ID, 'taxonomy-biens', array("fields" => "all"));
              foreach($term_list as $term_single) {?>
                <span class="fs-14 text-gold text-right"><?php echo $term_single->name; ?></span>
              <?php } ?>
            </div>
            <h3 class="fw-700 fs-20 text-right source-sans mw-700 mw-80 ml-auto"><?php the_title(); ?></h3>
          </div>
        </div>
      </a>
    </div>
    <?php
  endforeach;
  ?>
  <?php wp_reset_postdata();
  ?>
  </div>
</div>

