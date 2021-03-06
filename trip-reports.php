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
            <h2  class='block-title'>Add/Delete Trip Reports</h2>
                <div class="row">
                    <div class='col-md-8 col-sm-8 '>
                        <div class='col-md-7 donation-form-infocol'>
                            <form method='POST' action='uploader-reports.php' enctype='multipart/form-data'>
                                <div class='form-group'>
                                    <label for='action'>Action</label>
                                    <br>
                                    <select name='action' id='action'>
                                        <option value='add'>Add<br>
                                        <option value='delete'>Delete<br>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label for='date'>Date</label>
                                    <br>
                                    <input type='date' id='date' name='date' required> 
                                </div>
                                <div class='form-group' id='uploader'>
                                    <label for='pdf'>Trip Report</label>
                                    <input id='pdf' name='pdf' type='file' accept='.pdf' required>
                                </div>
                                <div class='form-group' id='highlights'>
                                <label for='description'>Highlights</label>
                                <textarea id='description' name='description' rows='4' cols='50' maxlength='100' placeholder='Max: 100 characters' required></textarea>
                                </div>
                                <input type='submit'name='trip-report-uploader'>
                            </form>
                            <?php
                            if(isset($_SESSION['null-reportID'])){
                                echo '<div class="alert alert-danger"><p>'.$_SESSION['null-reportID'].'</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

      <!-- custom js -->
      <script type='text/javascript' src='./js/jquery-2.1.3.min.js'></script>
      <script type='text/javascript' src='./js/trip-report.js'></script>
      <!-- Site Footer -->
      <?php require('./footer.php'); ?>