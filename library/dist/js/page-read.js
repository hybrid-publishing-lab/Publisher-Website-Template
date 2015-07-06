jQuery(document).ready(function(){
	jQuery('#pull-tab').click(function(){
		// jQuery( "#info-part-container").toggle( "slide" );
		//jQuery( "#info-part-container").animate({left:'-300px'},150);
		table = jQuery("#read-online-table");
		if(table.hasClass('collapsed')){
			jQuery( "#info-part-container").animate({width:'320px'},150);
			table.removeClass("collapsed");
		} else {
			jQuery( "#info-part-container").animate({width:'20px'},150);
			table.addClass("collapsed");
		}
		
	});

});