var identificacionAutor = $('#identificacion');
var nombreAutor = $('#nombre');
var telefonoAutor = $('#telefono');
var emailAutor = $('#email');
var profesionAutor = $('#profesion');
var descripcionAutor = $('#descripcion');
var ciudadAutor = $('#ciudad');
var direccionAutor = $('#direccion');
var organizacionAutor = $('#organizacion');
var fotoAutor = $('#foto');

function activarFormularioAutor() {
    identificacionAutor.attr('disabled', false);
    nombreAutor.attr('disabled', false);
    telefonoAutor.attr('disabled', false);
    emailAutor.attr('disabled', false);
    profesionAutor.attr('disabled', false);
    descripcionAutor.attr('disabled', false);
    ciudadAutor.attr('disabled', false);
    direccionAutor.attr('disabled', false);
    organizacionAutor.attr('disabled', false);
    fotoAutor.attr('disabled', false);

}

function deactivarFormularioAutor() {
    identificacionAutor.attr('disabled', true);
    nombreAutor.attr('disabled', true);
    telefonoAutor.attr('disabled', true);
    emailAutor.attr('disabled', true);
    profesionAutor.attr('disabled', true);
    descripcionAutor.attr('disabled', true);
    ciudadAutor.attr('disabled', true);
    direccionAutor.attr('disabled', true);
    organizacionAutor.attr('disabled', true);
    fotoAutor.attr('disabled', true);
}


/*==================================*/
/*CREACION EN LIMPIO DE AUTOR*/
/*==================================*/


$('#btnCrearAutor').on('click', function () {

    //condicional si esta vacio algun campo onligatorio
    if (identificacionAutor.val() == "" || identificacionAutor.val() == null ||
        nombreAutor.val() == "" || nombreAutor.val() == null ||
        telefonoAutor.val() == "" || telefonoAutor.val() == null ||
        emailAutor.val() == "" || emailAutor.val() == null ||
        profesionAutor.val() == "" || profesionAutor.val() == null ||
        ciudadAutor.val() == "" || ciudadAutor.val() == null
    ) {
        swal({
            title: "Error!",
            text: "Alguno de los campos esta vacio!",
            type: "warning",
            button: "OK!",
        });
        return;
    }


    //peticion ajax para creacion del usuario , y validacion si ya esta creada la cedula

    var datos = new FormData();
    datos.append('identificacionAutorLimpio', identificacionAutor.val());
    datos.append('nombreAutor', nombreAutor.val());
    datos.append('telefonoAutor', telefonoAutor.val());
    datos.append('emailAutor', emailAutor.val());
    datos.append('profesionAutor', profesionAutor.val());
    datos.append('descripcionAutor', descripcionAutor.val());
    datos.append('ciudadAutor', ciudadAutor.val());
    datos.append('direccionAutor', direccionAutor.val());
    datos.append('organizacionAutor', organizacionAutor.val());
    datos.append('fotoAutor', fotoAutor.val());

    $.ajax({
        url: "../controller/autor.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            deactivarFormularioAutor();
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            console.log(respuesta);
            //error1 es cedulaexistente
            if (respuesta == 'error1') {
                swal({
                    title: "Error!",
                    text: "La cedula que estas intentando crear, ya existe, intenta con otra!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else if (respuesta == 'error2') {
                swal({
                    title: "Error!",
                    text: "No se ha insertado correctamente, intenta de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else {


                swal({
                    type: 'success',
                    title: 'Felicitaciones!.',
                    text: 'Creacion de Autor exitosa!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "crear_autor.php";
                });
                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            }
        }

    });


});


/*==================================*/
/*CREACION DE ACUTOR APARITR DE ACTIVACION*/
/*==================================*/

$('#btnActivarAutor').on('click', function () {
    //condicional si esta vacio algun campo onligatorio
    if (identificacionAutor.val() == "" || identificacionAutor.val() == null ||
        nombreAutor.val() == "" || nombreAutor.val() == null ||
        telefonoAutor.val() == "" || telefonoAutor.val() == null ||
        emailAutor.val() == "" || emailAutor.val() == null ||
        profesionAutor.val() == "" || profesionAutor.val() == null ||
        ciudadAutor.val() == "" || ciudadAutor.val() == null
    ) {
        swal({
            title: "Error!",
            text: "Alguno de los campos esta vacio!",
            type: "warning",
            button: "OK!",
        });
        return;
    }


    //peticion ajax para creacion del usuario , y validacion si ya esta creada la cedula

    var datos = new FormData();
    datos.append('identificacionAutorActivar', identificacionAutor.val());
    datos.append('nombreAutor', nombreAutor.val());
    datos.append('telefonoAutor', telefonoAutor.val());
    datos.append('emailAutor', emailAutor.val());
    datos.append('profesionAutor', profesionAutor.val());
    datos.append('descripcionAutor', descripcionAutor.val());
    datos.append('ciudadAutor', ciudadAutor.val());
    datos.append('direccionAutor', direccionAutor.val());
    datos.append('organizacionAutor', organizacionAutor.val());
    datos.append('fotoAutor', fotoAutor.val());
    datos.append('idEnvioActivar', $(this).attr('idenvio'));

    $.ajax({
        url: "../controller/autor.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            deactivarFormularioAutor();
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            console.log(respuesta);

            //error1 es cedulaexistente
            if (respuesta == 'error1') {
                swal({
                    title: "Error!",
                    text: "La cedula que estas intentando crear, ya existe, intenta con otra!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else if (respuesta == 'error2') {
                swal({
                    title: "Error!",
                    text: "No se ha insertado correctamente, intenta de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else {


                swal({
                    type: 'success',
                    title: 'Felicitaciones!.',
                    text: 'Creacion de Autor exitosa!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "crear_autor.php";
                });
                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            }
        }

    });
});