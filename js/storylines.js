window.onload = function(){
	
	/* CRUNCH NUMBERS FOR PROGRESS BAR
	======================================*/
	var actHeight = jQuery(window).height() - window.innerHeight;

	jQuery(document).on('scroll', function(){
		var curHeight = jQuery(this).scrollTop();
		var progress = (curHeight / actHeight) * 100;

		jQuery('#sl-header>div:nth-of-type(3)>div>div').css({
			'width': progress + '%',
			'background': '#83C392'
		})
	})
}