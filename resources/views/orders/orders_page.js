$('.oneorder_header').on('click', (e) => {
	let $prev = $('.oneorder_header.active');
	let $current = $(e.delegateTarget);
	// если нажали на закрытый заказ
	if ( !$current.hasClass('active') ) {
		$current.children('.oneorder_details-sign').html(`<i class="fas fa-angle-up"></i>`);
		$current.addClass('active').next().slideDown(300);
		// если был открыт другой заказ
		if ($prev.length) {
			$prev.children('.oneorder_details-sign').html(`<i class="fas fa-angle-down"></i>`);
			$prev.removeClass('active').next().slideUp(300);
		}
		// если нажали на открытый заказ
	} else {
		$current.children('.oneorder_details-sign').html(`<i class="fas fa-angle-down"></i>`);
		$current.removeClass('active').next().slideUp(300);
	}

});

