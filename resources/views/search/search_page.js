let filtersArray = [
	'country',
	'hotel',
	'type',
	'category',
	'diet',
	'price',
	'children',
	'recommended',
	'hot',
	'sort'
], 
savedFilters = {};

// открытие и закрытие окна фильтров в мобильной версии
$('.show-filters').click( (e) => {
	$('.search_filters').slideDown(500);
});

$('.close-search').click( (e) => {
	$('.search_filters').slideUp(500);
});

// парсим данные из входящей строки
let searchString = window.location.search.substr(1);
let searchArray = searchString.split('&');
let searchParameters = new Map();

for (let i = 0; i < searchArray.length; i++) {
	let oneFilter = searchArray[i].split('=');
	searchParameters.set(oneFilter[0], oneFilter[1]);
}

// формируем массив значений фильтров для отображения
for (let i = 0; i < filtersArray.length; i++) {
	let filt = filtersArray[i];
	savedFilters[filt] = searchParameters.has(filt) ? searchParameters.get(filt) : 0;
}

// отрисовываем измененные фильтры в обоих блоках
renderAsideFilters(savedFilters);
renderTopFilters(savedFilters);


// обработка фильтров - радиокнопок
$('.price_filter, .diet_filter').click( (e)=> {

	e.preventDefault();
	if ($(e.target).hasClass('radio-custom') || $(e.target).hasClass('radio-label')) {
		console.log('Наш клиент');
		let classArray = e.delegateTarget.className.split('_filter');
		let filterName = classArray[0];
		let filterValue = $(e.target).siblings('input').attr('name').split('_')[1];

		rebuildLocationSearch(filterName, filterValue);
	} 
});

// обработка фильтров select
$('.one-filter_select').change( (e) => {
	let classArray = e.target.className.split('_filter');
	let filterName = classArray[0];
	let filterValue = $(e.target).children('option:selected').attr('value');

	rebuildLocationSearch(filterName, filterValue);
});

// изменение строки параметров и переход на новую страницу	
function rebuildLocationSearch(filterName, filterValue) {
	let newFilter = filterName + '=' + filterValue;
	let urlString = window.location.search;

	//при измененни фильтров - удаляем страницу старой пагинации 
	urlString = urlString.replace(RegExp('&?page=[0-9]+'), '');

	if (filterValue == 0) {
		urlString = urlString.replace(RegExp('&?' + filterName + '=[0-9]+'), '');
	}
		else if (urlString.indexOf(filterName) != -1) {
			urlString = urlString.replace(RegExp(filterName + '=[0-9]+'), newFilter);
		} else {
			let andSign = ((urlString.split('?').length > 1) && (urlString.split('?')[1] != '')) ? '&' : '';
			urlString += (andSign + newFilter);
		}
	window.location.search = urlString;
}


// сброс всех фильтров при нажатии "Очистить"
$('body').on('click', '.reset-filters', (e) => {
	newLoc = window.location.href.replace(window.location.search, '');
	window.location.href = newLoc;
});

// удаление одного фильтра из топа (изменение адресной строки)
$('body').on('click', '.active-filter', (e) => {
	let urlString = '';
	let filterName = $(e.currentTarget).data('type');
	savedFilters[filterName] = 0;
	for (let key in savedFilters) {
		if (savedFilters[key] != 0) {
			urlString += (key + '=' + savedFilters[key] + '&');
		}
	}
	if (urlString) {
		console.log(111111);
		urlString = '?' + urlString.substr(0, urlString.length-1);
	}
	window.location.href = window.location.protocol + '//' + window.location.hostname + 
							window.location.pathname + urlString;
});



// отрисовка блока выбранных фильтров в топе главной части
function renderTopFilters(filters) {

	let issetFilters = false;
	$('.search_results_active-filters').empty();
	let filtersContent = `<div class="active-filters_wrapper">`;
	for (let key in filters) {
		if (key != 'sort') {
			if ( filters[key] != 0 ) {
				issetFilters = true;
				className = '.' + key + '_filter';
				$filterLayout = $(className);
				if ($filterLayout.hasClass('one-filter_select')) {
					filterText = $(className + ` option[value=${filters[key]}]`).text();
				} else {
					name = (key == 'diet') ? 'd_' + filters[key] : 'p_'+ filters[key];
					filterText = $(className + ` input[name=${name}]`).siblings('.radio-label').text();
				}
				filtersContent += 
				`<div class="active-filter" data-type="${key}">
								<p class="active-filter_value" ">${filterText}</p>
								<img src="img/close.svg" alt="" class="close">
							</div>`
			}
		}
	}
	if (issetFilters) {
		filtersContent += `</div>
					<div class="reset-filters">
						<p class="reset-filters_text">Очистить фильтр</p>
						<img src="img/close.svg" alt="" class="close">
					</div>`;
		$('.search_results_active-filters').html(filtersContent).css('visibility', 'visible');
	} else {
		$('.search_results_active-filters').css('visibility', 'hidden');
	}
}

// отрисовка основного блока фильтров (с условиями)
function renderAsideFilters(filters) {
	for (let oneFilter in filters) {
		renderOneAsideFilter(oneFilter, filters[oneFilter])
	}
}

function renderOneAsideFilter(currentFilter, currentValue) {
	let radio = ['diet', 'price'];
	let usedClass = '.' + currentFilter + '_filter';

	if ( radio.indexOf(currentFilter) != -1 ) {
		// если это input-radio
		$(usedClass + ' > div').each( (index, elem) => {
			$curInput = $(elem).find('input');
			if ( $curInput.attr('name').split('_')[1] == currentValue ) {
				$curInput.prop('checked', true);
			} else {
				$curInput.prop('checked', false);
			}
		});
	} else {
		// если это select
		$(usedClass + ' > option').each( (index, elem) => {
			if ( $(elem).attr('value') == currentValue ) {
				$(elem).prop('selected', true);
			} else {
				$(elem).prop('selected', false);
			}
		});
	}
}
