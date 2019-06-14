$('.basket_onetrip-delete').on('click', (e) => {
	
	$(e.delegateTarget).parents('.basket_onetrip').slideUp(300, ()=>{
		// не работает обращение через this!!!
		$(e.delegateTarget).parents('.basket_onetrip').remove();

		if (!$('.basket_onetrip').length) {
			$('.basket_list-header').hide(0);
			$('.basket_empty').fadeIn(300);
			$('.basket_total').slideUp(300);
		}
	});



});

