<?php
require('./header.php');
//trip calendar upload/edit/delete
$calendar = new Calendar();
$cal_action = 'add';
if(isset($_POST['trip-calendar-uploader'])){
    $cal_action = $_POST['action'];
    $date = $_POST['date'];
    
    $spaces =$_POST['spaces'];
    if(isset($_POST['new-date'])&& ($_POST['new-date'] != '')){
        $newDate = $_POST['new-date'];

    }else{
        $newDate = $date;
    }
    if((isset($_POST['entry']))&& ($_POST['entry']!='')){
        $comment=$_POST['entry'];
    }else{
        $comment = ' ';
    }
    

    if($cal_action =='add'){
        try{
            $newId = $calendar->addDate($date,$comment,$spaces);
        }catch (Exception $e){
            $_SESSION['calendarUploadError'] = $e;
            echo $_SESSION['calendarUploadError'];
            die();
        }
        header('Location: calendar.php',true,301);
        
    }
    if($cal_action == 'edit'){
        
            $calendar->editDate($newDate,$date,$comment,$spaces);
            header('Location: calendar.php',true, 301);
        
    }
    if($cal_action == 'delete'){
        $id= $calendar->getIdFromDate($date);

        if($id == NULL){
            $_SESSION['calendarUploadError']='Error. No record of this date.';
            header('Location: trip-calendar.php',true, 301);
            die();
        }
        $calendar->deletecomment($id);
        header('Location: calendar.php',true, 301);
    }

}

?>