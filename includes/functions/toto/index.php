<?php

/**
 * формирует путь в нашей системе по действию
 * @param string $action
 * Название действия
 * @return string
 * путь в нашей системе
 */
function url($action) {
    return 'index.php?action=' . $action;
}

/**
 * Выполняет перенаправление на указанный адресс
 * @param string $url
 */
function redirect($url) {
    header('Location:' . $url);
}
