
//LOGIN
//Recuperamos el nombre del usuario
$('#login').click(function () {
    if (localStorage.getItem('usuario')) {
        $('#usuario').val(localStorage.getItem('usuario'));
    }
})

//Guardamos el nombre de usuario cuando la casilla recordar usuario esté marcada
$('.sendLogin').click(function () {
    if ($('.recordarUsu').prop('checked')) {
        localStorage.setItem('usuario', $('#usuario').val());
    } else {
        localStorage.removeItem('usuario');
    }
})
//-------------

//ENTRENAMIENTOS
//Mostrar detalles de la realizacion de un entrenamiento
$('.verDetalles').click(function () {
    $(`.${$(this).data('id')}`).slideToggle();
})
//-------------

//INICIO-VER ENTRENAMIENTO
//Mostrar advertencia si un usuario no registrado quiere ver un entrenamiento
$('.detallesEntr').click(function () {
    let cadena = '<div class="w-75 m-auto text-center alert mb-0 alert-danger alert-dismissible fade show" role="alert">' +
        '<strong>Inicia Sesion</strong> Debes de estar logueado para poder ver los detalles' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span></button></div>'
    $('#noLog').html(cadena)
})
//-------------

//PERFIL USUARIO
//Efecto hover para la imagen del usuario
$('#labelFileUser').hover(function () {
    $('#editIcon').removeClass("editIconO");
    $('#editIcon').addClass("editIconH");
}, function () {
    $('#editIcon').removeClass("editIconH");
    $('#editIcon').addClass("editIconO");
})

//Informa cuando se suba un archivo
$('#fileUser').change(function () {
    if (!$('#fileUser').val() == '') {
        $('#textFile').html("<b>Archivo subido</b>")
    }
})
//-------------

//FORMULARIO REGISTRO
//Marcar la cuota que seleccione el usuario al registrarse
$('.cuota, #radioNoCuota').click(function () {
    $('.cuota').removeClass("cuotaSeleccionada")
    $(this).addClass("cuotaSeleccionada")

    $('#datosBancarios').slideDown();

    $('.cuota').children('input:radio').attr('checked', false);
    $(this).children('input:radio').attr('checked', true);
})

//Comprobar si las 2 contraseñas introducidas coinciden
$('#password, #password2').keyup(function (e) {
    if ($('#password').val() != $('#password2').val()) {
        $('#passAlert2').html("Las contraseñas no coinciden")
    } else {
        $('#passAlert2').html("")
        $("#registerAlert").html("")
    }
})
//No enviar form si las contraseñas no coinciden
$('#register').click(function (e) {
    let regex = /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}/;
    if (!regex.test($('#password').val())) {
        e.preventDefault();
        $("#registerAlert").html("La contraseña no tiene el formato correcto")
    } else if ($('#password').val() != $('#password2').val()) {
        e.preventDefault();
        $("#registerAlert").html("Haz Coincidir las contraseñas")
    } else {
        $("#registerAlert").html("")
    }
})

//Mostrar el formato de la contraseña
$('#password').keyup(function () {
    let regex = /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}/;
    if (!regex.test($(this).val())) {
        $('#passAlert').html("1 Mayus, 1 Min, 1 Num, (8-16 Caracteres)")
    } else {
        $('#passAlert').html("")
    }
})
//Mostrar el formato del dni
$('#dni').keyup(function () {
    let regex = /[0-9]{8}[A-Za-z]{1}/;
    if (!regex.test($(this).val())) {
        $('#dniAlert').html("Formato: 12345678A")
    } else {
        $('#dniAlert').html("")
    }
})
//Mostrar el formato del iban
$('#iban').keyup(function () {
    let regex = /[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){4}/;
    if (!regex.test($(this).val())) {
        $('#ibanAlert').html("Formato: AE12 1234 1234 1234 1234")
    } else {
        $('#ibanAlert').html("")
    }
})
//Mostrar el formato del telefono
$('#telefono').keyup(function () {
    let regex = /(?:[ ]?[0-9]{3}){3}/;
    if (!regex.test($(this).val())) {
        $('#telfAlert').html("Formato: 123 123 123")
    } else {
        $('#telfAlert').html("")
    }
})
//-------------

