<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cape Town Pelagics - Weekly non-profit pelagic birding trips in South Africa</title>
<meta name="description" content="Weekly non-profit pelagic birding trips in South Africa">
<meta name="keywords" content="cape town pelagics, birding tours south africa, birding tours cape town, conservation tours, pelagics, pelagic trips, bird-finding, seabirds, birds, birding, bird-finding guide, bird watching, sa birdfinder, ornithology, ecotourism, endemic, fieldguide, photography, day guiding, african penguin, albatross, trip reports, birding africa">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link href="colors/color1.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body class="home">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
        <?php require('./nav.php'); ?>
       <!-- Hero Area -->
       <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/beach-dawn-dusk-ocean-189349.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
                    <h1 class="block-title mobile-disp">Gallery</h1>
                    <a href='index.php'><img src = 'images/header_logo_left.jpg'></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
               
                <div class="row">
                    <ul class=" gallery-items" >
                 
                        <?php
                        $fo = opendir('./gallery');
                        while($file = readdir($fo)){
                            if($file != '.' && $file != '..' && $file != 'Thumbs.db'){
                                $spcs = explode('_',$file);
                                echo '<li class=" col-lg-3 col-md-3 col-sm-12 col-xs-12 cause-grid-item">';
                                echo "<img src='./gallery/$file' class='gal-item media-box '>";
                                echo '<div class="grid-item-content">
                                        <p>'.$spcs[0].'  ['.$spcs[1].']</p>
                                     </div>';
                                echo '</li>';
                              
                            }
                            
                        }
                        ?>
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php require('./footer.php'); ?>