<?php
/*
Template Name: Keywords
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
									  'post_type' => 'keywords',
									  'orderby' => 'title',
									  'order' => 'ASC',
									  'posts_per_page'=>-1,
									  'caller_get_posts'=>1
									);
									$keywords = [];

									$query = new WP_Query( $args );
									while ($query->have_posts() ) :
										$query->the_post();
										$group = strtolower(substr(get_the_title(),0,1));
										if(! array_key_exists($group, $keywords)){
											$keywords[$group] = array();
										}
										array_push($keywords[$group], array("title"=>get_the_title(), "content" => get_the_content()));
									endwhile;
									wp_reset_postdata();

									foreach ($alphabet as $letter){
										$hasEntries = array_key_exists($letter, $keywords) ? "has-entries" : "";
										$isFilter = array_key_exists($letter, $keywords) ? "filter" : "";
										echo '<div class="sortbyletters '.$hasEntries.'">';
										echo '	<h3 class="nomargin uppercase '.$isFilter.'" style="text-transform:uppercase;" data-filter=".letter-'.$letter.'">'.$letter.'</h3>';
										echo '</div>';
									}
								?>
								</div>
							</div>
						</div>
					</section>	
					<section class="clearfix mb_80">
						<div class="container">
							<div class="row" id="mixUpElements">
								<!-- accordion begin -->

									<?php foreach ($keywords as $key => $group){ ?>
									
									<div class="keywordsContainer mix letter-<?php echo $key; ?>">
										<div class="keywordsLetter">
											<h3><?php echo $key; ?></h3>
										</div>
										<div class="keywordsBody">    
											<div class="panel-group" id="accordion-<?php echo $key; ?>">
											<?php foreach ($group as $index => $keyword){ ?>
												  <div class="panel panel-default">
												    <div class="panel-heading">
												      <h4 class="panel-title">
												        <a data-toggle="collapse" data-parent="#accordion-<?php echo $key; ?>" href="#collapse-<?php echo	 	$key; ?>-<?php echo $index; ?>"><?php echo $keyword['title']; ?></a>
												      </h4>
												    </div>
												    <div id="collapse-<?php echo $key; ?>-<?php echo $index; ?>" class="panel-collapse collapse">
												      <div class="panel-body"><?php echo $keyword['content']; ?></div>
												    </div>
												  </div>
												
											<?php } ?>
											</div>
										</div>
									</div>
									<?php } ?>
								<!-- accordion end -->
								
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
				//console.log(jQuery(document));
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