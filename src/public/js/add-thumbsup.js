/*if (jQuery('#shopify-section-collection-template').length) {
	jQuery('#shopify-section-collection-template').css('opacity', 0);
}*/


var thumbsup_app_url = 'https://5luckydevelopers.com/thumbsUp/src/public/';
var thumbsup_base_url = 'https://5luckydevelopers.com/thumbsUp/src/public/app/';

if(!document.getElementById('thumbsup_fiveld_ThumbsUpStyle')) {
    var link = document.createElement('link');
    link.id = 'thumbsup_fiveld_ThumbsUpStyle';
    link.rel = 'stylesheet';
    link.href = thumbsup_app_url+'css/thumbsup.css?' + new Date().getTime();
    document.head.appendChild(link);
}

  
	

var script_jquery_1 = document.createElement('script');
script_jquery_1.type = 'text/javascript';
script_jquery_1.src = thumbsup_app_url+"js/countdown.jquery.js";
document.head.appendChild(script_jquery_1);
		
if (!window.jQuery) {
    var script_jquery = document.createElement('script');
    script_jquery.type = 'text/javascript';
    script_jquery.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js";
    script_jquery.onload = thumbsup_fiveld_logic;
    document.head.appendChild(script_jquery);
} else {
    thumbsup_fiveld_logic();
}



function thumbsup_fiveld_logic() {

   	const path = window.location.pathname;
    const product_handle = path.substring(path.lastIndexOf("/") + 1);
   
    
    var element = "form[action*='/cart/add']";
    if (!jQuery(element).length && product_handle!="mistletonys") {
        return;
    }
   
	
	if(!document.getElementById('thumbsup_fiveld_ThumbsUpStyle_one')) {
		var link_one = document.createElement('link');
		link_one.id = 'thumbsup_fiveld_ThumbsUpStyle_one';
		link_one.rel = 'stylesheet';
		link_one.href = thumbsup_base_url+'styles.css';
		document.head.appendChild(link_one);
	}

    if(product_handle=="mistletonys")
    {
        
         
     
        element = "#shopify-product-reviews";
        var element1="#shopify-product-reviewshwe";
        var element3="#shopify-product-reviewshwe_four";
        var element5="#shopify-product-reviewshwe_six";
        var element7="#shopify-product-reviewshwe_seven";
        var element8="#shopify-product-reviewshwe_eight";
        	jQuery.getJSON( 'https://'+Shopify.shop+"/pages/"+product_handle+".json", function( pdata ) {
        
        
        jQuery.ajax({
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      jQuery(element).each(function(){
    		      //if(jQuery(document).find('#fiveld_thumbsUp_container').length == 0) { 
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			  return false; // breaks
    		      //}
		     });
		  }
		});
		
	
		var product_handle2 = 'mistletonys_two';
		
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle2, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      //alert("fgfdgf");
		      
		    
		      jQuery(element1).each(function(){
    		      
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			 //var script_app = document.createElement('script');
        			// script_app.type = 'text/javascript';
        			// script_app.src = thumbsup_base_url+"init.min.js";
        			 //document.head.appendChild(script_app);
        			  return false; // breaks
		      });
		      
		  }
		});

		var product_handle3 = 'mistletonys_four';
		
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle3, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      //alert("fgfdgf");
		      
		    
		      jQuery(element3).each(function(){
    		      
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			 //var script_app = document.createElement('script');
        			// script_app.type = 'text/javascript';
        			// script_app.src = thumbsup_base_url+"init.min.js";
        			 //document.head.appendChild(script_app);
        			  return false; // breaks
		      });
		      
		  }
		});
		

		var product_handle5 = 'mistletonys_six';
		
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle5, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      //alert("fgfdgf");
		      
		    
		      jQuery(element5).each(function(){
    		      
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			 //var script_app = document.createElement('script');
        			// script_app.type = 'text/javascript';
        			// script_app.src = thumbsup_base_url+"init.min.js";
        			 //document.head.appendChild(script_app);
        			 
        			 return false; // breaks
		      });
		      
		  }
		});
		
		var product_handle7 = 'mistletonys_seven';
		
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle7, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      //alert("fgfdgf");
		      
		    
		      jQuery(element7).each(function(){
    		      
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');

        			 return false; // breaks
		      });
		      
		  }
		});
		
		var product_handle8 = 'mistletonys_eight';
		
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle8, product_id : pdata.page.id, product_title : pdata.page.title,type:'page' },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      //alert("fgfdgf");
		      
		    
		      jQuery(element8).each(function(){
    		      
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			 //var script_app = document.createElement('script');
        			// script_app.type = 'text/javascript';
        			// script_app.src = thumbsup_base_url+"init.min.js";
        			 //document.head.appendChild(script_app);
        			 
        			 setTimeout(function(){ var script_app = document.createElement('script');
                     script_app.type = 'text/javascript';
                     script_app.src = thumbsup_base_url+"init.min.js";
                     document.head.appendChild(script_app);
        			 }, 3000);
        			 return false; // breaks
		      });
		      
		  }
		});
		
		
		
	});
        
    
        
    }
    else
    {
	if(Shopify.shop == 'allante-kitchen-collection.myshopify.com'){
	    return false;
	}
	jQuery.getJSON( 'https://'+Shopify.shop+"/products/"+product_handle+".json", function( pdata ) {
		console.log("ThumbsUp Loaded!");
		jQuery.ajax( {
		  method : 'post',
		  dataType : 'json',
		  data: { shop : Shopify.shop, product_handle : product_handle, product_id : pdata.product.id, product_title : pdata.product.title },
		  url: thumbsup_base_url+'get-thumpsup.php',
		  success:function(data) {
		      jQuery(element).each(function(){
    		      //if(jQuery(document).find('#fiveld_thumbsUp_container').length == 0) { 
        			 jQuery(this).append('<div id="fiveld_thumbsUp_container">'+data.contents+'</div>');
        			 var script_app = document.createElement('script');
        			 script_app.type = 'text/javascript';
        			 script_app.src = thumbsup_base_url+"init.min.js";
        			 document.head.appendChild(script_app);
        			  return false; // breaks
    		      //}
		      });
		  }
		});
	});
	
}
}



var setting_data_url = 'https://5luckydevelopers.com/thumbsUp/src/public/setting-json/'+Shopify.shop+'/setting.php?' + new Date().getTime();
var setting_data_json = jQuery.getJSON(setting_data_url, function (resdata) {
	
	
	
	if(resdata.enable == '1'){
		
		if (!jQuery('#shopify-section-collection-template').length) {
			return;
		}
		
		const path = window.location.pathname;
   	 	const collection_handle = path.substring(path.lastIndexOf("/") + 1);
		if(collection_handle == resdata.target_collection){
			//jQuery('#shopify-section-collection-template').css('opacity', 0);
			jQuery('#shopify-section-collection-template').css('display', 'none');
			
		
			jQuery( '<div style="clear:both;"></div><div id="fiveld_sales_countdown_timer_block"><p class="psection_line_1">'+resdata.sales_timer_text_1+'</p><p class="psection_line_2">Our largest ever <strong>'+resdata.sales_timer_text_2+'</strong></p><div id="fiveld_sales_counter"></div><p class="psection_line_3">'+resdata.sales_timer_text_3+'</p><p class="psection_line_4">'+resdata.sales_timer_text_4+'</p></div><div style="clear:both;"></div>' ).insertBefore( "#shopify-section-collection-template" );
			jQuery('#fiveld_sales_counter').countdown({
				year: resdata.start_timer_year, // YYYY Format
				month: resdata.start_timer_month, // 1-12
				day: resdata.start_timer_date, // 1-31
				hour: resdata.start_timer_hour, // 24 hour format 0-23
				minute: resdata.start_timer_minute, // 0-59
				second: resdata.start_timer_second, // 0-59,
				timezone: resdata.timezone,
				labels: true,
				onFinish: function () {
					jQuery('#fiveld_sales_countdown_timer_block').css('display', 'none');
					jQuery('#shopify-section-collection-template').css('display', 'block');
					//jQuery('#shopify-section-collection-template').css('opacity', 1);
				} 
			});
		}
	}
	else{
		jQuery('#shopify-section-collection-template').css('display', 'block');
	}
});
