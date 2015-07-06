<?php get_header(); ?>

	<div id="content" class="clearfix container1160 mb_80">
		<div id="main" role="main">
			<header>
				<div class="page-header">
					<div class="container container620">
						<div class="row">
							<div class="col-sm-12">
								<h1>Blog</h1>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div id="postCategories" class="collapse in">
				<section class="section clearfix">
					<div class="container container620">
						<div class="row">
							<div class="blog_categories col-sm-12">
								<div class="small_titles mt_32 ">Categories</div>
								<div class="more_info mb_50"><ul class="meson_categories"><?php wp_list_categories( 'title_li=' ); ?></ul></div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="tag_toggle text-center mb_60">
				<input type="button" class="btn_tags" data-toggle="collapse" data-target="#postCategories" style="background:#ffffff url(<?php bloginfo('stylesheet_directory'); ?>/images/icons/arrow_up.png) no-repeat center center;">
			</div>

			<?php 
				$paged = (get_query_var('page_offset')) ? get_query_var('page_offset') : 1;

				query_posts(array(
					'post_type'      => 'post', // You can add a custom post type if you like
					'paged'          => $paged,
					'posts_per_page' => 5
				));

			if (have_posts()) : while (have_posts()) : the_post(); 
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<section class="clearfix mb_80">
					<div class="container container620">
						<div class="row">
							<div class="blog_title text_indent col-sm-12 mb_25 clearfix ">
								<h3 class="nomargin"><?php the_title(); ?></h3>
								<div class="blog_date"><?php echo get_the_date('d.m.Y'); ?>, <?php the_time(); ?></div>
							</div>
							<div class="text_big col-sm-12 clearfix"><?php the_excerpt(); ?></div>	
							<div class="col-sm-12 text_indent blog_meta">
								<a class="more_info" href="<?php the_permalink(); ?>#disqus_thread" data-disqus-identifier="<?php echo $post->post_name; ?>-identifier">read more</a>
								<div class="blog_posted mt_5">posted in <?php the_category( ' ' ); ?> <span class="disqus-comment-count" data-disqus-identifier="<?php echo $post->post_name; ?>-identifier"></span></div>
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
	<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'mesonpress'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = '//' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
<?php get_footer(); ?>