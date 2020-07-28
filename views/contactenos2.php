<!--CABECERA-->
<?php
require_once 'header.php';
require_once '../controller/controller.contacto.php';
?>


<!--*****************************************************************************************************************-->
<!--Contact Cols Here-->
<div class="container">
    <section class="row contact_cols">

        <div class="col-sm-12 contact_col">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#suscribe_form" aria-controls="suscribe_form" role="tab"
                                           data-toggle="tab">Proyectos de investigacion para contactos 2<i data-toggle="tooltip" data-placement="top"
                                                                              title="Envianos tu Investigacion"
                                                                              class="fa fa-question"></i></a></li>
                <li role="presentation"><a data-toggle="modal" data-target="#modal-donacion">
                        donación<i data-toggle="tooltip" data-placement="top" title="Apoya a Sistematis"
                                   class="fa fa-question"></i>
                    </a></li>
            </ul>
            <!--Tab Content-->
            <div class="tab-content">


                <!--Envio de investigacion-->

                <div role="tabpanel" class="tab-pane" id="suscribe_form">
                    <div class="row m0 newsletter_signup">
                        <div class="row m0 heading">
                            <h3>Envíanos tu investigación</h3>
                        </div>
                        <p>Envianos el avance de tus investigaciones, para conocer los terminos y condiciones </p>

                    </div>
                    <div class="contactForm row m0">
                        <form class="row" id="inv-form-investigacion">
                            <div class="col-sm-12">
                                <h4>Información del investigador</h4>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Identificacion o NIT"
                                           name="inv-identificacion" id="inv-identificacion"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nombre investigador"
                                           name="inv-nombre" id="inv-nombre"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Telefono" name="inv-telefono"
                                           id="inv-telefono"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" name="inv-email"
                                           id="inv-email"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nombre de la organizacion"
                                           name="inv-nombre-organizacion" id="inv-nombre-organizacion"
                                    >
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="inv-ciudad" id="inv-ciudad" class="form-control"
                                            placeholder="Seleccione ciudad" required>
                                        <option value="">Seleccione ciudad</option>
                                        <option value='Bogotá'>Bogotá</option>
                                        <option value='Medellín'>Medellín</option>
                                        <option value='Cali'>Cali</option>
                                        <option value='Barranquilla'>Barranquilla</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Direccion"
                                           name="inv-direccion" id="inv-direccion"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Profesión"
                                           name="inv-profesion" id="inv-profesion"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <h4>Información de la Investigación</h4>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Nombre de la investigación"
                                           name="inv-nombre-investigacion" id="inv-nombre-investigacion"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="url" class="form-control"
                                           placeholder="URL de documento de la investigacion"
                                           name="inv-url" id="inv-url"
                                           required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <select name="inv-categoria" id="inv-categoria" class="form-control"
                                            placeholder="Categoria" required>
                                        <option value="">Seleccione Categoria</option>
                                        <?php


                                        ControllerContacto::mostrarListadoCategoriasController();


                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group textarea">
                                    <textarea class="form-control"
                                              placeholder="Breve desscripcion de la Investigacion.."
                                              name="inv-descripcion"
                                              id="inv-descripcion" required></textarea>
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" value="Enviar propuesta" class="btn btn-primary"
                                       id="inv-enviar-investigacion">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!--Contact Cols Here-->
<!--*****************************************************************************************************************-->



<!--FOOTER-->
<?php
require_once 'footer.php';
?>

<!--*****************************************************************************************************************-->

<!--*****************************************************************************************************************-->


<!--*****************************************************************************************************************-->
<!--modal de donacion-->
<!--*****************************************************************************************************************-->
<?php
require 'modal-donacion.php';
?>

<!--PRE FOOTER-->
<?php
require_once 'pre-footer.php';
?>
