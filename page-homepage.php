<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

			<!-- Default Theme -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php
				$pageId = $post->ID;
			?>
			<div class="row">
				<?php
				$posts = get_field('big_teaser_feature');
				if( $posts ): ?>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<?php $image = get_field('book_cover_big'); ?>
				<div id="homeTeaser" style="background: <?php the_field('teaser_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" class="container1160">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div id="homeTeaserText" class="col-md-12 clearfix">
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
											<div class="big_teaser_box ">
												<div class="vertical-center-outer">
													<div class="vertical-center">
														<div class="big_teaser_text <?php echo banner_class(get_field('banner_textcolor')); ?>">
															<div class="overflow_excerpt">
																<?php the_field('excerpt')?>
															</div>
															<div class="more_info">
																<a href="<?php the_permalink(); ?>">more</a>
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
					</div>
				</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
			</div>
			<section class="section about_meson container1160">
				<div class="container container620">
					<div class="container">
						<div class="row">
							<div class="col-md-12 clearfix">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 clearfix">
								<?php the_content(); ?>
								<a href="/about" class="more">more</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php
			$ids = get_field('featured_books',false,false);
			$rids = get_field('recommended_books',false,false);
			
			if(!empty($ids)){
				$the_query = new WP_Query(array(
					'post_type'			=> 'books',
					'post__in'			=> $ids
				));
				?>
				<section id="featuredBooks_home" class="section featured_home container1160">
					<div class="container1160">
						<div class="container">
							<div class="row">
								<div class="col-md-12 clearfix">
									<h2>Featured books</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 clearfix">
									<div id="featuresBooks_carousel" class="slick-slider-container">
										<div class="slider">
											<?php 
												
												$featuredBooksAmount = $the_query->post_count;
												while ( $the_query->have_posts() ) : 
												$the_query->the_post();
												?>		
												<div class="item">
													<?php
														$image = get_field('book_cover');
														$alt = $image['alt'];
														$size = 'book-thumb-sm';
														$thumb = $image['sizes'][ $size ];
														$width = $image['sizes'][ $size . '-width' ];
														$height = $image['sizes'][ $size . '-height' ];
													?>
													<a href="<?php the_permalink();?>" >
														<div>
															<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="auto" title="<?php echo get_copyright($image['id']) ?>" />
															
														</div>
													</a>
												</div>
												<?php 
												endwhile; 
												wp_reset_postdata();
											?>
										</div>
										
										<?php if($featuredBooksAmount > 6){ ?>
										<div class="carousel-nav mb_40 clearfix">
											<div id="featured_books_prev" class="carousel-control left">
												<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
											</div>
											<div id="featured_books_next" class="carousel-control right">
												<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
											</div>
										</div>
										<?php } ?>
										<div class="loadMore">
											<div class="button">
												<a href="<?php echo get_site_url()."/mesonbooks"; ?>">Load more books</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php
			}
			?>
		</div> <!-- Closing Fluid Container -->
		<?php 
			$ids = get_field('meson_news', false, false);
			$the_query = new WP_Query(array(
				'post_type'			=> 'post',
				'post__in'			=> $ids ,
			));
			$newsAmount = $the_query->post_count;
			if ($newsAmount > 0) {
		?>
		<div class="container-fluid clearfix">
			<section id="mesonnews" class="section news_home container1160">
				<div class="container1160">
					<div class="container">
						<div class="row">
							<div class="col-md-12 clearfix">
								<h2>Meson news</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 clearfix">
								<div id="mesonnews_carousel" class="slick-slider-container">
									<div class="row">	
										<div class="slider">
										<?php 
											while ( $the_query->have_posts() ) : 
												$the_query->the_post();
												?>		
												<div class="col-xs-4">
													<div class="box news-box twitter">
														<div class="col-xs-2 news-box-icon">
															<img src="<?php bloginfo('template_directory'); ?>/images/dot_clear.gif" width="40" height="40" />
														</div>
														<div class="col-xs-10">
															<div class="box-header">
																<?php if(has_post_thumbnail()) { ?>
																<div class="col-xs-12 featured-image">
																<?php the_post_thumbnail(); ?>
																</div>
																<?php } ?>
																<h3 class="box-title"><?php the_title(); ?></h3>
															</div>
															<div class="box-body">
																<?php 
																	$link = "<a href=\"".get_the_permalink()."\" class=\"more\">more</a>";
																	$content = get_the_content(); 
																	$amount = 200;
																	echo "<p>";
																	echo mb_strimwidth($content, 0, $amount, "...");
																	echo "</p>";
																	echo strlen($content) > $amount ? $link : "";
																?>
															</div>
														</div>
														<div class="clear-fix">&nbsp;</div>
													</div>
												</div>
												<?php
											endwhile;
											wp_reset_postdata();
										?>
										</div>
									</div>
									<?php if($newsAmount > 3){ ?>
									<div class="carousel-nav mb_40 clearfix">
										<div id="featured_news_prev" class="carousel-control left">
											<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
										</div>
										<div id="featured_news_next" class="carousel-control right">
											<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
										</div>
									</div>
									<?php } ?>
									<div class="loadMore">
										<div class="button">
											<a href="<?php echo get_site_url()."/blogs"; ?>">Load more news</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php
			}
		?>
		<div class="container-fluid clearfix">
			<section id="featuredbox" class="section boxes_home container1160">
				<div class="container1160 mb_40">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box author">
									<?php 
										$page = get_field('link_to_left_box', 49, false);
										$the_query = new WP_Query(array(
											'page_id'		=> $page,
										));
										while ( $the_query->have_posts() ) :
										$the_query->the_post();
										?>
											<h2><?php the_title(); ?></h2>
											<?php the_excerpt(); ?>		
											<div class="more_info">
												<a href="<?php the_permalink(); ?>">more information</a>
											</div>
										<?php
										endwhile;
										wp_reset_postdata();
									?>
								</div>
							</div>	
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box newsletter">
									<?php 
										$page = get_field('link_to_middle_box', 49, false);
										$the_query = new WP_Query(array(
											'page_id'		=> $page,
										));
										while ( $the_query->have_posts() ) : 
										$the_query->the_post();
										?>
											<h2><?php the_title(); ?></h2>
											<?php the_excerpt(); ?>
										<?php 
										endwhile; 
										wp_reset_postdata();
										?>
									<div class="box-body">
										<div class="newsletter newsletter-subscription">
											<form method="post" action="http://demo.meson.press/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
												<input id="newsletterRegistrationInput" class="register-input" type="email" name="ne" value="Your eMail address" required>
												<input class="register-submit btn-more" type="submit" value="Register"/>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="box openaccess">
									<?php 
										$page = get_field('link_to_right_box', 49, false);
										$the_query = new WP_Query(array(
											'page_id'		=> $page,
										));
										while ( $the_query->have_posts() ) : 
  										$the_query->the_post();
										?>
											<h2><?php the_title(); ?></h2>
											<?php the_excerpt(); ?>
											<div class="more_info">
												<a href="<?php the_permalink(); ?>">more information</a>
											</div>
										<?php 
										endwhile; 
										wp_reset_postdata();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
		</div>
		<?php
		if(!empty($rids)){
			$the_recommended_query = new WP_Query(array(
				'post_type'		=> 'externalbooks',
				'post__in'		=> $rids,
			));
			
			$recommendedAmount = $the_recommended_query->post_count;
		
		?>
		<div class="container-fluid clearfix">
			<section id="recommended" class="section recommended_home">
				<div class="container1160">
					<div class="container">
						<div class="row">
							<div class="col-md-12 clearfix">
								<h2 class="mb_40">People who read our books, could also be interested in</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div id="recommended_carousel" class="slick-slider-container">
									<div class="slider">
										<?php 
											
											while ( $the_recommended_query->have_posts() ) : 
											$the_recommended_query->the_post();
											?>	
											<div class="item">
												<div class="carousel_box_recommended ">
													<?php 
														$image = get_field('book_cover');
														$alt = $image['alt'];
														$size = 'book-thumb-mini';
														$thumb = $image['sizes'][ $size ];
														$width = $image['sizes'][ $size . '-width' ];
														$height = $image['sizes'][ $size . '-height' ];
													?>
													<a href="<?php the_permalink();?>" >
														<div style="width:<?php echo $width; ?>px">
															<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  title="<?php echo get_copyright($image['id']) ?>" />
														</div>
													</a>
													<br />
													<strong><?php the_title(); ?></strong>
													<?php the_content(); ?>
												</div>
											</div>
											<?php 
											endwhile; 
											wp_reset_postdata();
											
										?>
									</div>
									<?php if ($recommendedAmount > 6) { ?>
									<div class="carousel-nav mb_40 clearfix">
										<div id="recommended_books_prev" class="carousel-control left">
											<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
										</div>
										<div id="recommended_books_next" class="carousel-control right">
											<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
										</div>
									</div>
									<?php } ?>
									<div class="loadMore">
										<div class="button">
											<a href="<?php echo get_site_url()."/mesonbooks"; ?>">Load more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div> 
		<?php
			}
		?>
		<script type='text/javascript'>
		jQuery(document).ready(function($) {
			$('#featuredBooks_home .slider').slick({
				infinite: true,
				speed: 300,
				slidesToShow: 6,
				slidesToScroll: 6,
				arrows: false,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 980,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 4
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					}
				]
			});

			$('#featuredBooks_home .carousel-control.left').click(function(){
				$(this).parents(".slick-slider-container").children(".slider").slickPrev();
			});

			$('#featuredBooks_home .carousel-control.right').click(function(){
				$(this).parents(".slick-slider-container").children(".slider").slickNext();
			});

			$('#mesonnews_carousel .slider').slick({
				infinite: true,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 3,
				arrows: false,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 980,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			});

			$('#mesonnews_carousel .carousel-control.left').click(function(){
				$("#mesonnews_carousel .row").children(".slider").slickPrev();
			});

			$('#mesonnews_carousel .carousel-control.right').click(function(){
				$("#mesonnews_carousel .row").children(".slider").slickNext();
			});

			$('#recommended_carousel .slider').slick({
				infinite: true,
				speed: 300,
				slidesToShow: 6,
				slidesToScroll: 6,
				arrows: false,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 980,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 4
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					}
				]
			});

			$('#recommended_carousel .carousel-control.left').click(function(){
				$(this).parents(".slick-slider-container").children(".slider").slickPrev();
			});

			$('#recommended_carousel .carousel-control.right').click(function(){
				$(this).parents(".slick-slider-container").children(".slider").slickNext();
			});

		});
		</script>

<?php get_footer(); ?>