<?php /* Template Name: Home */
   get_header(); ?>
    <main role="main" class="home-main">
      <section id="home-top">
        <div class="home-slider">
          <!-- Flexible content -->
          <?php if ( have_rows( 'home_slider' ) ) : ?>
            <?php while ( have_rows('home_slider' ) ) : the_row(); ?>
              <?php if ( get_row_layout() == 'bien_immo' ) : ?>
                <div>
                  <?php $post_object = get_sub_field('objet_bien'); ?>

                  <?php if( $post_object ): ?>
                    <?php $post = $post_object; setup_postdata( $post ); ?>
                      <div class="container-fluid home-slide-top" style="background: -webkit-linear-gradient(180deg, rgba(0,0,0,0.00) 38%, rgba(0,0,0,0.54) 93%);
                        background: -o-linear-gradient(180deg, rgba(0,0,0,0.00) 38%, rgba(0,0,0,0.54) 93%);
                        background: linear-gradient(180deg, rgba(0,0,0,0.00) 38%, rgba(0,0,0,0.54) 93%),
                        background-image: linear-gradient(257deg, rgba(0,0,0,0.00) 24%, rgba(0,0,0,0.50) 100%),
                        url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover;">
                        <a href="<?php the_permalink(); ?>">
                          <div class="pl-30 home-top-content apparition-2">
                            <h2 class="home-top-title fs-60 fw-700 text-white"><?php the_title(); ?></h2>
                            <div class="home-top-localisation">
                              <span class="fs-36 fw-600 text-white"><?php the_field('localisation'); ?></span>
                            </div>
                            <div class="home-biens-data d-flex align-items-end">
                              <span class="text-white fs-28 mr-50"><?php the_field('superficie'); ?>m2 habitables</span>
                              <span class="text-white fs-24 fw-300"><?php the_field('prix'); ?>€</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                </div>
                <?php elseif( get_row_layout() == 'image_slider' ): ?>
                  
                <div class="home-slide-img home-slide-top" style="
                        background: -webkit-linear-gradient(280deg, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0) 100%), -webkit-linear-gradient(left, rgba(0,0,0,0.32) -40%, rgba(0,0,0,0) 60%), url(<?php the_sub_field('img'); ?>) ">
                </div>

              <?php endif;
            endwhile;
          endif; ?>
        
          <!-- END flexible content -->
        </div>
        <div id="home-form" class="apparition-2">
          <!-- INSERT FORM HOME -->
          <?php // get_template_part('includes/form-deposer'); ?>
            <h1 class="fs-80 lh-1.15 thirsty text-white">Vendre son bien<br><p class="source-sans fs-48 fw-600">Pour 4990<span class="text-white fs-38 fw-400">€</span> ça Twist Tout</p></h1>
            <h3 class="fs-18 fw-600 text-center mt-30"></h3> 
            <div class="d-flex flex-wrap mt-40 home-form-links">
              <div class="d-flex flex-column">
                <a href="<?php echo home_url() . '/deposer-une-annonce'; ?>" class="btn-immo fs-20 mr-10 apparition-3">Déposer une annonce</a>
                <p class="d-flex align-items-baseline text-white fs-24 text-center mt-10 source-sans fw-700 home-link-before">C<span class="source-sans fs-24">'</span>est gratuit !</p>
              </div>
              <div class="d-flex flex-column">
                <a href="<?php echo home_url() . '/biens'; ?>" class="btn-immo-light fs-20 mr-10 apparition-3">Trouver un bien</a>
                <p class="d-flex align-items-baseline text-white fs-24 text-center mt-10 source-sans fw-700 home-link-before">C<span class="source-sans fs-24">'</span>est parti !</p>
              </div>
            </div>
        </div>
      </section>
      <section class="container-fluid home-new-estate">
 			    <?php   get_template_part('includes/new-estate'); ?>
 		  </section>
      <section id="home-concept" class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mb-50">
              <h2 class="text-immo fs-48 mb-15">Pourquoi choisir <strong>Agence Twist</strong></h2>
            </div>
          </div>
          <div class="row align-items-start">
            <?php if ( have_rows('home_pourquoi') ): ?>
                <?php while ( have_rows('home_pourquoi') ) : the_row(); ?>

                  <div class="col-xl-3 col-lg-3 col-12 d-flex flex-column justify-content-center align-items-center p-relative">
                    <?php
                    $image = get_sub_field('icon');
                    if ( !empty($image) ): ?>
                      <img class="home-concept-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endif; ?>
                    <h3 class="text-center mb-40 mt-20 fs-26 fw-600 text-immo"><?php the_sub_field('title'); ?></h3>
                    <div class="text-center fs-20 lh-24 text-immo">
                      <?php the_sub_field('content'); ?>
                    </div>
                    <div class="home-concept-op">
                      <?php
                      $image = get_sub_field('icon');
                      if ( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div class="row mt-80">
            <div class="col-12 text-center">
              <a class="btn-immo fs-18" href="<?php echo home_url() . '/notre-concept/#concept-contact'; ?>">Nous contacter</a>
            </div>
          </div>
        </div>
      </section>
      <section class="container-fluid home-blog">
        <div class="container">
          <div class="row home-blog-title mb-50">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12 d-flex flex-column">
              <h3 class="fw-600 fs-32 after-short-immo mr-30">Le blog</h3>
              <div class="fw-300 fs-20 lh-28"><?php the_field('home_blog'); ?></div>
            </div>
          </div>
          <div class="row">
            <?php $args = array(
              'posts_per_page'   => 3,
              'orderby'          => 'date',
              'order'            => 'DESC',
              'include'          => '',
              'post_type'        => 'post',
              'post_status'      => 'publish',
              'suppress_filters' => true
            );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <!-- 	<div>  -->
            <div class="col-xl-4 col-lg-4 col-12">
              <div class="home-post-parent">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <?php echo get_the_post_thumbnail( $post->ID, 'full ' ); ?>
                  <div class="home-post">
                    <?php
                    $categories = get_the_category();
                    $category_name = $categories[0]->cat_name;
                    ?>
                    <h3 class="fs-22 source-sans"><?php the_title(); ?></h3>
                    <div class="d-flex justify-content-between">
                      <span class="fs-13 text-grey"><?php echo $category_name ?></span>
                      <span class="fs-13 text-grey"><?php the_date(); ?></span>
                    </div>
                    <div class="fs-15 mt-20 text-right">
                      <a class="fs-15 uppercase text-right ml-auto" href="<?php the_permalink(); ?>">Lire l'article</a>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <!-- 	</div> -->
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
          </div>
          <div class="row justify-content-center mt-50">
            <div class="col-12 text-center">
              <a class="btn-immo fs-18" href="<?php echo home_url() . '/blog'; ?>">Voir tous les articles</a>
            </div>
          </div>
        </div>
      </section>
      <section id="home-partner" class="container-fluid">
        <div class="container">
          <div class="row mb-50">
            <div class="col-12">
              <h3 class="fw-600 fs-32 after-short-immo mr-30">Nos partenaires</h3>
            </div>
          </div>
          <div class="home-partner-slider row align-items-center">
          <?php if ( have_rows('slider_partner') ): ?>
              <?php while ( have_rows('slider_partner') ) : the_row(); ?>
                <div>
                  <a target="_blank" href="<?php the_sub_field('lien'); ?>">
                    <?php
                    $image = get_sub_field('img');
                    if ( !empty($image) ): ?>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endif; ?>
                  </a>
                </div>
              <?php endwhile; ?>
          <?php endif; ?>
          </div>
        </div>
      </section>
   </main>

  <?php
    // $handle = curl_init();

    // $url = "clients.ac3-distribution.com/office12/boutiq/cache/export.xml";

    // curl_setopt($handle, CURLOPT_URL, $url);
    // curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    // $output = curl_exec($handle);
    // curl_close($handle);

    // echo $output;
  ?>
<?php get_footer(); ?>
