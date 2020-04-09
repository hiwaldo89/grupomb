<?php
/**
 * Template Name: Proyectos
 */
get_header(); ?>
<section class="changeHamburger">
	<h1 class="sr-only">Proyectos</h1>
	<div id="categories-collapsable" class="collapse categories-menu-wrapper text-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="categories-menu-title">
						<a href="#" id="categories-hide-btn"><i class="fa fa-times"></i></a>
						Categorías
					</div>
					<a href="#" class="category-filter" data-filter="*">Todas</a>
				</div>
			</div>
			<div class="row pt-5">
				<?php
					$projectCats = get_terms('project-category');

					$totalItems = count($projectCats);

					$projectCatsCol1 = array_slice($projectCats, 0, ceil($totalItems/2));
					$projectCatsCol2 = array_slice($projectCats, ceil($totalItems/2), ceil($totalItems/2));
				?>

				<div class="col-lg-4 ml-auto">
					<ul class="list-unstyled">
						<?php foreach($projectCatsCol1 as $project) : ?>
							<li class="my-3"><a class="category-filter" href="#" data-filter=".<?php echo $project->slug; ?>"><?php echo $project->name; ?></a></li>
						<?php endforeach; ?>
						<!--<li class="my-3"><a href="#">Desarrollos inmobiliarios</a></li>
						<li class="my-3"><a href="#">Comerciales y corporativos</a></li>
						<li class="my-3"><a href="#">Urbanismo</a></li>
						<li class="my-3"><a href="#">Desarrollos turísticos</a></li>-->
					</ul>
				</div>
				<div class="col-lg-4 mr-auto">
					<ul class="list-unstyled">
						<?php foreach($projectCatsCol2 as $project) : ?>
							<li class="my-3"><a class="category-filter" href="#" data-filter=".<?php echo $project->slug; ?>"><?php echo $project->name; ?></a></li>
						<?php endforeach; ?>
						<!--<li class="my-3"><a href="#">Comunitarios y culturales</a></li>
						<li class="my-3"><a href="#">Educativos</a></li>
						<li class="my-3"><a href="#">Institucionales</a></li>
						<li class="my-3"><a href="#">Nuevos proyectos</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div id="categories-btn-wrapper" class="row py-2">
			<div class="col-md-4 col-lg-3 ml-auto">
				<a href="#" id="categories-show-btn" class="categories-show-btn">Categorías</a>
			</div>
		</div>
		<div class="row grid">
			<?php
				$args = array(
					'post_type' 		=> 'proyecto',
					'posts_per_page'	=> -1
				);

				$projectLoop = new WP_Query($args);
			?>
			<?php if($projectLoop->have_posts()) : while($projectLoop->have_posts()) : $projectLoop->the_post(); ?>
				<?php
					$projectCats = get_the_terms($post, 'project-category');
					$projectFilterClasses = "";
					//echo $projectFilterClasses;
					foreach($projectCats as $projectCat) {
						$projectFilterClasses.= ' ' . $projectCat->slug;
					}
				?>

				<div class="col-md-4 col-lg-3 mb-4 grid-item<?php echo $projectFilterClasses; ?>">
					<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()) {
							$projectImg = get_the_post_thumbnail_url();
						} else {
							$projectImg = 'https://via.placeholder.com/800x800';
						} ?>
						<!--<div class="project" style="background-image: url(<?php echo $projectImg; ?>);">
							<div class="project__inner p-4">
								<h2 class="h5 mt-auto"><?php the_title(); ?></h2>
								<span><?php the_field('ubicacion'); ?></span>
							</div>
						</div>-->
						<div class="project-wrapper">
							<div class="project" style="background-image: url(<?php echo $projectImg; ?>);"></div>
							<div class="project-inner p-4">
								<h2 class="h5 mt-auto"><?php the_title(); ?></h2>
								<span><?php the_field('ubicacion'); ?></span>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
