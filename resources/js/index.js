require('swiper');

$(document).ready( ()=>{
	// mobile menu
	$(".main-button").click( ()=> {
		$(".mobile-menu-wrapper").slideDown("slow");
	});
	$(".close").click( ()=> {
		$(".mobile-menu-wrapper").slideUp("slow");
	});


	//swiper slider
	var mySwiper = new Swiper ('.swiper-container', {
      direction: 'horizontal',
      autoplay: {
      	delay: 2000
      },
      loop: true
    });
    mySwiper.autoplay.start();


	// trip-cards client or seller hover
	let isSeller = 1;
	// это тестовое значение, его надо будет убрать в дальнейшем
	let hoverClass = (isSeller) ? 'seller-hover' : 'client-hover';
	$(".trip-card").hover( (e) => {
		$(e.delegateTarget).toggleClass(hoverClass);
	})

	// set tooltips by JQuery UI for trip categories
	$('.trip-category-icon').tooltip({
		placement: 'top'
	});

	if ($(window).width() <= 719) {
		$(".about-content").addClass("mod-hidden");
		$(".about-showMore").css("display", "block").click( ()=>{
			$(".about-content").removeClass("mod-hidden");
			$(".about-showMore").css("display", "none");
		});
	}


});
