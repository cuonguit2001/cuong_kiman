jQuery(document).ready(function($) {
	$(".form__select").select2({
    	placeholder: kiman.translate_text.select_text_1
  	});
  	$(".form__select--choisee").select2({
    	placeholder: kiman.translate_text.select_text_2
  	});
  	$(".select2-container--default .select2-selection--single .select2-selection__arrow b").append('<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L9 1" stroke="#153C72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');

});


