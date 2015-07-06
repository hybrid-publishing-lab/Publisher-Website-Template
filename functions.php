<?php

/**
 * This is the required plugin check
 *
 * @package		TGM-Plugin-Activation
 * @subpackage 	Example
 * @version		2.4.2
 * @author		Thomas Griffin <thomasgriffinmedia.com>
 * @author		Gary Jones <gamajo.com>
 * @copyright	Copyright (c) 2014, Thomas Griffin
 * @license		http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link		https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'meson_press_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function meson_press_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		

		// Advanced Custom Fields
		array(
			'name'					=> 'Advanced Custom Fields',
			'slug'					=> 'advanced-custom-fields',
			'required'				=> true,
		),
		// Advanced Custom Fields
		array(
			'name'					=> 'Advanced Custom Fields: Bidirectional Post Relation Field',
			'slug'					=> 'acf-2way-pr',
			'required'				=> true,
		),
		array(
			'name'					=> 'Disqus Comment System',
			'slug'					=> 'disqus-comment-system',
			'required'				=> true,
		),
		array(
			'name'					=> 'Newsletter',
			'slug'					=> 'newsletter',
			'required'				=> true,
		),
		array(
			'name'					=> 'Post Types Order',
			'slug'					=> 'post-types-order',
			'required'				=> true,
		),
		array(
			'name'					=> 'Google Analytics Dashboard for WP',
			'slug'					=> 'google-analytics-dashboard-for-wp',
			'required'				=> false,
		),
		array(
			'name'					=> 'iThemes Security',
			'slug'					=> 'better-wp-security',
			'required'				=> false,
		),
		/*
		array(
			'name'					=> 'Epub Reader', // The plugin name.
			'slug'					=> 'epub-reader', // The plugin slug (typically the folder name).
			'source'				=> '', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
		),
		array(
			'name'					=> 'OAI Harvester', // The plugin name.
			'slug'					=> 'oaiharvester', // The plugin slug (typically the folder name).
			'source'				=> '', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
		),


		*/

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' 								=> '',					  // Default absolute path to pre-packaged plugins.
		'menu'										=> 'tgmpa-install-plugins', // Menu slug.
		'has_notices'								=> true,					// Show admin notices or not.
		'dismissable'								=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'								=> '',					  // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'								=> false,				   // Automatically activate plugins after installation or not.
		'message'									=> '',					  // Message to output right before the plugins table.
		'strings'									=> array(
			'page_title'							=> __( 'Install Required Plugins', 'tgmpa' ),
			'menu_title'							=> __( 'Install Plugins', 'tgmpa' ),
			'installing'							=> __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
			'oops'									=> __( 'Something went wrong with the plugin API.', 'tgmpa' ),
			'notice_can_install_required'			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'		=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_install'					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
			'notice_can_activate_required'			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended'		=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_activate'				=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
			'notice_ask_to_update'					=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_update'					=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
			'install_link'							=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'							=> _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
			'return'								=> __( 'Return to Required Plugins Installer', 'tgmpa' ),
			'plugin_activated'						=> __( 'Plugin activated successfully.', 'tgmpa' ),
			'complete'								=> __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
			'nag_type'								=> 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}


/**
 *
 * @desc registers a theme activation hook
 * @param string $code : Code of the theme. This can be the base folder of your theme. Eg if your theme is in folder 'mytheme' then code will be 'mytheme'
 * @param callback $function : Function to call when theme gets activated.
 */
function wp_register_theme_activation_hook($code, $function) {
	$optionKey="theme_is_activated_" . $code;
	if(!get_option($optionKey)) {
		call_user_func($function);
		update_option($optionKey , 1);
	}
}

/**
 * @desc registers deactivation hook
 * @param string $code : Code of the theme. This must match the value you provided in wp_register_theme_activation_hook function as $code
 * @param callback $function : Function to call when theme gets deactivated.
 */
function wp_register_theme_deactivation_hook($code, $function) {
	// store function in code specific global
	$GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

	// create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
	$fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

	// add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
	// Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
	// Your theme can perceive this hook as a deactivation hook.
	add_action("switch_theme", $fn);
}

function meson_press_activate() {
	// Set Permalinks
	add_action( 'init', function() {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
	} );

	/* 
	 * Generate Pages
	 * 
	 */
	// Insert page Homepage
	$page_name = "About Meson Press";
	$page_check = get_page_by_title($page_name);
	$page_slug = "home";
	if(!isset($page_check->ID)){
		// Insert page Home (About Meson Press)
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-homepage.php'
								));

		if($page) {
			update_option( 'page_on_front', $page );
			update_option( 'show_on_front', 'page' );
			update_usermeta(1,'frontpage_id',$page);
		}
	}

	// Insert page About
	$page_name = "About";
	$page_check = get_page_by_title($page_name);
	$page_slug = "about";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-about.php'
								));
		$page_check = null;
	}

	// Insert page Search
	$page_name = "Search";
	$page_check = get_page_by_title($page_name);
	$page_slug = "search";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'search.php'
								));
		$page_check = null;
	}

	// Insert page Blog
	$page_name = "Blog";
	$page_check = get_page_by_title($page_name);
	$page_slug = "blogs";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-blogs.php'
								));
		$page_check = null;
	}

	// Insert page Authors
	$page_name = "Authors";
	$page_check = get_page_by_title($page_name);
	$page_slug = "authors";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-people-list-type-b.php'
								));
		$page_check = null;
	}

	// Insert page Series
	$page_name = "Series";
	$page_check = get_page_by_title($page_name);
	$page_slug = "series";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-series.php'
								));
		$page_check = null;
	}

	// Insert page Are you an author?
	$page_name = "Are you an author?";
	$page_check = get_page_by_title($page_name);
	$page_slug = "are-you-an-author";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page'
									 // 'page_template' 	=> ''
								));
		$page_check = null;
	}

	// Insert page Advisory Board
	$page_name = "Advisory Board";
	$page_check = get_page_by_title($page_name);
	$page_slug = "editorial-board";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-people-list-type-a.php'
								));
		$page_check = null;
	}

	// Insert page Who we are
	$page_name = "Who we are";
	$page_check = get_page_by_title($page_name);
	$page_slug = "who-we-are";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-people-list-type-c.php'
								));
		$page_check = null;
	}

	// Insert page Your manuscript
	$page_name = "Your manuscript";
	$page_check = get_page_by_title($page_name);
	$page_slug = "your-manuscript";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-manuscript.php'
								));
		$page_check = null;
	}

	// Insert page Books
	$page_name = "Books";
	$page_check = get_page_by_title($page_name);
	$page_slug = "mesonbooks";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-books.php'
								));
		$page_check = null;
	}

	// Insert page Newsletter
	$page_name = "Newsletter";
	$page_check = get_page_by_title($page_name);
	$page_slug = "newsletter";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-newsletter.php'
								));
		$page_check = null;
	}

	// Insert page Contact
	$page_name = "Contact";
	$page_check = get_page_by_title($page_name);
	$page_slug = "contact";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-contact.php'
								));
		$page_check = null;
	}

	// Insert page Imprint
	$page_name = "Imprint";
	$page_check = get_page_by_title($page_name);
	$page_slug = "imprint";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-imprint.php'
								));
		$page_check = null;
	}

	// Insert page Keywords
	$page_name = "Keywords";
	$page_check = get_page_by_title($page_name);
	$page_slug = "keywords";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-keywords.php'
								));
		$page_check = null;
	}

	// Insert page Welcome!
	$page_name = "Welcome!";
	$page_check = get_page_by_title($page_name);
	$page_slug = "confirmation";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-confirmation.php'
								));
		$page_check = null;
	}

/* insert this page in Plugin!
	// Insert page Welcome!
	$page_name = "Read online";
	$page_check = get_page_by_title($page_name);
	$page_slug = "read";
	if(!isset($page_check->ID)){
		$page = wp_insert_post(array('post_title' 		=> $page_name,
									 'post_name' 		=> $page_slug,
									 'post_content' 	=> '',
									 'post_status' 		=> 'publish',
									 'post_type' 		=> 'page',
									 'page_template' 	=> 'page-readonline.php'
								));
	}
*/
	$menuname = 'top-menu';
	// Does the menu exist already?
	$menu_exists = wp_get_nav_menu_object( $menuname );

	// $run_once = get_option('menu_check');
	if (!$menu_exists){
		//create the menu
		$menu_id = wp_create_nav_menu($menuname);
		//then get the menu object by its name
		$menu = get_term_by( 'name', $menuname, 'nav_menu' );

		//then add the actuall link/ menu item and you do this for each item you want to add
		$about_nav = wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("About")->ID,
			'menu-item-title' 		=> 'About',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		//Sub menu item 
		$first_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> get_page_by_title("About")->ID,
			'menu-item-title' 		=> 'Meson Press',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $about_nav
		));

		//Sub menu item 
		$second_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> get_page_by_title("Who we are")->ID,
			'menu-item-title' 		=>  'Who we are',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $about_nav
		));

		//Sub menu item 
		$third_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> get_page_by_title("Your manuscript")->ID,
			'menu-item-title' 		=>  'Your manuscript',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $about_nav
		));

		//Sub menu item 
		$fourth_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> get_page_by_title("Contact")->ID,
			'menu-item-title' 		=>  'Contact',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $about_nav
		));

		//Sub menu item 
		$fifth_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> get_page_by_title("Newsletter")->ID,
			'menu-item-title' 		=>  'Newsletter',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $about_nav
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Books")->ID,
			'menu-item-title' 		=>  'Books',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Series")->ID,
			'menu-item-title' 		=>  'Series',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Authors")->ID,
			'menu-item-title' 		=>  'Authors',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Blog")->ID,
			'menu-item-title' 		=>  'Blog',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		$locations = get_theme_mod('nav_menu_locations');
		$locations['main-menu'] = $menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
	$locations = get_theme_mod('nav_menu_locations');
	$locations['main-menu'] = $menu->term_id;
	set_theme_mod( 'nav_menu_locations', $locations );

	$menuname = 'footer-menu';
	// Does the menu exist already?
	$footer_menu_exists = wp_get_nav_menu_object( $menuname );

	if (!$footer_menu_exists){

		//create the footer menu
		$menu_id = wp_create_nav_menu($menuname);
		$footer_menu = get_term_by( 'name', $menuname, 'nav_menu' );

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-title' =>  'Twitter',
			'menu-item-classes' => 'menu-item',
			'menu-item-url' => home_url( '/' ),
			'menu-item-status' => 'publish')
		);

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-title' =>  'Facebook',
			'menu-item-classes' => 'menu-item',
			'menu-item-url' => home_url( '/' ),
			'menu-item-status' => 'publish')
		);

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Blog")->ID,
			'menu-item-title' 		=>  'Blog',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Imprint")->ID,
			'menu-item-title' 		=>  'Imprint',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Contact")->ID,
			'menu-item-title' 		=> 'Contact',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> get_page_by_title("Newsletter")->ID,
			'menu-item-title' 		=>  'Newsletter',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		$locations = get_theme_mod('nav_menu_locations');
		$locations['footer-menu'] = $footer_menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );

	}
}
wp_register_theme_activation_hook('meson-press', 'meson_press_activate');

/************* CUSTOM POST TYPES *************/

// Books
function custom_post_type() {

// Set UI labels for Books
	$labels = array(
		'name'				=> _x( 'Books', 'Post Type General Name' ),
		'singular_name'	   => _x( 'Book', 'Post Type Singular Name' ),
		'menu_name'		   =>  'Books' ,
		'parent_item_colon'   =>  'Parent Book' ,
		'all_items'		   =>  'All Books' ,
		'view_item'		   =>  'View Book' ,
		'add_new_item'		=>  'Add New Book' ,
		'add_new'			 =>  'Add New' ,
		'edit_item'		   =>  'Edit Book' ,
		'update_item'		 =>  'Update Book' ,
		'search_items'		=>  'Search Book' ,
		'not_found'		   =>  'Not Found' ,
		'not_found_in_trash'  =>  'Not found in Trash' 
	);
// Set other options for Custom Post Type
	$args = array(
		'label'			   =>  'books' ,
		'labels'			  => $labels,
		// Features this CPT supports in Post Editor
		'supports'			=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'book-tags' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'		  => array('book-tags'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'menu_icon'				=> 'dashicons-book'
	);
	// Registering your Custom Post Type
	register_post_type( 'books', $args );

	// Set UI labels for External-Books
	$labels = array(
		'name'				=> _x( 'External Books', 'Post Type General Name' ),
		'singular_name'	   => _x( 'External Book', 'Post Type Singular Name' ),
		'menu_name'		   =>  'External Books' ,
		'parent_item_colon'   =>  'Parent External Book' ,
		'all_items'		   =>  'All External Books' ,
		'view_item'		   =>  'View External Book' ,
		'add_new_item'		=>  'Add New External Book' ,
		'add_new'			 =>  'Add New' ,
		'edit_item'		   =>  'Edit External Book' ,
		'update_item'		 =>  'Update External Book' ,
		'search_items'		=>  'Search External Book' ,
		'not_found'		   =>  'Not Found' ,
		'not_found_in_trash'  =>  'Not found in Trash'
	);
	// Set other options for Custom Post Type
	$args = array(
		'label'			   =>  'externalbooks' ,
		'labels'			  => $labels,
		// Features this CPT supports in Post Editor
		'supports'			=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'book-tags' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'		  => array('externalbook-tags'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/  
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'menu_icon'				=> 'dashicons-book'
	);
		// Registering your Custom Post Type
	register_post_type( 'externalbooks', $args );

// Set UI labels for Keywords
	$labels = array(
	  'name'				=> _x( 'Keywords', 'Post Type General Name' ),
	  'singular_name'	   => _x( 'Keyword', 'Post Type Singular Name' ),
	  'menu_name'		   =>  'Keywords' ,
	  'parent_item_colon'   =>  'Parent Keyword' ,
	  'all_items'		   =>  'All Keywords' ,
	  'view_item'		   =>  'View Keyword' ,
	  'add_new_item'		=>  'Add New Keyword' ,
	  'add_new'			 =>  'Add New' ,
	  'edit_item'		   =>  'Edit Keyword' ,
	  'update_item'		 =>  'Update Keyword' ,
	  'search_items'		=>  'Search Keyword' ,
	  'not_found'		   =>  'Not Found' ,
	  'not_found_in_trash'  =>  'Not found in Trash'
	);
	
// Set other options for Custom Post Type
	$args = array(
	  'label'			   =>  'keywords' ,
	  'labels'			  => $labels,
	  // Features this CPT supports in Post Editor
	  'supports'			=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'keyword-tags' ),
	  // You can associate this CPT with a taxonomy or custom taxonomy. 
	  'taxonomies'		  => array('keyword-tags'),
	  /* A hierarchical CPT is like Pages and can have
	  * Parent and child items. A non-hierarchical CPT
	  * is like Posts.
	  */  
	  'hierarchical'		=> false,
	  'public'			  => true,
	  'show_ui'			 => true,
	  'show_in_menu'		=> true,
	  'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'	   => 5,
	  'can_export'		  => true,
	  'has_archive'		 => false,
	  'rewrite' => array(
				  'slug'	=> 'keywords-page'
			 ),
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'menu_icon'		   => 'dashicons-admin-network'
	);
	
	// Registering your Custom Post Type
	register_post_type( 'keywords', $args );


  // Set UI labels for People
  $people_labels = array(
	'name'				=> _x( 'People', 'Post Type General Name' ),
	'singular_name'	   => _x( 'Person', 'Post Type Singular Name' ),
	'menu_name'		   =>  'People' ,
	'parent_item_colon'   =>  'Parent People' ,
	'all_items'		   =>  'All People' ,
	'view_item'		   =>  'View People' ,
	'add_new_item'		=>  'Add New Person' ,
	'add_new'			 =>  'Add New' ,
	'edit_item'		   =>  'Edit Person' ,
	'update_item'		 =>  'Update Person' ,
	'search_items'		=>  'Search People' ,
	'not_found'		   =>  'Not Found' ,
	'not_found_in_trash'  =>  'Not found in Trash'
  );
  
// Set other options for Custom Post Type
  
  $people_args = array(
	'label'			   => 'people' ,
	'labels'			  => $people_labels,
	// Features this CPT supports in Post Editor
	'supports'			=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' , 'person-tags' ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	'taxonomies'		  => array( 'person-tags'),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/  
	'hierarchical'		=> false,
	'public'			  => true,
	'show_ui'			 => true,
	'show_in_menu'		=> true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'	   => 6,
	'can_export'		  => true,
	'has_archive'		 => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'menu_icon'		   => 'dashicons-groups'
  );
  
  // Registering your Custom Post Type
  register_post_type( 'people', $people_args );
  flush_rewrite_rules();

  // Set UI labels for Series Page
  $series_labels = array(
	'name'				=> _x( 'Series Page', 'Post Type General Name' ),
	'singular_name'	   => _x( 'Series Page', 'Post Type Singular Name' ),
	'menu_name'		   =>  'Series Page' ,
	'parent_item_colon'   =>  'Parent Series Page' ,
	'all_items'		   =>  'All Series Pages' ,
	'view_item'		   =>  'View Series Page' ,
	'add_new_item'		=>  'Add New Series Page' ,
	'add_new'			 =>  'Add New Page' ,
	'edit_item'		   =>  'Edit Series Page' ,
	'update_item'		 =>  'Update Series Page' ,
	'search_items'		=>  'Search Series Page' ,
	'not_found'		   =>  'Not Found' ,
	'not_found_in_trash'  =>  'Not found in Trash'
  );
  
// Set other options for Custom Post Type
  
	$series_args = array(
		'label'			   =>  'series-page' ,
		'labels'			  => $series_labels,
		// Features this CPT supports in Post Editor
		'supports'			=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' , 'series' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'		  => array( 'series'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/  
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 6,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'menu_icon'				=> 'dashicons-images-alt'
	);

	// Registering your Custom Post Type
	register_post_type( 'series-page', $series_args );
	flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );


/************* CUSTOM TAXONOMIES *************/

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_custom_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_custom_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

	$tax_labels = array(
		'name' => _x( 'Series', 'taxonomy general name' ),
		'singular_name' => _x( 'Series', 'taxonomy singular name' ),
		'search_items' =>   'Search Series' ,
		'all_items' =>  'All Series' ,
		'parent_item' =>  'Parent Series' ,
		'parent_item_colon' =>  'Parent Series:' ,
		'edit_item' =>  'Edit Series' , 
		'update_item' =>  'Update Series' ,
		'add_new_item' =>  'Add New Series' ,
		'new_item_name' =>  'New Series Name' ,
		'menu_name' =>  'Series' ,
	);

// Now register the taxonomy

	register_taxonomy('series',array('books','series-page'), array(
		'hierarchical' => true,
		'labels' => $tax_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'series' ),
	));

	$role_tax_labels = array(
		'name' => _x( 'Role', 'taxonomy general name' ),
		'singular_name' => _x( 'Role', 'taxonomy singular name' ),
		'search_items' =>  'Search Roles' ,
		'all_items' => 'All Roles' ,
		'parent_item' => 'Parent Role' ,
		'parent_item_colon' => 'Parent Roles:' ,
		'edit_item' => 'Edit Role' , 
		'update_item' => 'Update Roles' ,
		'add_new_item' => 'Add New Role' ,
		'new_item_name' => 'New Roles Name' ,
		'menu_name' => 'Roles' ,
	);

// Now register the taxonomy

	register_taxonomy('role',array('people'), array(
		'hierarchical' => true,
		'labels' => $role_tax_labels ,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'role' ),
	));


	$person_tax_labels = array(
		'name'					   => 'Person Tag',
		'singular_name'			  => 'Person Tag',
		'menu_name'				  => 'Person Tags',
		'all_items'				  => 'All Person Tags',
		'parent_item'				=> 'Parent Person Tag',
		'parent_item_colon'		  => 'Parent Person Tag:',
		'new_item_name'			  => 'New Person Tag',
		'add_new_item'			   => 'Add New Person Tag',
		'edit_item'				  => 'Edit Person Tag',
		'update_item'				=> 'Update Person Tag',
		'separate_items_with_commas' => 'Separate Person Tags with commas',
		'search_items'			   => 'Search Person Tags',
		'add_or_remove_items'		=> 'Add or remove Person Tags',
		'choose_from_most_used'	  => 'Choose from the most used Person Tags',
		'not_found'				  => 'Not Found',
	);
	$person_tax_args = array(
		'labels'					 => $person_tax_labels,
		'hierarchical'			   => false,
		'public'					 => true,
		'show_ui'					=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => true,
		'show_tagcloud'			  => true,
	);

	register_taxonomy( 'person-tags', array( 'people' ), $person_tax_args );



	$book_tags_labels = array(
		'name'					   => 'Book Tag',
		'singular_name'			  => 'Book Tag',
		'menu_name'				  => 'Book Tags',
		'all_items'				  => 'All Book Tags',
		'parent_item'				=> 'Parent Book Tag',
		'parent_item_colon'		  => 'Parent Book Tag:',
		'new_item_name'			  => 'New Book Tag',
		'add_new_item'			   => 'Add New Book Tag',
		'edit_item'				  => 'Edit Book Tag',
		'update_item'				=> 'Update Book Tag',
		'separate_items_with_commas' => 'Separate Book Tags with commas',
		'search_items'			   => 'Search Book Tags',
		'add_or_remove_items'		=> 'Add or remove Book Tags',
		'choose_from_most_used'	  => 'Choose from the most used Book Tags',
		'not_found'				  => 'Not Found',
	);
	$book_tags_args = array(
		'labels'					 => $book_tags_labels,
		'hierarchical'			   => false,
		'public'					 => true,
		'show_ui'					=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => true,
		'show_tagcloud'			  => true,
	);

	register_taxonomy( 'book-tags', array( 'books' ), $book_tags_args );


}

add_filter('upload_mimes','add_custom_mime_types');
  function add_custom_mime_types($mimes){
	return array_merge($mimes,array (
		'epub' => 'application/epub+zip'
	));
  }

/************* PAGES *************/

// Add Excerpt
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	 add_post_type_support( 'page', 'excerpt' );
}


add_filter('rewrite_rules_array','wp_author_categories');
add_filter('query_vars','wp_insert_wp_author_categories');
add_filter('rewrite_rules_array','wp_blog_pagination');
add_filter('query_vars','wp_insert_wp_blog_pagination');
add_filter('rewrite_rules_array','wp_read_book');
add_filter('query_vars','wp_insert_wp_read_book');
add_filter('init','flushRules');

// Remember to flush_rules() when adding rules
function flushRules(){
  global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

// Adding a new rule
function wp_author_categories($rules)
{
  $newrules = array();
  $newrules['authors/(.+)'] = 'index.php?pagename=authors&person-tag=$matches[1]';
  $finalrules = $newrules + $rules;
		return $finalrules;
}

// Adding the var so that WP recognizes it
function wp_insert_wp_author_categories($vars)
{
	array_push($vars, 'person-tag');
	return $vars;
}

// Adding a new rule
function wp_blog_pagination($rules)
{
  $newrules = array();
  $newrules['blogs/page/(.+)'] = 'index.php?pagename=blogs&page_offset=$matches[1]';
  $finalrules = $newrules + $rules;
		return $finalrules;
}

// Adding the var so that WP recognizes it
function wp_insert_wp_blog_pagination($vars)
{
	array_push($vars, 'page_offset');
	return $vars;
}

// Adding a new rule
function wp_read_book($rules)
{
	$newrules = array();
	$newrules['read/(.+)'] = 'index.php?pagename=read&book_slug=$matches[1]';
	$finalrules = $newrules + $rules;
	return $finalrules;
}

// Adding the var so that WP recognizes it
function wp_insert_wp_read_book($vars)
{
	array_push($vars, 'book_slug');
	return $vars;
}

//Stop wordpress from redirecting
remove_filter('template_redirect', 'redirect_canonical');

add_action( 'wp_enqueue_scripts', 'jk_load_dashicons' );
function jk_load_dashicons() {
	wp_enqueue_style( 'dashicons' );
}
/*********************************/

// Add Translation Option
load_theme_textdomain( 'wpbootstrap', TEMPLATEPATH.'/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) ) require_once( $locale_file );

// Clean up the WordPress Head
if( !function_exists( "wp_bootstrap_head_cleanup" ) ) {  
  function wp_bootstrap_head_cleanup() {
	// remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );					// Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );						  // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );							   // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );					   // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );						 // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );			// previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );			 // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );						   // WP version
  }
}
// Launch operation cleanup
add_action( 'init', 'wp_bootstrap_head_cleanup' );

// remove WP version from RSS
if( !function_exists( "wp_bootstrap_rss_version" ) ) {  
  function wp_bootstrap_rss_version() { return ''; }
}
add_filter( 'the_generator', 'wp_bootstrap_rss_version' );


/************* Modifying the Excerpt *************/


if( !function_exists( "wp_bootstrap_excerpt_more" ) ) {  
  function wp_bootstrap_excerpt_more( $more ) {
	global $post;
	return ' ...';
  }
}
add_filter('excerpt_more', 'wp_bootstrap_excerpt_more');

function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 200);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.' ...';
return apply_filters('the_content', $excerpt);
}

// Add WP 3+ Functions & Theme Support
if( !function_exists( "wp_bootstrap_theme_support" ) ) {  
  function wp_bootstrap_theme_support() {
	add_theme_support( 'post-thumbnails' );	  // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size( 125, 125, true );   // default thumb size

	add_image_size( 'people-thumb-md', 300, 225, true ); // Hard Crop Mode
	add_image_size( 'people-thumb-sm', 140, 105, true ); // Hard Crop Mode
	add_image_size( 'book-thumb-sm', 140, 200, true ); // Hard Crop Mode
	add_image_size( 'book-thumb-md', 210, 30, true ); // Hard Crop Mode
	add_image_size( 'book-thumb-mini', 9999, 100 ); // Unlimited Width
	add_image_size( 'teaser-big', 940, 340, true ); // Hard Crop Mode

	add_theme_support( 'custom-background' );  // wp custom background
	add_theme_support( 'automatic-feed-links' ); // rss

	// Add post format support - if these are not needed, comment them out
	add_theme_support( 'post-formats',	  // post formats
	  array( 
		'aside',   // title less blurb
		'gallery', // gallery of images
		'link',	// quick link to other site
		'image',   // an image
		'quote',   // a quick quote
		'status',  // a Facebook like status update
		'video',   // video 
		'audio',   // audio
		'chat'	 // chat transcript 
	  )
	);  

	add_theme_support( 'menus' );			// wp menus
	
	register_nav_menus(					  // wp3+ menus
	  array( 
		'top-menu' => 'The Main Menu',   // main nav in header
		'footer-menu' => 'Footer Links' // secondary nav in footer
	  )
	);  
  }
}
// launching this stuff after theme setup
add_action( 'after_setup_theme','wp_bootstrap_theme_support' );

function wp_bootstrap_main_nav() {
	// Display the WordPress menu if available
	wp_nav_menu( 
		array( 
			'menu' => 'top-menu', /* menu name */
			'menu_class' => 'nav navbar-nav',
			'theme_location' => 'The Main Menu', /* where in the theme it's assigned */
			'container' => 'false', /* container class */
			'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
			'walker' => new Bootstrap_walker()
		)
	);
}

function wp_bootstrap_footer_links() { 
  // Display the WordPress menu if available
  wp_nav_menu(
	array(
		'after' 			=> '<span class="seperator">/</span>',
		'menu' 				=> 'footer-menu', /* menu name */
		'theme_location' 	=> 'Footer Links', /* where in the theme it's assigned */
		'container_class' 	=> 'footer-links clearfix', /* container class */
		'fallback_cb' 		=> 'wp_bootstrap_footer_links_fallback' /* menu fallback */,
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s<li class="cp">&copy; 2015 Meson Press</li></ul>',
	)
  );
}

function nav_menu_first_last( $items ) {
	$pos = strrpos($items, 'class="seperator', -1);

	if($pos){
		$items=substr_replace($items, 'seperator-last ', $pos+7, 0);

	}
	$pos = strpos($items, 'class="seperator');
	if($pos){
		$items=substr_replace($items, 'seperator-first ', $pos+7, 0);
	}

	return $items;
}
add_filter( 'wp_nav_menu_items', 'nav_menu_first_last' );

// this is the fallback for header menu
function wp_bootstrap_main_nav_fallback() { 
  /* you can put a default here if you like */ 
}

// this is the fallback for footer menu
function wp_bootstrap_footer_links_fallback() { 
  /* you can put a default here if you like */ 
}

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');		 // custom admin functions

// Custom Backend Footer
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');
function wp_bootstrap_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://tokju.com" target="_blank">TOKJU</a></span>. Based on 320press.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 780, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {
  register_sidebar(array(
  	'id' => 'sidebar1',
  	'name' => 'Main Sidebar',
  	'description' => 'Used on every page BUT the homepage page template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>',
  ));
	
  register_sidebar(array(
  	'id' => 'sidebar2',
  	'name' => 'Homepage Sidebar',
  	'description' => 'Used only on the homepage page template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>',
  ));
	
  register_sidebar(array(
	'id' => 'footer1',
	'name' => 'Footer 1',
	'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widgettitle">',
	'after_title' => '</h4>',
  ));

  register_sidebar(array(
	'id' => 'footer2',
	'name' => 'Footer 2',
	'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widgettitle">',
	'after_title' => '</h4>',
  ));

  register_sidebar(array(
	'id' => 'footer3',
	'name' => 'Footer 3',
	'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widgettitle">',
	'after_title' => '</h4>',
  ));
	
	
  /* 
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call 
  your new sidebar just use the following code:
  
  Just change the name to whatever your new
  sidebar's id is, for example:
  
  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php
  
  */
} // don't remove this bracket!
add_action( 'widgets_init', 'wp_bootstrap_register_sidebars' );

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function wp_bootstrap_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard clearfix">
				<div class="avatar col-sm-3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="col-sm-9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','wpbootstrap'),'<span class="edit-comment btn btn-sm btn-info"><i class="glyphicon-white glyphicon-pencil"></i>','</span>') ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
	   					<div class="alert-message success">
		  				<p><?php _e('Your comment is awaiting moderation.','wpbootstrap') ?></p>
		  				</div>
					<?php endif; ?>
					
					<?php comment_text() ?>
					
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
					
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</article>
	<!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment;
?>
		<li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

/************* SEARCH FORM LAYOUT *****************/

/****************** password protected post form *****/

add_filter( 'the_password_form', 'wp_bootstrap_custom_password_form' );

function wp_bootstrap_custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'wpbootstrap') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'wpbootstrap') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'wpbootstrap' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'wp_bootstrap_my_widget_tag_cloud_args' );

function wp_bootstrap_my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag clould output so that it can be styled by CSS
function wp_bootstrap_add_tag_class( $taglinks ) {
	if (is_string($taglinks)){
		  $tags = explode('</a>', $taglinks);
		  $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
	  
		  foreach( $tags as $tag ) {
			$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag );
		  }
	  
		  $taglinks = implode('</a>', $tagn);
	}

	return $taglinks;
}

add_action( 'wp_tag_cloud', 'wp_bootstrap_add_tag_class' );

// Just return an array of tag_cloud names and classes 
function wp_strap_tag_class( $taglinks ) {
	$dom = new DOMDocument;
	$out = [];
	if (!empty($taglinks)){
		$dom->loadHTML(implode($taglinks));
		$tags = $dom->getElementsByTagName('a'); 
		$out = array();
	
		foreach ($tags as $tag) {
			$link = custom_tag_escape($tag->textContent);
			array_push($out,['class' => $tag->getAttribute('class'), 'title' => $tag->textContent, 'link' => $link]);
		}
	}

	return $out;
}
//add_action( 'wp_tag_cloud', 'wp_strap_tag_class' );

function custom_tag_escape($data){
	return strtolower(str_replace(" ", "-", $data));
}

function wp_filter_tag_cloud ( $args ){
	$output = "<div id=\"tag-cloud\">\n";
	$cloud = wp_tag_cloud( $args );
	$tags = wp_strap_tag_class($cloud);
	 foreach ($tags as $tag) {
		 $output .= "<div class=\"filter checkFilter\" data-filter=\".".$tag['link']."\"><div>".utf8_decode($tag['title'])."</div></div>";
	 }
	$output .= "<div class=\"filter checkFilter\" data-filter=\"all\"><div>All</div></div>";
	$output .= "<div class=\"clear-fix\">&nbsp;</div>";
	$output .= "\n</div>";
	echo $output;
}

//add_filter( 'wp_tag_cloud','wp_bootstrap_wp_tag_cloud_filter', 10, 2) ;

function wp_bootstrap_wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

function get_initials($name){
  $tmp = explode(" ", $name);
  $initials = array_map(function($name){ return strtolower(substr($name,0,1));},array_reverse($tmp));
  return $initials[0];
}

// Disable jump in 'read more' link
function wp_bootstrap_remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'wp_bootstrap_remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );

function wp_bootstrap_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
	array(  
		'label'=> 'Homepage tagline area',  
		'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
		'id'	=> $prefix.'tagline',  
		'type'  => 'textarea' 
	)  
);  

// The Homepage Meta Box Callback  
function wp_bootstrap_show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
	
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
	  // get value of this field if it exists for this post  
	  $meta = get_post_meta($post->ID, $field['id'], true);  
	  // begin a table row with  
	  echo '<tr> 
			  <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
			  <td>';  
			  switch($field['type']) {  
				  // text  
				  case 'text':  
					  echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
						  <br /><span class="description">'.$field['desc'].'</span>';  
				  break;
				  
				  // textarea  
				  case 'textarea':  
					  echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
						  <br /><span class="description">'.$field['desc'].'</span>';  
				  break;  
			  } //end switch  
	  echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function wp_bootstrap_save_homepage_meta( $post_id ) {  

	global $custom_meta_fields;  
  
	// verify nonce  
	if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
		return $post_id;

	// check autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
	}
  
	// loop through fields and save the data  
	foreach ( $custom_meta_fields as $field ) {
		$old = get_post_meta( $post_id, $field['id'], true );
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta( $post_id, $field['id'], $new );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	} // end foreach
}
add_action( 'save_post', 'wp_bootstrap_save_homepage_meta' );

// Add thumbnail class to thumbnail links
function wp_bootstrap_add_class_attachment_link( $html ) {
	$postid = get_the_ID();
	$html = str_replace( '<a','<a class="thumbnail"',$html );
	return $html;
}
add_filter( 'wp_get_attachment_link', 'wp_bootstrap_add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
function wp_bootstrap_first_paragraph( $content ){
	global $post;

	// if we're on the homepage, don't add the lead class to the first paragraph of text
	if( is_page_template( 'page-homepage.php' ) )
		return $content;
	else
		return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
//add_filter( 'the_content', 'wp_bootstrap_first_paragraph' );

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

	 global $wp_query;
	 $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	 $class_names = $value = '';
	
		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
	   
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target )	 ? ' target="' . esc_attr( $object->target	 ) .'"' : '';
   	$attributes .= ! empty( $object->xfn )		? ' rel="'	. esc_attr( $object->xfn		) .'"' : '';
   	$attributes .= ! empty( $object->url )		? ' href="'   . esc_attr( $object->url		) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	if ( $args->has_children ) {
		  $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
	}

	$item_output = $args->before;
	$item_output .= '<a'. $attributes .'>';
	$item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
	$item_output .= $args->link_after;

	// if the item has children add the caret just before closing the anchor tag
	if ( $args->has_children ) {
		$item_output .= '<b class="caret"></b></a>';
	}
	else {
		$item_output .= '</a>';
	}

	$item_output .= $args->after;

	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
		
  function start_lvl(&$output, $depth = 0, $args = Array()) {
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
	  
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
	$id_field = $this->db_fields['id'];
	if ( is_object( $args[0] ) ) {
		$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
	}
	return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }		
}

add_editor_style('editor-style.css');

function wp_bootstrap_add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
	$classes[] = "active";
	}
  
  return $classes;
}

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'wp_bootstrap_add_active_class', 10, 2 );

// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
	function wp_bootstrap_theme_styles() { 
		// This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.

		wp_register_style( 'wpbs', get_template_directory_uri() . '/library/dist/css/styles.min.css', array(), '1.0', 'all' );

		wp_enqueue_style( 'wpbs' );

		// For child themes
		wp_register_style( 'wpbs-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'wpbs-style' );

		// Slick carousel
		wp_register_style( 'slick-carousel', get_template_directory_uri() . '/library/slick.js/slick/slick.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'slick-carousel' );

		// // Fontawesome
		// wp_register_style( 'fontAwesome', get_template_directory_uri() . '/library/dist/css/fontawesome.css', array(), '1.0', 'all' );
		// wp_enqueue_style( 'fontAwesome' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );

// enqueue javascript
if( !function_exists( "wp_bootstrap_theme_js" ) ) {  
  function wp_bootstrap_theme_js(){

	if ( !is_admin() ){
	  if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1) ) 
		wp_enqueue_script( 'comment-reply' );
	}

	// This is the full Bootstrap js distribution file. If you only use a few components that require the js files consider loading them individually instead
	wp_register_script( 'bootstrap', 
	  get_template_directory_uri() . '/library/bootstrap/dist/js/bootstrap.min.js', 
	  array('jquery'), 
	  '1.2' );
	wp_register_script( 'wpbs-js', 
	  get_template_directory_uri() . '/library/dist/js/scripts.2c1cb93a.min.js',
	  array('bootstrap'), 
	  '1.2' );
	wp_register_script( 'scripts', 
	  get_template_directory_uri() . '/library/dist/js/scripts.min.js',
	  array('bootstrap'), 
	  '1.2' );
	wp_register_script( 'ajax-search', 
	  get_template_directory_uri() . '/library/dist/js/ajax-search.js',
	  array('bootstrap'), 
	  '1.2' );
	wp_register_script( 'read-page', 
	  get_template_directory_uri() . '/library/dist/js/page-read.js',
	  array('bootstrap'), 
	  '1.2' );
	wp_register_script( 'modernizr', 
	  get_template_directory_uri() . '/library/modernizer/modernizr.js', 
	  array('jquery'), 
	  '1.2' );
	wp_register_script( 'slick-slider', 
	  get_template_directory_uri() . '/library/slick.js/slick/slick.min.js', 
	  array('jquery'), 
	  '1.2' );
	wp_register_script( 'cookiejs', 
	  get_template_directory_uri() . '/library/js/jquery.cookie.js', 
	  array('jquery'), 
	  '1.2' );
	wp_register_script( 'mixitup', 
	  get_template_directory_uri() . '/library/js/jquery.mixitup.min.js', 
	  array('jquery'), 
	  '2.1.7' );
	wp_register_script( 'book-page', 
	  get_template_directory_uri() . '/library/dist/js/book-page.js', 
	  array('jquery'), 
	  '1.0' );

	wp_enqueue_script( 'bootstrap' );
	//wp_enqueue_script( 'carousel' );
	wp_enqueue_script( 'scripts' );
	if ( is_search() ) {
	  wp_enqueue_script( 'ajax-search' );
	}
	//wp_enqueue_script( 'wpbs-js' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'slick-slider' );
	wp_enqueue_script( 'cookiejs' );
	// wp_enqueue_script( 'switcherjs' );
	wp_enqueue_script( 'mixitup' );
	wp_enqueue_script( 'book-page' );
	wp_enqueue_script( 'read-page' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_js' );

/**
 * Registers and loads font awesome
 * CSS files using a CDN.
 *
 * @link http://www.bootstrapcdn.com/#tab_fontawesome
 * @author FAT Media
 */
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );
/**
 * Register the awesomeness and add IE7 support
 *
 * @global $wp_styles
 * @global $is_IE
 */
function prefix_enqueue_awesome() {
  global $wp_styles, $is_IE;
  wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css', array(), '3.2.0' );
  if ( $is_IE ) {
	wp_enqueue_style( 'prefix-font-awesome-ie', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome-ie7.min.css', array('prefix-font-awesome'), '3.2.0' );
	// Add IE conditional tags for IE 7 and older
	$wp_styles->add_data( 'prefix-font-awesome-ie', 'conditional', 'lte IE 7' );
  }
}



// Get <head> <title> to behave like other themes
function wp_bootstrap_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
	return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
	$title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
	$title = "$title $sep " . sprintf( __( 'Page %s', 'wpbootstrap' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'wp_bootstrap_wp_title', 10, 2 );

// Related Posts Function (call using wp_bootstrap_related_posts(); )
function wp_bootstrap_related_posts() {
  echo '<ul id="bones-related-posts">';
  global $post;
  $tags = wp_get_post_tags($post->ID);
  if($tags) {
	foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
		$args = array(
		  'tag' => $tag_arr,
		  'numberposts' => 5, /* you can change this to show more */
		  'post__not_in' => array($post->ID)
	  );
		$related_posts = get_posts($args);
		if($related_posts) {
		  foreach ($related_posts as $post) : setup_postdata($post); ?>
			  <li class="related_post"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		  <?php endforeach; } 
	  else { ?>
			<li class="no_related_post">No Related Posts Yet!</li>
	<?php }
  }
  wp_reset_query();
  echo '</ul>';
}

// Numeric Page Navi (built into the theme by default)
function wp_bootstrap_page_navi($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
	$paged = 1;
  }
  $pages_to_show = 5;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
	$start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
	$end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
	$start_page = $max_page - $pages_to_show_minus_1;
	$end_page = $max_page;
  }
  if($start_page <= 0) {
	$start_page = 1;
  }
	
  $prevPage = ($paged > 1) ? $paged - 1 : false;
  $nextPage = ($paged < $max_page) ? $paged + 1 : false;
  $firstPage = ($paged-3 > 0) ? '<li style="width:25px;"><a href="'.get_pagenum_link(1).'">1 ...</a></li>' : false;
  $lastPage = ($paged+3 < $max_page) ? '<li style="width:25px;"><a href="'.get_pagenum_link($max_page).'"> ...'.$max_page.'</a></li>' : false;
  echo $before.'<ul class="paginator">'."";
	
  if($prevPage) { echo '<li class="exists first"><a href="' . site_url().'/blogs/page/'.$prevPage .'"><i class="fa fa-chevron-left"> </i></a></li>'; }
  else { echo '<li class="disabled first"></li>'; }
  
  echo "<li><ul class=\"pageLinkContainer\">";
  if ($firstPage ) {
	  echo $firstPage; 
  }
  for($i = $start_page; $i  <= $end_page; $i++) {
	if($i == $paged) {
	  echo '<li class="active"><a href="#">'.$i.'</a></li>';
	} else {
	  echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
	}
  }
  if ($lastPage ) {
	  echo $lastPage; 
  }
  echo "</ul></li>";
  if($nextPage) { 
	echo '<li class="exists last"><a href="' . site_url().'/blogs/page/'.$nextPage .'"><i class="fa fa-chevron-right"> </i></a></li>'; 
  } else { 
	echo '<li class="disabled last"></li>'; 
  }
  
  echo '</ul>'.$after."";
}

// Remove <p> tags from around images
function wp_bootstrap_filter_ptags_on_images( $content ){
  return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'wp_bootstrap_filter_ptags_on_images' );

/*************  Admin Theme & TinyMCE Editor Modifications ********************/

// Custom Admin Theme
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/library/dist/css/admin-style.css', false, '1.0.0' );
}

// Add Editor Stylesheet
function meson_add_editor_styles() {
	add_editor_style( 'library/dist/css/meson-editor-style.css' );
}
add_action( 'admin_init', 'meson_add_editor_styles' );

// Add more buttons (font size select to the rich text editor (TinyMCE) in WordPress
// I use array_unshift() to add the additional buttons in front of all the other buttons in the row. If you want to achieve the complete opposite, use array_push().

function register_additional_button($buttons) {
   array_unshift($buttons, 'fontsizeselect');
   return $buttons;
}

// Assigns register_additional_button() to "mce_buttons_2" filter
add_filter('mce_buttons_2', 'register_additional_button');


// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "12px 13px 14px 16px 18px 21px 24px 28px 32px 34px 36px 38px 40px 42px 44px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'meson-press Link Style',  
			'selector' => 'a',  
			'classes' => 'more_info',			 
		),
		array(  
			'title' => 'Align right',   
			'selector' => 'p',   
			'classes' => 'banner_text_right',	
		),
		array(  
			'title' => 'Align left',   
			'selector' => 'p',   
			'classes' => 'banner_text_left',	
		),
		array(  
			'title' => 'Align center',   
			'selector' => 'p',   
			'classes' => 'banner_text_center',	
		),
		/*array(  
			'title' => 'Underline white',   
			'selector' => 'p',   
			'classes' => 'banner_text_underline_white',	
		),
		array(  
			'title' => 'Underline black',   
			'selector' => 'p',   
			'classes' => 'banner_text_underline_black',	
		),
		array(  
			'title' => 'White background',   
			'selector' => 'p',   
			'classes' => 'banner_text_background_white',	
		),
		array(  
			'title' => 'Black background',   
			'selector' => 'p',   
			'classes' => 'banner_text_background_black',	
		),*/
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  

	return $init_array;  
} 

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  


/****** SEARCH functions ********/
function wrap_search_content($search, $string) {

	$result = explode(" ", $string);
	$pos = array_search($search, $result);

	$before = 5;
	$after = 5;
	$total = $before + $after + 1;
	$output = "";

	if (($pos >= 0)&&($pos < $before)) {
	  if(count($result)>($pos+$after)){
		$diff = $total - $pos;
		$start = 0;
		for($i=$start; $i < ($start+$total);$i++){
		  $value = $result[$i];
		  if ($index < $diff){
			if ($search != $value){
			  $output .= $value." ";
			} else {
			  $output .= "<span class=\"searchTerm\">".$value."</span> ";
			}
		  }
		  
		}
		$output .= "...";
	  } else {
		$output = implode(" ", $result);
	  }
	} else if ($pos > $before) {
	   $output .= "... ";
	   $start = $pos - $before;
	   for($i=$start; $i < ($start+$total);$i++){
		  if ($result[$i] != $search){
			$output .= $result[$i]." ";
		  } else {
			$output .= "<span class=\"searchTerm\">".$result[$i]."</span> ";
		  }
	   }
	}
	return $output;
}

function wrap_search_content_str($search, $string) {
	$before = 40;
	$total = 90;
	if ($search != ""){
	  $pos = strpos($string,$search);

	  if($pos>0){
		
		$output = "";
		$start = $pos - $before;
	
		$searchStringlength = strlen($search);
		if ($start > 0 ){
		  // There are more then 30 characters before the search term
		  // 
		  $part1 = "...";
		  $part1 .= substr($string, $start, 30);
		  
		} else {
		  // There are more then 30 characters before the search term
		  $part1 = substr($string, 0, $pos);
		}
		$part1Length = strlen($part1);
		$end = $part1Length+$searchStringlength;
		$diff = $total-$end;
		if($diff>0){
		  $part2 = substr($string, $end, $diff)."... ";
		} else {
		  $string = $part1 + $search;
		  $part2 = substr($string, $end, $diff);
		}
	
		$searchTerm = "<span class=\"searchTerm\">".$search."</span>";
		$output = htmlentities($part1). " " . $searchTerm . " " . htmlentities($part2);
	  } else {
		if(strlen($string)>$total){
		  $output = substr($string,0,($total-3))."... ";
		} else {
		  $output = $string;
		}
		
	  }
	} else {
	  $output = substr($string,0,($total-3))."...";
	}
	return $output;

}

function make_coins($post){
	$authors = get_field('author'); 
	$organisation = get_field('organisation');
	$place_of_publication = get_field('place_of_publication');
	$publishing_year = get_field('publishing_year');
	$genre = get_field('genre');
	$volumne = get_field('volumne');
	$spage = get_field('spage');
	$epage = get_field('epage');
	$tpage = get_field('pages');
	$isbn = get_field('isbn');
	$publisher = get_field('publisher_name');
	$authornames=[];
	if( $authors ) {
	  foreach( $authors as $author) {
		$tmp = explode(" ", $author->post_title);
		$firstname = array_shift($tmp);
		$lastname = array_pop($tmp);
		
		$other = "";
		if(count($tmp)>0){
		  $middle = implode(" ",$tmp);
		  $other = " ".$middle;
		}
		$full = $lastname.", ".$firstname.$other;
	   
		$out = array(
				  "first" => $firstname,
				  "last"  => $lastname,
				  "other" => $other,
				  "full"  => $full
		);
		array_push($authornames, $out);
	  }
	}
	
	$au = array_map(function($author){ return $author["full"]; }, $authornames);

	/*
	  rft.btitle  The title of the book. This can also be expressed as title, for compatibility with version 0.1. "moby dick or the white whale"
	  rft.isbn  International Standard Book Number (ISBN). The ISBN is usually presented as 9 digits plus a final check digit (which may be "X"), i.e. "057117678X" but it may contain hyphens, i.e. "1-878067-73-7"
	  rft.aulast  First author's family name. This may be more than one word. In many citations, the author's family name is recorded first and is followed by a comma, i.e. Smith, Fred James is recorded as "aulast=smith"
	  rft.aufirst First author's given name or names or initials. This data element may contain multiple words and punctuation, i.e. "Fred F", "Fred James"
	  rft.auinit  First author's first and middle initials.
	  rft.auinit1 First author's first initial.
	  rft.auinitm First author's middle initial.
	  rft.ausuffix  First author's name suffix. Qualifiers on an author's name such as "Jr.", "III" are entered here. i.e. Smith, Fred Jr. is recorded as "ausuffux=jr"
	  rft.au  This data element contains the full name of a single author, i. e. "Smith, Fred M", "Harry S. Truman". (au is repeatable)
	  rft.aucorp  Organization or corporation that is the author or creator of the book, i.e. "Mellon Foundation"
	  rft.atitle  Chapter title. Chapter title is included if it is a distinct title, i.e. "The Push Westward."
	  rft.title Book title. Provided for compatibility with version 0.1. Prefer btitle.
	  rft.place Place of publication. "New York"
	  rft.pub Publisher name. "Harper and Row"
	  rft.date  Date of publication. Book dates are assumed to be a single year.
	  rft.edition Statement of the edition of the book. This will usually be a phrase, with or without numbers, but may be a single number. I.e. "First edition", "4th ed."
	  rft.tpages  Total pages. Total pages is the largest recorded number of pages, if this can be determined. I.e., "ix, 392 p." would be recorded as "392" in tpages. This data element is usually available only for monographs (books and printed reports). In some cases, tpages may not be numeric, i.e. "F36"
	  rft.series  The title of a series in which the book or document was issued. There may also be an ISSN associated with the series.
	  rft.spage First page number of a start/end (spage-epage) pair. Note that pages are not always numeric.
	  rft.epage Second (ending) page number of a start/end (spage-epage) pair.
	  rft.pages Start and end pages for parts of a book, i.e. "124-147". This can also be used for an unstructured pagination statement when data relating to pagination cannot be interpreted as a start-end pair, i.e. "A7, C4-9", "1-3,6". This data element includes the OpenURL 0.1 definition of "pages".
	  rft.issn  International Standard Serials Number (ISSN). The issn may contain a hyphen, i.e. "1041-5653". An ISSN in the book format is often associated with a series title.
	  bici  Book Item and Component Identifier (BICI). BICI is a draft NISO standard.
	  rft.genre
	*/
	$coins_fields = array("btitle"  => $post->post_title,
						  "isbn"	=> $isbn,
						  "aulast"  => (count($authornames) > 0) ? $authornames[0]["last"] : "",
						  "aufirst" => (count($authornames) > 0) ? $authornames[0]["first"] : "",
						  "au"	  => $au,
						  "aucorp"  => $organisation,
						  "atitle"  => $post->post_title,
						  "title"   => $post->post_title,
						  "place"   => $place_of_publication,
						  "pub"	 => $publisher,
						  "date"	=> $publishing_year,
						  "genre"   => $genre,
						  "volume"  => $volumne,
						  "tpage"   => $tpage
	  );

	$coin_string = "<span class=\"Z3988\" title=\"ctx_ver=Z39.88-2004&rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook";
	foreach ($coins_fields as $key => $value) {
	  if($value != ""){
		if($key != "au"){
		  $coin_string .= "&amp;rft.".$key."=".rawurlencode($value);
		} else {
		  foreach ($au as $author){
			$coin_string .= "&amp;rft.".$key."=".rawurlencode($author);
		  }
		}
	  }
	}
	$coin_string .= "\"></span>";
	return $coin_string;
}

function ajax_search_enqueues() {
	$pagename = get_query_var('pagename');

	// if ( $pagename == "search" ) {
	  wp_enqueue_script( 'ajax-search', get_stylesheet_directory_uri() . 'library/dist/js/ajax-search.js', array( 'jquery' ), '1.0.0', true );
	  wp_localize_script( 'ajax-search', 'myAjax', array( 'ajaxurl' => get_stylesheet_directory_uri() . '/ajax-search.php' ) );

	  // wp_enqueue_style( 'ajax-search', get_stylesheet_directory_uri() . '/css/ajax-search.css' );
	// }
}

add_action( 'wp_enqueue_scripts', 'ajax_search_enqueues' );

/**
 * Adding a "Copyright" field to the media uploader $form_fields array
 *
 * @param array $form_fields
 * @param object $post
 *
 * @return array
 */
function add_copyright_field_to_media_uploader( $form_fields, $post ) {
  $form_fields['copyright_field'] = array(
	'label' => __('Copyright'),
	'value' => get_post_meta( $post->ID, '_custom_copyright', true ),
	'helps' => 'Set a copyright credit for the attachment'
  );

  return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'add_copyright_field_to_media_uploader', null, 2 );

/**
 * Save our new "Copyright" field
 *
 * @param object $post
 * @param object $attachment
 *
 * @return array
 */
function add_copyright_field_to_media_uploader_save( $post, $attachment ) {
  if ( ! empty( $attachment['copyright_field'] ) ) 
	update_post_meta( $post['ID'], '_custom_copyright', $attachment['copyright_field'] );
  else
	delete_post_meta( $post['ID'], '_custom_copyright' );

  return $post;
}
add_filter( 'attachment_fields_to_save', 'add_copyright_field_to_media_uploader_save', null, 2 );

/**
 * Display our new "Copyright" field
 *
 * @param int $attachment_id
 *
 * @return array
 */
function get_featured_image_copyright( $attachment_id = null ) {
  $attachment_id = ( empty( $attachment_id ) ) ? get_post_thumbnail_id() : (int) $attachment_id;

  if ( $attachment_id )
	return get_post_meta( $attachment_id, '_custom_copyright', true );

}

function get_copyright($id){
  return get_post_meta($id, '_custom_copyright', true );
}

function maxLength($string,$count){
	$return = $string;
	if (strlen($string)>=$count){
		$return = substr($string,0,$count-3)."...";
	}
	return $return;
}

function ePubRead($file){
	
	
}

/******************* CUSTOM FIELDS ********************/

function banner_class($class) {
	$out = "";
	if ($class == 'black_text') { 
		$out = 'banner_black_text'; 
	} elseif ($class == 'black_text_bg') { 
		$out = 'banner_black_text_bg'; 
	} elseif ($class == 'white_text') { 
		$out = 'banner_white_text'; 
	}
	return $out;
}
									
define( 'ACF_LITE', true );

if( !class_exists('Acf') ){
	if (file_exists(WP_PLUGIN_DIR.'/advanced-custom-fields/acf.php')){
		include_once(WP_PLUGIN_DIR.'/advanced-custom-fields/acf.php');
	}
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_books',
		'title' => 'Books',
		'fields' => array (
			array (
				'key' => 'field_54b8fba878062',
				'label' => 'OAI Identifier',
				'name' => 'oai_identifier',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba878063',
				'label' => 'Book Link',
				'name' => 'book_identifier',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba878058',
				'label' => 'Subtitle',
				'name' => 'subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_551916f36d7d0',
				'label' => 'Banner Keywords',
				'name' => 'banner_keywords',
				'type' => 'wysiwyg',
				'instructions' => 'Please add here the keywords that will appear on the left side in the banner.<br />Hit "Enter" after every keyword.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5516cca1b0729',
				'label' => 'Excerpt',
				'name' => 'excerpt',
				'type' => 'wysiwyg',
				'instructions' => 'This is the text on the right side of the "Books Banner".<br/>&nbsp;',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_551a90c74c4d6',
				'label' => 'Textcolor',
				'name' => 'banner_textcolor',
				'type' => 'select',
				'instructions' => 'Use this selector to change your textcolor and background.',
				'choices' => array (
					'black_text' => 'Black Text, black underline',
					'black_text_bg' => 'Black Text, black underline, white background',
					'white_text' => 'White Text, white underline',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54b660d734acc',
				'label' => 'Editors',
				'name' => 'editors',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'people',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54b660d734aab',
				'label' => 'Authors',
				'name' => 'author',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'people',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54c8aa3b8d630',
				'label' => 'Big Teaser / Cover Images',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54900e8ce388b',
				'label' => 'Book Cover Small',
				'name' => 'book_cover',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54c8a9d88d62f',
				'label' => 'Teaser Background Color',
				'name' => 'teaser_background_color',
				'type' => 'color_picker',
				'default_value' => '#eeeeee',
			),
			array (
				'key' => 'field_54c79055454d3',
				'label' => 'Book Cover Big Teaser',
				'name' => 'book_cover_big',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b660106970e',
				'label' => 'Print version links',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_551a90c74c4d7',
				'label' => 'Forthcoming',
				'name' => 'book_forthcoming',
				'instructions' => 'If you fill this out, the download links will not be displayed. Even if they are filled out.',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65ded0e49a',
				'label' => 'Shop Link 1',
				'name' => 'shop_link_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65ded0e48f',
				'label' => 'Shop Label 1',
				'name' => 'shop_label_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65f4d0527f',
				'label' => 'Shop Link 2',
				'name' => 'shop_link_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65f4d0527e',
				'label' => 'Shop Label 2',
				'name' => 'shop_label_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65f5a0528a',
				'label' => 'Shop Link 3',
				'name' => 'shop_link_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65f5a0527f',
				'label' => 'Shop Label 3',
				'name' => 'shop_label_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			
			array (
				'key' => 'field_54b66068819c0',
				'label' => 'Book Details',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b65e9600bbb',
				'label' => 'Language',
				'name' => 'language',
				'type' => 'select',
				'choices' => array (
					'english' => 'English',
					'german' => 'German',
					'french' => 'French',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 1,
			),
			array (
				'key' => 'field_54b65ee600bbf',
				'label' => 'license',
				'name' => 'book_license',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65ee600bbe',
				'label' => 'ISBN (Print)',
				'name' => 'isbn_print',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_551552eff6c4d',
				'label' => 'ISBN (PDF)',
				'name' => 'isbn_pdf',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5515533e6d933',
				'label' => 'ISBN (ePub)',
				'name' => 'isbn_epub',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5515533e6d934',
				'label' => 'DOI',
				'name' => 'doi',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65eb100bbc',
				'label' => 'Pages',
				'name' => 'pages',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5515538543fdc',
				'label' => 'Publisher Name',
				'name' => 'publisher_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_551553c9cd761',
				'label' => 'Organisation',
				'name' => 'organisation',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b65eda00bbd',
				'label' => 'Publishing Year',
				'name' => 'publishing_year',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_551553d4cd762',
				'label' => 'Place of Publication',
				'name' => 'place_of_publication',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b6621145b18',
				'label' => 'Available as',
				'name' => 'available_as',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8d4beecb7e',
				'label' => 'Downloads',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54e2177f58fdb',
				'label' => 'PDF Version',
				'name' => 'pdf_version',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_54e214d2a6d6e',
				'label' => 'ePub',
				'name' => 'epub_version',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b65f2fea764',
				'label' => 'Book Information (pdf)',
				'name' => 'book_information_pdf',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b8d4fdc4fb2',
				'label' => 'Citation (XML)',
				'name' => 'citation_xml',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b8d512c4fb3',
				'label' => 'Cover (JPG)',
				'name' => 'cover_jpg',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b8df958c8a4',
				'label' => 'Table of Contents',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b8dfce8c8a5',
				'label' => 'Table of Contents',
				'name' => 'table_of_contents',
				'type' => 'wysiwyg',
				'instructions' => '',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			// array (
			// 	'key' => 'field_54b8dfce8c8a5',
			// 	'label' => 'Chapter',
			// 	'name' => 'chapter',
			// 	'type' => 'text',
			// 	'default_value' => '',
			// 	'placeholder' => '',
			// 	'prepend' => '',
			// 	'append' => '',
			// 	'formatting' => 'html',
			// 	'maxlength' => '',
			// ),
			// array (
			// 	'key' => 'field_54b8dfe58c8a6',
			// 	'label' => 'chapter_file',
			// 	'name' => 'chapter_file',
			// 	'type' => 'file',
			// 	'save_format' => 'id',
			// 	'library' => 'all',
			// ),
			array (
				'key' => 'field_54b6616ed0797',
				'label' => 'Reviews',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b6617fd0798',
				'label' => 'Reviews',
				'name' => 'reviews',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_54b8f154b1e9d',
				'label' => 'Tweet A Quote',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b8f162b1e9e',
				'label' => 'Tweet A Quote',
				'name' => 'tweet_a_quote',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54ba7972c237a',
				'label' => 'Featured / Recommended',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54e1be16a62a7',
				'label' => 'This could also be interesting',
				'name' => 'also_interesting',
				'type' => 'bidirectional-post-relation',
				'instructions' => 'Add books that show in the "This could also be interesting" section of the books detail page',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'externalbooks',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54ba7989c237b',
				'label' => '»People who read our books, could also be interested in … « on Homepage',
				'name' => 'recommended',
				'type' => 'bidirectional-post-relation',
				'required' => 0,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54ba7637e6649',
				'label' => '»Featured Books« Carousel on Homepage',
				'name' => 'featured_books',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54ba77d1200c3',
				'label' => '»Featured book by … « on Authors Page',
				'name' => 'featured_book_by_person',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'people',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54ba831a2c268',
				'label' => '»Featured« on Books Page',
				'name' => 'featured_on_books_page',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'books',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_books-page',
		'title' => 'Books Page',
		'fields' => array (
			array (
				'key' => 'field_54ba82d92a6e2',
				'label' => '»Featured« on Books Page',
				'name' => 'featured_on_books_page',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54e1bbf706106',
				'label' => 'Recommended on detail books page',
				'name' => 'recommended_on_detail_books_page',
				'type' => 'bidirectional-post-relation',
				'instructions' => 'Add books that show up in the "This could also be interesting" section of the books detail page.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					// 'param' => 'page',
					// 'operator' => '==',
					// 'value' => get_page_by_title('Books')->ID,
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-books.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_external-books',
		'title' => 'External Books',
		'fields' => array (
			array (
				'key' => 'field_55156f38d6de6',
				'label' => 'Book Cover small',
				'name' => 'book_cover',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'externalbooks',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_homepage',
		'title' => 'Homepage',
		'fields' => array (
			array (
				'key' => 'field_54bfa5be2cada',
				'label' => 'Big Teaser Feature',
				'name' => 'big_teaser_feature',
				'type' => 'bidirectional-post-relation',
				'required' => 1,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_549000152ae89',
				'label' => 'Featured Books',
				'name' => 'featured_books',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54a6dfe49461c',
				'label' => 'Meson News',
				'name' => 'meson_news',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'category:16',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_5555fa574ae79',
				'label' => 'Display page in left box',
				'name' => 'link_to_left_box',
				'type' => 'page_link',
				'instructions' => 'Please choose the Page that will be displayed in the box on the left side.',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5555fa574ae81',
				'label' => 'Display page in center box',
				'name' => 'link_to_middle_box',
				'type' => 'page_link',
				'instructions' => 'Please choose the Page that will be displayed in the box in the middle.',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5555fa574ae83',
				'label' => 'Display page in right box',
				'name' => 'link_to_right_box',
				'type' => 'page_link',
				'instructions' => 'Please choose the Page that will be displayed in the box on the right side.',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5491619690548',
				'label' => 'People who read our books, could also be interested in',
				'name' => 'recommended_books',
				'type' => 'bidirectional-post-relation',
				'required' => 0,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'externalbooks',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => get_option('page_on_front'),
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_people',
		'title' => 'People',
		'fields' => array (
			array (
				'key' => 'field_54ba779a1d85c',
				'label' => 'Author of',
				'name' => 'author',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
					1 => 'externalbooks',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54b8fc01d0c6e',
				'label' => 'Quote',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b8fb3407ea7',
				'label' => 'Quote',
				'name' => 'quote',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54b8fb8578050',
				'label' => 'Social Links',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b8fb9b78052',
				'label' => 'Social Link 1',
				'name' => 'social_link_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fb9b78051',
				'label' => 'Social label 1',
				'name' => 'social_label_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba278052',
				'label' => 'Social link 2',
				'name' => 'social_link_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba278053',
				'label' => 'Social label 2',
				'name' => 'social_label_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba878052',
				'label' => 'Social Link 3',
				'name' => 'social_link_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fba878053',
				'label' => 'Social Label 3',
				'name' => 'social_label_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b8fbb843018',
				'label' => 'Featured Book',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54b8fbc243019',
				'label' => 'Featured Book by Person',
				'name' => 'featured_book_by_person',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'books',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_people-lists',
		'title' => 'People Lists',
		'fields' => array (
			array (
				'key' => 'field_55157f3011fb5',
				'label' => 'Roles',
				'name' => 'roles',
				'type' => 'taxonomy',
				'instructions' => 'Select the role you which to list',
				'taxonomy' => 'role',
				'field_type' => 'select',
				'allow_null' => 0,
				'load_save_terms' => 0,
				'return_format' => 'object',
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-people-list-type-a.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-people-list-type-b.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-people-list-type-c.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_posts',
		'title' => 'Posts',
		'fields' => array (
			array (
				'key' => 'field_54ba791c7e954',
				'label' => '»Meson News« on Homepage',
				'name' => 'meson_news',
				'type' => 'bidirectional-post-relation',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_series',
		'title' => 'Series',
		'fields' => array (
			array (
				'key' => 'field_887287e5b5cbb',
				'label' => 'Banner Keywords',
				'name' => 'banner_keywords',
				'type' => 'wysiwyg',
				'instructions' => 'Please add here the keywords that will appear on the left side in the banner.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_95b88432731et',
				'label' => 'Excerpt',
				'name' => 'excerpt',
				'type' => 'wysiwyg',
				'instructions' => 'This is the text on the right side of the "Series Banner".',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_82736038947jv',
				'label' => 'Textcolor',
				'name' => 'banner_textcolor',
				'type' => 'select',
				'instructions' => 'Use this selector to change your textcolor and background.',
				'choices' => array (
					'black_text' => 'Black Text, black underline',
					'black_text_bg' => 'Black Text, black underline, white background',
					'white_text' => 'White Text, white underline',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54c8b1eb7d3a9',
				'label' => 'Teaser Background Color',
				'name' => 'series_background_color',
				'type' => 'color_picker',
				'default_value' => '#eeeeee',
			),
			array (
				'key' => 'field_54c8b20703c9b',
				'label' => 'Series Big Teaser',
				'name' => 'series_big_teaser',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'series-page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/************* ENABLE META TAGS FOR FACEBOOK SHARE *************/

add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
  return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}
 
add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
  return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}

/************* RENAMING EXCERPT META BOX *************/

function lead_meta_box() {
	remove_meta_box( 'postexcerpt', 'books', 'side' );
	add_meta_box('postexcerpt', __('Facebook Share Excerpt'), 'post_excerpt_meta_box', 'books', 'normal', 'high');
}

add_action( 'admin_menu', 'lead_meta_box' );



?>