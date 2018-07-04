jQuery(document).ready(function(){

	var initialCheck = jQuery('#id-font-awesome').prop('checked');
	if( initialCheck == false ){
			jQuery('.sahre-button-type').parents('tr').hide();
	}	

	jQuery("#id-font-awesome").click(function(){

		var isChecked = jQuery('#id-font-awesome').prop('checked');

		if( isChecked == false ){
			jQuery('.sahre-button-type').parents('tr').fadeOut();
		}
		else {
			jQuery('.sahre-button-type').parents('tr').fadeIn();
		}

	});

});