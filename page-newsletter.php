<?php
/*
Template Name: Newsletter
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
					<section class="clearfix mb_80">
						<div class="container container620">
							<div class="row">
								<div class="col-sm-12 content_about">
									<?php the_content(); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
										<div class="box newsletter">
											<?php 
												$page = get_page_by_title('Newsletter');
												$the_query = new WP_Query(array(
													'page_id'      	=> '368',
												));
												while ( $the_query->have_posts() ) : 
												$the_query->the_post();
												?>		
													<h2>Enter your address here</h2>
													<?php the_excerpt(); ?>
												<?php 
												endwhile; 
												wp_reset_postdata();
											?>
											<div class="box-body">
												<div class="newsletter newsletter-subscription">
													<form method="post" action="http://demo.meson.press/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
														<input id="newsletterRegistrationInput" class="register-input" type="email" name="ne" value="Your eMail address" required></td>
														<input class="register-submit btn-more" type="submit" value="Register"/>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
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


<?php get_footer(); ?>