$(document).ready( ()=>{
	// mobile menu
	$(".main-button").click( ()=> {
		$(".mobile-menu-wrapper").slideDown("slow");
	});
	$(".close").click( ()=> {
		$(".mobile-menu-wrapper").slideUp("slow");
	});

	// trip-cards client or seller hover
	let isSeller = 1;
	// это тестовое значение, его надо будет убрать в дальнейшем
	let hoverClass = (isSeller) ? 'seller-hover' : 'client-hover';
	$(".trip-card").hover( (e) => {
		$(e.delegateTarget).toggleClass(hoverClass);
	})

	// set tooltips by JQuery UI for trip categories
	$('.trip-category-icon').tooltip({   
		placement: 'top',
		//offset: 10 
	});




});