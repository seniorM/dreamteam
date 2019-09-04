<?php

function get_registration() {
    include_once 'templates' . DIRECTORY_SEPARATOR . 'main.php';
}

function getLogPass() {
    if (!file_exists(USERS_LOG_PASS)) {
	return false;
    } else {
	$content = file_get_contents(USERS_LOG_PASS);
	if (!$content) {
	    return false;
	} else {
	    $users = json_decode($content, true);
	    return $users;
	}
    }
}

function saveLogPass($users) {
    $content = json_encode($users);
    $res = file_put_contents(USERS_LOG_PASS, $content);
    return (bool) $res;
}

function post_registration($login, $password) {
    if (!isset($_POST['login']) && !isset($_POST['password'])) {
	$message = 'отсутствуют входящие данные';
    } else {
	$login = $_POST['login'];
	$password = $_POST['password'];
	if (empty($login) && empty($password)) {
	    $message = 'отсутствуют логин и пароль!';
	} else if (empty($login) && (!empty($password))) {
	    $message = 'отсутствует логин!';
	} else if ((!empty($login)) && empty($password)) {
	    $message = 'отсутствует пароль!';
	} else {
	    $users = getLogPass();
	    $users[] = array(array('login' => $login, 'password' => $password),);
	    saveLogPass($users);
	    header('Location:login.php');
	    
	}
    }
}
