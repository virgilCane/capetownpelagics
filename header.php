<?php

session_start();

require('./db_inc.php');
require('./accounts_class.php');
//login.php
// $_SESSION['displayError'] = NULL;
//register.php
$_SESSION['registered'] = NULL;
$_SESSION['reg-message'] = '';
//./includes/checkMinSize.php
$SESSION['imageUploadError'] = NULL;

?>