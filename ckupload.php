<?php

$file_name = $_FILES['upload']['name'];
$file_name_tmp = $_FILES['upload']['tmp_name'];
$file_new_name = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'upload';
$full_path = $file_new_name . DIRECTORY_SEPARATOR . $file_name;
$http_path = '/upload/' . $file_name;
$error = '';
header('Content-type: application/json; charset=utf-8'); 
if (move_uploaded_file($file_name_tmp, $full_path)) {
    echo '{
        "uploaded": true,
        "url": "'.$http_path.'"}';
} else {
    echo '{
        "uploaded": false,
        "error": {
            "message": "could not upload this image1"
        }';
}


