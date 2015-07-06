<?php
/*
Template Name: People list Type C
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="clearfix container1160">
		<div id="main" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
					<header>
						<div class="page-header">
							<div class="container container620">
								<div class="row">
									<div class="col-sm-12">
										<h1><?php the_title(); ?></h1>
									</div>
								</div>
							</div>
						</div>
					</header>
					<section class="clearfix">
						<div class="container container620">
							<div class="row">
								<div class="col-sm-12 text_big mt_32">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
					<section class="post_content clearfix mb_80">
						<div class="container container620">
							<div class="row">
								<div class="col-sm-12">
									<?php
									$args = array(
										'post_type' => 'people',
										'tax_query' => array(
											array(
												'taxonomy' => 'role',
												'field' => 'slug',
												'terms' => get_field('roles')->name,
											)
										)
									);
									$query = new WP_Query( $args );
									while ($query->have_posts() ) :
									$query->the_post();
									?>
									<div class="row mt_50">
										<div class="col-sm-3 col-xs-12">
											<div class="mb_20 bg_image">
												<?php the_post_thumbnail( 'people-thumb-sm' ); ?>
											</div>	
										</div>
										<div class="col-sm-9 col-xs-12">		
											<p><strong><?php the_title(); ?></strong></p>					
											<p><?php the_content(); ?></p>	
											<div class="row mt_15" style="overflow:hidden;">
												<?php if(get_field('social_link_1')) : ?>
													<div class="col-sm-12 text_indent">
														<a href="<?php echo get_field('social_link_1')?>" class="more_info" target="_blank"><?php echo get_field('social_label_1'); ?></a>
													</div>
												<?php endif; ?>
												<?php if(get_field('social_link_2')) : ?>
													<div class="col-sm-12 text_indent">
														<a href="<?php echo get_field('social_link_2')?>" class="more_info" target="_blank"><?php echo get_field('social_label_2'); ?></a>
													</div>
												<?php endif; ?>
												<?php if(get_field('social_link_3')) : ?>
													<div class="col-sm-12 text_indent">
														<a href="<?php echo get_field('social_link_3')?>" class="more_info" target="_blank"><?php echo get_field('social_label_3'); ?></a>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<?php
									endwhile;
									wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					</section>				
					<footer>
						<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
					</footer> <!-- end article footer -->
				</article> <!-- end article -->
			<?php endwhile; ?>	
			
			<?php else : ?>
			
				<article id="post-not-found">
					<header>
						<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					</header>
					<section class="post_content">
						<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					</section>
					<footer>
					</footer>
				</article>			
			<?php endif; ?>
		</div>
	</div>
	<?php require_once(get_template_directory()."/partials/pagenavigation.php"); ?>


<?php get_footer(); ?>