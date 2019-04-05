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



	 



});