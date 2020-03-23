<?php

session_start();

require('./db_inc.php');
require('./accounts_class.php');
require('./images_class.php');
require('./trip-report_class.php');
require('./trip-calendar_class.php');
//login.php
// $_SESSION['displayError'] = NULL;
//register.php
// $_SESSION['registered'] = NULL;
// $_SESSION['reg-message'] = NULL;
//./includes/checkMinSize.php
$SESSION['imageUploadError'] = NULL;

?>