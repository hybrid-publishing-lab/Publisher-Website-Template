<?php
/*
Template Name: Author Detail
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="clearfix container1160">
		<header>
			<div class="page-header page-header-series">
				<div class="container container1160">
					<div class="nomargin">
						<a href="<?php echo site_url(); ?>/authors">
							<i class="fa fa-chevron-left button_back"> </i>
						</a>
						<div class="small_titles"><a href="<?php echo site_url(); ?>/authors">back</a></div>
						<?php require_once(get_template_directory()."/partials/socialbuttons.php"); ?>
					</div>
				</div>
			</div>
		</header>
		
			<div id="main" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
						<div class="container container620">
							<section class="clearfix">
								<div class="row mt_40 phoneFull tabletNotFull">
									<div class="col-sm-12">
										<?php the_post_thumbnail('people-thumb-md'); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<h3 class="text_indent">
											<?php the_title(); ?>
										</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 text_big">
										<?php the_content(); ?>
									</div>
								</div>
								<div class="row mt_15" style="overflow:hidden;">
									<div class="col-sm-12 text_indent">
										<?php if(get_field('social_link_1')) : ?>
											<a href="<?php echo get_field('social_link_1')?>" class="more_info" target="_blank"><?php echo get_field('social_label_1'); ?></a>
										<?php endif; ?>
									</div>
									<div class="col-sm-12 text_indent">
										<?php if(get_field('social_link_2')) : ?>
											<a href="<?php echo get_field('social_link_2')?>" class="more_info" target="_blank"><?php echo get_field('social_label_2'); ?></a>
										<?php endif; ?>
									</div>
									<div class="col-sm-12 text_indent">
										<?php if(get_field('social_link_3')) : ?>
											<a href="<?php echo get_field('social_link_3')?>" class="more_info" target="_blank"><?php echo get_field('social_label_3'); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</section>
							<?php
							$posts = get_field('featured_book_by_person');
							if( $posts ): ?>
						</div><!-- container620 -->
							<section class="clearfix">
								<div class="container">
									<div class="row mt_63">
										<div class="col-sm-12 small_titles">
											Featured Book by <?php the_title(); ?>
										</div>
									</div>
								</div>
							</section>
							<section class="section clearfix">
								<div class="container phoneMedium">
									<?php foreach( $posts as $post): ?>
									<?php setup_postdata($post); ?>
									<div class="row">
										<div class="">
											<?php $image = get_field('book_cover_big'); ?>
											<div class="featured_series mb_60" style="background: <?php the_field('teaser_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" >
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
						<div class="container container620">
						<?php endif; ?>
						<?php 
						
							$authors = get_field('author');
							$editors = get_field('editors');
							$as_author = !empty($authors) ? $authors : [];
							$as_editor = !empty($editors) ? $editors : [];
							$all_books = array_merge($as_author, $as_editor);
							$booksIndex = array();
							$books = array();

							foreach($all_books as $book){
								if(!in_array($book->ID, $booksIndex)){
									array_push($booksIndex,$book->ID);
									array_push($books,$book);
								}
							}
							if(count($books) > 0) { 
						?>
						<section class="clearfix mb_80">
							<div class="container container620 phoneMedium">
								<div class="row">
									<div class="col-sm-12">
										<h2>Publications by <?php the_title(); ?></h2>
									</div>
								</div>
								<div class="row">
									<div class="mb_50">
										<?php foreach( $books as $post): ?>
										<?php setup_postdata($post); ?>
											<?php 	$image = get_field('book_cover');
													$alt = $image['alt'];
													$size = 'book-thumb-sm';
													$thumb = $image['sizes'][ $size ];
													$width = $image['sizes'][ $size . '-width' ];
													$height = $image['sizes'][ $size . '-height' ]; ?>
											<div class="col-md-3 col-sm-3 col-xs-6 mb_20">
												<a href="<?php the_permalink();?>" >
													<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
												</a>
											</div>
										<?php endforeach; ?>
										<?php wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						</section>
						<?php } ?>
						
						</div>
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

					</article>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>