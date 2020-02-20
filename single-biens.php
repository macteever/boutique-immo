 <?php acf_form_head(); ?>
 <?php get_header(); ?>
	<main role="main">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<section class="container-fluid">
			<div class="row slider-biens">
				<div class="biens-slide col-12 p-0">
					<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-fancybox="images">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="Agence twist bordeaux immoblière">
					</a>
				</div>
				<?php if ( have_rows('gallery_img') ): ?>
					<?php while ( have_rows('gallery_img') ) : the_row(); ?>
						<div class="biens-slide col-12 p-0">
							<?php
							// repeater galerie single biens
							$image = get_sub_field('img');
							if ( !empty($image) ): ?>
							<a href="<?php echo $image['url']; ?>" data-fancybox="images">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
							<?php endif; ?>
						</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</section>
		<section class="container-fluid pl-0 pr-0">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-12 single-bien-content pt-80 pb-50">
							<div class="pr-15">
								<?php $term_list = wp_get_post_terms($post->ID, 'taxonomy-biens', array("fields" => "all"));
								foreach($term_list as $term_single) {?>
								<span class="fs-18 fw-600 text-immo"><?php echo $term_single->name; ?></span>
								<?php } ?>
								<div class="d-flex flex-wrap justify-content-between mb-20">
									<h1 class="source-sans fw-700 fs-44 mt-0 mb-15"><?php the_title(); ?></h1>
									<?php get_header(); ?>
									<a class="fs-17 text-black fw-600 read-more-after d-flex align-items-center" href="<?php echo home_url() . '/biens'; ?>"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.svg" alt="agence immobilière bordeaux"/> Retour aux résultats</a>
								</div>
								<div class="d-flex justify-content-between align-items-center single-subtitle-infos">
									<div class="d-flex justify-content-between w-60 p-relative single-bien-data-forward">
										<?php
										$field = get_field_object('type');
										$value = $field['value'];
										$label = $field['choices'][ $value ];

										?>
										<p class="text-grey fs-15 before-type d-flex flex-column lh-1-25 pl-30 p-relative">Type de bien : <span class="fs-20 text-black fw-600"><?php echo esc_html($label); ?></span></p>
										<p class="text-grey fs-15 before-room d-flex flex-column lh-1-25 pl-30 p-relative">Pièces: <span class="fs-20 text-black fw-600"><?php the_field('rooms'); ?> pièces</span></p>
										<p class="text-grey fs-15 before-size d-flex flex-column lh-1-25 pl-30 p-relative">Superficie: <span class="fs-20 text-black fw-600"><?php the_field('surface'); ?> m2</span></p>
									</div>
									<span class="fs-24"><?php the_field('price'); ?> €</span>
								</div>
								<div class="d-flex justify-content-between align-items-center mt-30">
									<?php
          						if ( is_user_logged_in() && get_current_user_id() === get_the_author_meta('ID')) {?>
										<div>
											<button id="anim-modal" class="btn-edit-bien btn-brd-immo fs-15"><span>Modifier</span></button></div>
									<?php
									} 
									?>
									<div class="ml-auto"><a class="btn-immo fs-15" href="tel:+33<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a></div>
								</div>
								<div class="d-flex justify-content-end mt-15">
									<div class="row-share-post">
										<span class="ls-3 fs-13 uppercase mr-20">Partagez</span>
										<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook-official fs-18 " aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="fs-17 pt-50 pb-50 lh-28 p-relative">
									<?php the_field('description'); ?>
								</div>
								<div class="single-diagno mb-30">
									<h2 class="fs-20 fw-600 mb-30">Les diagnostiques énergétiques :</h2>
									<div class="d-flex">
										<div class="d-flex align-items-center mr-50">
											<h3 class="source-sans fs-17 fw-300 mb-0 mr-15">Conso énergétiques :</h3>
											<span class="fw-600 fs-20"><?the_field('DPE'); ?></span>
										</div>
										<div class="d-flex align-items-center mr-50">
											<h3 class="source-sans fs-17 fw-300 mb-0 mr-15">Gaz effet de Serre (GES) :</h3>
											<span class="fw-600 fs-20"><?the_field('GES'); ?></span>
										</div>
									</div>
								</div>
								<div class="single-more-infos">
									<h3 class="fs-20 fw-600 mb-30">Informations générales :</h3>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-12 d-flex flex-column">
											<div class="d-flex align-items-center mb-10">
												<?php
												$field = get_field_object('isRent');
												$value = $field['value'];
												$label = $field['choices'][ $value ];

												?>
												<h4 class="fw-300 mb-0 fs-17 mr-15">Transaction :</h4>
												<span class="fw-600 fs-18"><?php echo esc_html($label); ?></span>
											</div>
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">Ville :</h4>
												<span class="fw-600 fs-18"><?php the_field('city'); ?></span>
											</div>
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">Nombre de pièces :</h4>
												<span class="fw-600 fs-18"><?php the_field('rooms'); ?></span>
											</div>
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">Superficie :</h4>
												<span class="fw-600 fs-18"><?php the_field('surface'); ?> m2</span>
											</div>

										</div>
										<div class="col-xl-6 col-lg-6 col-12 d-flex flex-column">
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">Quartier :</h4>
												<span class="fw-600 fs-18"><?php the_field('adress'); ?></span>
											</div>
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">État général :</h4>
												<span class="fw-600 fs-18"><?php the_field('global_state'); ?></span>
											</div>
											<div class="d-flex align-items-center mb-10">
												<h4 class="fw-300 mb-0 fs-17 mr-15">Chauffage :</h4>
												<span class="fw-600 fs-18"><?php the_field('heat_mode'); ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-more-infos">
									<h3 class="fs-20 fw-600 mb-30">Autres informations :</h3>
									<div class="row">
										<div class="col-12 d-flex flex-wrap flex-column">
											<?php if( get_field('annual_taxeq') ): ?>
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Taxes annuelles :</h4>
													<span class="fw-600 fs-18"><?php the_field('annual_taxes'); ?></span>
												</div>
											<?php endif; ?>
										
											<?php if( get_field('exposition') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Exposition séjour :</h4>
													<span class="fw-600 fs-18"><?php the_field('exposition'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('taxes') ): ?>		
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Taxe foncière:</h4>
													<span class="fw-600 fs-18"><?php the_field('taxes'); ?>€</span>
												</div>
											<?php endif; ?>
											<?php if( get_field('lift') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Ascenseur :</h4>
													<span class="fw-600 fs-18"><?php the_field('lift'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('parking') ): ?>
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Parking :</h4>
													<span class="fw-600 fs-18"><?php the_field('parking'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('floor') ): ?>		
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Étage :</h4>
													<span class="fw-600 fs-18"><?php the_field('floor'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('max_floor') ): ?>		
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Nombre étages :</h4>
													<span class="fw-600 fs-18"><?php the_field('max_floor'); ?></span>
												</div>
											<?php endif; ?>
										</div>
										<div class="col-12 d-flex flex-column">
											
											<?php if( get_field('individual_heat') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Distribution chauffage :</h4>
													<span class="fw-600 fs-18"><?php the_field('individual_heat'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('creation_year') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Année de construction :</h4>
													<span class="fw-600 fs-18"><?php the_field('creation_year'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('bedrooms') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Chambres :</h4>
													<span class="fw-600 fs-18"><?php the_field('bedrooms'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('bathrooms') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Salle de bain :</h4>
													<span class="fw-600 fs-18"><?php the_field('bathrooms'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('toilets') ): ?>	
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Toilettes :</h4>
													<span class="fw-600 fs-18"><?php the_field('toilets'); ?></span>
												</div>
											<?php endif; ?>
											<?php if( get_field('normalized_surface') ): ?>
												<div class="d-flex align-items-center mb-10">
													<h4 class="fw-300 mb-0 fs-17 mr-15">Surface loi Carrez :</h4>
													<span class="fw-600 fs-18"><?php the_field('normalized_surface'); ?></span>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div id="modal-overlay-3" class="anim-300">
								<div class="modal-background">
									<div class="modal d-flex align-items-center h-100">
										<div class="modal-biens-content">
											<div class="d-flex justify-content-between">
												<h2 class="fs-28 fw-600">Modifiez votre annonce</h2>
												<button class="modal-close btn-immo">Fermer</button>
											</div>
											<?php if (get_current_user_id() === get_the_author_meta('ID')) { ?>
												<?php acf_form(array(
													'fields' => array(
														'field_5df003625f12d', 'field_5e2eff0f91175', 'field_5d7fa8f7a72f0','field_5d7fa8d8a72ef','field_5d7fa902a72f1','field_5df4d0ddb44da','field_5deea60d281be','field_5e2ae031bf9b7','field_5df4d1416a209','field_5df4d1574c19e', 'field_5df4d3ed4c1a0','field_5d7fa940a72f2', 'field_5df4d1794c19f',
													)
												)); ?>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<aside class="col-xl-4 col-lg-4 col-12 p-relative pl-30 pt-100">
							<div class="mb-50 single-360 p-relative">
					      <h3 class="fs-24 after-short-immo fw-600 mb-20">Visite virtuelle</h3>
								<a class="" target="_blank" href="<?php the_field('visit'); ?>">
									<div class="p-relative">
										<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="boutique immobilier">
										<div class="single-360-filter d-flex align-items-center justify-content-center flex-column">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-360.svg" alt="boutique immobilier bordeaux">
										</div>
									</div>
								</a>
					    </div>
						<div class="mb-50 d-flex flex-column">
							<h3 class="fs-24 after-short-immo fw-600 mb-20">Localisation</h3>
								<div class="d-flex align-items-center mb-10">
									<h4 class="fw-300 mb-0 fs-17 mr-15">Quartier :</h4>
									<span class="fw-600 fs-18"><?php the_field('adress'); ?></span>
								</div>
								<div class="d-flex align-items-center mb-10">
									<h4 class="fw-300 mb-0 fs-17 mr-15">Ville :</h4>
									<span class="fw-600 fs-18"><?php the_field('city'); ?></span>
								</div>
						</div>
						<?php
							$file = get_field('plans');
							if( $file ):
						?>
						<div>
					      <h3 class="fs-24 after-short-immo fw-600 mb-20">Plan</h3>
								<button type="button" class="btn-immo btn-plans anim-300"><a target="_blank" href="<?php echo $file['url']; ?>" class="d-flex align-items-center fs-22 fw-600 text-white">Voir les plans</a></br><!--<span class="fw-300 fs-14">Bientôt disponible</span>--></button>
						 </div>
						 <?php endif; ?>
						</aside>
					</div>
				</div>
			</article>
		</section>
		<section class="container-fluid related-biens">
			<?php get_template_part('includes/new-estate'); ?>
		</section>
			<!-- /article -->
		<?php endwhile; ?>

		<?php else: ?>
		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
		<!-- /article -->
	<?php endif; ?>
	</main>
	<script>
		$(document).ready(function(){
			var $modalTarget3 = $('.btn-edit-bien');
	
			$($modalTarget3).click(function(g){
				var buttonId3 = $(this).attr('id');
				$('#modal-overlay-3').removeAttr('class').addClass(buttonId3);
				$('body').addClass('modal-active');
			});
			
			$(document).mouseup(function(e) {
	
				var containerParent2 = $("#modal-overlay-3");
				var container2 = $("#modal-overlay-3 .modal-biens-content");
	
				// if the target of the click isn't the container nor a descendant of the container
				if (!container2.is(e.target) && container2.has(e.target).length === 0)
				{
					//console.log('pute');
					containerParent2.addClass('out');
					$('body').removeClass('modal-active');
				}
			});
			$('.modal-close').click(function(){
				$('#modal-overlay-3').addClass('out');
				$('body').removeClass('modal-active');
			});
		});
	</script>
<?php get_footer(); ?>