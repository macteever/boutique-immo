<?php get_header(); ?>

	<main role="main" id="default-content">
		<!-- section -->
		<section id="blog-top" class="container-fluid" style="background: -webkit-linear-gradient(321deg, rgba(0,0,0,0.58) 0%, rgba(0,0,0,0.58) 100%);
		 background: -o-linear-gradient(rgba(0,0,0,0.58) 0%, rgba(0,0,0,0.58) 100%);
		 background: linear-gradient(rgba(0,0,0,0.32) 0%, rgba(0,0,0,0.58) 100%),
		 url(<?php the_field('blog_top_bkg', 'option'); ?>)">
		 <div class="container h-100">
			<div class="row align-items-end h-100">
				<div class="col-12 blog-title">
					<h1 class="text-white fs-52"><?php the_title(); ?></h1>
				</div>
			</div>
		 </div>
		</section>
		<section id="primary" class="content-area">
			<main id="main" class="site-main-default container-fluid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="container">
						<div class="row justify-content-center mt-100 mb-100">
							<div class="col-12 col-default-content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php
					endwhile; // End of the loop.
					?>
			</main><!-- #main -->
		</section><!-- #primary -->
		<!-- /section -->
	</main>

<?php get_footer(); ?>
