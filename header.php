<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- w3c validator: remove -> ,chrome=1 from content -->
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon.png" />
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<!-- IE8 fallback moved below head to work properly. Added respond as well. Tested to work. -->
			<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		
			<!-- respond.js -->
		<!--[if lt IE 9]>
		          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<![endif]-->

		<?php 
		if (is_singular('books')) {
			if (get_field('author')) {
				$authors= (gettype(get_field('author'))=="array") ? array_map(function($item){ return $item->post_title;}, get_field('author')) : array(get_field('author')->post_title);
			}
			if (get_field('editors')) {
				$editors= (gettype(get_field('editors'))=="array") ? array_map(function($item){ return $item->post_title;}, get_field('editors')) : array(get_field('editors')->post_title);
			}
		}
		?>
		<meta property="og:title" content="<?php 
												if ($authors) {
													echo implode(", ",$authors); 
												}
												if ($editors) {
													echo " / ";
													echo implode(", ",$editors);
												}
												if ((!is_null($authors)) || (!is_null($editors))) {
													echo ": ";
												}
												echo get_the_title(); 
												?>" />
		<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>It’s Open Access! Check it out!" />
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<?php $fb_image = get_field('book_cover'); ?>
		<?php if ($fb_image) : ?>
			<meta property="og:image" content="<?php echo $fb_image['url']; ?>" />
		<?php endif; ?>
		<meta property="og:type" content="<?php 
			if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>"
		/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
	</head>
	<body <?php body_class(); ?>>
		<header role="banner">				
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="container1160">						
						<div class="navbar-header">
							<?php if ($pagename != "search"){ ?>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
								<span class="icon-bar" id="navLine1"></span>
								<span class="icon-bar" id="navLine2"></span>
								<span class="icon-bar" id="navLine3"></span>
							</button>
							<?php } ?>
							<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
							<img src="<?php bloginfo('template_directory'); ?>/images/logos/mesonpress_bl.jpg" width="190" height="40" alt="meson press" id="full_logo">
							<img src="<?php bloginfo('template_directory'); ?>/images/logos/mesonpress_m.jpg" width="50" height="50" alt="meson press" id="m_logo">
							</a>
						</div>
						<?php if ($pagename != "search"){ ?>
						<div class="collapse navbar-collapse navbar-responsive-collapse">
						
 							<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
							
							<?php //if(of_get_option('search_bar', '1')) {?>
							<!-- <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
								<div class="form-group">
									<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>">
								</div>
							</form> -->
							<?php //} ?>
						</div>
						<a href="<?php echo site_url()."/search"; ?>" id="searchButton">
							<i class="fa fa-search"> </i>
						</a>
						<?php } else { ?>
							<a href="<?php echo site_url(); ?>" id="searchCloseButton">
								<span class="icon-bar" id="navLine1"></span>
								<span class="icon-bar" id="navLine2"></span>
							</a>
						<?php }?>
					</div>
				</div> <!-- end .container -->
			</div> <!-- end .navbar -->
		</header> <!-- end header -->
		
		<div class="container-fluid main-container">
