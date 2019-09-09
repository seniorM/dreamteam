<?php

/**
 * отображает форму регистрации
 */
function get_registration() {
    show('registration.php');
}

function post_registration() {
    $errors = array();
    $user = get_request_user();
    if (check_login($user['login'])) {
        $errors[] = 'user already exists';
        set_errors($errors);
	redirect(url('registration'));
    } else {
        add_user($user);
	redirect(url('login'));
    }
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
        set_errors($errors);
	redirect(url('registration'));
    }
    $user = array(
        'login' => $login,
        'pass' => password_hash($pass, PASSWORD_DEFAULT),
    );
    return $user;
}

function check_login($login) {
    $users = get_users();
    if (!empty($users)) {
        foreach ($users as $user) {
            if ($login === $user['login']) {
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
            return $users = [];
        } else {
            $users = json_decode($content, true);
            return $users;
        }
    }
}

function save_users($users) {
    $content = json_encode($users);
    if (!file_exists('data')) {
        mkdir('data');
    }
    $res = file_put_contents(USERS_DATA_FILE, $content);
    return (bool) $res;
}

function add_user($user) {
    $users = get_users();
    $users[] = $user;
    save_users($users);
}

function set_errors($errors) {
    $_SESSION['errors'] = $errors;
}

function get_errors() {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    return $errors;
}

function get_index(){
    if(!is_auth()){
	redirect(url('login'));
    }
    show('index.php');
}
