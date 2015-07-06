<?php get_header(); ?>

	<div id="content" class="clearfix container1160 mb_80">
		<div id="main" role="main">
			<header>
				<div class="page-header">
					<div class="container container620">
						<div class="row">
							<div class="col-sm-12">
								<h1>People</h1>
							</div>
						</div>
					</div>
				</div>
			</header>

			<?php 
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<section class="clearfix mb_80 mt_60">
					<div class="container container620">
						<div class="row">
							<div class="blog_title text_indent col-sm-12 mb_25 clearfix ">
								<h3 class="nomargin"><?php the_title(); ?></h3>
								<div class="blog_date"><?php echo get_the_date('d.m.Y'); ?>, <?php the_time(); ?></div>
							</div>
							<div class="text_big col-sm-12 clearfix"><?php the_excerpt(); ?></div>	
							<div class="col-sm-12 text_indent blog_meta">
								<a class="more_info" href="<?php the_permalink(); ?>">read more</a>
								<div class="blog_posted mt_5">posted in <?php the_category( ' ' ); ?>, <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></div>
							</div>
						</div>
					</div>
				</section>
			</article> <!-- end article -->
			<?php endwhile; ?>
			<?php if (function_exists('wp_bootstrap_page_navi')) { // if expirimental feature is active ?>
				<div class="container container620">
				<?php wp_bootstrap_page_navi(); // use the page navi function ?>
				</div>
			<?php } else { // if it is disabled, display regular wp prev & next links ?>
				
				<nav class="wp-prev-next">
					<ul class="pager">
						<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
						<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
					</ul>
				</nav>
			<?php } ?>
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