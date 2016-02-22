var $j = jQuery;

// DETECT ORIENTATION CHANGE
$j(window).on("orientationchange",function(){
	if(window.orientation == 0) {
		$j(".turnme").addClass('show');
	}
	else {
		$j(".turnme").removeClass('show');
	}
});

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

// SHOW TO TOP ON SCROLL
$j(window).scroll(function() {
	if ($j(window).scrollTop() > 600){
	    $j('.to-top').addClass('show');
	} else if ($j(window).scrollTop() < 600){
		$j('.to-top').removeClass('show');
	}
}); 

// REMOVE LOADERING SCREEN ONCE LOADED
$j(window).load(function() {
	$j('#loader').fadeOut('fast', function() {
		$j(this).remove();
	});
});

// PLAY VIDEO ON BUTTON PRESS
$j(function() {
	$j('.playme a').click(function(event) {
		event.preventDefault();
		$j("#introvid")[0].src += "&autoplay=1";
		$j(this).parent().fadeOut(800);
		$j('.embed-container').addClass('show');
  	});
	setTimeout(function(){ 
		$j('.playme.hide').css('z-index', '0');
	},1000)
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

// init Masonry

var grid = $j('.grid').masonry({
	itemSelector: '.blog-item',
	columnWidth: '.grid-sizer',
	gutter: '.gutter-sizer',
	percentPosition: true
});
grid.imagesLoaded().progress( function() {
	grid.masonry('layout');
});

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

// SHOW BACK TO TOP ON SCROLL
$j(window).scroll(function() {

	if ($j(window).scrollTop() > 600){
	    $j('.to-top').addClass('show');
	} else if ($j(window).scrollTop() < 600){
		$j('.to-top').removeClass('show');
	}

});

// SUBMIUT FORM
$j(function(){

	$j('#field_5_7 ul li').on('click', function(event) {
		event.preventDefault();
		$j('#field_2_7 ul li').removeClass('active');
		$j(this).addClass('active');
	});
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