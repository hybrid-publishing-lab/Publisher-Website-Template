<?php get_header(); ?>
	<div id="content" class="clearfix container1160 mb_80">
		<div id="main" role="main">
			<header>
				<div class="page-header page-header-series">
					<div class="container container1160">
						<div class="nomargin">
							<a href="<?php echo site_url(); ?>/blogs">
								<i class="fa fa-chevron-left button_back"> </i>
							</a>
							<div class="small_titles"><a href="<?php echo site_url(); ?>/blogs">back</a></div>
							<?php require_once(get_template_directory()."/partials/socialbuttons.php"); ?>
						</div>
					</div>
				</div>
			</header>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<section class="clearfix mb_80 mt_32">
					<div class="container container620">
						<div class="row">
							<div class="blog_title text_indent col-sm-12 mb_25 clearfix">
								<h3 class="nomargin"><?php the_title(); ?></h3>
								<div class="blog_date"><?php the_date('d.m.Y'); ?>, <?php the_time(); ?></div>
							</div>
							<div class="text_big col-sm-12 clearfix"><?php the_excerpt(); ?></div>
							<div class="col-sm-12 text_indent blog_meta">
								<div class="blog_posted mt_5">posted in <?php the_category( ' ' ); ?> <span class="disqus-comment-count" data-disqus-identifier="<?php echo $post->post_name; ?>-identifier"></span></div>
							</div>
						</div>
					</div>
				</section>
			</article>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			echo "<div class=\"container container620\">";
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			echo "</div>";
			 endwhile; ?>
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
		var disqus_identifier = '<?php echo $post->post_name; ?>-identifier';
		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function () {
		var s = document.createElement('script'); s.async = true;
		s.type = 'text/javascript';
		s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		}());
	</script>
<?php get_footer(); ?>