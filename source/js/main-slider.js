(function($) {
	
	// we start the slick home slider only if we are at the home screen
	if($("body").hasClass("home")){
		// https://kenwheeler.github.io/slick/
		$("#slider-container").slick()
	}
	
})(jQuery);