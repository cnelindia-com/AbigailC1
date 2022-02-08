var app_url = 'https://5luckydevelopers.com/thumbsUp/src/public/';
var base_url = 'https://5luckydevelopers.com/thumbsUp/src/public/app/';

(function($) {
	      
	$( "#partial_product_ids" ).autocomplete({
		source: function( request, response ) {
			
			var searchText = extractLast(request.term);
			$.ajax({
				url: app_url+"shopify-products.php",
				type: 'get',
				dataType: "json",
				data: {
					q: searchText,
					shop : shop_domain
				},
				success: function( data ) {
					response( data );
				}
			});
		},
		minLength:0,
		select: function( event, ui ) {
			var terms = split( $('#partial_product_ids').val() );
			
			terms.pop();
			
			terms.push( ui.item.label );
			
			terms.push( "" );
			$('#partial_product_ids').val(terms.join( ", " ));

			// Id
			var terms = split( $('input[name=select_partial_product_ids]').val() );
			
			terms.pop();
			
			terms.push( ui.item.value );
			
			terms.push( "" );
			$('input[name=select_partial_product_ids]').val(terms.join( ", " ));

			return false;
		}
	   
	});
	
	$('input[name=product-group]').on('change',function() {
		var product_group = $(this).val();
		if(product_group == 'partial'){
			$('.container_partial_product_ids').css('display','block');
    		$('input[name=select_partial_product_ids]').prop("disabled", false);
		}
		else{
			$('.container_partial_product_ids').css('display','none');
			$('input[name=select_partial_product_ids]').prop("disabled", true);
		}
	});
})(jQuery);

function split( val ) {
  return val.split( /,\s*/ );
}
function extractLast( term ) {
  return split( term ).pop();
}
