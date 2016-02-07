var $j = jQuery;

// SCROLL TO #
$j(function($) {
	$j('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $j(this.hash);
			target = target.length ? target : $j('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$j('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});

// REMOVE LOADERING SCREEN ONCE LOADED
$j(window).load(function() {
	$j('#loader').fadeOut('fast', function() {
		$j(this).remove();
	});
});

// FANCYBOX
$j(function($) {
	$j("#link-to-vid").fancybox({
		openEffect  : 'none',
		//padding 	: 0,
		closeEffect : 'none',
		helpers : {
			media: {},
			title: {
				type: 'inside'
			},
			overlay: {
      			locked: false,
      			showEarly: false
    		}
		}
	});
});


var $j = jQuery;

// SLIDERS
$j(function(){

	$j('ul.tweets').slick({
		'autoplay'		: false,
		'arrows'		: true,
		'draggable'		: false,
		'focusOnSelect'	: true,
		'lazyLoad'		: 'progressive',
		'prevArrow'		: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i> <span class="screen-reader-text">Previous Tweet</span></button>',
		'nextArrow'		: '<button type="button" class="slick-next"><span class="screen-reader-text">Next Tweet</span> <i class="fa fa-chevron-right"></i></button>',
		'mobileFirst'	: true,
		'slide'			: 'li',
	});

});

$j(window).scroll(function() {

	if ($j(window).scrollTop() > 600){
	    $j('.to-top').addClass('show');
	} else if ($j(window).scrollTop() < 600){
		$j('.to-top').removeClass('show');
	}

}); 


// SLIDER HEIGHT
$j(window).on('resize',function() {
    // do whatever
	var win_height = $j(window).height();
	var header_height = $j('#masthead').height();
	var slider_height = win_height;
		
	$j('#slider, .slide #feature-image').height(slider_height);

}).trigger('resize');

// SHOW TOP BAR

$j(window).load(function() {
	$j('#top .toggle').bind('touchstart click', function(event){
		event.preventDefault();
		$j("#top").toggleClass('show');
	});
})

$j(window).load(function() {
	$j('#search-link').bind('touchstart click', function(event){
		event.preventDefault();
		$j("#search-box").toggleClass('show');
	});
})