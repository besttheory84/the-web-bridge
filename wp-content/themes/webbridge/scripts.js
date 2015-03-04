function slides() {
    var windowHeight = jQuery(window).height();
	var windowWidth = jQuery(window).width();
    var slideHeight = jQuery('.slide1 h1').height();
    var slideTwoHeight = jQuery('.slide2 h1').height();
    var slideThreeHeight = jQuery('.slide3 h1').height();
    var maskHeight = jQuery('.header .mask').height();
    var paddingTitle = parseInt((windowHeight/2)-(slideHeight/2));
    var paddingTitleTwo = parseInt((windowHeight/2)-(slideTwoHeight/2));
    var paddingTitleThree = parseInt((windowHeight/2)-(slideThreeHeight/2));
    var mask = parseInt((windowHeight/2)-(maskHeight/2)-100);
    jQuery('.header, .slide1, .slide2').css('height',windowHeight);
    jQuery('.slide1').css('padding', paddingTitle+'px 0');
    jQuery('.slide2').css('padding', paddingTitleTwo+'px 0');
    jQuery('.slide3').css('padding', paddingTitleThree+'px 0'); 
    jQuery('.header .mask').css('top', mask+'px');  
}

jQuery(document).ready(function($) {
    var windowHeight = jQuery(window).height();
	var windowWidth = jQuery(window).width();
    slides();
	if(windowWidth >= 980) {
		$(window).scroll(function() {
    	var x = $(this).scrollTop();
    		$('.mask, .arrow-down').css('margin-top', parseInt(-x / 1.3) + 'px');
			
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
    
    $(window).resize(function() {
        slides(); 
    });
    
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
	
});