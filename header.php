<!doctype html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
	<!-- Required Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?= body_class() ?>>
	
	<!-- App Wrapper -->
	<div id="siteWrapper" data-barba="wrapper">

		<!-- Loader -->
		<?php get_template_part( 'templates/loader--fill-logo' ) ?>

		<!-- Decoration Grid -->
		<div id="siteGrid"></div>

		<!-- Scroll Progress -->
		<?php get_template_part( 'templates/scroll-progress' ) ?>

		<!-- Header -->
		<?php get_template_part( 'templates/header' ) ?>

		<!-- Offcanvas Navigation -->
		<?php get_template_part( 'templates/offcanvas-navigation' ) ?>

		<!-- Scroll Smoother -->
		<div id="smooth-wrapper">
			<div id="smooth-content">

				<!-- Decoration Noise -->
				<div id="siteNoise"></div>

				<!-- App Content -->
				<main 
					id="siteMain" 
					data-barba="container" 
					data-barba-namespace="<?= get_the_title() ?>"
				>