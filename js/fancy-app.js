var $j = jQuery;

// FANCYBOX CALLS

$j(function() {
	$j('.video').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers: {
			media : {},
			overlay: {
				locked: false,
			}
		}
	});
});
