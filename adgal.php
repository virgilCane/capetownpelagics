<?php require('./header.php'); ?>
<?php 
    if($_SESSION['authenticated'] == TRUE){
        require('./upgal.php');
    }else{
        header('Location: login.php',true, 301	);
    }
    ?>