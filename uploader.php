<?php
if(isset($_POST['gallery-uploader'])){
    $rarity = $_POST['rarity'];
    $species = $_POST['caption'];
    $description = $_POST['descriptions'];
   //Upload image to gallery dir
   $spcs = explode(' ',$species);
   $etn = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        $name = $rarity.'-'.$spcs[0].'-'.$spcs[1].'-'.Date('YmdHisa').'.'.$etn;

        
        if(file_exists('gallery/'.$_FILES['file']['name'])){
           
        }
        else{
            $supported_image = array('gif','jpg','jpeg','png');
            $src_file_name =  $_FILES['file']['name'];
            $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

            if(in_array($ext, $supported_image)){
                move_uploaded_file($_FILES['file']['tmp_name'],"gallery/".$name);
                header('Location: adPanel.php',true, 301);
                
            }else{
                echo "<font color='red'>Please choose a valid image</font>";
            }
        }
}


?>