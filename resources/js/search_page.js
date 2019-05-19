
//$(document).ready( ()=>{


	// открытие и закрытие окна фильтров в мобильной версии
	$('.show-filters').click( (e) => {
		$('.search_filters').slideDown(500);
	});

	$('.close-search').click( (e) => {
		$('.search_filters').slideUp(500);
	});

	let savedFilters = (localStorage.getItem('tourism_filters')) ? localStorage.getItem('tourism_filters') : [];

	//renderFilters(savedFilters);

	$('.price-filter').click( (e)=> {
//		console.log(e);
//		console.log($('.price-filter:selected').text());
		console.log('target: ' , $(e.target).text());
		//console.log('current target: ' , e.currentTarget);
		//console.log('delegate target: ' , e.delegateTarget);
		console.log($('input[name=rb2]:checked').val());
	});

//}


