<?php

function get_registration() {
    include_once 'views' . DIRECTORY_SEPARATOR .'pages'.DIRECTORY_SEPARATOR.'registration.php';
    
}

function get_request_user() {
    global $errors;
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass_conf = $_POST['pass_conf'];
    if (!$login && !$pass && !$pass_conf) {
        $errors[] = 'empty data';
    }
    if (strlen($login) < 6) {
        $errors[] = 'login must have more than 5 symbols';
    }
    if ($pass !== $pass_conf) {
        $errors[] = 'passwords do not match';
    }
    if (strlen($pass) < 6) {
        $errors[] = 'password must have more than 5 symbols';
    }
    if (count($errors) != 0) {
        return false;
    }
    $user = array(
        'login' => $login,
        'pass' => password_hash($pass, PASSWORD_DEFAULT),
    );
    return $user;
}

function user_exists($needed_user) {
    $users = getUsers();
    if ($users) {
        foreach ($users as $user) {
            if ($needed_user['login'] === $user['login']) {
                return true;
            }
        }
    }
    return false;
}

function get_users() {
    if (!file_exists(USERS_DATA_FILE)) {
        return false;
    } else {
        $content = file_get_contents(USERS_DATA_FILE);
        if (!$content) {
            return false;
        } else {
            $users = json_decode($content, true);
            return $users;
        }
    }
}

function save_users($users) {
    $content = json_encode($users);
    $res = file_put_contents(USERS_DATA_FILE, $content);
    return (bool) $res;
}

function add_user($user) {
    $users = getUsers();
    $users[] = $user;
    saveUsers($users);
}

function post_registration() {
    $errors = array();
    
    $user = get_request_user();

    if (user_exists($user)) {
        $errors[] = 'user already exists';
        var_dump($errors);
    } else {
        add_user($user);
        header('Location:login.php');
    }
}
