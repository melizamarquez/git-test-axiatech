var tituloProyecto = $('#titulo');
var urlvideoProyecto = $('#url-video');
var urlimagenProyecto = $('#url-imagen');
var urldocumentoProyecto = $('#url-documento');
var fechaaltaProyecto = $('#fecha-alta');
var estadoProyecto = $('#estado');
var categoriaProyecto = $('#categoria');
var autorProyecto = $('#autor');
var descripcionProyecto = $('#descripcion');
var editor1Proyecto = $('#editor1');
var editor2Proyecto = $('#editor2');
var editor3Proyecto = $('#editor3');


function activarFormularioProyecto() {
    tituloProyecto.attr('disabled', false);
    urlvideoProyecto.attr('disabled', false);
    urlimagenProyecto.attr('disabled', false);
    urldocumentoProyecto.attr('disabled', false);
    fechaaltaProyecto.attr('disabled', false);
    estadoProyecto.attr('disabled', false);
    categoriaProyecto.attr('disabled', false);
    autorProyecto.attr('disabled', false);
    descripcionProyecto.attr('disabled', false);
    editor1Proyecto.attr('disabled', false);
    editor2Proyecto.attr('disabled', false);
    editor3Proyecto.attr('disabled', false);
}


function desactivarFormularioProyecto() {
    tituloProyecto.attr('disabled', true);
    urlvideoProyecto.attr('disabled', true);
    urlimagenProyecto.attr('disabled', true);
    urldocumentoProyecto.attr('disabled', true);
    fechaaltaProyecto.attr('disabled', true);
    estadoProyecto.attr('disabled', true);
    categoriaProyecto.attr('disabled', true);
    autorProyecto.attr('disabled', true);
    descripcionProyecto.attr('disabled', true);
    editor1Proyecto.attr('disabled', true);
    editor2Proyecto.attr('disabled', true);
    editor3Proyecto.attr('disabled', true);
}

/*================================================*/
/*insertar el proyecto desde limpio o desde informacion de id de envio*/
/*================================================*/
$('#guardarProyecto').on('click', function () {
    //validacion de campos con (*)

    if (tituloProyecto.val() == '' || tituloProyecto.val() == null ||
        urlimagenProyecto.val() == '' || urlimagenProyecto.val() == null ||
        fechaaltaProyecto.val() == '' || fechaaltaProyecto.val() == null ||
        estadoProyecto.val() == '' || estadoProyecto.val() == null ||
        categoriaProyecto.val() == '' || categoriaProyecto.val() == null ||
        autorProyecto.val() == '' || autorProyecto.val() == null ||
        descripcionProyecto.val() == '' || descripcionProyecto.val() == null

    ) {
        swal({
            title: "Error!",
            text: "Alguno de los campos marcados con (*) esta vacio!",
            type: "warning",
            button: "OK!",
        });
        return;
    }


    //captura de datos en las variables
    var datos = new FormData();

    datos.append('tituloProyecto', tituloProyecto.val());
    datos.append('urlvideoProyecto', urlvideoProyecto.val());
    datos.append('urlimagenProyecto', urlimagenProyecto.val());
    datos.append('urldocumentoProyecto', urldocumentoProyecto.val());
    datos.append('fechaaltaProyecto', fechaaltaProyecto.val());
    datos.append('estadoProyecto', estadoProyecto.val());
    datos.append('categoriaProyecto', categoriaProyecto.val());
    datos.append('autorProyecto', autorProyecto.val());
    datos.append('descripcionProyecto', descripcionProyecto.val());
    datos.append('editor12Proyecto', (CKEDITOR.instances['editor1'].getData()) ? CKEDITOR.instances['editor1'].getData() : '<div></div>');
    datos.append('editor6AProyecto', (CKEDITOR.instances['editor2'].getData()) ? CKEDITOR.instances['editor2'].getData() : '<div></div>');
    datos.append('editor6Broyecto', (CKEDITOR.instances['editor3'].getData()) ? CKEDITOR.instances['editor3'].getData() : '<div></div>');
    datos.append('idEnvioPendiente', ($(this).attr('idEnvio')) ? $(this).attr('idEnvio') : '0');

    $.ajax({
        url: "../controller/proyectos.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            desactivarFormularioProyecto();
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            console.log(respuesta);
            //error1 es cedulaexistente
            if (respuesta == 'errro1') {
                swal({
                    title: "Error!",
                    text: "No se logro insertar la informacion de nuevo proyecto, intenta de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioProyecto();
                $(this).attr('disabled', false);
                return;
            } else if (respuesta == 'error2') {
                swal({
                    title: "Error!",
                    text: "No se logro actualizar el id  de envio de proyecto, en la Base de datos intenta de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioProyecto();
                $(this).attr('disabled', false);
                return;
            } else if (respuesta == 'ok') {
                swal({
                    type: 'success',
                    title: 'Felicitaciones!.',
                    text: 'Creacion de Proyecto efectiva!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "crear_proyecto.php";
                });
                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else {
                swal({
                    title: "Error!",
                    text: "Error desconocido, contactelo con el administrador o intente de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioProyecto();
                $(this).attr('disabled', false);
                return;
            }
        }

    });
});


/*============================================*/
/*ACTUALIZANDO LA INFORMACION DEL  PROYECTO*/
/*============================================*/
$('#actualizarProyecto').on('click', function () {

    if (tituloProyecto.val() == '' || tituloProyecto.val() == null ||
        urlimagenProyecto.val() == '' || urlimagenProyecto.val() == null ||
        fechaaltaProyecto.val() == '' || fechaaltaProyecto.val() == null ||
        estadoProyecto.val() == '' || estadoProyecto.val() == null ||
        categoriaProyecto.val() == '' || categoriaProyecto.val() == null ||
        autorProyecto.val() == '' || autorProyecto.val() == null ||
        descripcionProyecto.val() == '' || descripcionProyecto.val() == null

    ) {
        swal({
            title: "Error!",
            text: "Alguno de los campos marcados con (*) esta vacio!",
            type: "warning",
            button: "OK!",
        });
        return;
    }


    //captura de datos en las variables
    var datos = new FormData();

    datos.append('tituloProyecto', tituloProyecto.val());
    datos.append('urlvideoProyecto', urlvideoProyecto.val());
    datos.append('urlimagenProyecto', urlimagenProyecto.val());
    datos.append('urldocumentoProyecto', urldocumentoProyecto.val());
    datos.append('fechaaltaProyecto', fechaaltaProyecto.val());
    datos.append('estadoProyecto', estadoProyecto.val());
    datos.append('categoriaProyecto', categoriaProyecto.val());
    datos.append('autorProyecto', autorProyecto.val());
    datos.append('descripcionProyecto', descripcionProyecto.val());
    datos.append('editor12Proyecto', (CKEDITOR.instances['editor1'].getData()) ? CKEDITOR.instances['editor1'].getData() : '<div></div>');
    datos.append('editor6AProyecto', (CKEDITOR.instances['editor2'].getData()) ? CKEDITOR.instances['editor2'].getData() : '<div></div>');
    datos.append('editor6Broyecto', (CKEDITOR.instances['editor3'].getData()) ? CKEDITOR.instances['editor3'].getData() : '<div></div>');
    datos.append('idProyectoUpdate', ($(this).attr('idProyecto')) ? $(this).attr('idProyecto') : '0');

    $.ajax({
        url: "../controller/proyectos.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            desactivarFormularioProyecto();
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta == 'errro1') {
                swal({
                    title: "Error!",
                    text: "No se logro actualizar el proyecto en la Base de datos, intenta de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioProyecto();
                $(this).attr('disabled', false);
                return;
            } else if (respuesta == 'ok') {
                swal({
                    type: 'success',
                    title: 'Felicitaciones!.',
                    text: 'Actualizacion de proyecto efectiva!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "proyectos_activos.php";
                });
                activarFormularioAutor();
                $(this).attr('disabled', false);
                return;
            } else {
                swal({
                    title: "Error!",
                    text: "Error desconocido, contactelo con el administrador o intente de nuevo!",
                    type: "warning",
                    button: "OK!"
                });

                activarFormularioProyecto();
                $(this).attr('disabled', false);
                return;
            }

        }

    });

});