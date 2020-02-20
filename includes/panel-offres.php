<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="fs-32 fw-600 offres-title text-immo apparition-2">Nos offres</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <?php if ( have_rows('concept_offres', 'option') ): ?>
      <?php while ( have_rows('concept_offres', 'option') ) : the_row(); ?>
        <div class="col-xl-4 col-lg-4 col-md-8 col-12 box-offres apparition-3">
          <div class="concept-offre d-flex flex-column">
            <div class="offre-fat-border"></div>
            <div class="mw-80 mx-auto offres-box-title">
              <?php if ( get_sub_field('title', 'option') ) : $image = get_sub_field('title', 'option'); ?>
              
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
              
              <?php endif; ?>   
            </div>
            <div class="d-flex justify-content-center mt-20">
              <span class="text-center fs-38 fw-700 text-immo"><?php the_sub_field('prix'); ?></span>
            </div>
            <div class="concept-offre-content">
              <div class="text-grey fw-600 fs-18 lh-24 text-center pl-20 pr-20">
                <?php the_sub_field('subtitle', 'option'); ?>
              </div>
              <div class="mt-15 p-relative">
                <?php the_sub_field('offre_listing', 'option'); ?>
              </div>
            </div>
          </div>
          <div class="mt-15 d-flex text-center w-100">
            <?php
            
            $link = get_sub_field('lien', 'option');
            if (!empty($link)) {
              $link_url = $link['url'];
              $link_title = $link['title'];
              ?>
              <a class="btn-immo w-100 fs-18" href="<?php echo esc_url($link_url); ?>" ><?php echo esc_html($link_title); ?></a>
            <?php
            } 
            else { 
              if ( is_user_logged_in() ) { ?>
              
                <button id="anim-modal" class="btn-modal btn-immo w-100 fs-18">Déposer une annonce</button>
              <?php
              }
              else { ?>
                <button id="anim-modal" class="btn-register btn-immo w-100 fs-18">Déposer une annonce</button>
              <?php 
              }
            }
            ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
