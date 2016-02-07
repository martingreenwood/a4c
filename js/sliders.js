var $j = jQuery;

// Sliders
$j(function(){

	$j('.slides').slick({
		'autoplay'		: true,
		'autoplaySpeed'	: 9000,
		'speed'			: 600,
		'draggable'		: false,
		'focusOnSelect'	: false,
		'pauseOnHover'	: false,
		'lazyLoad'		: 'progressive',
		'fade'			: true,
		'mobileFirst'	: true,
		'ease'			: 'ease-in-out',
		'prevArrow'		: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i> <span class="screen-reader-text">Previous Slide</span></button>',
		'nextArrow'		: '<button type="button" class="slick-next"><span class="screen-reader-text">Next Slide</span> <i class="fa fa-chevron-right"></i></button>',
	});

	$j('.slide-pause').on('click', function(e){
		e.preventDefault();
	    var pauseBtn = $j(this);
	    if (pauseBtn.hasClass('paused')){
	        $j(".slides").slick('slickPlay');
	        pauseBtn.removeClass('paused');
	    } else {
	        $j(".slides").slick('slickPause');
	        pauseBtn.addClass('paused');
	    }
	});

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