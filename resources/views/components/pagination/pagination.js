// формируем пагинацию, если она нужна
if ((typeof pagiPages !== 'undefined') && (pagiPages)) {

	contentPaginationBlock = (pagiPages > 4) ? 
			setBigPagination(currentPage, pagiPages) :
			setSmallPagination(pagiPages) ;
	renderPagination(contentPaginationBlock, currentPage);

	// формирование массива для вывода блока пагинации
	// при количестве страниц больше 4
	function setBigPagination(activePage, totalPages) {  
	    let displayArray = [];
		activePage = +activePage;
		if (activePage != 1) {
		displayArray.push(`<i class="fas fa-angle-left"></i>`);
		}
		displayArray.push(1);
		if (activePage < 3) {
		displayArray.push(2, "...");
		} else if ( activePage > (totalPages - 2) ) {
		displayArray.push("...", totalPages - 1);
		} else {
		displayArray.push("...", activePage, "...");
		}
		displayArray.push(totalPages);
		if (activePage != totalPages) {
		displayArray.push(`<i class="fas fa-angle-right"></i>`);
		} 
	    return displayArray; 
	}
	// при количестве страниц меньше 5
	function setSmallPagination(totalPages) {  
	    let displayArray = [];
		for (let i = 0; i < totalPages; i++) {
			displayArray.push(i+1);
		}
	    return displayArray; 
	}
	 
	// формирование блока пагинации для текущей страницы
	function renderPagination(pagesArray, activeElem) {  
		let renderResult = "", directionFlag;
		for (let i = 0; i < pagesArray.length; i++) {
			if (pagesArray[i] == '...') {
				renderResult += `<div class="pagination_interval"> ... </div>`;
			} else if (pagesArray[i] == `<i class="fas fa-angle-left"></i>`) {
				renderResult += `<div class="pagination_elem mod_prev">${pagesArray[i]}</div>`
			}
			  else if (pagesArray[i] == `<i class="fas fa-angle-right"></i>`) {
			  	renderResult += `<div class="pagination_elem mod_next">${pagesArray[i]}</div>`
			}
			  else {
				let activeClass = (pagesArray[i] == activeElem) ? " pagination_active " : "";
		 		renderResult += `<div class="pagination_elem ${activeClass}">${pagesArray[i]}</div>`
			}
		}
		$('.pagination').html(renderResult);
	}

	// обработка нажатия на блок пагинации и переход на нужную страницу
	$('.pagination').click( (e)=> { 
	    e.preventDefault();
	    // не обрабатываем нажатия на троеточия и активную страницу
	    if ($(e.target).hasClass('pagination_interval') ||
            $(e.target).hasClass('pagination_active'))
	            return;
	    currentPage = +currentPage;
	    if ($(e.target).hasClass('mod_prev') || $(e.target).parent().hasClass('mod_prev')) { 
	      currentPage--; 
	  	} else if ($(e.target).hasClass('mod_next') || $(e.target).parent().hasClass('mod_next')) {
	        currentPage++; 
	    } else {
	          currentPage = $(e.target).text();
	    }

	    let newPagiPage = 'page=' + currentPage;
	    let urlString = window.location.search;
	    if (urlString.indexOf('page') != -1)
	    // если переход со страницы на страницу 
	    {
	    	urlString = urlString.replace(RegExp('page=[0-9]+'), newPagiPage);
	    } else if ((urlString.split('?').length > 1) && (urlString.split('?')[1] != ''))
	    // адресная строка содержит только фильтры и не содержит страницу
	    {
	    	urlString += ('&' + newPagiPage);
	    } else 
	    // адресная строка не содержит никаких get-параметров
	    {
	    	urlString += ('?' + newPagiPage);
	    }
	    window.location.search = urlString;
	});
}

