$('.verRealizacion').click(function (event) {
    $(`.${$(this).data('id')}`).slideToggle();
})
