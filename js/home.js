var $j = jQuery;

// SLIDER HEIGHT
$j(window).on('resize',function() {
    // do whatever
	var win_height = $j(window).height();
	var header_height = $j('#masthead').height();
	var slider_height = win_height - header_height;
		
	$j('#slider, .slide #feature-image').height(slider_height);

}).trigger('resize');