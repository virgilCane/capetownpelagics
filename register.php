<?php require('./header.php'); ?>
<?php 
    if($_SESSION['authenticated'] == TRUE){
        require('./regdoc.php');
    }else{
        header('Location: login.php',true, 301	);
    }
    ?>
