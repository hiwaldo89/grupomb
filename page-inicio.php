<?php
/**
 * Template Name: Home
 */
get_header(); ?>

<?php $hero = get_field('welcome_section'); ?>
<?php $heroBtn = $hero['boton']; ?>
<section class="welcome-hero text-white">
	<h1 class="sr-only">Grupo MB, espacios inmobiliarios</h1>
	<div class="welcome-hero-slider">
		<?php if(have_rows('welcome_section_slider')) : while(have_rows('welcome_section_slider')) : the_row(); ?>
			<div class="welcome-hero-slider__slide d-flex align-items-center filter" style="background-image: url(<?php echo the_sub_field('imagen'); ?>);">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-lg-8">
							<img src="<?php echo $hero['logo']['url']; ?>" alt="<?php echo $hero['logo']['alt']; ?>" width="120" class="mb-4">
							<div class="mb-4">
								<?php echo $hero['texto']; ?>
							</div>
							<a href="<?php echo $heroBtn['btn_link']; ?>" class="gmb-btn"><?php echo $heroBtn['btn_text']; ?></a>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>
<!-- <section class="welcome-hero text-white filter" style="background-image: url(<?php echo $hero['imagen']['url']; ?>);">
	<h1 class="sr-only">Grupo MB, espacios inmobiliarios</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-8">
				<img src="<?php echo $hero['logo']['url']; ?>" alt="<?php echo $hero['logo']['alt']; ?>" width="120" class="mb-4">
				<?php echo $hero['texto']; ?>
			</div>
		</div>
	</div>
</section> -->
<?php get_footer(); ?>
