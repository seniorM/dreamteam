<?php

function get_registration() {
    include_once 'views' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'main.php';
}

function getRequestUser() {
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

function userExists($needed_user) {
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

function getUsers() {
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

function saveUsers($users) {
    $content = json_encode($users);
    $res = file_put_contents(USERS_DATA_FILE, $content);
    return (bool) $res;
}

function addUser($user) {
    $users = getUsers();
    $users[] = $user;
    saveUsers($users);
}

function post_registration() {
    $errors = array();
    
    $user = getRequestUser();

    if (userExists($user)) {
        $errors[] = 'user already exists';
        var_dump($errors);
    } else {
        addUser($user);
        header('Location:login.php');
    }
}
