$(document).ready( ()=>{

	//$(".mobile-menu-wrapper").css("display", "none");
	
	$(".main-button").click( ()=> {
		$(".mobile-header-menu").css("display", "none");
		$(".mobile-menu-wrapper").slideDown("slow");
	});

	$(".close").click( ()=> {
		$(".mobile-menu-wrapper").slideUp("fast");
		$(".mobile-header-menu").css("display", "flex");
	});






});