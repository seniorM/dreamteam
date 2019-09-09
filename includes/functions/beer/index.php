<?php

/**
 * опредиляет каким методом идет отправкка данных, и какой гет параметр
 * запускает нужную функцию
 */
function router()
{
    $action = 'index';
    if (isset($_GET['action'])) {
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
/**
 * проверяет существует ли авторизация, получает данные с формы
 * добавляет ее и редирект
 */
function post_add()
{
    $session_login = is_auth();
    if ($session_login) {
        $heading = $_POST['heading'];
        $text = $_POST['text'];
        add_post($heading, $text);
        redirect(url('all'));
    } else {
        $errors[] = "not auth";
    }
    set_errors($errors);
    redirect(url('all'));
}
/**
 * проверяет существует ли авторизация, получает индекс с формы
 * удаляет ее и редирект
 */
function post_delete()
{
    $session_login = is_auth();
    if ($session_login) {
        $id = $_POST['id'];
        delete_post($id);
    } else {
        $errors[] = "not auth";
    }
    set_errors($errors);
    redirect(url('all'));
}
/**
 * получает все посты, если введен логин возвращает массив с новостями этого логина
 */
function get_posts($login = false)
{
    $posts = array();
    if (file_exists(POSTS_DATA_FILE)) {
        $content = file_get_contents(POSTS_DATA_FILE);
        if ($content) {
            $novelty = json_decode($content, true);
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
        }
    }
    return $posts;
}
/**
 * сохраняет в файл
 */
function save_posts($posts)
{
    $content = json_encode($posts);
    $res = file_put_contents(POSTS_DATA_FILE, $content);
    return (bool)$res;
}
/**
 * получает данные с формы и добавляет их в массив
 */
function add_post($heading, $text)
{
    $posts = get_posts();
    $user = get_auth_user();
    $posts[] = array(
        'heading' => $heading,
        'text' => $text,
        'login' => $user,
        'date' => date("Y-m-d H:i:s"),
    );
    save_posts($posts);
}
/**
 * по полученому индексу
 * удаляет ее
 */
function delete_post($id)
{
    $posts = get_posts();
    unset($posts[$id]);
    save_posts($posts);
}

/**
 * @param $page выводит страницу
 * @param string $template
 */
function show($page, $template = DEFAULT_TEMPLATE)
{
    include_once 'includes' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $template;

}

/**
 * @return mixed получает адрес корня сервера
 */
function get_root_folder()
{
    return $_SERVER['DOCUMENT_ROOT'];
}

/**
 * выводит все новости пользователя
 */
function get_all()
{
    if (is_auth()) {
        show("all.php");
    } else {
        redirect(url("login"));
    }
}
/**
 * проверяет авторизац пользователя
 */
function is_auth()
{
    return isset($_SESSION['login']);
}
/**
 * прерывает сессию
 */
function get_exit(){
    session_destroy();
    redirect(url("login"));
}