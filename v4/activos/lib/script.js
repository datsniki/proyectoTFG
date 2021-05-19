$('#login').click(function () {
    if (localStorage.getItem('usuario')) {
        $('#usuario').val(localStorage.getItem('usuario'));
    }
})

$('.sendLogin').click(function () {
    if ($('.recordarUsu').prop('checked')) {
        localStorage.setItem('usuario', $('#usuario').val());
    } else {
        localStorage.removeItem('usuario');
    }
})

$('.verDetalles').click(function () {
    $(`.${$(this).data('id')}`).slideToggle();
})

$('.cuota').click(function () {
    $('.cuota').removeClass("cuotaSeleccionada")
    $(this).addClass("cuotaSeleccionada")

    $('#datosBancarios').slideDown();

    $('.cuota').children('input:radio').attr('checked', false);
    $(this).children('input:radio').attr('checked', true);
})