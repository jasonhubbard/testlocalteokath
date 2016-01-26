(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// Animate anchor links
		
		$('a').click(function(){
   		 	$('html, body').animate({
        	scrollTop: $( $(this).attr('href') ).offset().top
    		}, 1000);
    		return false;
		});
		
		// Colour chart 
		
		$( "#show-colours" ).click(function() {
			var link = $(this);
  			$( "#colour-chart" ).slideToggle( "slow", function() {
				if ($(this).is(':visible')) {
             link.text('Hide Available Colours');                
        } else {
             link.text('View Available Colours');                
        }
   		 // Animation complete.
  			});
		});
		
		// Website nav
		
		$( "#pull" ).click(function() {
			var link = $(this);
  			$( ".nav ul" ).slideToggle( "slow", function() {
				if ($(this).is(':visible')) {
             link.text('Hide Navigation');                
        } else {
             link.text('Show Navigation');                
        }
   		 // Animation complete.
  			});
		});
		
		

		
	});
	
})(jQuery, this);
