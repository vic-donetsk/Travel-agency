$('.basket_total-button').click( function(e) {
    $('.modal-order, .modal-window').fadeIn();
    $('.basket_close').click( function() {
        window.location.pathname = '/';
    });
    $('.modal-order, .modal-window, .basket_close' ).click( function(e) {
        window.location.pathname = '/form_orders';
    });
});
