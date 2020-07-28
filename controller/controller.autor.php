<?php

require_once '../model/model.autor.php';
require_once '../model/model.proyecto.php';

class ControllerAutor
{
    // Funcion que traera la informacion
    static public function devuelveInformacionAutorPorNombreGuionesController()
    {
        //VALIDACION DE VARIABLE GET
        if (isset($_GET['autor'])) {


            $respuesta = ModelAutor::devuelveInformacionAutorPorNombreGuionesModel($_GET['autor']);

            if ($respuesta) {


                if ($respuesta['au_foto'] == "") {
                    $foto = "images/perfil.jpg";
                } else {
                    $foto = $respuesta['au_foto'];
                }

                echo '
                <section class="row author_info">
    <div class="inner row m0">
        <div class="row m0 other_info" id="other_author_info">
            <div class="col-sm-6">
                <div class="media shor_about">
                    <div class="media-left"><a href="#"><img src="' . $foto . '" alt=""></a></div>
                    <div class="media-body">
                        <h2>' . $respuesta['au_nombre'] . '</h2>
                        <p>' . $respuesta['au_profesion'] . '</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h3 class="heading">Información:</h3>
                <div class="row">
                    <div class="col-xs-12">
                        <p style="color: white">
                              ' . $respuesta['au_descripcion'] . '
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row less_info m0">
            <div class="fleft social_network">
                <div class="fleft author"><i class="fa fa-phone"></i> Telefono :  ' . $respuesta['au_telefono'] . '</div>
                <div class="fleft author"><i class="fa fa-map"></i> Organización :  ' . $respuesta['au_organizacion'] . '</div>
                <div class="fleft author"><i class="fa  fa-envelope"></i> Email :  ' . $respuesta['au_email'] . '</div>
            </div>
            <div class="fright switch_less_more">
                <input type="checkbox" id="check_less_more_author_post">
                <label for="check_less_more_author_post">
                        <span class="label_text">
                            <span class="less">Menos información</span>
                            <span class="more">Mas información</span>
                        </span>
                    <span class="switch">
                            <span class="circle"></span>
                        </span>
                </label>
            </div>
        </div>
    </div>
</section>
                ';


                //Informacion de proyectos relacionados con el usuario
                echo '
                
                <!--*****************************************************************************************************************-->

<!--*****************************************************************************************************************-->
<!--Post Filter-->
<section class="row">
    <div class="container-fluid">
        <div class="row m0 latest_post_filter">
            <div class="fleft last_post_date">
                <h3>Investigaciones:
                    <small class="current_date"></small>
                </h3>
            </div>
        </div>
    </div>
</section>
<!--Post Filter-->
<!--*****************************************************************************************************************-->

<!--*****************************************************************************************************************-->



<section class="row all_posts" id="all_posts2">';


                $respuesta2 = ModelProyecto::informacionProyectoPorIdAutor($respuesta['au_id']);

                foreach ($respuesta2 as $dato2) {
                    echo '
                    <div class="col-sm-3 post sticky">
        <div class="row m0 inner">
            <div class="row m0 featured_img">
                <a href="proyecto.php?investigacion=' . $dato2['pro_titulo_guiones'] . '"><img src="' . $dato2['pro_url_img'] . ' " alt=""></a>
            </div>
            <div class="row m0 post_contents">
                <div class="row m0 category politics">
                    <a href="#"><i class="fa fa-bell" style="color: ' . $dato2['cat_color'] . '"></i> ' . $dato2['cat_descripcion'] . '</a>
                    <div class="dropdown pull-right social_share_drop">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </div>
                <h3 class="post_title"><a href="proyecto.php?investigacion=' . $dato2['pro_titulo_guiones'] . '">' . $dato2['pro_titulo'] . '</a></h3>
                <ul class="post_meta nav nav-pills">
                    <li><a href="#">' . $dato2['pro_fecha_alta'] . '</a></li>
                    <li><a href="#"><i class="fa "></i></a></li>
                    <li><a href="#"><i class="fa fa-commenting"></i>0</a></li>
                </ul>
            </div>
        </div>
    </div><!--Sticky Post-->
                    ';
                }
                echo '</section>';


            } else {
                echo '
                <script>
                window.location= "index.php"
</script>
                ';
            }


        } else {
            echo '
                <script>
              window.location= "index.php"
</script>
                ';
        }

    }


}

?>