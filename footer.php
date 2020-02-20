				<div id="modal-overlay-2">
					<div class="modal-background d-flex align-items-center anim-300">
						<div class="modal">
							<?php  get_template_part("includes/register-form"); ?>
						</div>
					</div>
				</div>
				<div id="modal-overlay" class="anim-300">
					<div class="modal-background anim-300">
						<div class="modal">
							<?php  get_template_part("includes/form-deposer"); ?>
						</div>
					</div>
				</div>
				<!-- footer -->
				<footer class="footer" role="contentinfo">
					<div class="container-fluid" id="contact">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-xl-4 col-lg-4 col-12 footer-bloc-resp">
									<h3 class="text-white fs-17 uppercase mb-30 fw-600"><img class="mr-10" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white-bis.svg" alt="agence immobilière Bordeaux"></h3>
									<div class="text-white fs-13 footer-contacter mw-80 ls-1">
										<?php the_field('footer_infos', 'option'); ?>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-12 footer-bloc-resp">
									<h3 class="text-white fs-17 mb-30 fw-600">Nous contacter</h3>
									<div class="text-white fs-15">
										<div class="d-flex footer-coord text-white mb-10"><img class="mr-10" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-mail.svg" alt=""/><?php the_field('footer_mail', 'option'); ?></div>
										<div class="d-flex footer-coord text-white mb-10"><img class="mr-10" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-marker.svg" alt=""/><?php the_field('footer_address', 'option'); ?></div>
										<div class="d-flex footer-coord text-white"><img class="mr-10" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-phone.svg" alt=""/><?php the_field('footer_phone', 'option'); ?></div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-12 footer-bloc-resp">
									<h3 class="text-white fs-17 mb-30 fw-600">Rester connecté</h3>
									<div class="text-white fs-15">
										<?php echo do_shortcode('[mc4wp_form id="43"]'); ?>
									</div>
									<div class="text-white fs-15 mt-10">
										<h4>Nous suivre :</h4>
										<div class="d-flex footer-rs">
											<a target="_blank" href="https://www.facebook.com/agencetwist/"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-fb.svg" alt="agence immobilière bordeaux"/></a>
											<a target="_blank" href="https://www.instagram.com/agencetwist/"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-insta.svg" alt="agence immobilière bordeaux"/></a>
											<a target="_blank" href="https://www.linkedin.com/company/agencetwist/"><img class="mr-20" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-linkedin.svg" alt="agence immobilière bordeaux"/></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container-fluid subfooter">
						<div class="container">
							<div class="row text-white fs-13">
								<div class="col-12 text-white text-center uppercase d-flex flex-wrap justify-content-center fs-13 ls-2">
									<?php echo get_bloginfo(); ?>© -
									<?php echo get_the_date('Y'); ?> -
									<a class="text-white" href="<?php echo home_url() . '/mentions-legales'; ?>">Mentions légales</a> -
									<a class="text-white" href="<?php echo home_url() . '/conditions-generales-de-vente'; ?>">CGV</a>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- /footer -->
			</div>
			<!-- /mobileBodyContent -->
		</div>
		<!-- /wrapper -->
		
		<?php wp_footer(); ?>

	</body>
</html>
