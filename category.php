<?php get_header(); ?>
<main role="main" class="main-content">
  <section id="blog-top" class="container-fluid" style="
  background: -webkit-linear-gradient(180deg, #000000 0%, rgba(0,0,0,0.65) 63%, rgba(0,0,0,0.09) 39%, rgba(0,0,0,0.42) 100%);
	 background: -o-linear-gradient(rgba(71,71,71,0.58) 0%, rgba(71,71,71,0.58) 100%);
	 background: linear-gradient(rgba(71,71,71,0.32) 0%, rgba(71,71,71,0.58) 100%),
	 url(<?php the_field('blog_top_bkg', 'option'); ?>)">
	 <div class="container h-100">
		<div class="row align-items-end h-100">
			<div class="col-auto text-white blog-title">
				<h1>Le blog</h1>
			</div>
		</div>
	 </div>
	</section>
  <div class="container-fluid tmplt-blog">
    <div class="container">
       <div class="row anim-300">
         <div class="col-xl-9 col-lg-9 col-12 d-flex flex-wrap blog-post-parent">
           <?php if (have_posts()): while (have_posts()) : the_post(); ?>
             <div class="col-12 blog-post d-flex mb-30">
               <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                 <div class="blog-post-content d-flex flex-column justify-content-center">
                   <span class="fs-15 fw-300 text-immo"><?php echo get_the_date(); ?></span>
                   <h3 class="fs-22 fw-600"><?php the_title(); ?></h3>
                   <div class="fs-15 text-grey mb-30">
                     <?php echo excerpt(15); ?>
                   </div>
                   <a class="fs-15 fw-600 read-more-after d-flex align-items-center" href="<?php the_permalink(); ?>">Lire la suite<img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.svg" alt="agence immobilière bordeaux"/></a>
                 </div>
                 <?php echo get_the_post_thumbnail( $post->ID, 'full ' ); ?>
               </a>
             </div>
           <?php endwhile; ?>
         <?php endif; ?>
         </div>
         <aside class="col-xl-3 col-lg-3 col-12">
           <div class="d-flex flex-column tmplt-blog-category pl-15">
             <h3 class="fw-300 fs-18 mb-15">Catégories</h3>
             <?php
             $terms = get_categories();
             foreach ($terms as $term){
                 $term_link = get_term_link($term);
               ?>
               <div class="blog-cat-tag">
                 <a href="<?php echo $term_link ?>" data-id="<?php; echo $term->term_id; ?>" data-slug="<?php echo $term->slug; ?>">
                   <h4 class='fs-18 text-black'><?php echo $term->name; ?></h4>
                 </a>
               </div>
             <?php }
             ?>
           </div>
           <div class="tmplt-blog-category recent-posts pl-15 mt-80">
             <h3 class="fw-300 fs-18 mb-30">Les derniers articles</h3>
             <?php
                 $the_query = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                 ));
              ?>
              <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                  <a class="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="d-flex align-items-center mb-30">
                        <?php the_post_thumbnail(); ?>
                        <div class="text-grey fs-12 d-flex flex-column ml-15">
                          <?php echo get_the_date(); ?>
                          <span class="fs-15 fw-600 text-black"><?php the_title(); ?></span>
                        </div>
                    </div>
                  </a>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

              <?php else : ?>
                <p><?php __('No Posts'); ?></p>
              <?php endif; ?>
           </div>
        </aside>
      </div>
      <div class="row blog-pagination justify-content-center">
        <?php echo paginate_links( $args ); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
