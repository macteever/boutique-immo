<?php get_header(); ?>
	<main role="main">
		<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container-fluid single-top-bkg" style="background: -webkit-linear-gradient(180deg, #000000 0%, rgba(0,0,0,0.65) 63%, rgba(0,0,0,0.09) 39%, rgba(0,0,0,0.42) 100%);
				 background: -o-linear-gradient(rgba(71,71,71,0.58) 0%, rgba(71,71,71,0.58) 100%);
				 background: linear-gradient(rgba(71,71,71,0.32) 0%, rgba(71,71,71,0.58) 100%),
				 url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>)">
				 <div class="container h-100">
					<div class="row align-items-end h-100">
						<div class="col-auto mx-auto fs-18 blog-title ls-3">
							<h3><?php the_field('blog_title', 'option'); ?></h3>
						</div>
					</div>
				 </div>
				</div>
				<div class="container-fluid single-post-container">
					<div class="container">
						<div class="row">
							<div class="col-xl-9 col-lg-9 col-12 single-post-content p-relative">
								<?php
								$categories = get_the_category();
								$category_name = $categories[0]->cat_name;
								?>
								<p class="fs-18 text-immo fw-600 mt-20 mb-0"><?php echo $category_name ?></p>
								<h1 class="fs-72 fw-700 mb-10 mt-0"><?php the_title(); ?></h1>
								<div class="text-grey fs-17 d-flex justify-content-between">
									<p class="">Publier par <span class="fw-600"><?php the_author(); ?></span></p>
									<p class=""><?php the_date(); ?></p>
								</div>
								<div class="row-share-post">
									<span class="ls-3 fs-13 uppercase mr-20">Partagez</span>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook-official fs-18 " aria-hidden="true"></i></a>
								</div>
								<div class="fs-18 lh-28 mt-30">
									<?php the_content(); ?>
								</div>
								<div class="row single-back-blog justify-content-between mt-80">
									<div class="">
										<a class="fs-17 text-black fw-600 read-more-after d-flex align-items-center" href="<?php echo home_url() . '/blog'; ?>"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.svg" alt="agence immobilière bordeaux"/> Retour aux articles</a>
									</div>
								</div>
								<div class="row posts-pagination mt-30 mb-30">
									<div class="col-12 justify-content-between d-flex">
										<?php posts_nav_link(' &#183; ', 'Prec', 'Suiv'); ?>
										<span class="fs-15 fw-300"><?php previous_post_link(); ?></span>
										<span class="fs-15 fw-300"><?php next_post_link(); ?></span>
									</div>
								</div>
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
		            <div class="tmplt-blog-category recent-posts pl-15 mt-50">
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
		                     <div class="d-flex align-items-center mb-20">
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
					</div>
				</div>
			</article>
			<!-- /article -->
		<?php endwhile; ?>

		<?php else: ?>
			<!-- article -->
			<article>
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</article>
			<!-- /article -->
		<?php endif; ?>
		</section>
	</main>

<?php get_footer(); ?>
