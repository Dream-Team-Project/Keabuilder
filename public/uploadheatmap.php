<?php
 header('Access-Control-Allow-Origin:  *');
 header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
 header('Access-Control-Allow-Methods: GET');
// upload directory
$filePath = 'videos_heatmaps/' . $_POST['video-filename'];

// path to ~/tmp directory
$tempName = $_FILES['video-blob']['tmp_name'];

// move file from ~/tmp to "uploads" directory
if (!move_uploaded_file($tempName, $filePath)) {
    // failure report
    echo 'Problem saving file: '.$tempName;
    die();
}

// success report
// echo $filePath.' '.$tempName;



?>