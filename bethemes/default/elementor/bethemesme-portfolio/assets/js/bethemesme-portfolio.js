jQuery( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/bethemesme-portfolio.default', function($scope, $){
		var APP = APP || {};
		$portfolioFilter = $('#portfolio-filter'),
		$portfolioWrap = $('.portfolio-wrap');
		
		var fancybox = $('.fancybox');
		
		
			APP.portfolio = {
				init: function() {
					APP.portfolio.load();
					APP.portfolio.filter();
					APP.portfolio.lightbox();
			},

			load: function() {
				
				var portfolioModules = $('.portfolio-module .portfolio-filters a.active').data('filter');
				if (portfolioModules == "*") {
					$portfolioWrap.imagesLoaded(function() {
						$portfolioWrap.isotope({
							transitionDuration: '.65s'
						});
					});
				} else {
					$portfolioWrap.imagesLoaded(function() {
						
						$portfolioWrap.isotope({
							transitionDuration: '.65s',
							filter: portfolioModules
						});
					});
				}

			},

			filter: function() {
				$portfolioFilter.find('a').click(function(e) {
					$portfolioFilter.find('a.active').removeClass('active');
					$(this).addClass('active');

					$portfolioWrap.isotope({
						filter: $(this).attr('data-filter')
					});

					e.preventDefault();
				});

				$portfolioFilter.on({
					click: function(e) {
						e.preventDefault();
					}
				}, 'a.active');
			},
			
			lightbox: function() {
				if (fancybox.length) {
					fancybox.fancybox();
				}
			}
		
		}
		
		
		
		$(document).ready(APP.portfolio.init);
	});
});