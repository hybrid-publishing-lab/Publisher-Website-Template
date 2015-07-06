<?php 
$menu = "top menu";
$args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false );
$items = wp_get_nav_menu_items( $menu, $args ); 
$menuItems=array();
$menuPosition=array();

//print_r($items);
foreach($items as $item) {
	if($item->title != "About") {
		array_push($menuItems, $item);
		array_push($menuPosition,$item->title);
	}
	
	//echo "position: ".$current;
	
	//print_r($pos);
	//print_r($item);
}
	$current = get_the_title();	
	$pos = array_search($current, $menuPosition);
	if ($pos > 0) {
		$prevpos = $pos-1;
		$prevLink = "<i class=\"fa fa-chevron-left\"> </i>&nbsp;&nbsp;&nbsp;<a href=\"".$menuItems[$prevpos]->url."/".$menuItems[$prevpos]->slug."\">".$menuItems[$prevpos]->title."</a>";
		
	} else {
		$prevLink = "";
	}

	if ($pos < count($menuItems)) {
		$nextpos = $pos+1;
		$nextLink = "<a href=\"".$menuItems[$nextpos]->url."\">".$menuItems[$nextpos]->title."</a>&nbsp;&nbsp;&nbsp;<i class=\"fa fa-chevron-right\"> </i>";
		
	} else {
		$nextLink = "";
	}
?> 


<div class="clearfix container1160">
	<div class="container container620 page-nav-container">
		<div class="previous-page">
			<?php echo $prevLink; ?>
		</div>
		<div class="next-page">
		    <?php echo $nextLink; ?>
		</div>
	</div>
</div>