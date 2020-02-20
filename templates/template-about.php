<?php /* Template Name: Concept */ get_header(); ?>
	<main role="main" class="concept-content o-hidden">
		<section class="container-fluid concept-top">
			<div class="container">
				<h3 class="text-immo-light fs-20 fw-400 source-sans apparition-2"><?php echo get_bloginfo(); ?></h3>
				<h1 class="fw-700 apparition-2 text-immo"><?php the_title(); ?></h1>
				<div class="mt-30">
					<a href="#concept-present" class="btn-immo apparition-2 fs-20">Découvrir</a>
				</div>
			</div>
		</section>
		<section id="concept-present" class="container-fluid">
			<?php if ( have_rows('concept_present') ): ?>
					<?php while ( have_rows('concept_present') ) : the_row(); ?>
					<div class="row concept-present-bkg" style="background: url(<?php the_sub_field('bkg'); ?>); background-size: cover; background-position: center;">
					</div>
					<div class="container concept-present-presta mw-80">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-12 fs-44 fw-600">
								<?php the_sub_field('title'); ?>
							</div>
							<div class="col-xl-6 col-lg-6 col-12 fs-20 lh-30 text-grey">
								<?php the_sub_field('content'); ?>
							</div>
						</div>
						<div class="row pt-80 pb-80 align-items-start">
							<?php if ( have_rows('concept_present_presta') ): ?>
									<?php while ( have_rows('concept_present_presta') ) : the_row(); ?>
										<div class="col-xl-3 col-lg-3 col-md-6 col-12 d-flex flex-column align-items-center justify-content-center mb-30">
											<?php
											$image = get_sub_field('icon');
											if ( !empty($image) ): ?>
											  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											<?php endif; ?>
											<h3 class="fs-24 text-center mt-30"><?php the_sub_field('label'); ?></h3>
										</div>
									<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
		</section>
		<section id="concept-offres" class="container-fluid">
			<?php get_template_part("includes/panel-offres"); ?>
		</section>
		<section id="concept-team" class="container-fluid">
			<div class="container">
				<div class="row justify-content-center mb-50">
					<div class="col-12 text-center">
						<h2 class="fs-32 text-immo fw-600">Notre équipe</h2>
					</div>
				</div>
				<?php if ( have_rows('concept_team_row') ) : ?>
					<?php while( have_rows('concept_team_row') ) : the_row(); ?>
						<div class="row mb-50">
							<div class="col-12 justify-content-center mb-30">
								<h3 class="text-grey text-center fs-18"><?php the_sub_field('concept_team_specs'); ?></h3>
							</div>
							<div class="col-12 d-flex flex-wrap justify-content-center">
								<?php if ( have_rows('concept_team') ): ?>
									<?php while ( have_rows('concept_team') ) : the_row(); ?>
										<div class="col-xl-3 col-lg-3 col-auto d-flex flex-column align-items-center justify-content-center mb-30">
											<?php
											$image = get_sub_field('photo');
											if ( !empty($image) ): ?>
												<img class="team-portrait" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											<?php endif; ?>
											<h3 class="fw-600 fs-20"><?php the_sub_field('nom'); ?></h3>
											<h4 class="fs-18 text-center"> <a class="text-immo" href="tel:+33<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a> </h4>
											<div class="fs-18 text-center text-immo"> <?php the_sub_field('secteur'); ?> </div>
											<div class="mt-15">
												<?php
												$link = get_sub_field('lien');
	
												if( $link ):
													$link_url = $link['url'];
													$link_title = $link['title'];
													?>
													<a class="btn-immo fs-15 d-flex align-items-center" href="<?php echo esc_url($link_url); ?>" > <i class="material-icons mr-10 fs-17 text-white">mail</i> Contacter </a>
												<?php endif; ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
		<section id="concept-agence" class="container-fluid">
			<div class="container">
				<div class="row justify-content-center">
					<?php if ( have_rows('concept_agence') ): ?>
						<?php while ( have_rows('concept_agence') ) : the_row(); ?>
							<div class="col-xl-5 col-lg-5 col-12 concept-agency-img">
								<?php
								$image = get_sub_field('img');
								if ( !empty($image) ): ?>
								  <img class="h-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<div class="col-xl-5 col-lg-5 col-12">
								<div class="agence-title fs-52 fw-700">
									<?php the_sub_field('title'); ?>
								</div>
								<div class="agence-subtitle text-grey fs-32">
									<?php the_sub_field('subtitle'); ?>
								</div>
								<div class="mt-30 fs-18 lh-28">
									<?php the_sub_field('content'); ?>
								</div>
								<div class="mt-30">
		              <?php
		              $link = get_sub_field('lien');

		              if( $link ):
		                $link_url = $link['url'];
		                $link_title = $link['title'];
		                ?>
		                <a class="btn-immo fs-18" href="<?php echo esc_url($link_url); ?>" ><?php echo esc_html($link_title); ?></a>
		              <?php endif; ?>
		            </div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="row mt-150">
					<?php if ( have_rows('concept_forward_agency') ): ?>
						<?php while ( have_rows('concept_forward_agency') ) : the_row(); ?>
							<div class="col-xl-4 col-lg-4 col-12 concept-forward-agency">
								 <div class="concept-forward-agency-child" style="background: -webkit-linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.55) 100%);
	 							 background: -o-linear-linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.55) 100%);
	 							 background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.55) 100%),
	 							 url(<?php the_sub_field('img'); ?>)">
									 <div class="text-center fs-24 fw-400 text-white">
										 <?php the_sub_field('content'); ?>
									 </div>
								 </div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<section id="concept-contact" class="container-fluid">
			<div class="container">
				<div class="row justify-content-center mb-50">
					<div class="col-12 text-center">
						<h2 class="fs-32 fw-600">Recrutement et Contact</h2>
					</div>
				</div>
				<div class="row justify-content-around align-items-end">
					<div class="col-xl-5 col-lg-6 col-12">
						<?php echo do_shortcode('[contact-form-7 id="7" title="Formulaire de contact"]'); ?>
					</div>
					<div class="col-xl-5 col-lg-6 col-12 pb-30">
						<?php if ( have_rows('concept_contact') ): ?>
							<?php while ( have_rows('concept_contact') ) : the_row(); ?>
								<div class="fs-32 fw-600 mb-30">
									<?php the_sub_field('title'); ?>
								</div>
								<div class="fs-18 text-grey lh-28 mb-30">
									<?php the_sub_field('content'); ?>
								</div>
								<div class="d-flex mb-10 fs-15 align-items-center"><img class="mr-15" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-mail.svg" alt=""/><?php the_sub_field('mail'); ?></div>
								<div class="d-flex mb-10 fs-15 align-items-center"><img class="mr-15" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-marker.svg" alt=""/><?php the_sub_field('adresse'); ?></div>
								<div class="d-flex fs-15 align-items-center"><img class="mr-15" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-phone.svg" alt=""/><?php the_sub_field('tel'); ?></div>
							<?php endwhile; ?>
						<?php endif; ?>
						<div class="text-grey fs-15 mt-30 concept-contact-rs">
							<h4>Nous suivre :</h4>
							<div class="d-flex">
								<a target="_blank" href="https://www.facebook.com/agencetwist/"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-fb-blk.svg" alt="agence immobilière bordeaux"/></a>
								<a target="_blank" href="https://www.instagram.com/agencetwist/"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-insta-blk.svg" alt="agence immobilière bordeaux"/></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
<!-- /container-fluid -->
<?php get_footer(); ?>
