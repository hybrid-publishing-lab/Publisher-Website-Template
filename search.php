<?php
/*
Template Name: Search
*/
?>
<?php get_header(); ?>
		<div id="content" class="clearfix container1160">
			<div id="main" role="main">
				<div class="container container620 searchContainer">
					<div class="page-header"><span><?php _e("Search meson","wpbootstrap"); ?></span> <?php if (get_search_query() != "") { echo "for ".esc_attr(get_search_query()); } else { echo ""; } ?></div>
					<div class="search-info">Start typing & hit enter...</div>
					<div class="searchInput">
						<form id="searchForm" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
							<input type="text" name="s" id="s" type="text" name="" autofocus autocomplete="off" />
						</form>
					</div>
					<div id="search-suggest-container"></div>
					<?php 
					$results = array("people" 	=> array(),
									 "books"	=> array(),
									 "post"		=> array(),
									 "other"	=> array());
					if (have_posts()) : while (have_posts()) : the_post(); 
							if (array_key_exists($post->post_type, $results)){
								array_push($results[$post->post_type], $post);
							} else {
								array_push($results["other"], $post);
							}
						?>
						<?php endwhile; 
						$resultAmount = 0;
						foreach ($results as $key => $item){
							if ($key != "other"){
								$resultAmount = $resultAmount + count($item);
							}
							
						}
						//print_r(have_posts());
							if ($resultAmount > 0) {
						?>	
						<div class="searchResults">
							<div class="results-header"><?php _e("Search results","wpbootstrap"); ?></div>
							<?php if (count($results["people"])>0) { ?>
							<section id="inAuthors">
								<div class="sectionTitle"><?php _e("in authors","wpbootstrap"); ?>: </div>
								<div class="resultsContent">
									<?php foreach ($results["people"] as $author){ ?>
										<div class="item">
											<div class="title"><a href="<?php echo $author->guid; ?>"><?php echo $author->post_title; ?></a></div>
										</div>
									<?php } ?>
								</div>
							</section>
							<?php } ?>
							<?php if (count($results["books"])>0) { ?>
							<section id="inBooks">
								<div class="sectionTitle"><?php _e("in books & series","wpbootstrap"); ?> <?php //echo count($results["books"]); ?>: </div>
								<div class="resultsContent">
									
									<?php 

									$bookrows = array_chunk($results["books"],4);
									foreach ($bookrows as $row){ ?>
										<div class="row mb-20">
										<?php 
										foreach ($row as $book){ 
											$image = get_field('book_cover', $book->ID);
										?>
								    		<div class="item col-xs-6 col-sm-3" >
												<a href="<?php echo site_url()."/books/".$book->post_name;?>" >										        						
													<img src="<?php echo $image["sizes"]["book-thumb-sm"]; ?>" alt="" width="<?php echo $image["sizes"]["book-thumb-sm-width"]; ?>" height="<?php echo $image["sizes"]["book-thumb-sm-height"]; ?>" />
												</a>
											</div>
										<?php } ?>
										</div>
									<?php } ?>
										
									
									<div class="clearfix">&nbsp;</div>
								</div>
							</section>
							<?php } ?>
							<?php if (count($results["post"])>0) { ?>
							<section id="inBlog">
								<div class="sectionTitle"><?php _e("in blog","wpbootstrap"); ?>: </div>
								<div class="resultsContent">
								<?php foreach ($results["post"] as $blogpost){ 
									?>
									<div class="item">
										<div class="title"><a href="<?php echo site_url()."/".$blogpost->post_name; ?>"><?php echo $blogpost->post_title ?></a></div>
										<div class="body"><?php echo wrap_search_content_str(esc_attr(get_search_query()),$blogpost->post_content); ?></div>
									</div>
								<?php } ?>
									
								</div>
							</section>
							<?php } ?>
						</div>
						<?php } ?>	
					<?php else : ?>
					
						<!-- this area shows up if there are no results -->
						
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
				</div> <!-- end #main -->	
    
			</div> <!-- end #content -->
		</div>
<?php get_footer(); ?>