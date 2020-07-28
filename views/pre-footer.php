<?php
require_once '../controller/controller.menu.php';
?>

<div class="sliding_menu row m0">
    <div class="row m0 search_row">

        <div class="fleft" id="menuHide" style="width: 100%"><i class="fa fa-close"
                                                                style="font-size: 2em;color: white"></i></div>
    </div>
    <div class="row m0 navByCat">
        <ul class="nav">

            <?php
            ControllerMenu::menuLateralController();
            ?>
        </ul>
    </div>

</div>

<!--*****************************************************************************************************************-->

<!--*****************************************************************************************************************-->

<!--*****************************************************************************************************************-->
<!--jQuery, Bootstrap and other vendor JS-->

<!--jQuery-->
<script src="js/jquery-2.1.4.min.js"></script>

<!--Show Date-->
<script src="js/date.js"></script>

<!--Bootstrap JS-->
<script src="js/bootstrap.min.js"></script>

<!--mCustom Scrollbar-->
<script src="vendors/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!--Owl Carousel-->
<script src="vendors/owl.carousel/owl.carousel.min.js"></script>

<!--Counter Up-->
<script src="vendors/counterup/jquery.counterup.min.js"></script>

<!--Waypoints-->
<script src="vendors/waypoints/waypoints.min.js"></script>

<!--FlexSlider-->
<script src="vendors/flexslider/jquery.flexslider-min.js"></script>

<!--Magnific Popup-->
<script src="js/jquery.magnific-popup.min.js"></script>

<!--Instafeed-->
<script src="vendors/instafeed/instafeed.min.js"></script>

<!--ImageLoaded-->
<script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!--Isotope-->
<script src="vendors/isotope/isotope.min.js"></script>

<!--Isotope-->
<script src="vendors/infinitescrol/jquery.infinitescroll.min.js"></script>

<!--Sweetalert2-->
<script src="vendors/sweetalert2/sweetalert2.all.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>


<!--Theme JS-->
<script src="js/theme.js"></script>
<script src="js/infinite2.js"></script>

<!--SCRIPTS LOCALES-->
<script src="js/contacto.js"></script>

</body>
</html>