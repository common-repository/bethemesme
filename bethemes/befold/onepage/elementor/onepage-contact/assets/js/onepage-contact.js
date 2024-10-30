jQuery( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/onepage-contact.default', function($scope, $){	
		var $contactForm = $('#contact-form'),
		$gmContainer = $('#gmap-container');
		
		/***============== Contact-js ==============***/
		$('#contact-form-submit').click(function(form){ 
			$cfProcess = $('.contact-form-process');
			$cfResult = $('#contact-form-result');
			$cfProcess.fadeIn();
			$.ajax({
				type: 'POST',
				url: app_vars.ajax_url,
				dataType: 'JSON',
				data: $contactForm.serialize(),
				success: function(data) {
					$cfProcess.fadeOut();
					$contactForm.find('.cf-form-control').val('');

					if (data.error) {
						$cfResult.find('span').html('<i class="fa fa-times-circle-o"></i>' + data.error);
					} else {
						$cfResult.find('span').html('<i class="fa fa-check-circle-o"></i>' + data.success);
					}

					$cfResult.show('slow').delay(3000).hide('slow');
				},
				error: function(data, errorThrown) {
					console.log(errorThrown);
				}
			});
			return false;
				
		}); 
		$('#contact-form-submit').on('click', function() {
			setTimeout(function() {
				$contactForm.find('.error').each(function() {
					var text = $(this).text();
					$(this).closest('fieldset').find('input, textarea').blur();
					if (text != '') {
						$element = $(this).closest('fieldset').find("input[type!='hidden'], textarea");
						$element.val(text);
						$element.addClass('error');
						$element.focus(function() {
							if ($(this).val() === text) {
								$(this).val('');
								$(this).removeClass('error');
							}
						});
					}
				});
			}, 500);
		});
		$('#contact-form-message').niceScroll({
			cursorcolor: $('.contact-module').css('color'),
			cursorwidth: '5px',
			cursorfixedheight: 25,
			cursorborder: 0,
			cursorborderradius: 0,
			scrollspeed: 5,
			mousescrollstep: 5,
			horizrailenabled: false,
			autohidemode: false,
			zindex: 99
		});

	});
});