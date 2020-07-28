/*===========================================*/
/*FORMULARIO DE INVESTIGACION*/
/*===========================================*/

/*
 *
 $('#inv-nombre');
 $('#inv-identificacion');
 $('#inv-telefono');
 $('#inv-email');
 $('#inv-nombre-organizacion');
 $('#inv-ciudad');
 $('#inv-direccion');
 $('#inv-profesion');
 $('#inv-nombre-investigacion');
 $('#inv-url')
 $('#inv-categoria');
 $('#inv-descripcion');
 $('#inv-enviar-investigacion')
 * */

$('#inv-form-investigacion').on('submit', function (evt) {
    evt.preventDefault();
    // tu codigo aqui

    validarFormularioInvestigacion();
});


function validarFormularioInvestigacion() {

    var nombreOrganizacion = $('#inv-nombre-organizacion').val(); //  no es indispensable

    var nombre = $('#inv-nombre').val();
    var identificacion = $('#inv-identificacion').val();
    var telefono = $('#inv-telefono').val();
    var email = $('#inv-email').val();
    var ciudad = $('#inv-ciudad').val();
    var direccion = $('#inv-direccion').val();
    var profesion = $('#inv-profesion').val();
    var nombreInvestigacion = $('#inv-nombre-investigacion').val();
    var url = $('#inv-url').val();
    var categoria = $('#inv-categoria').val();
    var descripcion = $('#inv-descripcion').val();


    if (
        nombre == "" || nombre == null ||
        identificacion == "" || identificacion == null ||
        telefono == "" || telefono == null ||
        email == "" || email == null ||
        ciudad == "" || ciudad == null ||
        direccion == "" || direccion == null ||
        profesion == "" || profesion == null ||
        nombreInvestigacion == "" || nombreInvestigacion == null ||
        url == "" || url == null ||
        categoria == "" || categoria == null ||
        descripcion == "" || descripcion == null
    ) {

        swal({
            title: 'Error!',
            text: 'Alguno de los campos se encuentra vacio',
            type: 'error',
            confirmButtonText: 'Aceptar'
        });

    } else {
        /*Peticion ajax para enviar la informacion del formulario de investigacion*/
        var datos = new FormData();

        datos.append('nombreOrganizacion', nombreOrganizacion);
        datos.append('nombreInvestigador', nombre);
        datos.append('identificacionInvestigador', identificacion);
        datos.append('telefonoInvestigador', telefono);
        datos.append('emailInvestigador', email);
        datos.append('ciudadInvestigador', ciudad);
        datos.append('direccionInvestigador', direccion);
        datos.append('profesionInvestigador', profesion);
        datos.append('nombreInvestigacion', nombreInvestigacion);
        datos.append('urlInvestigacion', url);
        datos.append('categoriaInvestigacion', categoria);
        datos.append('descripcionInvestigacion', descripcion);

        $.ajax({
            url: "../controller/controller.contacto.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                bloqueoTotalFormularioInvestigacion();
                swal({
                    title: 'Enviando propuesta de investigacion',
                    html: '<i class="fa fa-refresh fa-spin"></i>',
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    allowOutsideClick: false
                })

            },
            success: function (respuesta) {
                //swal.close();
                console.log(respuesta);
                swal({
                    type: 'success',
                    title: 'Felicitaciones!.',
                    text: 'Has enviado correctamente la propuesta de investigación!',
                    footer: '<a href>Uno de nuestros asesores se pondra en contacto contigo</a>',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "contactenos.php";
                });
                desBloqueoTotalFormularioInvestigacion();

            }
        });

    }

}


/*DETECTANDO EL CAMBIO EN EL INPUT DE CEDULA*/

$('#inv-identificacion').change(function () {

    var valorBuscar = new FormData();
    valorBuscar.append('cedulaAutor', $(this).val());
    variarCamposAutorFormularioInvestigacion();
    $.ajax({
        url: "../controller/controller.contacto.php",
        method: "POST",
        data: valorBuscar,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log(respuesta);

            if (respuesta == 'ok') {
                desBloqueoInicialDeCamposFormularioInvestigacion();
            } else {
                bloqueoInicialDeCamposFormularioInvestigacion();
                var datosJson = JSON.parse(respuesta);
                console.log(datosJson);
                //rellenado de campos
                $('#inv-nombre').val(datosJson.au_nombre);
                $('#inv-telefono').val(datosJson.au_telefono);
                $('#inv-email').val(datosJson.au_email);
                $('#inv-nombre-organizacion').val(datosJson.au_organizacion);
                $('#inv-ciudad').val(datosJson.au_ciudad);
                $('#inv-direccion').val(datosJson.au_direccion);
                $('#inv-profesion').val(datosJson.au_profesion);
            }


        }
    });

});


/*BLOQUEO INICIAL DE CAMPOS*/
function bloqueoInicialDeCamposFormularioInvestigacion() {

    $('#inv-nombre').attr('disabled', true);
    $('#inv-telefono').attr('disabled', true);
    $('#inv-email').attr('disabled', true);
    $('#inv-nombre-organizacion').attr('disabled', true);
    $('#inv-ciudad').attr('disabled', true);
    $('#inv-direccion').attr('disabled', true);
    $('#inv-profesion').attr('disabled', true);
}

function desBloqueoInicialDeCamposFormularioInvestigacion() {

    $('#inv-nombre').attr('disabled', false);
    $('#inv-telefono').attr('disabled', false);
    $('#inv-email').attr('disabled', false);
    $('#inv-nombre-organizacion').attr('disabled', false);
    $('#inv-ciudad').attr('disabled', false);
    $('#inv-direccion').attr('disabled', false);
    $('#inv-profesion').attr('disabled', false);
}


function bloqueoTotalFormularioInvestigacion() {
    $('#inv-nombre').attr("disabled", true);
    $('#inv-identificacion').attr("disabled", true);
    $('#inv-telefono').attr("disabled", true);
    $('#inv-email').attr("disabled", true);
    $('#inv-nombre-organizacion').attr("disabled", true);
    $('#inv-ciudad').attr("disabled", true);
    $('#inv-direccion').attr("disabled", true);
    $('#inv-profesion').attr("disabled", true);
    $('#inv-nombre-investigacion').attr("disabled", true);
    $('#inv-url').attr("disabled", true)
    $('#inv-categoria').attr("disabled", true);
    $('#inv-descripcion').attr("disabled", true);
    $('#inv-enviar-investigacion').attr("disabled", true)
}


function desBloqueoTotalFormularioInvestigacion() {
    $('#inv-nombre').attr("disabled", false);
    $('#inv-identificacion').attr("disabled", false);
    $('#inv-telefono').attr("disabled", false);
    $('#inv-email').attr("disabled", false);
    $('#inv-nombre-organizacion').attr("disabled", false);
    $('#inv-ciudad').attr("disabled", false);
    $('#inv-direccion').attr("disabled", false);
    $('#inv-profesion').attr("disabled", false);
    $('#inv-nombre-investigacion').attr("disabled", false);
    $('#inv-url').attr("disabled", false)
    $('#inv-categoria').attr("disabled", false);
    $('#inv-descripcion').attr("disabled", false);
    $('#inv-enviar-investigacion').attr("disabled", false)
}


function variarCamposAutorFormularioInvestigacion() {
    $('#inv-nombre').val("");
    $('#inv-telefono').val("");
    $('#inv-email').val("");
    $('#inv-nombre-organizacion').val("");
    $('#inv-ciudad').val("");
    $('#inv-direccion').val("");
    $('#inv-profesion').val("");

}

bloqueoInicialDeCamposFormularioInvestigacion();




