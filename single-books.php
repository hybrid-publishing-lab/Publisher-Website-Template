<?php
/*
Template Name: Book Detail
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
									<a href="<?php echo site_url(); ?>/mesonbooks">
											<i class="fa fa-chevron-left button_back"> </i>
										</a>
									<div class="small_titles"><a href="<?php echo site_url(); ?>/mesonbooks">back</a></div>
									<?php require_once(get_template_directory()."/partials/socialbuttons.php"); ?>
								</div>
							</div>
						</div>
					</header>
					<section class="clearfix">
						<div class="container">
							<div class="row mt_30">
								<div class="col-sm-12">
									<?php $image = get_field('book_cover_big'); ?>
									<div class="featured_series" style="background: <?php the_field('teaser_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" >
										<div class="row">
											<div class="col-sm-6 col-xs-12" style="overflow:hidden;">
												<div class="big_teaser_box">
													<div class="vertical-center-outer">
														<div class="vertical-center">
															<div class="big_teaser_type <?php echo banner_class(get_field('banner_textcolor')); ?>">
																<?php the_field('banner_keywords')?>
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
																<?php the_field('excerpt')?>
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
					<section class="section clearfix">
						<div class="container container620">
							<div class="row text-center mt_32 mb_30">
								<div class="col-xs-12 col-sm-3">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/open_access.png" style="width:85px;height:30px;margin-top:3px;" width="85" height="30">
								</div>
								<?php if (get_field('book_forthcoming')) { ?>
									<div class="col-xs-12 col-sm-6 forthcoming">
										<h3><?php echo get_field('book_forthcoming'); ?></h3>
									</div>
								<?php } else { ?>
									<div class="col-xs-12 col-sm-3">
										<?php if(get_field('pdf_version')) : ?>
											<a href="<?php the_field('pdf_version')?>" class="more_info">
												<button class="btn-openaccess">PDF</button>
											</a>
										<?php endif; ?>
									</div>
									<div class="col-xs-12 col-sm-3">
										<?php if(get_field('epub_version')) : ?>
										<a href="<?php the_field('epub_version')?>" class="more_info">
											<button class="btn-openaccess">ePub</button>
										</a>
										<?php endif; ?>
									</div>
									<div class="col-xs-12 col-sm-3">
										<?php if(get_field('epub_version')) : ?>
											<a href="<?php echo site_url().'/read/'.$post->post_name; ?>" class="more_info">
												<button class="btn-openaccess">Read online</button>
											</a>
										<?php endif; ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</section>
					<?php 
						$forthcoming = get_field('book_forthcoming');
						if (empty($forthcoming)) { ?>
						<?php if(get_field('shop_link_1') || get_field('shop_link_2') || get_field('shop_link_3')) : ?>
							<section class="section clearfix">
								<div class="container container620">
									<div class="row text-center mb_30 mt_32">
										<div class="col-sm-12">
											<em>Buy print version via:</em>	
										</div>
										<div class="col-sm-12">					
											<?php if(get_field('shop_link_1')) : ?>
												<a href="<?php echo get_field('shop_link_1')?>" class="more_info" target="_blank" style="margin:0 15px;"><?php echo get_field('shop_label_1')?></a>
											<?php endif; ?>
											<?php if(get_field('shop_link_2')) : ?>
												<a href="<?php echo get_field('shop_link_2')?>" class="more_info" target="_blank" style="margin:0 15px;"><?php echo get_field('shop_label_2')?></a>
											<?php endif; ?>
											<?php if(get_field('shop_link_3')) : ?>
												<a href="<?php echo get_field('shop_link_3')?>" class="more_info" target="_blank" style="margin:0 15px;"><?php echo get_field('shop_label_3')?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</section>
						<?php endif; ?>
					<?php } ?>
					

					<section class="clearfix">
						<div class="container">
							<div class="row text-center mb_20 mt_32">
								<div class="col-sm-12">
									<ul class="bookdetails_list">
										<li>
											<?php if(get_field('language')) : ?>
												<em>Language&nbsp;&nbsp;</em><strong><?php the_field('language')?>&nbsp;&nbsp;&nbsp;</strong>
											<?php endif; ?>
											<?php if(get_field('pages')) : ?>
												<em>&nbsp;&nbsp;&nbsp;Pages&nbsp;&nbsp;</em><strong><?php the_field('pages')?></strong>
											<?php endif; ?>
										</li>
										<?php if(get_field('publishing_year')) : ?>
											<li>
												<span class="white-space:nowrap;"><em>Publishing Year&nbsp;&nbsp;</em><strong><?php the_field('publishing_year')?></strong></span>
											</li>
										<?php endif; ?>
										<?php   // Get terms for post
											 	$terms = get_the_terms( $post->ID , 'series' );
											 	if ( $terms != null ){
												 	foreach( $terms as $term ) {
														$term_link = get_term_link( $term );
														echo '<li><span class="white-space:nowrap;"><em>Series&nbsp;&nbsp;</em><a href="';
														echo bloginfo('url')."/series-page/".$term->slug.'"';
														echo 'class="more_info">'; 
														print $term->name ;
														echo '</a></strong></span></li>';
														unset($term);
													}
												} ?>
									</ul>
									<?php 
										$coins=make_coins($post); 
										echo $coins;
									?>
								</div>
								<div class="col-sm-12">	
									<ul class="bookdetails_list">
										<?php if(get_field('isbn_print')||get_field('isbn_pdf')||get_field('isbn_epub')) {
											$isbnAmount=0;
											if(get_field('isbn_print')){
												$isbnAmount++;
											}
											if(get_field('isbn_pdf')){
												$isbnAmount++;
											}
											if(get_field('isbn_epub')){
												$isbnAmount++;
											}
											$isbn_counter = 0;
											$multiple = ($isbnAmount>1) ? "s" : "";
											echo "<span class=\"white-space:nowrap;\"><em>ISBN".$multiple.": </em></span>"
											?>
										<?php }	?>
										<?php if(get_field('isbn_print')) : 
											$isbn_counter++;
										?>
											<li>
												<span class="white-space:nowrap;"><em>&nbsp;<?php echo get_field('isbn_print'); ?>&nbsp;(print)</em></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('isbn_pdf')) : 
											$isbn_counter++;
										?>
											<li>
												<span class="white-space:nowrap;"><em>&nbsp;<?php echo get_field('isbn_pdf'); ?>&nbsp;(PDF)</em></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('isbn_epub')) : 
											$isbn_counter++;
										?>
											<li>
												<span class="white-space:nowrap;"><em>&nbsp;<?php echo get_field('isbn_epub'); ?>&nbsp;(epub)</em></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('doi')) : ?>
											<li>
												<span class="white-space:nowrap;">DOI:</span>
											</li>
											<li>
												<span class="white-space:nowrap;"><em>&nbsp;<?php the_field('doi')?></em></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('available_as')) : ?>
											<li>
											<span class="white-space:nowrap;padding:0 10px;"><em>Available as&nbsp;<?php the_field('available_as')?></em>
											</li>
										<?php endif; ?>
									</ul>
								</div>
								
								<?php if(get_field('book_license')) { ?>
								<div class="col-sm-12">
									<ul class="bookdetails_list">
										<li>
											<em>License:&nbsp;</em>	
										</li>
										<li>
											<span style="white-space:nowrap;" class="more_info"><?php echo get_field('book_license'); ?></span>
										</li>
									</ul>
								</div>
								<?php } ?>
								
								<?php if(get_field('book_information_pdf') || get_field('citation_xml') || get_field('cover_jpg')) : ?>
								<div class="col-sm-12">		
									<ul class="bookdetails_list">
										<li>
											<em>Download:&nbsp;&nbsp;</em>	
										</li>		
										<?php if(get_field('book_information_pdf')) : ?>
											<li>
												<span style="white-space:nowrap;" class="more_info"><a href="<?php the_field('book_information_pdf')?>" download>BOOK INFORMATION (PDF)</a></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('citation_xml')) : ?>
											<li>
												<span style="white-space:nowrap;" class="more_info"><a href="<?php the_field('citation_xml')?>" download>CITATION (XML)</a></span>
											</li>
										<?php endif; ?>
										<?php if(get_field('cover_jpg')) : ?>
											<li>
												<span style="white-space:nowrap;" class="more_info"><a href="<?php the_field('cover_jpg')?>" download>COVER (JPG)</a></span>
											</li>
										<?php endif; ?>
									</ul>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</section>
					<section class="clearfix">
						<div class="container container620">
							<div class="row mb_10">
								<div class="col-sm-12" style="margin-top:20px;">
									<h1><?php echo the_title(); ?></h1>
									<?php if (get_field('subtitle')) { ?>
									<div class="text_indent subtitleHeadline">
										<h2><?php echo get_field('subtitle'); ?></h2>
									</div>
									<?php } ?>
								</div>
								
								<div class="col-sm-12 text_big">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
					<?php if(get_field('table_of_contents')) : ?>
					<section class="clearfix">
						<div class="container container620">
							<div class="row mb_30">
								<div class="col-sm-12 text_indent">
									<h2>Table of Contents</h2>
								</div>
								<!-- <div class="col-sm-12 text_indent text_chapters mb_8">
									<strong><a href="#"><?php //the_field('chapter')?></a></strong>
								</div> -->
								<div class="col-sm-12 text_indent text_chapters">
									<?php echo the_field('table_of_contents'); ?>
								</div>
							</div>
						</div>
					</section>
					<?php endif; ?>

					<?php
					$posts = get_field('editors');	
					if( $posts ): ?>
						<section class="clearfix">
							<div class="container container620">
								<div class="row mb_30">
									<div class="col-sm-12 text_indent">
										<h2>The Editor<?php echo (count($posts)>1) ? "s" : ""; ?></h2>
									</div>
									
									<?php foreach( $posts as $post): ?>
									<?php setup_postdata($post); 
									$tags = get_the_terms( $id, 'person-tags');
										if (is_array($tags)){
											//$values = array_map(function($tag) { return "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>"; }, $tags);
											$values = array_map(function($tag) { return "<li class=\"filter personTag\" data-filter=\".".custom_tag_escape($tag->slug)."\" ><span><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></span></li>"; }, $tags);
											$taglist = implode("",$values);
											$persontags = array_map(function($tag) { return $tag->slug; }, $tags);
										} else {
											//$taglist = "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>";
											$taglist = "<li class=\"filter personTag\" data-filter=\".".$tag->slug."\" ><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></li>";
											$persontags = array($tag->slug);
										}
									?>
										<div class="col-sm-6 col-xs-12 mb_40 mix <?php echo get_initials(get_the_title())." "; echo implode(" ",$persontags); ?>">
											<div class="mb_15 person-box">	
												<div class="author_image_sm">
													<a href="<?php the_permalink() ?>" >
													<?php the_post_thumbnail( 'people-thumb-sm' ); ?>
													</a>
												</div>
												<div class="author_info">
													<p><a href="<?php the_permalink() ?>" class="more-person"><?php the_title() ?></a></p>					
													<ul class="subinfo_author"><?php echo $taglist; //the_tags('', '<br />','' ); ?></ul>
												</div>
											</div>
											<?php if(get_field('quote')) : ?>
											<div class="quote_author col-md-12" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/quote.png)">
											<p>
												<?php the_field('quote')?>
											</p>
											</div>
											<?php endif; ?>
										</div>
		
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								</div>
							</div>
						</section>
					<?php endif; ?>

					<?php
					$posts = get_field('author');	
					if( $posts ): ?>
						<section class="clearfix">
							<div class="container container620">
								<div class="row mb_30">
									<div class="col-sm-12 text_indent">
										<h2>The Author<?php echo (count($posts)>1) ? "s" : ""; ?></h2>
									</div>
									
									<?php foreach( $posts as $post): ?>
									<?php setup_postdata($post); 
									$tags = get_the_terms( $id, 'person-tags');
										if (is_array($tags)){
											//$values = array_map(function($tag) { return "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>"; }, $tags);
											$values = array_map(function($tag) { return "<li class=\"filter personTag\" data-filter=\".".custom_tag_escape($tag->slug)."\" ><span><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></span></li>"; }, $tags);
											$taglist = implode("",$values);
											$persontags = array_map(function($tag) { return $tag->slug; }, $tags);
										} else {
											//$taglist = "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>";
											$taglist = "<li class=\"filter personTag\" data-filter=\".".$tag->slug."\" ><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></li>";
											$persontags = array($tag->slug);
										}
									?>
										<div class="col-sm-6 col-xs-12 mb_40 mix <?php echo get_initials(get_the_title())." "; echo implode(" ",$persontags); ?>">
											<div class="mb_15 person-box">	
												<div class="author_image_sm">
													<a href="<?php the_permalink() ?>" >
													<?php the_post_thumbnail( 'people-thumb-sm' ); ?>
													</a>
												</div>
												<div class="author_info">
													<p><a href="<?php the_permalink() ?>" class="more-person"><?php the_title() ?></a></p>					
													<ul class="subinfo_author"><?php echo $taglist; //the_tags('', '<br />','' ); ?></ul>
												</div>
											</div>
											<?php if(get_field('quote')) : ?>
											<div class="quote_author col-md-12" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/quote.png)">
											<p>
												<?php the_field('quote')?>
											</p>
											</div>
											<?php endif; ?>
										</div>
		
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								</div>
							</div>
						</section>
					<?php endif; ?>
					<?php if(get_field('reviews')) : ?>
					<section class="section clearfix">
						<div class="container container620">
							<div class="row mb_30">
								<div class="col-sm-12 text_indent">
									<h2>Reviews</h2>
								</div>
								<div class="col-sm-12 text_big mb_40">
										<?php the_field('reviews')?>
								</div>
							</div>
						</div>
					</section>
					<?php endif; ?>
					<?php if(get_field('tweet_a_quote')) : ?>
					<section class="section clearfix">
						<div class="container">
							<div class="row mb_10 mt_20">
								<div class="col-sm-12">
									<h2 class="nomargin">Tweet A Quote</h2>
								</div>
							</div>
						</div>
						<div class="container container620">
							<div class="row mb_30 mt_20">
								<div class="tweet_box col-xs-12 col-sm-6 text_big">
									<div class="tweet_box_grey">
										<p class="triangle-isosceles"><em><?php the_field('tweet_a_quote')?></em><p>
									</div>
									<div class="tweet_btn_container">
										<a href="http://twitter.com/share?text=<?php the_field('tweet_a_quote')?>&url=<?php get_page_link(); ?>" class="btn btn-large btn-primary">Tweet</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php endif; ?>	

					<?php   // Get terms for post
						$terms = get_the_terms( $post->ID , 'series' );
						if ( $terms != null ){
						 	foreach( $terms as $term ) { ?>
								<!-- Series begin -->
								<section class="clearfix mb_80 seperatorLine">
									<div class="container">
										<div class="row">
											<div class="col-sm-12 text_big mt_32">
												<h2>This book belongs to the <a href="<?php echo bloginfo('url')."/series-page/".$term->slug; ?>"><?php echo $term->name; ?></a></h2>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12 clearfix">
												<div id="featuresBooks_carousel" class="slick-slider-container">
													<div class="slider">
														<?php
															//for in the loop, display all "content", regardless of post_type,
															//that have the same custom taxonomy (e.g. genre) terms as the current post
															$backup = $post;  // backup the current object
															$found_none = '<h2>No related posts found!</h2>';
															$taxonomy = 'series';//  e.g. post_tag, category, custom taxonomy
															$param_type = 'series'; //  e.g. tag__in, category__in, but genre__in will NOT work
															$tax_args=array('orderby' => 'none');
															$tags = wp_get_post_terms( $post->ID , $taxonomy, $tax_args);
															
															if ($term) {
																$args=array(
																	$param_type => $term->slug,
																	'post__not_in' => array($term->ID),
																	'post_type' => 'books',
																	'posts_per_page'=>-1,
																	'caller_get_posts'=>1
																);
																$my_query = null;
																$my_query = new WP_Query($args);
																if( $my_query->have_posts() ) {
																	$seriesBooksAmount = $my_query->post_count;
																	while ($my_query->have_posts()) : $my_query->the_post(); ?>
																		<div class="item">
																			<?php 	$image = get_field('book_cover');
																					$alt = $image['alt'];
																					$size = 'book-thumb-sm';
																					$thumb = $image['sizes'][ $size ];
																					$width = $image['sizes'][ $size . '-width' ];
																					$height = $image['sizes'][ $size . '-height' ]; 
																			?>	
																			<div>											        						
																				<a href="<?php the_permalink();?>" >
																					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
																				</a>
																			</div>
																		</div>
																    <?php 
																    $found_none = '';
																    endwhile;
																     
																}
															}
															if ($found_none) {
																echo $found_none;
															}
															$post = $backup;  // copy it back
															wp_reset_query(); // to use the original query again
															
														?>
													</div>
													<?php if($seriesBooksAmount > 6){ ?>
													<div class="carousel-nav mb_40 clearfix">
														<div id="featured_books_prev" class="carousel-control left">
															<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
														</div>
														<div id="featured_books_next" class="carousel-control right">
															<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
														</div>
													</div>
													<?php } 
													$seriesBooksAmount = 0;
													?>
												</div>
											</div>
										</div>
									</div>
				
								</section>
					<?php
							unset($term);
							}
						}
					?>
					<!-- Series end -->
					<?php
						$rids = get_field('also_interesting', false, false);
							if (!empty($rids)){
								$the_query = new WP_Query(array(
									'post_type'			=> 'externalbooks',
									'post__in'			=> $rids
								));
					?>
					<section class="clearfix mb_80 seperatorLine">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text_big mt_32">
									<h2>This could also be interesting</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 clearfix">
									<div id="featuresBooks_carousel" class="slick-slider-container">
										<div class="slider">
											<?php
												$recommendedBooksAmount = $the_query->post_count;
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
														<div>
															<a href="<?php the_permalink();?>" >
																<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
															</a>
														</div>
													</div>
													<?php $found_none = false;
												endwhile;
												
												$post = $backup;  // copy it back
												wp_reset_query(); // to use the original query again
											?>
										</div>
										<?php if($recommendedBooksAmount > 6){ ?>
										<div class="carousel-nav mb_40 clearfix">
											<div id="featured_books_prev" class="carousel-control left">
												<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
											</div>
											<div id="featured_books_next" class="carousel-control right">
												<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
											</div>
										</div>
										<?php } 
										$seriesBooksAmount = 0;
										?>
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php
						}
					?>
					
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

				</article>			
			<?php endif; ?>
		</div>
	</div>

	<script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.slider').slick({
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

		$('.carousel-control.left').click(function(){
			$(this).parents(".slick-slider-container").children(".slider").slickPrev();
		});

		$('.carousel-control.right').click(function(){
			$(this).parents(".slick-slider-container").children(".slider").slickNext();
		});
	});
	</script>

<?php get_footer(); ?>