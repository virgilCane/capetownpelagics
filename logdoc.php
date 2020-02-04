<?php
require('./db_inc.php');
require('./accounts_class.php');

session_start();
$_SESSION['displayError']=NULL;
header('Location: login.php',true, 301	);