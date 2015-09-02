(function($){

	jQuery(document).ready(function(){
			$('.bg-slider').slick({
			  dots: false,
			  infinite: true,
			  speed: 1000,
			  fade: true,
			  cssEase: 'linear',
			  autoplay: true,
  			  autoplaySpeed: 5000,
  			  centerMode: true,
  			  arrows: false
			});

	});

	$(window).load(function(){
		resize();
	});

	$( window ).resize(function() {
		resize();
	});

	function resize(){
		var window_height = parseInt($(window).height());

		$('#main-container').css('min-height',(window_height-62)+'px');
	}
 
})(jQuery);



function getStorage(key){
	return localStorage.getItem(key)
}
function setStorage(key,value){
	return localStorage.setItem(key,value)
}

wow = new WOW(
      {
        animateClass: 'animated', 
        //offset:       100,
        callback:     function(box) {
          //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
wow.init();

