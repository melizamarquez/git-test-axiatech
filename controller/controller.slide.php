<?php

require_once '../model/model.slide.php';

class ControllerSlide
{
    static public function mostrarSlideProyectos()
    {
        $respuesta = ModelSlide::listarProyectosActivos();

        foreach ($respuesta as $dato) {

            echo '
            <div class="item post">
            <div class="row inner">
                <div class="recuadro-post">
                    <img src="'.$dato['pro_url_img'].'" alt="" class="featured-img">
                </div>
                <div class="row content">
                    <h4 class="category politics"><a href="#"><i class="fa fa-bell" style="color: '.$dato['cat_color'].'"></i> '.$dato['cat_descripcion'].'</a></h4>
                    <h3 class="post_title"><a href="proyecto.php?investigacion='.$dato['pro_titulo_guiones'].'">'.$dato['pro_titulo'].'</a></h3>
                    <ul class="post_meta nav nav-pills">
                        <li><a href="#"><i class="fa fa-clock-o"></i>'.$dato['pro_fecha_alta'].'</a></li>
                    </ul>
                </div>
            </div>
        </div>
           ';
        }
    }

}

?>