// Set Variables
var style_toggle = 'closed';
var mobile_toggle = 'closed';

// Close Mobile Menu when screen resized
function mobilemenu() {
	var windowWidth = jQuery(window).width();
	if( windowWidth >= 1080 ) {
		jQuery(".mobile-menu-wrapper").hide();
		mobile_toggle = "closed";
	}
}
mobilemenu();

// Detect screen resize
jQuery(window).resize(function() {
	mobilemenu();
});

jQuery(document).ready(function() { 
    
	// Drop Down Menu
	jQuery('ul#main-menu').superfish({ 
        delay:       600,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast',
        autoArrows:  true,
        dropShadows: false
    });	
	
	// Search Button Toggle
	jQuery(".menu-search-button").click(function(){
		if(style_toggle == "closed"){
			
			jQuery(".menu-search-field").stop(true, true).animate({width : "179px",padding : "1px 10px",opacity : "10"}, 200, "linear", function(){
				style_toggle = "open";
			});
			
		};
		if(style_toggle == "open"){
			jQuery(".menu-search-field").stop(true, true).animate({width : "0%",padding : "1px 0px",opacity : "0"}, 200, "linear", function(){
				style_toggle = "closed";
			});
		};
		return false;
	});
	
	// Mobile Menu
	jQuery(".mobile-menu-button").click(function(){
		if(mobile_toggle == "closed"){
			
			jQuery(".mobile-menu-wrapper").show('slow', function() {
			    mobile_toggle = "open";
			});
			
		};
		
		if(mobile_toggle == "open"){
			
			jQuery(".mobile-menu-wrapper").hide('slow', function() {
			    mobile_toggle = "closed";
			});
			
		};
		return false;
	});
	
	// Product Hover
	jQuery(".products-col-4 li").hover(
	  function () {
		
		var jQuerythis_product = jQuery(this);
		
		jQuerythis_product.find(".product-options").fadeIn("fast", function() {
			// Animation complete
		});
	
		jQuerythis_product.find(".product-thumbnail-wrapper img").stop(true, true).animate({opacity : "0.5"}, 200, "linear", function(){
			// Animation complete
		});

	
	  }, 
	  function () {
		
		var jQuerythis_product = jQuery(this);
		
		jQuerythis_product.find('.product-options').fadeOut('slow', function() {
			// Animation complete
		});
		
		jQuerythis_product.find(".product-thumbnail-wrapper img").stop(true, true).animate({opacity : "1"}, 600, "linear", function(){
			// Animation complete
		});
	
	  }
	);
	
	// Accordion
	jQuery( ".accordion" ).accordion( { autoHeight: false } );

	// Toggle
	jQuery( ".toggle > .inner" ).hide();
	jQuery(".toggle .title").toggle(function(){
		jQuery(this).addClass("active").closest('.toggle').find('.inner').slideDown(200, 'easeOutCirc');
	}, function () {
		jQuery(this).removeClass("active").closest('.toggle').find('.inner').slideUp(200, 'easeOutCirc');
	});

	// Tabs
	jQuery(function() {
		jQuery( "#tabs" ).tabs();
	});
	
	// PrettyPhoto
	jQuery(document).ready(function(){
		jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	});
	
	// Slides Loader
	jQuery(".slider").removeClass("slide-loader");
	jQuery(".slider-single").removeClass("slide-loader-single");
	
	// Mobile Menu

	// Create the dropdown base
	jQuery("<select />").appendTo("#header");
      
	// Create default option "Go to..."
	jQuery("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
	}).appendTo("#header select");
      
	// Populate dropdown with menu items
	jQuery("#main-menu a").each(function() {
		var el = jQuery(this);
		jQuery("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo("#header select");
	});
	
	// To make dropdown actually work
	jQuery("#header select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});

	// Quantity Buttons
	jQuery(function() {

		jQuery("form .qty-text").before('<input type="button" class="plusminus minus" id="minus1" value="-">');
		jQuery("form .qty-text").after('<input type="button" class="plusminus plus" id="plus1" value="+">');

		jQuery(".plusminus").click(function() {
			var jQuerybutton = jQuery(this);
			var oldValue = jQuerybutton.parent().find(".qty-text").val();
			
			if (jQuerybutton.val() == "+") {
				var newVal = parseFloat(oldValue) + 1;
			} 
			
			else {		
				if (oldValue > 1) {
					var newVal = parseFloat(oldValue) - 1;
				}
				
				else {
					var newVal = 1;
				}
			}
	
			jQuerybutton.parent().find(".qty-text").val(newVal);
	
	    });

	});
	
});

// Slider
jQuery(window).load(function(){
  jQuery('.slider').flexslider({
    animation: "slide",
	controlNav: true
  });
});

jQuery(window).load(function(){
  jQuery('.slider-news').flexslider({
    animation: "slide",
	controlNav: false,
	directionNav: true,
	slideshow: false
  });
});