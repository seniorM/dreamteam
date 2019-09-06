<?php

function get_registration() {
    show('registration.php');
}

function post_registration() {
    $errors = array();

    $user = get_request_user();

    if (check_login($user)) {
	$errors[] = 'user already exists';
	var_dump($errors);
    } else {
	add_user($user);
	header('Location:login.php');
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
	return false;
    }
    $user = array(
	'login' => $login,
	'pass' => password_hash($pass, PASSWORD_DEFAULT),
    );
    return $user;
}

function check_login($login) {
    $users = get_users();
    if ($users) {
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
    $res = file_put_contents(USERS_DATA_FILE, $content);
    return (bool) $res;
}

function add_user($user) {
    $users = get_users();
    $users[] = $user;
    save_users($users);
}


function set_errors($errors){
    
}