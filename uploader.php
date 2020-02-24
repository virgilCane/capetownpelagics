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

//Trip Reports Uploader/editer/deletor
$report = new Report();
$action = 'add';
if(isset($_POST['trip-report-uploader'])){
    $action = $_POST['action'];
    $description = trim($_POST['description']);
    $date = $_POST['date'];
    


    //Upload .pdf file to trip_reports dir
    //Add trip report
    if($action == 'add'){
        $etn = strtolower(pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION));
        $name = $date.'_'.rand().'.'.$etn;
    
      
            
            if(file_exists('trip_reports/'.$_FILES['pdf']['name'])){
                $SESSION['reportUploadError'] = 'Error. File Already Exists.';
                
            }
            else{
                $supported_image = array('pdf');
                $src_file_name =  $_FILES['pdf']['name'];
                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));
    
                if(in_array($ext, $supported_image)){
                    move_uploaded_file($_FILES['pdf']['tmp_name'],"trip_reports/".$name);

                    //Upload Data to pelagicsschema.trip_reports
                    try{
                        $newId = $report->addReport($name,$date,$description);  
                    }catch (Exception $e){
                        $_SESSION['reportUploadError'] = $e->getMessage();
                        echo $_SESSION['reportUploadError'];
                        // header('Location: adgal.php',true, 301	);
                        die();
                    }
                    $_SESSION['reportUploadError'] = NULL;
                    header('Location: reports.php',true, 301);
                    
                }else{
                    // echo "<font color='red'>Please choose a valid image</font>";
                }
            } 
    }
    if($action=='delete'){
        $date = $_POST['date'];
        $id = $report->getIdFromDate($date);
        $name = $report->getNamefromId($id);
        
        if($id == NULL){
            $_SESSION['null-reportID'] == 'Error. No report exists with this date.';
            header('Location: trip-reports.php',true, 301);
            die();
        }
        $report->deleteReport($id);
        unlink('./trip_reports/'.$name);
        header('Location: reports.php',true, 301);

    }
    
    
}

?>