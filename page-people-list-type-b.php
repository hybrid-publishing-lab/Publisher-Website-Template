<?php
/*
Template Name: People list Type B
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
					<section class="clearfix">
						<div class="container container620">
							<div class="row mt_25 mb_40">
								<div class="col-sm-12">
								<?php
									$alphabet = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
									$args=array(
									  'post_type' => 'people',
										'tax_query' => array(
											array(
												'taxonomy' => 'role',
												'field' => 'slug',
												'terms' => get_field('roles')->name,
											)
										)										
									);
									$authors = [];

									$query = new WP_Query( $args );
									while ($query->have_posts() ) :
										$query->the_post();
										$group = strtolower(substr(get_initials(get_the_title()),0,1));
										if(! array_key_exists($group, $authors)){
											$authors[$group] = array();
										}
										array_push($authors[$group], array("title"=>get_the_title()));
									endwhile;
									wp_reset_postdata();

									foreach ($alphabet as $letter){
										$hasEntries = array_key_exists($letter, $authors) ? "has-entries" : "";
										$isFilter = array_key_exists($letter, $authors) ? "filter" : "";
										echo '<div class="sortbyletters '.$hasEntries.'">';
										echo '	<h3 class="nomargin uppercase '.$isFilter.'" style="text-transform:uppercase;" data-filter=".'.$letter.'">'.$letter.'</h3>';
										echo '</div>';
									}
								?>
									<div class="show-all">
										<h3 class="show-all-filter filter" data-filter="all">All</h3>
									</div>
								</div>
								
							</div>
						</div>
					</section>	
					<section class="clearfix mb_80">
						<div class="container">
							<div class="row" id="mixUpElements">
								<?php
									$args = array(
										'post_type' => 'people',
										'tax_query' => array(
											array(
												'taxonomy' => 'role',
												'field' => 'slug',
												'terms' => get_field('roles')->name,
											)
										)
									);
									$query = new WP_Query( $args );
									while ($query->have_posts() ) :
									$query->the_post();
									$tags = get_the_terms( $id, 'person-tags');
									if (is_array($tags)){
										//$values = array_map(function($tag) { return "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>"; }, $tags);
										$values = array_map(function($tag) { return "<li class=\"filter personTag\" data-filter=\".".custom_tag_escape($tag->slug)."\" ><span>".maxLength($tag->name,22)."</span></li>"; }, $tags);
										$taglist = implode("",$values);
										$persontags = array_map(function($tag) { return $tag->slug; }, $tags);
									} else {
										//$taglist = "<a href=\"".$tag->slug."\" rel=\"tag\">$tag->slug</a>";
										$taglist = "<li class=\"filter personTag\" data-filter=\".".$tag->slug."\" >".maxLength($tag->name,22)."</li>";
										$persontags = array($tag->slug);
									}
									?>
										<div class="col-md-4 col-sm-6 col-xs-12 mb_40 mix <?php echo get_initials(get_the_title())." "; echo implode(" ",$persontags); ?>">
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
									<?php
									endwhile;
									wp_reset_postdata();
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
	<?php require_once(get_template_directory()."/partials/pagenavigation.php"); ?>
	<?php 
		$loadFilter = isset($wp_query->query_vars['person-tag']) ? ".".urldecode($wp_query->query_vars['person-tag']) : "all";
	?>
		<script type='text/javascript'>
		 function jLoaded(){
			if (typeof jQuery == 'undefined') {
				window.setTimeout("jLoaded",250);
			} else {
				jQuery(document).ready(function(){
					jQuery('#mixUpElements').mixItUp({
						controls: {
							toggleFilterButtons: false
						},
						load: {
							filter: '<?php echo $loadFilter; ?>'
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