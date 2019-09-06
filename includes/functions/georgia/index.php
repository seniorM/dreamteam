<?php
session_start();
//получение данных имени если есть
if (isset($_POST['name'])){
    $name = $_POST['name'];
if (empty($name)) {
    $res = 'Отсутсвие данные';
} else if (iconv_strlen($name) < 4) {
    $res = 'Введенно меньше 4 символов';
} else {
    $_SESSION['name']=$name;
}
if (!empty($res)){
    echo $res;
    exit();
}
}
if(empty($_SESSION['name'])){
    header('Location:index.php');
} 



