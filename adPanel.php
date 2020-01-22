<?php require('./header.php'); ?>
<?php 
    if($_SESSION['authenticated'] == TRUE){
        require('./cmsdoc.php');
    }else{
        header('Location: login.php',true, 301	);
    }
    ?>