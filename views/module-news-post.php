<?php
require_once '../controller/controller.slide.php';
?>
<hr>
<section class="row popular_posts_row" id="news-post-resume">
    <h2 class="sectionTitle">Investigaciones</h2>
    <div class="owl-carousel popular_posts_carousel all_posts">

        <?php

        ControllerSlide::mostrarSlideProyectos();

        ?>
    </div>
</section>