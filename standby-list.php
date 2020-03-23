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
<body class="contact">
<!--[if lt IE 7]>
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
                    <h1 class="block-title">Standby List</h1>
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
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        
        	<div class="container">
      
            	<div class="row">
                	<div class="col-md-8 content-block">
                    	<form method="post" id="contactform" name="contactform" class="contact-form clearfix" action="mail/standby-mailer.php">
                        	<div class="row">
                                
                                <div class="col-md-7">
                                        <h3 class="widgettitle" >Details</h3>
                                        <div class="form-group">
                                                <label for='tripDate'>Preferred Trip Date*</label>
                                                <input type="text" id="tripDate" name="Trip Date"  class="form-control input-lg"  required>
                                            </div>
                                        <div class="form-group">
                                            <label for='name'>Full name*</label>
                                            <input type="text" id="name" name="name"  class="form-control input-lg"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for='email'>Email*</label>
                                            <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for='phone'>Mobile Number*</label>
                                            <div class='input-group'>
                                                <span class="input-group-addon" id="basic-addon1">+27</span>
                                                <input type="text" id="phone" name="phone"  class="form-control input-lg" placeholder="" required>
                                            </div>                                            
                                        </div>
                                                                       
                              	</div>
                               </div>
                               <div class='form-group'>
                                        <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-down" value="Submit">
                                </div> 
                		
                                </form>

                                <?php 
                                    if(isset($_SESSION['standby-mailer'])){
                                    if($_SESSION['standby-mailer'] == 'Thank you. Your message has been sent and we will be in touch shortly.'){
                                        $alert = ' alert alert-info';
                                    }else{
                                        $alert = 'alert alert-danger';
                                    }
                                    echo '<div class="'.$alert.'">
                                            <p>'.$_SESSION["standby-mailer"].'</p>
                                            </div>';
                                    }
                                ?>
                    </div>
                    
                    
                    
                        </div>
                    
                    
                    
                    </div>                   
                </div>
            
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php require('./footer.php'); ?>