<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="container-fluid" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; height: 400px; background-position: center;"></div>

			<div class="container-fluid posts-bkg">
				<div class="container post-content p-30">
					<div class="mx-auto col-xl-8 col-lg-10 col-12">
					<!-- post title -->
						<h1 class="text-center uppercase fs-30"><?php the_title(); ?></h1>
						<!-- /post title -->

						<div class="post-details mt-30 mb-20">
							<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author(); ?></span>
							<span class="date"> le <?php the_time('j F Y'); ?></span>
							<span class="float-right hidden-xs"><b><a href="/actualites"><i class="fa fa-angle-left fs-16 ml-15 mr-15" aria-hidden="true"></i>Retour page articles</a></b></span>
						</div>
						<div class="text-justify post-text">
							<?php the_content(); ?>
						</div>
						<div class="row justify-content-center posts-pagination mt-50	mb-30">
							 <?php posts_nav_link(' &#183; ', 'Prec', 'Suiv'); ?>
							  <span class="nav-previous previus-post"><?php previous_post_link(); ?></span>
							  <span class="ml-15 mr-15">|</span>
							  <span class="nav-next next-post"><?php next_post_link(); ?></span>

						</div>
						<div class="row mb-30">
							<span><b><a href="#"><i class="fa fa-angle-left fs-16 ml-15 mr-15" aria-hidden="true"></i>Retour page articles</a></b></span>
						</div>
						<div class="row justify-content-center social-share mb-15">
							<p class="fs-16 text-center">PARTAGEZ</p>
						</div>
						<div class="row justify-content-center mb-50">
							<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook-official fs-18 mr-30" aria-hidden="true"></i></a>
							<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus fs-18 ml-30" aria-hidden="true"></i></a>
						</div>
						<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
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
	<!-- /section -->
	</main>

<?php get_footer(); ?>
