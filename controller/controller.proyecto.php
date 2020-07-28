<?php

require_once '../model/model.proyecto.php';

class ControllerProyecto
{


    static public function estructuraParte1Proyecto()
    {
        //validacion si viene la variable
        if (isset($_GET['investigacion'])) {

            //validacion si existe informacion
            $respuesta = ModelProyecto::informacionProyectoPorTituloGuiones($_GET['investigacion']);
            /*
                        var_dump($respuesta);*/
            if ($respuesta) {
                echo '
               <!--*****************************************************************************************************************-->
                <!--Single Blog Here-->
                <div class="container single-blog sticky content_col" style="margin-top: 3em">
                    <div class="row m0 inner">

                        <div class="post_inner row m0">
                            <div class="row m0 category politics">
                                <a href="#">' . $respuesta['cat_descripcion'] . '</a>
                                <div class="dropdown pull-right social_share_drop">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                  <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i> Pinterest</a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                                    </ul>
                                </div>
                                <ul class="post_meta nav nav-pills">
                                    <li><a href="#">' . $respuesta['pro_fecha_alta'] . '</a></li>
                                </ul>
                            </div>
                            <h3 class="post_title">' . $respuesta['pro_titulo'] . '</h3>
                            <div class="post_content row m0">';

                if ($respuesta['pro_url_video'] != "") {
                    echo '
                    <div class="row m0 feature_img">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/' . $respuesta['pro_url_video'] . '"></iframe>
                                    </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                    ';
                }

                echo '<div class="row img_row">
                                    <div class="col-sm-6">
                                        <div class="row m0">
                                            <h3 class="page_post_content_sub_title">Detalle proyecto</h3>
                                           <p>
                                            ' . $respuesta['pro_descripcion'] . '
                                            </p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="' . $respuesta['pro_url_img'] . '" alt="" class="img-responsive">
                                     
                                       <br>';

                /*Solo imprimir el boton si hay infomacion*/
                if ($respuesta['pro_url_documento'] != '') {
                    echo '
                    <a href="' . $respuesta['pro_url_documento'] . '" class="btn botonDescargar">Descargar Documento</a>
                    ';
                }


                echo '</div>
                                </div>
                            
                                <div class="row">

                                    <div class="col-xs-12">
                                    ' . $respuesta['pro_parrafo_12'] . '
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                     ' . $respuesta['pro_parrafo_6a'] . '
                                    
                                    </div>
                                     <div class="col-sm-6 col-xs-12">
                                     ' . $respuesta['pro_parrafo_6b'] . '

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  <div class="sticky_icon"><img src="images/posts/sticky.png" alt=""></div>-->
                    </div>
                </div>
                <!--Single Blog Here-->
                <!--*****************************************************************************************************************-->

                <!--*****************************************************************************************************************-->
                <!--Sidebar Here-->
                <div class="container sidebar" style="margin-top:1em">
                    <div class="row m0 about_author">
                        <h3 class="heading">ACERCA DEL AUTOR</h3>
                        <div class="media">
                            <div class="media-left">';


                if ($respuesta['au_foto'] == "") {
                    $foto = "images/perfil.jpg";
                } else {
                    $foto = $respuesta['au_foto'];
                }
                echo '<a href="autor.php?autor=' . $respuesta['au_nombre_guion'] . '"><img src="' . $foto . '" alt=""></a>';


                echo '</div>
                            <div class="media-body">
                                <div class="row m0 h5">
                                    <a href="autor.php?autor=' . $respuesta['au_nombre_guion'] . '" class="author_url">' . $respuesta['au_nombre'] . '</a>
                                    <ul class="list-unstyled" >
                                       <div class="fleft author" style="color:white"><i class="fa fa-phone" style="margin-left:1em"> </i> Telefono :  ' . $respuesta['au_telefono'] . '</div>
                                       <div class="fleft author" style="color:white"><i class="fa  fa-envelope" style="margin-left:1em"> </i> Email :  ' . $respuesta['au_email'] . '</div>
                                    </ul>
                                </div>
                                <p>' . $respuesta['au_profesion'] . '</p>
                            </div>
                        </div>
                    </div> <!--About Author-->
             ';


            } else {
                echo '<script>
                window.location = "index.php"
            </script>';
            }


        } else {

            echo '<script>
                window.location = "index.php"
            </script>';
        }


    }


}

?>