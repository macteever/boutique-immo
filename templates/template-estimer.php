<?php /* Template Name: Estimer */ get_header(); ?>
<main role="main" class="main-estimer">
	<section class="container-fluid deposer-top">
		 <div class="container">
				<div class="row flex-column">
					<div class="col-xl-8 col-12 mx-auto">
						<h3 class="text-immo fs-20 fw-400 source-sans mb-10 text-immo-light apparition-2"><?php echo get_bloginfo(); ?></h3>
						<h1 class="fw-700 apparition-2 text-immo lh-1"><?php the_title(); ?></h1>
					</div>
				</div>
		 </div>
	</section>
	<section id="form-estimer" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- INTEGRATION IFRAME FOURNI PAR AC3 -->
					<?php //  get_template_part('includes/form-estimer'); ?>
					<iframe style="border: none;" width="100%" height="800" src=" https://platform.pericles.fr/ESTIMATION-iframe/#!/?idConfig=2206286"></iframe>

				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
