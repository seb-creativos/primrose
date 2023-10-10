<!doctype html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
	<!-- Required Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?= body_class() ?>>
	
	<!-- App Wrapper -->
	<div id="appWrapper" data-barba="wrapper">

		<?php if( get_theme_mod( 'enable_loader', true ) ): ?>
			<?php get_template_part( 'templates/loader' ) ?>
		<?php endif ?>

		<?php if( get_theme_mod( 'enable_decoration-filter', true ) ): ?>
			<div id="siteFilter"></div>
		<?php endif ?>
		
		<?php if( get_theme_mod( 'enable_scroll-progress-indicator', true ) ): ?>
			<?php get_template_part( 'templates/scroll-progress' ) ?>
		<?php endif ?>

		<!-- Header -->
		<?php get_template_part( 'templates/header' ) ?>

		<!-- Offcanvas Navigation -->
		<?php get_template_part( 'templates/offcanvas-navigation' ) ?>

		<!-- Scroll Smoother -->
		<div id="smooth-wrapper">
			<div id="smooth-content">

				<?php if( get_theme_mod( 'enable_decoration-noise', true ) ): ?>
					<div id="siteNoise"></div>
				<?php endif ?>

				<!-- App Content -->
				<main 
					id="siteMain" 
					data-barba="container" 
					data-barba-namespace="<?= get_the_title() ?>"
				>