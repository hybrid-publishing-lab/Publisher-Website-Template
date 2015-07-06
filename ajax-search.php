<?php
	define('WP_USE_THEMES', false);
	require_once('../../../wp-load.php');

function title_filter($where, &$wp_query){
	global $wpdb;

	if($search_term = $wp_query->get( 'search_prod_title' )){
		$search_term = $wpdb->esc_like($search_term);
		$search_term = ' \'%' . $search_term . '%\'';
		$where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$search_term;
	}

	return $where;
}

	$query = $_POST['s'];

	$args = array(
		'post_type'			=> array('books', 'people'), //, 'post'
		'post_status'		=> 'publish',
		'search_prod_title' => $query,

		'posts_per_page'	=> '10'
	 );

	$result = [];
	$content = "";
	if($query != ""){
		add_filter( 'posts_where', 'title_filter', 10, 2 );
		$the_query = new WP_Query($args);
		remove_filter( 'posts_where', 'title_filter', 10, 2 );
		$result["status"] = "Ok";
		$content .= "<ul class=\"search-suggestion-list\">";
			if ( $the_query->have_posts() ) : 
			
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$content .= "\t<li data-s=\"".get_the_title()."\">";
					$content .= preg_replace('/'.$query.'/i', '<span class="s">$0</span>', get_the_title());
					$content .= "</li>\n";
				endwhile;
			else:
				$content .= "";
			endif;
		$content .= "</ul>";

	} else {
		$result["status"] = "Empty";
		$result["content"] = "";
	}
	$result["content"] = $content;
	echo json_encode($result, true);
	?>
