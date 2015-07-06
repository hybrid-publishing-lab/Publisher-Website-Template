<?php
/*
Template Name: Series
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
								<div class="col-sm-12">
									<h3><?php the_content(); ?></h3>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix mb_80">
						<div class="container">
							<?php
								$tax = 'series';
								$tax_terms = get_terms($tax);
								if ($tax_terms) {
								  foreach ($tax_terms  as $tax_term) {
								    $args=array(
								      'post_type' => 'series-page',
								      $tax => $tax_term->slug,
								      'post_status' => 'publish',
								      'posts_per_page' => -1,
								    );							
								    $my_query = null;
								    $my_query = new WP_Query($args);
								    if( $my_query->have_posts() ) {
								      	while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<div class="row mt_30 mb_40">
											<div class="col-sm-12">
												<?php $image = get_field('series_big_teaser'); ?>
												<div class="featured_series" style="background: <?php the_field('series_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" >
													<div class="row">
														<div class="col-sm-6 col-xs-12" style="overflow:hidden;">
															<div class="big_teaser_box">
																<div class="vertical-center-outer">
																	<div class="vertical-center">
																		<div class="big_teaser_type <?php echo banner_class(get_field('banner_textcolor')); ?>">
																			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
																				<?php the_field('banner_keywords')?>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-6 col-xs-12">
															<div class="big_teaser_box">
																<div class="vertical-center-outer">
																	<div class="vertical-center">
																		<div class="big_teaser_text <?php echo banner_class(get_field('banner_textcolor')); ?>">
																			<div class="overflow_excerpt">
																				<?php the_field('excerpt')?>
																			</div>
																			<div class="more_info">
																				<a href="<?php the_permalink(); ?>">go to series</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								        <?php								      
								    endwhile;
								    }
								    wp_reset_query();
								  	}
								}
							?>
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