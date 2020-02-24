
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

<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="./css/style.css" rel="stylesheet" type="text/css">
<link href="./vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="./vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="./vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="./css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link href="./colors/color1.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="./js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
 
	<?php require('./adnav.php'); ?>
    
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(./images/beach-dawn-dusk-ocean-189349.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
                    <h1 class="block-title">Admin</h1>
                    <a href='index.php'><img src = './images/header_logo_left.jpg'></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
                <div class="row">
                        <div class="col-md-6 col-sm-6 donation-form-infocol">
                            <form action='auth.php' method='POST'>
                                <h4>Register</h4>
                                <input type="text" class="form-control" placeholder="Username" name='username'>
                                <input type="password" class="form-control" placeholder="Password" name='password'>
                                <input type='submit' value='register' name='register' class="btn btn-primary">
                            </form>
                        </div>
                </div>
                <?php 
                
                if(isset($_SESSION['registered'])){
                    if($_SESSION['registered'] == FALSE){
                        echo '<br>';
                        echo '<div class="row">';
                            echo '<div class="col-md-6 col-sm-6">';
                                echo '<div class="alert alert-danger" role="alert">';
                                    echo $_SESSION['reg-message'];
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        $_SESSION['registered'] = NULL;
                    }
                        
                    
                }
                       
                ?>
                <br>
                <div class="alert alert-info" role="alert">
                    <p><strong>PLEASE NOTE:</strong></p>
                    <p><strong>Usernames</strong> and <strong>Passwords</strong> must be between 8 and 16 characters long</p>
                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- Site Footer -->
    <?php require('./footer.php'); ?>