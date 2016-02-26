

( function( $ ) {



	$(document).ready(function(){

		var startMasonry = function(){
			$('.grid').masonry({
				// options
				itemSelector: '.grid-item',
				columnWidth: 215,
				gutter: 10,
				fitWidth:true
			});
		};
		setTimeout(startMasonry,500);
		var reheighten = function(){
			$('.section4_background').css({'height':$('.section4 .gallery_wrapper').outerHeight()});
		}
		setTimeout(reheighten,1000);
	});
} )( jQuery );