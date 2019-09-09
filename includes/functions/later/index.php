<?php

/**
 * отображение формы авторизации
 */
function get_login() {
    if (is_auth()) {
	redirect(url('index'));
    }
    show('login.php');
}

/**
 * обработка формы входа
 */
function post_login() {
    $errors = array();
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!$login && !$pass) {
	$errors[] = 'No data';
    } else {
	if (check_user($login, $pass)) {
	    $_SESSION['login'] = $login;
	    redirect(url('index'));
	} else {
	    $errors[] = 'неверный логин или пароль';
	}
    }
    if (count($errors) > 0) {
	set_errors($errors);
	redirect(url('login'));
    }
}

/**
 * проверяет наличие пары логин пароль
 * @param string $login
 * @param string $pass
 * @return boolean
 */
function check_user($login, $pass) {
    $users = get_users();
    foreach ($users as $user) {
	if ($login === $user['login']) {
	    if (password_verify($pass, $user['pass'])) {
		return true;
	    }
	}
    }
    return false;
}

/**
 * возвращает логин авторизованного пользователя
 * @return string
 */
function get_auth_user() {
    if (is_auth()) {
	return $_SESSION['login'];
    } else {
	redirect(url('login'));
    }
}
