//サイト独自カスタムJS

jQuery(document).ready(function() {
	//ドロワー
	jQuery('.drawer-hamburger').on('click touchstart', function(e){
		jQuery('body').toggleClass('drawer-open');
		jQuery('.js-menu').toggleClass('is-visible');
		jQuery('.js-menu-screen').toggleClass('is-visible');
		e.preventDefault();
	});

	jQuery('.js-menu-screen').on('click touchstart', function(e){
		jQuery('body').toggleClass('drawer-open');
		jQuery('.js-menu').toggleClass('is-visible');
		jQuery('.js-menu-screen').toggleClass('is-visible');
		e.preventDefault();
	});

});