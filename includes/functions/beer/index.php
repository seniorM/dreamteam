<?php

function rotuer(){
    $get = $_GET['action'];
    $post = $_POST['action'];
    if($get == 'login'){
        get_login();
    } elseif ($post == 'login'){
        post_login();
    } elseif ($get == 'registration'){
        get_registration();
    }
}

function post_add(){

}

function post_delete($id){
    global $login;
    $session_login = check_login($login);
    $posts = get_posts();
    unset($posts[$id]);
}