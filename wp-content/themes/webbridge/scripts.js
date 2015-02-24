jQuery(document).ready(function($) {
	var windowWidth = $(window).width();
	if(windowWidth >= 980) {
		$(window).scroll(function() {
    	var x = $(this).scrollTop();
    		$('header').css('background-position', '0% ' + parseInt(-x / 3) + 'px');
			
		});
	}	
	$('.ecae-link').each(function() {
		$(this).addClass('hover');
	});
	$('li').each(function() {
		if($(this).hasClass('widget-container')) {
			$(this).addClass('col-md-4');	
		}
	});
	
});