jQuery( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/onepage-portfolio.default', function($scope, $){
		var APP = APP || {};
		$portfolioFilter = $('#portfolio-filter'),
		$html = $('html'),
		$body = $('body'),
		$portfolioItem = $('.portfolio-item'),
		$portfolioWrap = $('.portfolio-wrap');
		
		var fancybox = $('.fancybox');
		
		
			APP.portfolio = {
				init: function() {
					APP.portfolio.load();
					APP.portfolio.filter();
					APP.portfolio.lightbox();
			},

			load: function() {
			    
			    var portfolioItemWidth = 0,
					portfolioWrapWidth = $portfolioWrap.width();
					var portfolioitemcount = $portfolioWrap.data('itemcolumn');
				if ($body.hasClass('device-lg')) {
				   portfolioItemWidth = portfolioWrapWidth / portfolioitemcount;
				} else if ($body.hasClass('device-md')) {
					portfolioItemWidth = portfolioWrapWidth / 3;
				} else if ($body.hasClass('device-sm') || $body.hasClass('device-xs')) {
					portfolioItemWidth = portfolioWrapWidth / 2;
				} else {
					portfolioItemWidth = portfolioWrapWidth;
				}

				$portfolioItem.css('width', portfolioItemWidth + 'px');
				
				var portfolioModules = $('.portfolio-module .portfolio-filters a.active').data('filter');
				if (portfolioModules == "*") {
					$portfolioWrap.imagesLoaded(function() {
						$portfolioWrap.isotope({
							transitionDuration: '.65s',
							itemSelector: '.portfolio-item',
                            layoutMode: 'fitRows'
						});
					});
				} else {
					$portfolioWrap.imagesLoaded(function() {
						
						$portfolioWrap.isotope({
							transitionDuration: '.65s',
							filter: portfolioModules,
							itemSelector: '.portfolio-item',
                            layoutMode: 'fitRows'
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