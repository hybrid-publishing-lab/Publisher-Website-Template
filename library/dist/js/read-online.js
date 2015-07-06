jQuery(document).ready(function(){
	function makeToclinks(){
		jQuery("a.tocLink").click(function(e){
			e.preventDefault();
			link = jQuery(this).attr("href");
			linkname = jQuery(this).attr("data-name");
			linkId = jQuery(this).attr("data-id");
			if(jQuery("#"+linkId).length > 0){
					jQuery('#content-part').animate({scrollTop:jQuery("#"+linkId).position().top-40}, 'fast');
					jQuery(".tocLink").removeClass("active");
					jQuery(this).addClass("active");
				}
		});

		jQuery(".contents_l_1 a, .contents_l_2 a").click(function(e){
			e.preventDefault();
			link = jQuery(this).attr("href");
			id = link.split("#")[0].replace(".","_");

			jQuery('#content-part').animate({scrollTop:jQuery("#"+id).position().top}, 'fast');
		});
	}

	makeToclinks();

	jQuery('#search_book_form').submit(function(e){
		e.preventDefault();
		
		searchBook(myReadonline.ajaxurl, jQuery("#bs").val(), jQuery("#ebook_file").val());
		
		if(jQuery('#bs').val() == ''){
			return false;
		}
	});

	jQuery('#bs').focus(function() {
		jQuery(this).val("");
	});

	function searchBook(uri,searchTerm, file){
		jQuery.ajax({
			type: "POST",
			url: uri,
			data: {
				"bs" : searchTerm,
				"file": file
			}
			}).done(function(json){
				//console.log(json);
				data = JSON.parse(json);
				toc = makeToc(data['toc']);
				content = data['content'];
				jQuery('#contentToc').html(toc);
				jQuery('#contentBook').html(content);
				makeToclinks();
			}).fail(function(jqXHR, ajaxOptions, thrownError)
			{
				console.log('Some error occured');
		});
	}

	function makeToc(data) {
		out = "<ul class=\"readerToc searchResults\">";
		out += "<li class=\"amount\"><strong>"+data.length+"</strong> search results</li>";
		jQuery.each(data, function(index, value){
			out += "<li class=\"level1\"><a class=\"tocLink\" data-id=\""+value['id']+"\">"+decodeHtml(value['element'])+"</a></li>";
		});
		out += "</ul>";
		return out;
	}

	function makeContent(data) {
		out = "";
		
		jQuery.each(data, function(index, value){
			out += data.content;
		});
		return out;
	}

	function decodeHtml(html) {
		var txt = document.createElement("textarea");
		txt.innerHTML = html;
		return txt.value;
	}
});