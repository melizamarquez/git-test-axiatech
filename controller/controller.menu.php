<?php

require_once '../model/model.menu.php';

class ControllerMenu
{


    static public function menuLateralController()
    {
        $respuesta = ModelMenu::listarCategorias();

        foreach ($respuesta as $dato) {
            echo '
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">' . $dato['cat_descripcion'] . '</a>
                <ul class="dropdown-menu">
            ';

            $respuesta2 = ModelMenu::listarProyectosPorCategoria($dato['cat_id']);

            foreach ($respuesta2 as $dato2) {
                echo '
                    <li><a href="proyecto.php?investigacion=' . $dato2['pro_titulo_guiones'] . '" style="" class="amenulateral">
                            ' . $dato2['pro_titulo'] . '
                        </a></li>
            ';
            }
            echo '</ul></li>';

        }

    }

}

?>