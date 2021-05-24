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

$('.detallesEntr').click(function () {
    let cadena = '<div class="w-75 m-auto text-center alert mb-0 alert-danger alert-dismissible fade show" role="alert">' +
        '<strong>Inicia Sesion</strong> Debes de estar logueado para poder ver los detalles' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span></button></div>'
    $('#noLog').html(cadena)
})

$('#labelFileUser').hover(function () {
    $('#editIcon').removeClass("editIconO");
    $('#editIcon').addClass("editIconH");
}, function () {
    $('#editIcon').removeClass("editIconH");
    $('#editIcon').addClass("editIconO");
})

$('#fileUser').change(function () {
    if ($('#fileUser').val() == '') {
        console.log("vacio")
    } else {
        $('#textFile').html("<b>Archivo subido</b>")
    }
})

$('#password').focus(function () {
    let regex = /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}/;
    if (!regex.test($(this).val())) {
        $('#passAlert').html("1 Mayus, 1 Min, 1 Num, (8-16 Caracteres)")
    }
})

$('#dni').focus(function () {
    let regex = /[0-9]{8}[A-Za-z]{1}/;
    if (!regex.test($(this).val())) {
        $('#dniAlert').html("Formato: 12345678A")
    }
})

$('#iban').focus(function () {
    let regex = /[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){4}/;
    if (!regex.test($(this).val())) {
        $('#ibanAlert').html("Formato: AE12 1234 1234 1234 1234")
    }
})

$('#telefono').focus(function () {
    let regex = /(?:[ ]?[0-9]{3}){3}/;
    if (!regex.test($(this).val())) {
        $('#telfAlert').html("Formato: 123 123 123")
    }
})