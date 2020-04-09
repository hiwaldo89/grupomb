<?php get_header(); ?>
<section class="py-5 changeHamburger">
	<div class="container">
		<a href="<?php echo get_permalink( get_page_by_path( 'proyectos' )); ?>" class="btn-mb d-inline-block mb-5">Todos los proyectos</a>
		<div class="row">
			<?php if(have_rows('slider_1')) : ?>
				<div class="col-lg-4">
					<div class="project-slider">
						<?php while(have_rows('slider_1')) :  the_row(); ?>
							<?php $slideImg = get_sub_field('imagen'); ?>
							<div class="project-slider__slide" style="background-image: url(<?php echo $slideImg['url']; ?>);"></div>
						<?php endwhile; ?>
					</div>
					<div class="project-slider-meta d-flex justify-content-between align-items-center">
						<div class="project-slider-arrows"></div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(have_rows('slider_2')) : ?>
				<div class="col-lg-4">
					<div class="project-slider">
						<?php while(have_rows('slider_2')) :  the_row(); ?>
							<?php $slideImg = get_sub_field('imagen'); ?>
							<div class="project-slider__slide" style="background-image: url(<?php echo $slideImg['url']; ?>);"></div>
						<?php endwhile; ?>
					</div>
					<div class="project-slider-meta d-flex justify-content-between align-items-center">
						<div class="project-slider-arrows"></div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(have_rows('slider_3')) : ?>
				<div class="col-lg-4">
					<div class="project-slider">
						<?php while(have_rows('slider_3')) :  the_row(); ?>
							<?php $slideImg = get_sub_field('imagen'); ?>
							<div class="project-slider__slide" style="background-image: url(<?php echo $slideImg['url']; ?>);"></div>
						<?php endwhile; ?>
					</div>
					<div class="project-slider-meta d-flex justify-content-between align-items-center">
						<div class="project-slider-arrows"></div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row mt-5">
			<div class="col-lg-4 d-flex flex-column">
				<div class="pb-4">
					<h1 class="h5"><?php the_title(); ?></h1>
					<span class="h6"><?php the_field('ubicacion'); ?></span>
				</div>
				<div class="mt-auto">
					<a href="<?php echo get_permalink( get_page_by_path( 'contacto' )); ?>" class="btn-mb">Contáctanos</a>
				</div>
			</div>
			<div class="col-lg-4">
				<?php the_field('brief_del_proyecto'); ?>
			</div>
			<div class="col-lg-4">
				<?php if(have_rows('ficha_tecnica')) : while(have_rows('ficha_tecnica')) : the_row(); ?>
					<div class="mb-4">
						<h2 class="h6 mb-0"><?php the_sub_field('titulo'); ?>:</h2>
						<p><?php the_sub_field('contenido'); ?></p>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
