/*=================================
 CREACION DE CATEGORIA
 ===================================*/
$('#btn-categoria').on('click', function () {
    /*Validacion de campos*/

    var categoria = $('#categoria');
    var color = $('#color');


    if (categoria.val() == "" || categoria.val == null ||
        color.val() == "" || color.val == null) {
        swal({
            title: "Error!",
            text: "Debes rellenar todos los campos!",
            type: "warning",
            button: "OK!",
        });

        return;
    }

    /*Peticion AJAX*/
    var datos = new FormData();
    datos.append('categoria', categoria.val());
    datos.append('color', color.val());
    $.ajax({
        url: "../controller/categoria.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            categoria.attr('disabled', true);
            color.attr('disabled', true);
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            //console.log(respuesta);
            if (respuesta == 'ok') {
                swal({
                    type: 'success',
                    title: 'OK.',
                    text: 'Creacion correcta!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "categorias.php";
                });
            } else {
                swal({
                    title: "Error!",
                    text: "No se logro insertar, intenta de nuevo!",
                    type: "danger",
                    button: "OK!",
                });

                categoria.attr('disabled', true);
                color.attr('disabled', true);
                $(this).attr('disabled', false);
            }
        }
    });

});

/*=================================
 ACTUALIZACION DE CATEGORIA
 ===================================*/
function editarCategoria(id) {
    var categoria = $('#categoria-' + id);
    var color = $('#color-' + id);


    if (categoria.val() == "" || categoria.val == null ||
        color.val() == "" || color.val == null) {
        swal({
            title: "Error!",
            text: "Debes rellenar todos los campos!",
            type: "warning",
            button: "OK!",
        });

        return;
    }

    /*Peticion AJAX*/
    var datos = new FormData();
    datos.append('categoria-up', categoria.val());
    datos.append('color-up', color.val());
    datos.append('id-up', id);
    $.ajax({
        url: "../controller/categoria.controller.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            categoria.attr('disabled', true);
            color.attr('disabled', true);
            $(this).attr('disabled', true);
        },
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta == 'ok') {
                swal({
                    type: 'success',
                    title: 'OK.',
                    text: 'Actualizacion correcta!',
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    window.location = "categorias.php";
                });
            } else {
                swal({
                    title: "Error!",
                    text: "No se logro Actualizar, intenta de nuevo!",
                    type: "danger",
                    button: "OK!",
                });

                categoria.attr('disabled', true);
                color.attr('disabled', true);
                $(this).attr('disabled', false);
            }
        }

    })

}