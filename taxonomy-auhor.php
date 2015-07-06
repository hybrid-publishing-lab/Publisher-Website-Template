<?php
/*
Template Name: Author Detail
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
								<div class="row">
									<div class="col-sm-12 nomargin">
										<a href="<?php echo site_url(); ?>/series">
											<i class="fa fa-chevron-left button_back"> </i>
										</a>
										<div class="small_titles"><a href="<?php echo site_url(); ?>/series">back</a></div>
									</div>
								</div>
							</div>
						</div>
					</header>
					<section class="clearfix">
						<div class="container">
							<div class="row mt_30">
								<div class="col-sm-12">
									<div class="featured_series">
										<div class="bg_image">&nbsp;</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="big_teaser_type "><?php the_title(); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="section clearfix">
						<div class="container">
							<div class="row text-center mt_32 mb_30">
								<div class="col-sm-12">
									Open Access
								</div>
							</div>
						</div>
					</section>
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
					<section class="clearfix">
						<div class="container">
							<div class="row text-center mb_20 mt_32">
								<div class="col-sm-12">					
									<?php if(get_field('language')) : ?>
										<span class="white-space:nowrap;"><em>Language&nbsp;&nbsp;</em><strong><?php the_field('language')?></strong></span>
									<?php endif; ?>
									<?php if(get_field('pages')) : ?>
										<span class="white-space:nowrap;padding:0 10px;"><em>Pages&nbsp;&nbsp;</em><strong><?php the_field('pages')?></strong></span>
									<?php endif; ?>
									<?php if(get_field('publishing_year')) : ?>
										<span class="white-space:nowrap;padding:0 10px;"><em>Publishing Year&nbsp;&nbsp;</em><strong><?php the_field('publishing_year')?></strong></span>
									<?php endif; ?>
									<?php   // Get terms for post
									 	$terms = get_the_terms( $post->ID , 'series' );
									 	if ( $terms != null ){
									 	foreach( $terms as $term ) {
									 	$term_link = get_term_link( $term );
									 	echo '<span class="white-space:nowrap;padding:0 10px;"><em>Series&nbsp;&nbsp;</em><a href="' . $term_link . '" class="more_info">'; 
									 	print $term->name ;
									 	echo '</a></strong></span>';
									 	unset($term);
									} } ?>
								</div>
								<div class="col-sm-12">					
									<?php if(get_field('isbn')) : ?>
										<span class="white-space:nowrap;"><em>1.&nbsp;<?php the_field('isbn')?></em></span>
									<?php endif; ?>
									<?php if(get_field('available_as')) : ?>
										<span class="white-space:nowrap;padding:0 10px;"><em>Available as&nbsp;<?php the_field('available_as')?></em>
									<?php endif; ?>
								</div>
								<div class="col-sm-12">		
									<em>Download:&nbsp;&nbsp;</em>			
									<?php if(get_field('book_information_pdf')) : ?>
										<span class="white-space:nowrap;"><a href="<?php the_field('book_information_pdf')?>" class="more_info" download>BOOK INFORMATION (PDF)</a></span>
									<?php endif; ?>
									<?php if(get_field('citation_xml')) : ?>
										<span class="white-space:nowrap;"><a href="<?php the_field('citation_xml')?>" class="more_info" download>CITATION (XML)</a></span>
									<?php endif; ?>
									<?php if(get_field('cover_jpg')) : ?>
										<span class="white-space:nowrap;"><a href="<?php the_field('cover_jpg')?>" class="more_info" download>COVER (JPG)</a></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix">
						<div class="container container620">
							<div class="row mb_10">
								<div class="col-sm-12 text_indent">
									<h2>Summary</h2>
								</div>
								<div class="col-sm-12 text_big">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix">
						<div class="container container620">
							<div class="row mb_30">
								<div class="col-sm-12 text_indent">
									<h2>Table of Contents</h2>
								</div>
								<div class="col-sm-12 text_indent text_chapters mb_8">
									<?php if(get_field('chapter')) : ?>
										<strong><a href="#"><?php the_field('chapter')?></a></strong>
									<?php endif; ?>
								</div>
								<div class="col-sm-12 text_indent text_chapters">
									<?php if(get_field('chapter_file')) : 
										$attachment_id = get_field('chapter_file');
										$url = wp_get_attachment_url( $attachment_id );
										$title = get_the_title( $attachment_id );
										$filetype = wp_check_filetype( $url ); ?>
										<span style="text-transform:uppercase;"><em>(<?php echo $filetype['ext']; ?>)</em>&nbsp;</span>
										<a href="<?php echo $url; ?>" style="text-decoration: underline;" download><?php echo $title; ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix">
						<div class="container container620">
							<div class="row mb_30">
								<div class="col-sm-12 text_indent">
									<h2>The Authors</h2>
								</div>
								<div class="col-sm-12 mb_8">
									
								</div>
							</div>
						</div>
					</section>
					<section class="section clearfix">
						<div class="container container620">
							<div class="row mb_30">
								<div class="col-sm-12 text_indent">
									<h2>Reviews</h2>
								</div>
								<div class="col-sm-12 text_reviews mb_40">
									<?php if(get_field('reviews')) : ?>
										<?php the_field('reviews')?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
					<section class="section clearfix">
						<div class="container">
							<div class="row mb_30 mt_20">
								<div class="col-sm-12">
									<h2 class="nomargin">Tweet A Quote</h2>
								</div>
							</div>
							<div class="row mb_30 mt_20">
								<div class="col-sm-12">
									<?php if(get_field('tweet_a_quote')) : ?>
										<?php the_field('tweet_a_quote')?>
										<a href="http://twitter.com/share?text=<?php the_field('tweet_a_quote')?>&url=<?php get_page_link(); ?>">Tweet</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>							
					<section class="clearfix mb_80">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text_big mt_32">
									<h2>This Could Also Be Interesting</h2>
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
									    <div class="col-lg-2 col-md-3 col-xs-6 mb_20">										        						
											<div style="width:140px;height:200px;background-color:#1b8da5;background-size: cover;">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</div>
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



<?php get_footer(); ?>