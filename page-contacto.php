<?php 
/**
 * Template Name: Contacto
 */
get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="py-5">
		<div class="container-fluid px-lg-0">
			<div class="row">
				<div class="col-lg-11 ml-auto">
					<div class="row">
						<?php $image = get_field('imagen'); ?>
						<div class="col-lg-4 px-lg-0 contact-image d-none d-lg-block" style="background-image: url(<?php echo $image['url']; ?>);"></div>
						<div class="col-lg-8 px-lg-0">
							<div id="map" class="custom-map"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-11 ml-auto mt-5">
					<div class="row align-items-center">
						<div class="col-lg-4 pl-lg-0">
							<?php the_content(); ?>
							<!-- <form class="mt-5"> 
								<div class="form-group">
									<label for="name" class="sr-only">Nombre</label>
									<input type="text" class="form-control" id="name" placeholder="Nombre">
								</div>
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="message" class="sr-only">Mensaje</label>
									<textarea class="form-control" id="message" placeholder="¿Cómo podemos ayudarte?" rows="5"></textarea>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-secondary">Enviar</button>
								</div>
							</form> -->
							<?php gravity_form( 1, false, false, false, false, true ); ?>
						</div>
						<div class="col-lg-8">
							<div class="row">
								<div class="col-lg-5 ml-auto py-5">
									<?php if(have_rows('datos_de_contacto')) : while(have_rows('datos_de_contacto')) : the_row(); ?>
										<div class="mb-5">
											<h2 class="h5"><?php the_sub_field('titulo'); ?></h2>
											<?php the_sub_field('contenido'); ?>
										</div>
									<?php endwhile; endif; ?>
								</div>
								<?php $secondaryImg = get_field('imagen_secundaria'); ?>
								<div class="col-lg-6 secondary-img" style="background-image: url(<?php echo $secondaryImg['url']; ?>);">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>