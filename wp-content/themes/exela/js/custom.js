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
 
})(jQuery);

function getStorage(key){
	return localStorage.getItem(key)
}
function setStorage(key,value){
	return localStorage.setItem(key,value)
}