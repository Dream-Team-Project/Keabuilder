<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
header('Access-Control-Allow-Methods: GET');
function getFiles($path) {
    if (is_dir($path)) {
        $res = array();
        foreach (array_filter(glob($path ."*"), 'is_file') as $file) {

            array_push($res, str_replace($path, "", $file));                
        }
        // return $res;
        return $file;
    }
    return false;
}
echo json_encode(getFiles('videos_heatmaps/')); 
?>