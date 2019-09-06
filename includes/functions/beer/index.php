<?php

function router()
{
    $action='index';
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    $method = $_SERVER['REQUEST_METHOD'];
    $action_func = $method . '_' . $action;

    if (function_exists($action_func)) {
        $action_func();
    } else {
        exit('404');//todo
    }
}

function post_add()
{
    //$session_login = is_auth();
    //if ($session_login) {
    $heading = $_POST['heading'];
    $text = $_POST['text'];
    add_post($heading, $text);
    header('Location:index.php?action=all');
    //} else {
    header('Location:index.php?action=all');
    //}
    show('views/pages/all.php');
}

function post_delete()
{
    $session_login = is_auth();
    if ($session_login) {
        $id = $_POST['id'];
        delete_post($id);
        header('Location:index.php?action=all');
    } else {
        header('Location:index.php?action=all');
    }
}

function get_posts($login = false)
{
    if (!file_exists(POSTS_DATA_FILE)) {
        return false;
    } else {
        $content = file_get_contents(POSTS_DATA_FILE);
        if (!$content) {
            return false;
        } else {
            $novelty = json_decode($content, true);
            $posts = array();
            if ($login) {
                $user = get_auth_user();
                foreach ($novelty as $key => $post) {
                    if ($post['login'] === $user) {
                        $posts[$key] = $post;
                    }
                }
            } else {
                $posts = $novelty;
            }
            return $posts;
        }
    }
}

function save_posts($posts)
{
    $content = json_encode($posts);
    $res = file_put_contents(POSTS_DATA_FILE, $content);
    return (bool)$res;
}

function add_post($heading, $text)
{
    $posts = get_posts();
    $user = get_auth_user();
    $posts[] = array(
        'heading' => $heading,
        'text' => $text,
        'login' => $user,
    );
    save_posts($posts);
}

function delete_post($id)
{
    $posts = get_posts();
    unset($posts[$id]);
    save_posts($posts);
}

function show($page, $template = DEFAULT_TEMPLATE)
{
    include_once 'includes'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$template;

}
function get_root_folder(){
    return $_SERVER['DOCUMENT_ROOT'];
}