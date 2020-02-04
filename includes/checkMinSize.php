<?php
echo 'PHP Fired';
$file = $_POST['file'];
$imagesize = getimagesize($file['tmp_name']);
$minimum = array('width' => '800', 'height' => '400');
$width = $imagesize[0];
$height = $imagesize[1];



if(($width < $minimum['width']) || ($height < $minimum['height'])){
    $SESSION['imageUploadError'] = 'Please ensure that your image is at least 800 x 400 pixels';
}