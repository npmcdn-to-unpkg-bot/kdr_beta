(function( $ ) {
	$(document).ready( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			masonry: {
				columnWidth: 215,
				isFitWidth: true,
				gutter: 11
			}
		});
	
		$grid.imagesLoaded().progress( function() {
			$grid.isotope('layout');
		});

		var reorderElements = function(){
			if(window.innerWidth>=680 && window.innerWidth <= 960){
				$('figure:nth-of-type(18)').css({'top':'0px', 'left':'452px'});
				$('figure:nth-of-type(17)').css({'top':'663px'});
			}
		};

		var resizeGridContainer = function (){
			if(window.innerWidth <= 480){
				$grid.width(280);
			}
		};

		reorderElements();
		resizeGridContainer();
		$(window).smartresize(function(){
			reorderElements();
			resizeGridContainer();
		});
	});

} )( jQuery );