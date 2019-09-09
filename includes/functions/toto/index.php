<?php

function url($action) {
    return 'index.php?action=' . $action;
}

function redirect($url){
    header('Location:' . $url);
}

function get_index(){
    if(!is_auth()){
	redirect(url('login'));
    }
    show('index.php');
}