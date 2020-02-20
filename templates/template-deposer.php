<?php /* Template Name: Déposer une annonce */
   get_header(); ?>
   <main role="main" class="deposer-main">
    <section class="container-fluid deposer-top">
			 <div class="container">
          <div class="row flex-column">
            <div class="col-xl-8 col-lg-8 col-md-10 col-12 mx-auto">
              <h3 class="text-immo-light fs-20 fw-400 source-sans apparition-2"><?php echo get_bloginfo(); ?></h3>
              <h1 class="fw-700 text-immo apparition-2"><?php the_title(); ?></h1>
            </div>
          </div>
  				<!--  -->
			 </div>
 		</section>
    <section id="deposer-offres" class="container-fluid">
      <?php get_template_part("includes/panel-offres"); ?>
    </section>
   </main>
<?php get_footer(); ?>
