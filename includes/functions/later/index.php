<?php

function get_login() {
    show('login.php');
}

function post_login() {
    global $errors;
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!$login && !$pass) {
        $errors[] = 'No data';
    } else {
        $users = get_users();
        if ($users) {
            foreach ($users as $user) {
                if ($login === $user['login'] || $pass === $user['pass']) {
                    $_SESSION['login'] = $login;
                    header('Location:index.php');
                } else {
                    $errors[] = 'User is not registered or data is entered incorrectly';
                    header('Location:login.php');
                }
            }
        }
    }
}

function get_auth_user() {
    $user_login = $_SESSION['login'];
    if (empty($user_session)) {
        $errors[] = 'No user';
    } else {
        return $user_login;
    }
}
