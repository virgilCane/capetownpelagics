<?php
require('./header.php');
//Gallery Uploader
$image = new Image();
if(isset($_POST['gallery-uploader'])){
    $rarity = $_POST['rarity'];
    $species = $_POST['caption'];
    
    //Upload image to gallery dir
    
    $etn = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $name = $species.'_'.$rarity.'_'.rand().'.'.$etn;

        
        if(file_exists('gallery/'.$_FILES['file']['name'])){
            $SESSION['imageUploadError'] = 'Error. File Already Exists.';
        }
        else{
            $supported_image = array('gif','jpg','jpeg','png');
            $src_file_name =  $_FILES['file']['name'];
            $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

            if(in_array($ext, $supported_image)){
                move_uploaded_file($_FILES['file']['tmp_name'],"gallery/".$name);
                //Upload Data to pelagicsschema.images
                try{
                    $newId = $image->addImage($name,$species,$rarity);
                }catch (Exception $e){
                    $_SESSION['imageUploadError'] = $e->getMessage();
                    echo $_SESSION['imageUploadError'];
                    // header('Location: adgal.php',true, 301	);
                    die();
                }
                $_SESSION['imageUploadError'] = NULL;
                header('Location: gallery.php',true, 301);
                
            }else{
                // echo "<font color='red'>Please choose a valid image</font>";
            }
        }
}




?>