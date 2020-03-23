<?php require('./header.php'); ?>
<?php 
    if($_SESSION['authenticated'] == TRUE){
        require('./trip-calendar.php');
    }else{
        header('Location: ./logdoc.php',true, 301	);
    }
    ?>