	let noFiltersArray = {
		country: 'Все',
		hotel: 'Любой',
		tripType:'Все',
		nutrition:'Любое',
		price:'Любая',
		children:'Все равно'
	}, savedFilters = {};

	// открытие и закрытие окна фильтров в мобильной версии
	$('.show-filters').click( (e) => {
		$('.search_filters').slideDown(500);
	});

	$('.close-search').click( (e) => {
		$('.search_filters').slideUp(500);
	});

	// считываем массив из Local Storage или берем по умолчанию
	if ( localStorage.getItem('tourism_filters') ) {
		 let fromLS = JSON.parse( localStorage.getItem('tourism_filters') );
		 savedFilters = fromLS;
		} else {
			savedFilters = $.extend({}, noFiltersArray);
	};

	// отрисовываем измененииые фильтры в обоих блоках
	renderAsideFilters(savedFilters);
	renderTopFilters(savedFilters);


	// обработка фильтров - радиокнопок
	$('.price-filter').click( (e)=> {
		// переставляем инпут вручную
		e.preventDefault();
		$('.price-filter input:selected').prop('checked', false);
		$(e.target).siblings('input').prop('checked', true);
		// выбираем текст независимо от места клика
		if ($(e.target).hasClass('radio-custom')) {
			filterTextMessage = $(e.target).next().text();
		} else {
			filterTextMessage = $(e.target).text();
		}
		//сохраняем в массив и LS 

		savedFilters.price = filterTextMessage;
		let toLS = JSON.stringify(savedFilters);
		localStorage.setItem('tourism_filters', toLS);

		// отрисовываем измененииые фильтры в обоих блоках
		//renderAsideFilters(savedFilters);
		renderTopFilters(savedFilters);
	});

	$('.nutrition-filter').click( (e)=> {
		// переставляем инпут вручную
		e.preventDefault();
		$('.nutrition-filter input:selected').prop('checked', false);
		$(e.target).siblings('input').prop('checked', true);
		// выбираем текст независимо от места клика
		if ($(e.target).hasClass('radio-custom')) {
			filterTextMessage = $(e.target).next().text();
		} else {
			filterTextMessage = $(e.target).text();
		}
		//сохраняем в массив и LS 
		savedFilters.nutrition = filterTextMessage;
		let toLS = JSON.stringify(savedFilters);
		localStorage.setItem('tourism_filters', toLS);

		// отрисовываем измененииые фильтры в топе блока
		renderTopFilters(savedFilters);
	});

	// обработка фильтров - выпадающих списков
	handleSelectFilter('country_select');
	handleSelectFilter('hotel_select');
	handleSelectFilter('tripType_select');
	handleSelectFilter('children_select');





// обработка фильтра select
function handleSelectFilter(filterClass) {
	$('.' + filterClass).change( (e)=> {
		let filterFields = filterClass.split('_');
		savedFilters[filterFields[0]] = $('.' + filterClass + ' option:selected').text();

		let toLS = JSON.stringify(savedFilters);
		localStorage.setItem('tourism_filters', toLS);

		renderTopFilters(savedFilters);
	});
}

// отрисовка блока фильтров в топе главной части
function renderTopFilters(filters) {

	let issetFilters = false;
	$('.search_results_active-filters').empty();
	let filtersContent = `<div class="active-filters_wrapper">`;
	for (let key in filters) {

		if ( filters[key] != noFiltersArray[key] ) {
			issetFilters = true;
			filtersContent += 
			`<div class="active-filter country">
							<p class="active-filter_value">${filters[key]}</p>
							<img src="img/close.svg" alt="" class="close">
						</div>`
		}
	}
	if (issetFilters) {
		filtersContent += `</div>
					<div class="reset-filters">
						<p class="reset-filters_text">Очистить фильтр</p>
						<img src="img/close.svg" alt="" class="close">
					</div>`;
		$('.search_results_active-filters').html(filtersContent);

		// сброс всех фильтров при нажатии "Очистить"
		$('.reset-filters').click( (e) => {
			console.log('erased');
			savedFilters = $.extend({}, noFiltersArray);
			localStorage.removeItem('tourism_filters');
			renderAsideFilters(savedFilters);
			renderTopFilters(savedFilters);	
		});

	}
}

function renderAsideFilters(filters) {
	let radio = ['nutrition', 'price'];
	for (let currentFilter in filters) {
		if ( radio.indexOf(currentFilter) != -1 ) {
			// если это input-radio
			let usedClass = '.' + currentFilter + '-filter';
			//$(usedClass + ' input:checked').prop('checked', false);
			$(usedClass + ' > div').each( (index, elem) =>{
				if ( $(elem).find('.radio-label').text() == filters[currentFilter] ) {
					$(elem).find('input').prop('checked', true);
				} else {
					$(elem).find('input').prop('checked', false);
				}

			});

		} else {
			// если это select
			let usedClass = '.' + currentFilter + '_select';
			//$(usedClass + ' option:selected').prop('selected', false);
			$(usedClass + ' > option').each( (index, elem) =>{
				if ( $(elem).text() == filters[currentFilter] ) {
					$(elem).prop('selected', true);
				} else {
					$(elem).prop('selected', false);
				}

			});
		}
	}
}
