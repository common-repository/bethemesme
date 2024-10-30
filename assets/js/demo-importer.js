jQuery(function() {
	
	var purchase_url = "https://betheme.me/themes/befold-multipurpose-wp-theme/",
		button_text = "Buy Pro";

	jQuery('.ocdi__gl-item[data-name="creato"] .ocdi__gl-item-button').attr("href", purchase_url ).text(button_text);
	jQuery('.ocdi__gl-item[data-name="lawyer"] .ocdi__gl-item-button').attr("href", purchase_url ).text(button_text);

});