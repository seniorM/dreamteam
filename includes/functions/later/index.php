<?php

function get_login(){
    show('login.php');
}

function post_login() {
    global $errors;
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!$login && !$pass) {
        $errors[] = 'Отсутствуют данные';
    } else {
        $users = getUsers();
        if ($users) {
            foreach ($users as $user) {
                if ($login === $user['login'] || $pass === $user['pass']){
                    $_SESSION['login'] = $login;;
                    header('Location:index.php');
                }else {
                    $errors[]='Такой пользователь не зарегистрирован или неверно введены данные';
                }
            }
        }
    }
}