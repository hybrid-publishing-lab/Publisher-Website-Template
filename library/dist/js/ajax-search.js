jQuery(document).ready(function(){
	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();


	jQuery('#searchForm').submit(function(){
		if (jQuery("#search-suggest-container ul.search-suggestion-list li.selected")[0]){
			jQuery('#s').val(jQuery("#search-suggest-container ul.search-suggestion-list li.selected").attr('data-s'));
		}

		if(jQuery('#s').val() == ''){
			return false;
		}
	});

	jQuery(document).keyup(function(e) {
		var code = e.keyCode || e.which;
		if((code != 40) && (code != 38)){
			delay(function(){
				callScript(myAjax.ajaxurl, jQuery("input[type='text']#s").val());
			}, 300 );
		}
		if (code == 40) { // down
			var selected = jQuery(".selected");
			jQuery(".search-suggestion-list li").removeClass("selected");
		
			// if there is no element after the selected one, we select the last one
			if (selected.next().length == 0) {
				jQuery(".search-suggestion-list li").first().addClass("selected");
			} else { // otherwise we just select the next one
				selected.next().addClass("selected");
			}
		}
		
		if (code == 38) { // up
			var selected = jQuery(".selected");
			jQuery(".search-suggestion-list li").removeClass("selected");
		
			// if there is no element before the selected one, we select the last one
			if (selected.prev().length == 0) {
				jQuery(".search-suggestion-list li").last().addClass("selected");
			} else { // otherwise we just select the next one
				selected.prev().addClass("selected");
			}
		}

		if (code == 13) { // Enter
			jQuery('#searchForm').submit();
		}

	});

	function callScript(uri,searchTerm){
		jQuery.ajax({
			type: "POST",
			url: uri,
			data: {
				"s" : searchTerm
			}
			}).done(function(json){
				data = JSON.parse(json);
				if(data.status == "Ok"){
					jQuery("#search-suggest-container").html(data.content);
					jQuery("#search-suggest-container ul.search-suggestion-list li").click(function(){
						searchTerm = jQuery(this).attr('data-s');
						jQuery('#s').val(searchTerm);
						jQuery('#searchForm').submit();
					});
				} else if(data.status == "Empty"){
					jQuery("#search-suggest-container").html("");
				}
			}).fail(function(jqXHR, ajaxOptions, thrownError)
			{
				console.log('Some error occured');
		});
	}

	
});