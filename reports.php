<?php require('./header.php'); ?>
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
<link href="./css/style.css" rel="stylesheet" type="text/css">
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
<body>
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
                    <h1 class="block-title">Trip Reports</h1>
                    <a href='index.php'><img src = 'images/header_logo_left.jpg'></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
                <div class="row">
                      
                       
                  <?php 
                    $report = new Report();
                    $data = $report->OrderReports();

                    $dataSeperatedByYear = [];
                    foreach($data as $record){
                      $dataseperatedByYear[$record['year']][] = $record;
                      
                    }
                    
                   foreach($dataseperatedByYear as $year){
                    echo '<h4 class="widgettitle">'.$year[0]['year'].'</h1>'; 
                    echo '<div class="row">';
                    echo '<ul class="gallery-items">';
                    
                    foreach($year as $entry){
                       $date = date_format(date_create($entry['date']),'Y-M-d');
                       $date_exp = explode('-',$date); 
                       echo '<li class="col-md-3 col-sm-6 grid-item event-grid-item education format-standard">';
                       echo '<div class="grid-item-inner">
                                <div class="grid-item-content" style="border:none;">
                                    <span class="event-date">
                                        <span class="date">'.$date_exp[2].'</span>
                                        <span class="month">'.$date_exp[1].'</span>
                                        <span class="year">'.$date_exp[0].'</span>
                                    </span>
                                    <h5 class="post-title">'.$entry["description"].'</h5>
                                    <a href="./trip_reports/'.$entry["name"].'" target="_blank">Read Report</a>
                                </div>
                           	</div>';
                       echo '</li>';
                       
                     }echo '</ul>';
                     echo '</div>';
                   }
                  ?>
                </div>
            </div>
    	</div>
    </div>
    <!-- Site Footer -->
    <?php require('./footer.php'); ?>