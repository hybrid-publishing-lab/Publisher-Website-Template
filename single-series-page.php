<?php
/*
Template Name: Series Details
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="clearfix container1160">
		<div id="main" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
					<header>
						<div class="page-header page-header-series">
							<div class="container container1160">
								<div class="nomargin">
									<a href="<?php echo site_url(); ?>/series">
										<i class="fa fa-chevron-left button_back"> </i>
									</a>
									<div class="small_titles"><a href="<?php echo site_url(); ?>/series">back</a></div>
									<?php require_once(get_template_directory()."/partials/socialbuttons.php"); ?>
								</div>
							</div>
						</div>
					</header>
					<section class="clearfix">
						<div class="container">
							<div class="row mt_30">
								<div class="col-xs-12">
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
																<em><?php the_field('excerpt')?></em>
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
					</section>
					<section class="clearfix">
						<div class="container container620">
							<div class="row">
								<div class="col-xs-12 text_big mt_32">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 text_big mt_32">
									<h2>Books belonging to this Series:</h2>
								</div>
							</div>
							<div class="row">
								<?php
									//for in the loop, display all "content", regardless of post_type,
									//that have the same custom taxonomy (e.g. genre) terms as the current post
									$backup = $post;  // backup the current object
									$found_none = '<h2>No related posts found!</h2>';
									$taxonomy = 'series';//  e.g. post_tag, category, custom taxonomy
									$param_type = 'series'; //  e.g. tag__in, category__in, but genre__in will NOT work
									$tax_args=array('orderby' => 'none');
									$tags = wp_get_post_terms( $post->ID , $taxonomy, $tax_args);
									if ($tags) {
									  	foreach ($tags as $tag) {
									    $args=array(
									      	$param_type => $tag->slug,
									      	'post__not_in' => array($post->ID),
									      	'post_type' => 'books',
									      	'posts_per_page'=>-1,
									      	'caller_get_posts'=>1
									    );
									    $my_query = null;
									    $my_query = new WP_Query($args);
									    if( $my_query->have_posts() ) {
									    while ($my_query->have_posts()) : $my_query->the_post(); ?>
									    <?php 	$image = get_field('book_cover');
												$alt = $image['alt'];
												$size = 'book-thumb-sm';
												$thumb = $image['sizes'][ $size ];
												$width = $image['sizes'][ $size . '-width' ];
												$height = $image['sizes'][ $size . '-height' ]; 
										?>	
										<div class="col-md-2 col-sm-3 col-xs-6 mb_20">											        						
											<a href="<?php the_permalink();?>" >
												<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
											</a>
										</div>
										    <?php $found_none = '';
										    endwhile;
										    }
										  }
										}
									if ($found_none) {
									echo $found_none;
									}
									$post = $backup;  // copy it back
									wp_reset_query(); // to use the original query again
								?>									
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



<?php get_footer(); ?>