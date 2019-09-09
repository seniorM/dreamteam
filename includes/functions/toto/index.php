<?php

function url($action) {
    return 'index.php?action=' . $action;
}

function redirect($url){
    header('Location:' . $url);
}

