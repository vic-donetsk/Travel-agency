// обработка нажатия на фильтр категорий
$('.seller-page_input').click( (e)=> {
	let tripTypeId;
	e.preventDefault();
	
	if ($(e.target).hasClass('radio-custom')) {
		tripTypeId = $(e.target).next().attr('id');
	} else {
		tripTypeId = $(e.target).attr('id');
	}

	let currentChecked = $('.seller-page_input input:checked').siblings('.radio-label').attr('id');

	// перезагружаем только в случае смены типа
	if (tripTypeId != currentChecked) {

		let pathArray = window.location.pathname.split('/');

		// если была категория в адресной строке, удаляем ее 
		if (pathArray.length == 4) {
			pathArray.pop();
		}

		// если выбрана другая категория - добавляем ее
		if (tripTypeId != 0) {
			pathArray.push(tripTypeId);
		}

		let pathString = pathArray.join('/');
		window.location.href = pathString;
	}
});

$('.seller-choice_delete').click( function(e) {
	let deletedTour = $(e.delegateTarget).data('id');
	$('.modal-layout, .modal-close, .modal-window').fadeIn();
	$('#modal-deleted').click( function() {
		window.location.pathname = `/trip_delete/${deletedTour}`;
	});
	$('.modal-layout, .modal-close, .modal-window').click( function(e) {
		$('.modal-layout, .modal-close, .modal-window').fadeOut();


	});

});
