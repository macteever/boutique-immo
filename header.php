<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117506952-10"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-117506952-10');
		</script>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) // { echo ' :'; }  bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta name="p:domain_verify" content="f8af4152c33d0b152b38a2f5bda09f23"/>
  		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
  		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
		conditionizr.config({
			assets: '<?php echo get_template_directory_uri(); ?>',
			tests: {}
		});
    </script>
	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div class="wrapper demo2" id="mobile">
			<div id="burgerBtn"></div>
			<div class="sideMenu">
				<div><?php //  include 'logo.php'; ?></div>
				<?php wp_nav_menu( array( 'theme_location' => 'burger-menu' ) ); ?>
			</div>

			<!-- START mobileBodyContent -->
			<div id="mobileBodyContent">
				<!-- header -->
				<header class="header anim-300 clear nav-down" role="banner">
					<!-- nav -->
					<div class="container-fluid menu-container anim-700">
						<?php require 'includes/header-left.php'; ?>
					</div>
					<!-- /nav -->
				</header>
				<!-- /header -->
				<div id="honoraire" class="d-flex align-items-center anim-300">
					<a class="text-white d-flex align-items-center fs-15" target="_blank" href="<?php the_field('bareme_honoraires', 'option'); ?>"> <i class="material-icons text-white fs-36">info</i><span class="text-white fs-15 ml-10 mr-10"> Barème honoraires</span></a>
				</div>

			
			