<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="container-fluid" id="page-404">
			<div class="container">
				<section class="row align-items-center">
					<div class="col-xl-8 col-lg-8 col-md-10 col-12 mx-auto text-center">
						<h1 class="poppins fs-44 text-center"><?php _e( 'Page not found', 'html5blank' ); ?></h1>
						<h2 class="poppins fs-20 text-center">
							<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
						</h2>
					</div>
				</section>
			</div>
		</div>
	</main>


<?php get_footer(); ?>
