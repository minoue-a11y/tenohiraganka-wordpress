window.addEventListener('load', function() {
    var js_moveTo = new MoveTo();
    var js_pagetop = document.getElementsByClassName('js-pagetop')[0];
    js_moveTo.registerTrigger(js_pagetop);

    var backtopbtn = jQuery('#backtopbtn');
    jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 150) {
			backtopbtn.fadeIn();
		} else {
			backtopbtn.fadeOut();
		}
	});
});