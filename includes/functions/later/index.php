<?php

function get_login(){
    show('login.php');
}

function existUser() {
    global $errors;
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!$login && !$pass) {
        $errors[] = 'empty data';
    } else {
        $users = getUsers();
        if ($users) {
            foreach ($users as $user) {
                if ($login === $user['login'] || $pass === $user['pass'])
                    return $login;
            }
        }
        return false;
    }
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
