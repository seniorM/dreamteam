<?php

function url($action) {
    return 'index.php?action=' . $action;
}

function get_index(){
    show('index.php');
}