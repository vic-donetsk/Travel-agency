import Swiper from 'swiper'

$(document).ready( ()=>{
	// mobile menu
	$(".hamburger").click( (e)=> {
		if ( $(e.delegateTarget).hasClass('is-active') ) {
			$(".mobile-menu_wrapper").slideUp("slow");
		} else {
			$(".mobile-menu_wrapper").slideDown("slow").css("display", "flex");
		}
		$(e.delegateTarget).toggleClass('is-active');
	});


	//swiper slider
	var mySwiper = new Swiper ('.swiper-container', {
      direction: 'horizontal',
      // autoplay: {
      // 	delay: 4000
      // },
      loop: true
    });



	// trip-cards client or seller hover
	let isSeller = 1;
	// это тестовое значение, его надо будет убрать в дальнейшем
	let hoverClass = (isSeller) ? 'trip-card_seller-hover' : 'trip-card_client-hover';
	$(".trip-card").hover( (e) => {
		$(e.delegateTarget).toggleClass(hoverClass);
	})

	// set tooltips by JQuery UI for trip categories
	$('.trip-category-icon').tooltip({
		placement: 'top'
	});

	$(".about_show-more").click( ()=>{
		$(".about_content").removeClass("mod_hidden");
		$(".about_show-more").css("display", "none");
	});
	


	// popup-window for registered user
	let regUser = 1;
	// это тестовое значение, его надо будет убрать в дальнейшем
	$('.user a').mouseenter( (e) => {
		if (regUser) {
			let leftPopup = $(e.currentTarget).offset().left;
			// window pop down
			let topPopup = $(e.currentTarget).offset().top - 5;
			if ( ( $(e.currentTarget).offset().top - $(window).scrollTop() ) > ( $(window).height() / 2 ) ) {
				// window pop up
				topPopup -= 155;
			}  
			$('.popup-window_wrapper').css({'left' : leftPopup, 'top' : topPopup}).slideDown().mouseleave( (e) => {
				$(e.currentTarget).slideUp();
			});

		}
	});


});
