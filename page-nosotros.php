<?php
/**
 * Template Name: Nosotros
 */
get_header(); ?>
<?php $aboutUs = get_field('acerca'); ?>
<section id="about-us" class="py-5">
	<div class="container-fluid px-lg-0">
		<div class="row">
			<div class="col-lg-2 d-lg-flex align-items-center justify-content-center">
				<h1 class="h5 vertical-title"><?php echo $aboutUs['titulo']; ?></h1>
			</div>
			<div class="col-lg-10">
				<img src="<?php echo $aboutUs['imagen_de_seccion']['url']; ?>" alt="<?php echo $aboutUs['imagen_de_seccion']['alt']; ?>" class="img-fluid">
				<div class="row mt-5 text-cols-wrapper changeHamburger">
					<div class="col-md-6 col-lg-5 text-col">
						<div class="text-col__inner">
							<?php echo $aboutUs['columna_1']; ?>
						</div>
					</div>
					<div class="col-md-6 col-lg-5 text-col">
						<div class="text-col__inner">
							<?php echo $aboutUs['columna_2']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $services = get_field('servicios'); ?>
<section id="services" class="py-5 changeHamburger">
	<div class="container-fluid px-lg-0">
		<div class="row">
			<div class="col-lg-2 d-lg-flex align-items-center justify-content-center order-lg-2">
				<h2 class="h5 vertical-title"><?php echo $services['titulo']; ?></h2>
			</div>
			<div class="col-lg-10 order-lg-1">
				<img src="<?php echo $services['imagen']['url']; ?>" alt="<?php echo $services['imagen']['alt']; ?>" class="img-fluid">
				<div class="row mt-5 text-cols-wrapper">
					<div class="col-md-6 col-lg-5 ml-auto text-col">
						<div class="text-col__inner">
							<?php echo $services['columna_1']; ?>
						</div>
					</div>
					<div class="col-md-6 col-lg-5 mr-auto text-col">
						<div class="text-col__inner">
							<?php echo $services['columna_2']; ?>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-lg-10 mx-auto">
						<a href="<?php echo get_permalink( get_page_by_path( 'contacto' )); ?>" class="btn-mb d-inline-block">Contáctanos</a>
						<a href="<?php echo get_permalink( get_page_by_path( 'proyectos' )); ?>" class="btn-mb d-inline-block ml-5">Ver proyectos</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bg-black text-white py-5">
	<div class="container py-5">
		<div class="mb-tabs">
			<ul class="nav nav-tabs justify-content-between" role="tablist" id="myTab">
				<!--<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="true">Clientes</a></li>-->
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#filiales" role="tab" aria-controls="filiales" aria-selected="true">Filiales</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bolsa-trabajo" role="tab" aria-controls="bolsa-trabajo" aria-selected="false">Trabaja con nosotros</a></li>
			</ul>
			<div class="tab-content mt-5 pt-5" id="myTabContent">
				<!--<div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
					<div class="client-slider">
						<?php if(have_rows('clientes')) : while(have_rows('clientes')) : the_row(); ?>
							<div class="client-slide mx-4">
								<?php $clientImg = get_sub_field('imagen'); ?>
								<img src="<?php echo $clientImg['url']; ?>" class="img-fluid">
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>-->
				<div class="tab-pane fade show active" id="filiales" role="tabpanel" aria-labelledby="filiales-tab">
					<div class="filiales-slider">
						<?php if(have_rows('filiales')) : while(have_rows('filiales')) : the_row(); ?>
							<div class="filial-slide mx-4">
								<?php $filialImg = get_sub_field('imagen'); ?>
								<img src="<?php echo $filialImg['url']; ?>" class="img-fluid">
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
				<div class="tab-pane fade" id="bolsa-trabajo" role="tabpanel" aria-labelledby="bolsa-trabajo-tab">
					<?php if(have_rows('bolsa_de_trabajo')) : ?>
						<div class="bolsa-trabajo-slider">
							<?php while(have_rows('bolsa_de_trabajo')) : the_row(); ?>
								<div class="bolsa-trabajo-slide mx-5">
									<h3 class="h4 title-decoration mb-4"><?php the_sub_field('titulo'); ?></h3>
									<p class="mb-5"><?php the_sub_field('descripcion'); ?></p>
									<a href="#" class="btn-mb btn-mb--light">Enviar CV</a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php else : ?>
						<div class="text-center">
							<p>No hay vacantes disponibles en este momento</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
