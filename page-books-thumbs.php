<?php
/*
Template Name: Books
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
					<?php 											
					$posts = get_field('featured_on_books_page');	
					if( $posts ): ?>
					<section class="section">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 small_titles">
									Featured
								</div>
							</div>
							<?php foreach( $posts as $post): ?>
							<?php setup_postdata($post); ?>	
							<div class="row mb_50">
								<div class="col-sm-12">
									<?php $image = get_field('book_cover_big'); ?>
									<div id="featuredBook_books" style="background: <?php the_field('teaser_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" >
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="big_teaser_box">
													<div class="vertical-center-outer">
														<div class="vertical-center <?php if (get_field('black_white_font') == 'White') { echo 'white_text'; } else { echo 'black_text'; } ?>">
															<div class="big_teaser_type">
																<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
																	<?php echo get_split_title($post->ID); ?>
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
															<div class="big_teaser_text">
																<strong>Author Query missing</strong><br />
																<?php the_title(); ?><br /><br />
																<em><?php the_excerpt(); ?></em>
																<div class="more_info">
																	<a href="<?php the_permalink(); ?>">read more</a>
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
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</section>
					<?php endif; ?>
					<div id="booktags" class="collapse in">	
					<section class="section">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 small_titles mt_32">
									Filter mic
								</div>
							</div>
						</div>
						<div class="container container620">
							<div class="row">
								<div class="col-sm-12 more_info mb_20">
									<?php $args = array(
										'format'                    => 'flat',
										'taxonomy'                  => 'book-tags', 
									); ?>
									<?php wp_tag_cloud( array( 'taxonomy' => 'book-tags', 'format' => 'flat' ) ); ?>
								</div>
							</div>
						</div>
					</section>
					</div>
					<div class="tag_toggle text-center">
						<input type="button" class="btn_tags" data-toggle="collapse" data-target="#booktags" style="background:#ffffff url(<?php bloginfo('stylesheet_directory'); ?>/images/icons/arrow_up.png) no-repeat center center;">
					</div>
					<section class="mb_80">
						<?php 
							$the_query = new WP_Query(array(
								'post_type'      	=> 'books',
							)); 
						?>
						<div class="container">
							<div class="row">
								<div class="col-sm-12 small_titles mt_32">
									<?php echo $the_query->found_posts; ?> Titles
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="mb_50 mt_30">
									<?php while ( $the_query->have_posts() ) :
									$the_query->the_post();
									$image = get_field('book_cover');
									$alt = $image['alt'];
									$size = 'book-thumb-sm';
									$thumb = $image['sizes'][ $size ];
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ]; ?>
									<div class="col-xs-6 col-sm-3 col-md-2 mb_20">
										<a href="<?php the_permalink();?>" >										        						
											<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
										</a>
									</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
						<?php wp_reset_postdata(); ?> 
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