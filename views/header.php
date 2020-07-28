<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AXIATECH</title>

    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e74c3c">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e74c3c">

    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Vendors -->
    <link rel="stylesheet" href="vendors/owl.carousel/owl.carousel.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="vendors/flexslider/flexslider.css">
    <link rel="stylesheet" href="vendors/mCustomScrollbar/jquery.mCustomScrollbar.css">

    <!--Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>

    <!--Sweet alert-->
    <link rel="stylesheet" href="vendors/sweetalert2/sweetalert.css">
    <!--Theme Styles-->
    <link rel="stylesheet" href="css/default/style.css">
    <link rel="stylesheet" href="css/responsive/responsive.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="home">

<?php
require_once 'loader.php';
?>

<header class="row header1" id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo_container fleft">
                    <div id="slideMenu_trigger">
                        <img src="images/navigation/logo/bars.png" alt="">
                    </div>
                    <a class="navbar-brand fuente-personalizada" href="index.php" title="AXIATECH">AXIATECH</a>
                </div>
            </div>

            <div class="follow_nav fleft">
                <div class="fleft menuTitle">Siguenos en:</div>
                <ul class="nav nav-pills">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>

            <div class="rightSide_nav pull-right">
                <div class="fleft current_date hidden-md hidden-sm hidden-xs">
                    <i class="fa fa-clock-o"></i><?php echo Date('Y/m/d') ?>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top_nav"
                        aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="top_nav" class="collapse navbar-collapse fleft">
                    <ul class="nav navbar-nav">
                        <li><a href="contactenos.php"> Contáctenos </a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
</header>