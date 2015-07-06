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
										Filter
									</div>
								</div>
							</div>
							<div class="container container620">
								<div class="row">
									<div class="col-sm-12 more_info mb_20">
										<?php 
											wp_filter_tag_cloud( array( 'taxonomy' => 'book-tags', 'format' => 'array', 'echo' => false ) );
										?>
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
							$myorderby = 'title';
							$myorder = 'ASC';
							$s1 = 'selected="selected"';
							$myorderby = "title"; $myorder = 'ASC'; $s1 = ' selected="selected"'; $s2 = ''; $s3 = ''; $s4 = '';
							
						?>
						<?php 
							$the_query = new WP_Query(array(
								'post_type'			=> 'books',
								'meta_key'			=> $mymetakey,
								'orderby' 			=> $myorderby,
								'order'				=> $myorder
							)); 
						?>
						<div class="container">
							<div class="row">
								<div class="col-sm-12 small_titles mt_32">
									<div class="pull-left">
										<span id="titlesFound"><?php echo $the_query->found_posts; ?></span> Titles
									</div>
									<div class="pull-right">
										<div style="float:left;margin-right:15px;">
											<select id="SortSelect">
												<option value="title:asc">Title</option>
												<option value="date:desc">Newest</option>
												<option value="date:asc">Oldest</option>
												<option value="author:asc">Author</option>
											</select>
										</div>
										<div class="view-cnt">
											<div id="grid" class="grid grid-active"><i class="fa fa-th fa-2x"></i></div>
											<div id="list" class="list"><i class="fa fa-bars fa-2x"></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="mb_50 mt_30">
									<div id="mixUpElements" class="prods-grid">
										<?php while ( $the_query->have_posts() ) :
										$the_query->the_post();
										$image = get_field('book_cover');
										$alt = $image['alt'];
										$size = 'book-thumb-sm';
										$thumb = $image['sizes'][ $size ];
										$width = $image['sizes'][ $size . '-width' ];
										$height = $image['sizes'][ $size . '-height' ];
										$t = wp_get_post_tags($post->ID);
										$tags = get_the_tags();
										$id = get_the_ID();
										$tags = get_the_terms( $id, 'book-tags');
										if (is_array($tags)){
											$values = array_map(function($tag) { return $tag->slug; }, $tags);
											if(!empty($values)){
												$taglist = implode(" ",$values);
											} else {
												$taglist = [];
											}
											
										} else {
											$taglist = $tags->slug;
										}
										$authors = get_field('author');
										if (is_array($authors)){
											$values = array_map(function($author){ return $author->post_title; }, $authors);
											if(!empty($values)){
												$author = implode($values, $authors);
											} else {
												$author = implode($values, $authors);
											}
										} else {
											$author = "zzz";
										}
										
										?>
											<div class="prod-cnt prod-box mix <?php echo $taglist; ?>" data-title="<?php the_title(); ?>" data-author="<?php echo $author; ?>" data-date="<?php the_field('publishing_year'); ?>">
												<ul>
													<li class="bookslist_cover">
														<a href="<?php the_permalink();?>" >
															<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
														</a>
													</li>
													<li class="bookslist_title">
														<a href="<?php the_permalink();?>" ><?php the_title(); ?></a>
													</li>
													<li class="bookslist_author">
														<?php
															$authors = get_field('author');
															if( $authors ): ?>
																<span class="authorTitle"><?php echo (count($authors) > 1) ? "Authors" : "Author"; ?><br></span>
																<?php foreach( $authors as $p ): ?>
																	<strong><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></strong><br />
																<?php endforeach;
															endif;
															$editors = get_field('editors');
															if( $editors ): ?>
																<span class="authorTitle"><?php echo (count($editors) > 1) ? "Editors" : "Editor"; ?><br></span>
																<?php foreach( $editors as $p ): ?>
																	<strong><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></strong><br />
																<?php endforeach;
															endif; 
														?>
													</li>
													<li class="bookslist_excerpt">
														<em><?php the_excerpt(); ?></em>
													</li>
													<li class="bookslist_year">
														<?php the_field('publishing_year'); ?>
													</li>
												</ul>
											</div>
										<?php endwhile; ?>
									</div>
								</div>
							</div>
						</div>
						<?php wp_reset_postdata(); ?> 
					</section>
					<footer>
						<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
					</footer>
				</article>
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
	<script type='text/javascript'>
		 function jLoaded(){
			if (typeof jQuery == 'undefined') {
				window.setTimeout("jLoaded",250);
			} else {
				jQuery(document).ready(function(){
					jQuery('#mixUpElements').mixItUp({
						controls: {
							toggleFilterButtons: false,
							toggleLogic: 'and'
						},
						load: {
							filter: 'all'
						},
						callbacks: {
							onMixEnd: function(state){
								jQuery('#titlesFound').html(jQuery('.mix:visible').length);
							}
						}
					});
					jQuery('#SortSelect').on('change', function(){
						jQuery('#mixUpElements').mixItUp('sort', this.value);
					});
				});
				
			}
		}
		jLoaded();
	</script>

<?php get_footer(); ?>