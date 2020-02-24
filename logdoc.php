<?php
require('db_inc.php');
require('accounts_class.php');

session_start();
// $_SESSION['displayError']=NULL;

    if($_SESSION['authenticated']){
        header('Location: adPanel.php',true, 301	);
        die();
    }

header('Location: login.php',true, 301	);