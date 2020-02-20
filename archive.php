<?php get_header(); ?>
<main role="main" class="main-content">
  <section id="blog-top" class="container-fluid" style="background: -webkit-linear-gradient(321deg, rgba(71,71,71,0.58) 0%, rgba(71,71,71,0.58) 100%);
	 background: -o-linear-gradient(rgba(71,71,71,0.58) 0%, rgba(71,71,71,0.58) 100%);
	 background: linear-gradient(rgba(71,71,71,0.32) 0%, rgba(71,71,71,0.58) 100%),
	 url(<?php the_field('blog_top_bkg', 'option'); ?>)">
	 <div class="container h-100">
		<div class="row align-items-end h-100">
			<div class="col-auto mx-auto fs-18 blog-title ls-3">
				<h1><?php the_field('blog_title', 'option'); ?></h1>
			</div>
		</div>
	 </div>
	</section>
  <div class="container-fluid tmplt-blog">
    <div class="container">
       <div class="row anim-300">
         <div class="col-xl-9 col-lg-9 col-md-6 col-12 d-flex flex-wrap">
           <?php if (have_posts()): while (have_posts()) : the_post(); ?>
             <div class="col-xl-6 col-lg-6 col-md-6 col-12 blog-post mb-30">
               <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                 <?php echo get_the_post_thumbnail( $post->ID, 'full ' ); ?>
                 <div class="blog-post-content text-center">
                   <?php
                   $categories = get_the_category();
                   $category_name = $categories[0]->cat_name;
                   ?>
                   <span class="fs-13 uppercase ls-2 mt-20"><?php echo $category_name ?></span>
                   <h3 class="fs-18 ls-3 text-center mt-20 mb-20"><?php the_title(); ?></h3>
                   <div class="fs-14 ls-3 text-left mb-30">
                     <?php echo excerpt(15); ?>
                   </div>
                   <a class="fs-12 uppercase ls-3 after-wave-brown" href="<?php the_permalink(); ?>">Lire la suite</a>
                 </div>
               </a>
             </div>
           <?php endwhile; ?>
         <?php endif; ?>
         </div>
         <aside class="col-xl-3 col-lg-3 col-md-6 col-12">
           <div class="d-flex flex-column tmplt-blog-category poppins uppercase fs-14 fw-300 text-center">
             <h3 class="fs-15 fw-500 ls-3 uppercase mb-15">catégories</h3>
             <?php
             $terms = get_categories();
             foreach ($terms as $term){
                 $term_link = get_term_link($term);
               ?>
               <div class="blog-cat-tag">
                 <a href="<?php echo $term_link ?>" data-id="<?php; echo $term->term_id; ?>" data-slug="<?php echo $term->slug; ?>">
                   <h4 class='fs-12 fw-500 ls-2 mb-0 text-black'><?php echo $term->name; ?></h4>
                 </a>
               </div>
             <?php }
             ?>
           </div>
           <div class="tmplt-blog-category recent-posts">
             <h3 class="fs-15 fw-500 ls-3 uppercase mb-20  text-center">Les derniers articles</h3>
             <?php
                 $the_query = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                 ));
              ?>
              <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                  <p class="d-flex mb-30">
                    <a class="d-flex align-items-center roboto-slab fs-15" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <?php the_post_thumbnail(); ?>
                      <span class="ls-3"><?php the_title(); ?></span>
                    </a>
                  </p>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

              <?php else : ?>
                <p><?php __('No Posts'); ?></p>
              <?php endif; ?>
           </div>
        </aside>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
