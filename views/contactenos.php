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
                                           data-toggle="tab">Investigación <i data-toggle="tooltip" data-placement="top"
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
                                        <option value='Cartagena'>Cartagena</option>
                                        <option value='Cúcuta'>Cúcuta</option>
                                        <option value='Soledad'>Soledad</option>
                                        <option value='Ibagué'>Ibagué</option>
                                        <option value='Soacha'>Soacha</option>
                                        <option value='Bucaramanga'>Bucaramanga</option>
                                        <option value='Villavicencio'>Villavicencio</option>
                                        <option value='Santa Marta'>Santa Marta</option>
                                        <option value='Valledupar'>Valledupar</option>
                                        <option value='Bello'>Bello</option>
                                        <option value='Pereira'>Pereira</option>
                                        <option value='Montería'>Montería</option>
                                        <option value='Pasto'>Pasto</option>
                                        <option value='Buenaventura'>Buenaventura</option>
                                        <option value='Manizales'>Manizales</option>
                                        <option value='Neiva'>Neiva</option>
                                        <option value='Palmira'>Palmira</option>
                                        <option value='Armenia'>Armenia</option>
                                        <option value='Riohacha'>Riohacha</option>
                                        <option value='Sincelejo'>Sincelejo</option>
                                        <option value='Popayán'>Popayán</option>
                                        <option value='Itaguí'>Itaguí</option>
                                        <option value='Floridablanca'>Floridablanca</option>
                                        <option value='Envigado'>Envigado</option>
                                        <option value='Tuluá'>Tuluá</option>
                                        <option value='Tumaco'>Tumaco</option>
                                        <option value='Dosquebradas'>Dosquebradas</option>
                                        <option value='Tunja'>Tunja</option>
                                        <option value='Girón'>Girón</option>
                                        <option value='Apartadó'>Apartadó</option>
                                        <option value='Uribia'>Uribia</option>
                                        <option value='Barrancabermeja'>Barrancabermeja</option>
                                        <option value='Florencia'>Florencia</option>
                                        <option value='Turbo'>Turbo</option>
                                        <option value='Maicao'>Maicao</option>
                                        <option value='Piedecuesta'>Piedecuesta</option>
                                        <option value='Yopal'>Yopal</option>
                                        <option value='Ipiales'>Ipiales</option>
                                        <option value='Fusagasugá'>Fusagasugá</option>
                                        <option value='Facatativá'>Facatativá</option>
                                        <option value='Chía'>Chía</option>
                                        <option value='Cartago'>Cartago</option>
                                        <option value='Pitalito'>Pitalito</option>
                                        <option value='Zipaquirá'>Zipaquirá</option>
                                        <option value='Malambo'>Malambo</option>
                                        <option value='Jamundí'>Jamundí</option>
                                        <option value='Rionegro'>Rionegro</option>
                                        <option value='Yumbo'>Yumbo</option>
                                        <option value='Magangué'>Magangué</option>
                                        <option value='Lorica'>Lorica</option>
                                        <option value='Caucasia'>Caucasia</option>
                                        <option value='Manaure'>Manaure</option>
                                        <option value='Quibdó'>Quibdó</option>
                                        <option value='Buga'>Buga</option>
                                        <option value='Duitama'>Duitama</option>
                                        <option value='Sogamoso'>Sogamoso</option>
                                        <option value='Tierralta'>Tierralta</option>
                                        <option value='Girardot'>Girardot</option>
                                        <option value='Ciénaga'>Ciénaga</option>
                                        <option value='Sabanalarga'>Sabanalarga</option>
                                        <option value='Ocaña'>Ocaña</option>
                                        <option value='Santander de Quilichao'>Santander de Quilichao</option>
                                        <option value='Aguachica'>Aguachica</option>
                                        <option value='Villa del Rosario'>Villa del Rosario</option>
                                        <option value='Garzón'>Garzón</option>
                                        <option value='Cereté'>Cereté</option>
                                        <option value='Arauca'>Arauca</option>
                                        <option value='Sahagún'>Sahagún</option>
                                        <option value='Mosquera'>Mosquera</option>
                                        <option value='Montelíbano'>Montelíbano</option>
                                        <option value='Candelaria'>Candelaria</option>
                                        <option value='Chigorodó'>Chigorodó</option>
                                        <option value='Madrid'>Madrid</option>
                                        <option value='Caldas'>Caldas</option>
                                        <option value='Funza'>Funza</option>
                                        <option value='Los Patios'>Los Patios</option>
                                        <option value='Calarcá'>Calarcá</option>
                                        <option value='La Dorada'>La Dorada</option>
                                        <option value='El Carmen de Bolívar'>El Carmen de Bolívar</option>
                                        <option value='Arjona'>Arjona</option>
                                        <option value='Espinal'>Espinal</option>
                                        <option value='Turbaco'>Turbaco</option>
                                        <option value='Acacías'>Acacías</option>
                                        <option value='San Andrés'>San Andrés</option>
                                        <option value='Santa Rosa de Cabal'>Santa Rosa de Cabal</option>
                                        <option value='Copacabana'>Copacabana</option>
                                        <option value='San Vicente del Caguán'>San Vicente del Caguán</option>
                                        <option value='Planeta Rica'>Planeta Rica</option>
                                        <option value='Chiquinquirá'>Chiquinquirá</option>
                                        <option value='Ciénaga de Oro'>Ciénaga de Oro</option>
                                        <option value='San José del Guaviare'>San José del Guaviare</option>
                                        <option value='Necoclí'>Necoclí</option>
                                        <option value='La Plata'>La Plata</option>
                                        <option value='Granada'>Granada</option>
                                        <option value='La Estrella'>La Estrella</option>
                                        <option value='Riosucio'>Riosucio</option>
                                        <option value='Corozal'>Corozal</option>
                                        <option value='Puerto Asís'>Puerto Asís</option>
                                        <option value='Zona Bananera'>Zona Bananera</option>
                                        <option value='Plato'>Plato</option>
                                        <option value='Cajicá'>Cajicá</option>
                                        <option value='Carepa'>Carepa</option>
                                        <option value='Villamaría'>Villamaría</option>
                                        <option value='Baranoa'>Baranoa</option>
                                        <option value='San Marcos'>San Marcos</option>
                                        <option value='Florida'>Florida</option>
                                        <option value='Pamplona'>Pamplona</option>
                                        <option value='El Cerrito'>El Cerrito</option>
                                        <option value='Girardota'>Girardota</option>
                                        <option value='Fundación'>Fundación</option>
                                        <option value='Pradera'>Pradera</option>
                                        <option value='Puerto Boyacá'>Puerto Boyacá</option>
                                        <option value='Orito'>Orito</option>
                                        <option value='El Banco'>El Banco</option>
                                        <option value='Marinilla'>Marinilla</option>
                                        <option value='La Ceja'>La Ceja</option>
                                        <option value='Tame'>Tame</option>
                                        <option value='Ayapel'>Ayapel</option>
                                        <option value='Sabaneta'>Sabaneta</option>
                                        <option value='Valle del Guamuez'>Valle del Guamuez</option>
                                        <option value='Barbosa'>Barbosa</option>
                                        <option value='Puerto Libertador'>Puerto Libertador</option>
                                        <option value='San Onofre'>San Onofre</option>
                                        <option value='Chinchiná'>Chinchiná</option>
                                        <option value='El Bagre'>El Bagre</option>
                                        <option value='Guarne'>Guarne</option>

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
