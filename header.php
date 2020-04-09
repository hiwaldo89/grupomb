<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Required meta tags -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<?php gravity_form_enqueue_scripts( 1, true ); ?>
		
		<?php wp_head(); ?>
	</head>
	<?php if(get_field('hamburger_color')) {
		$hamburgerModifier = 'hamburger-modify';
	} ?>
	<body <?php body_class(); ?>>

		<div class="hamburger-wrapper">
			<button class="hamburger hamburger--slider" type="button">
	  			<span class="hamburger-box">
	    			<span class="hamburger-inner"></span>
	  			</span>
			</button>
		</div>
		
		<nav class="main-navigation d-flex align-items-center justify-content-center flex-column">
			<?php $logo = get_field('logo', 'option'); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="120" class="mb-5"></a>
			<?php wp_nav_menu(array(
				'menu'			=> 'menu-1',
				'menu_class'	=> 'list-unstyled mb-0 text-center'
			)); ?>
			<div class="main-navigation__contact text-center p-5">
				<a href="mailto:<?php the_field('correo', 'option'); ?>"><?php the_field('correo', 'option'); ?></a><br>
				<a href="tel:<?php the_field('telefono', 'option'); ?>"><?php the_field('telefono', 'option'); ?></a>
			</div>
		</nav>