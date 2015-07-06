<?php
/*
Template Name: Readonline
*/
?>

<?php get_header(); ?>
	<div id="content" class="clearfix">
		<div id="main" role="main">
			<?php 

			$book_slug = (get_query_var('book_slug')) ? get_query_var('book_slug') : "leer";

			$the_query = new WP_Query(array( 'post_type' => 'books', 'name' => $book_slug)); 

			if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php 
					if(class_exists("ebook")){
						$upload_dir = wp_upload_dir();
						$epubFile = split("uploads",get_field('epub_version'));
						$file = $upload_dir["basedir"].$epubFile[1];
						
						$ebook = new ebook($file);
						$eBookData = $ebook->getEBookDataObject();
						$toc = $eBookData->tocData;
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<header style="z-index:10000;">
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
					<section class="clearfix mb_80">
						<div class="readerBlock">
							<div class="container1160 readOnlineTextContainer">
								<table id="read-online-table" class="read-online-table">
									<tr>
										<td class="read-online-table-left">
											<div id="info-part-container">
												<div id="info-part">
													<div class="book-head">
														<span class="book-title">
															<?php
															$authors = $ebook->getDcCreator();
															if (is_array($authors)){
																$author = implode(array_map(function($author){ return $author->post_title; }, $authors));
															} else {
																$author = $authors;
															}
															echo $author;
															?>
														</span>
														<span class="book-description">
															<?php echo $ebook->getDcTitle(); ?>
														</span>
													</div>
													<div class="book-body">
														<div class="table-container">
															<div class="search-container">
																<form id="search_book_form" method="POST" enctype="multipart/form-data">
																	<input type="hidden" id="ebook_file" name="ebook_file" value="<?php echo urlencode($file); ?>" />
																	<input type="text" id="bs" name="bs" value="Search inside book" class="book-search" />
																	<button type="submit" id="bs_submit" class="fa fa-search"></button>
																</form>
															</div>
															<div class="headline">
																Content
															</div>
															<div id="contentToc" class="table-of-content-container">
																<?php
																	$ebook->readerToc(); 
																?>
															</div>
															<div class="footer row">
																<div class="col-xs-6">
																<?php if(get_field('pdf_version')) : ?>
																	<a href="<?php echo get_field('pdf_version') ?>" class="btn-openaccess left" >PDF</a>
																<?php endif; ?>
																</div>
																<div class="col-xs-6">
																<?php if(get_field('epub_version')) : ?>
																	<a href="<?php the_field('epub_version')?>" class="btn-openaccess right">ePub</a>
																<?php endif; ?>
																</div>
																<?php if(get_field('citation_xml')) : ?>
																	<div class="col-xs-12 citation">
																		<a href="<?php the_field('citation_xml')?>">Citation xml</a>
																	</div>
																<?php endif; ?>
																<?php if(get_field('book_information_pdf')) : ?>
																	<div class="col-xs-12 citation">
																		<a href="<?php the_field('book_information_pdf')?>">Book information</a>
																	</div>
																<?php endif; ?>
																<?php if(get_field('cover_jpg')) : ?>
																	<div class="col-xs-12 citation">
																		<a href="<?php the_field('cover_jpg')?>">Cover jpg</a>
																	</div>
																<?php endif; ?>
															</div>
														</div>
													</div>
												</div>
												<div id="pull-tab-container">
													<div id="pull-tab">
														<img src="<?php echo get_stylesheet_directory_uri() . "/images/tab_upper.png" ?>" width="20" height="10" class="upper" alt="upper">
														<i class="dashicons"> </i>
														<img src="<?php echo get_stylesheet_directory_uri() . "/images/tab_lower.png" ?>" width="20" height="10" class="lower" alt="lower">
													</div>
												</div>
											</div>
										</td>
										<td id="content-part-overflow" class="read-online-table-right">
											<div id="content-part" class="content_about">
												<div id="contentBook" class="content-text-container">
												<?php
													$content = $ebook->getContent();
													foreach($content as $part){
														echo $part;
													}
												?>
												</div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</section>
				</article>
				<?php } else { ?>
					<div class="row">
						<div class="container1160 readOnlineTextContainer">
							<h1>Plugin missing</h1><br>
							Please, install or activate the EPUB Reader plugin.
						</div>
					</div>
				<?php } ?>
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