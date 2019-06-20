$(".select").click( (e) => {
	$(e.delegateTarget).removeClass('psevdoPH').find('.deleted').remove();
});
