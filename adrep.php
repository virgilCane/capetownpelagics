<?php require('./header.php'); ?>
<?php 
    if($_SESSION['authenticated'] == TRUE){
        require('./trip-reports.php');
    }else{
        header('Location: ./logdoc.php',true, 301	);
    }
    ?>