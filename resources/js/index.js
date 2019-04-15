import Swiper from 'swiper'

$(document).ready( ()=>{
	// mobile menu
	$(".mobileHeaderMenu_mainButton").click( ()=> {
		$(".mobileMenu_wrapper").slideDown("slow");
	});
	$(".mobileMenu_close").click( ()=> {
		$(".mobileMenu_wrapper").slideUp("slow");
	});


	//swiper slider
	var mySwiper = new Swiper ('.swiper-container', {
      direction: 'horizontal',
      autoplay: {
      	delay: 4000
      },
      loop: true
    });



	// trip-cards client or seller hover
	let isSeller = 1;
	// это тестовое значение, его надо будет убрать в дальнейшем
	let hoverClass = (isSeller) ? 'tripCard_sellerHover' : 'tripCard_clientHover';
	$(".tripCard").hover( (e) => {
		$(e.delegateTarget).toggleClass(hoverClass);
	})

	// set tooltips by JQuery UI for trip categories
	$('.tripCategoryIcon').tooltip({
		placement: 'top'
	});

	if ($(window).width() <= 719) {
		$(".about_content").addClass("mod_hidden");
		$(".about_showMore").css("display", "block").click( ()=>{
			$(".about_content").removeClass("mod_hidden");
			$(".about_showMore").css("display", "none");
		});
	}


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
			$('.popupWindow_wrapper').css({'left' : leftPopup, 'top' : topPopup}).slideDown().mouseleave( (e) => {
				$(e.currentTarget).slideUp();
			});

		}
	});


});
