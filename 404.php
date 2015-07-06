<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
<style>
	html { height: 100%;}
	body { height: 100%;}
	.main-container { height:100%;}
	.footerContainer { margin-top:-80px;}
</style>
	
	<div id="content" class="clearfix container1160" style="display:block;height:100%;">
		<div id="main" role="main">
			<header>

				<div class="hero-unit">
				
					<h1><?php _e("Epic 404 - Article Not Found","wpbootstrap"); ?></h1>
					<p><?php _e("This is embarassing. We can't find what you were looking for.","wpbootstrap"); ?></p>
												
				</div>
										
			</header> <!-- end article header -->
			
			<section class="post_content">
				
				<p><?php _e("Whatever you were looking for was not found, but maybe try looking again or search using the form below.","wpbootstrap"); ?></p>

				<div class="row">
					<div class="col col-lg-12">
						<?php get_search_form(); ?>
					</div>
				</div>
			
			</section> <!-- end article section -->
			
			<footer>
				
			</footer> <!-- end article footer -->
		</div>
	</div>


<?php get_footer(); ?>