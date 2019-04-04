$(document).ready( ()=>{
	
	$(".main-button").click( ()=> {
		
		$(".mobile-menu-wrapper").slideDown("slow");
	});

	$(".close").click( ()=> {
		$(".mobile-menu-wrapper").slideUp("slow");
	});


});