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
          <div class='flex-caption'>
            <div class="container">
            <div class="flex-caption-table">
              <div class="flex-caption-cell hero-header">
                <div class="flex-caption-text">
                  <div class="page-banner-text">
                    <h1 class="block-title">Trip Calendar</h1>
                    <br>
                    <a href='index.php'class='hero-image'><img src = 'images/header_logo_left.jpg'></a>
                    <div class='hero-spacer'></div>
                    <ul class="social-icons-rounded social-icons-colored">
                      <li class="facebook"><a href="https://www.facebook.com/CapeTownPelagics/"><i class="fa fa-facebook-f"></i></a></li>
                      <li class="twitter"><a href="https://twitter.com/capetownpelagic?lang=en"><i class="fa fa-twitter"></i></a></li>                            
                      <li class="instagram"><a href="https://www.instagram.com/capetownpelagics/"><i class="fa fa-instagram"></i></a></li>
                    </ul>  
                  </div>
                </div>
                
              </div>
              
            </div>
                
                  
            </div>
          </div>
        	
            
        </div>
    </div>
    <div class="alert alert-info">
      <p>If you would like to enquire about a trip date that is <strong>provisionally full</strong>, please join our <a href="./standby-list.php"><u>waiting list</u></a> to be notified of any availabilities.</p>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
                <div class="row">
                      
                       
                  <?php 
                  echo '<div class="row">';
                  echo '<div class="col-md-3"></div>';
                  echo '<div class="col-md-6">';
                    $calendar = new Calendar();
                    $data = $calendar->OrderDates();

                    $dataSeperatedByYear = [];
                    
                    foreach($data as $record){

                      $Mdate = date_format(date_create($record['date']),'Y-m-d-F');
                      $Mdate_exp = explode('-',$Mdate); 
                     
                      
                      $dataseperatedByYear[$record['year']][$Mdate_exp[3]][] = $record;  
                    }

                    
                   foreach($dataseperatedByYear as $year){
                    $keys = array_keys($year);
                    echo '<h4 class="widgettitle">'.$year[$keys[0]][0]['year'].'</h1>'; 
                    echo '<ul class="gallery-items">';
                   
                    foreach($year as $month){
                      $head_date = date_format(date_create($month[0]['date']),'Y-F-d');
                      $head_date_exp = explode('-',$head_date); 
                      echo '<h5>'.$head_date_exp[1].'</h5>' ;
                      echo '<ul>';
                      foreach($month as $entry){
                        $entry_date= date_format(date_create($entry['date']),'Y-F-d');
                        $entry_date_exp = explode('-',$entry_date); 
                        echo '<li class=" education format-standard">'.$entry_date_exp[2].' '.$entry_date_exp[1].' ('.$entry['comment'].') - <strong>'.$entry['spaces'].'</strong>
                              </li>';
                      }
                      echo '</ul>';  
                     }
                     echo '</ul>';
                     
                   }
                   echo '</div>';
                   echo '<div class="col-md-3">
                          
                         </div>';
                   echo '</div>';
                  ?>
                </div>
            </div>
    	</div>
    </div>
    <!-- Site Footer -->
    <?php require('./footer.php'); ?>