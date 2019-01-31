<?php

session_start();

function login($login, $password)
{
    $user = getUser($login);
    if ($user && $user['password'] == $password) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

function addLinkToLogout() {
    if (!empty($_SESSION)) {
        echo "<div><a href='core/logout.php'>Выйти из сессии</a></div>";
    }
}

function getUser($login)
{
    if (file_exists(__DIR__ . "/../users/{$login}.json")) {
        $fileData = file_get_contents(__DIR__ . "/../users/{$login}.json");
        if ($fileData) {
            $userArray = json_decode($fileData, true);
            foreach ($userArray as $user) {
                return $user;
            }
        }
    }    
}

function error403() {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    echo "<h3>403 Incorrect user</h3>";
    echo '<h4>Wait 5 seconds to return to the main menu, or click <a href="index.php">here</a></h4>';
    echo '<h4>Подождите 5 секунд для того чтобы вернуться в главное меню, либо нажмите <a href="index.php">сюда</a></h4>';
    header('refresh:5; url=index.php');
    die;
}

function isAdmin() {
    if (array_key_exists('user', $_SESSION)) {
        if ($_SESSION['user']['name'] == 'admin') {
            return true;
        }
    }
    return false;
}

function checkUserSession() {
    if (array_key_exists('user', $_SESSION)) {
        echo 'Добро пожаловать, ' . $_SESSION['user']['name'];
        if (isAdmin()) {
            echo '<br>У Вас есть право добавлять или удалять тесты';
        }
    } elseif (array_key_exists('guest', $_SESSION)) {
        echo 'Добро пожаловать, ' . $_SESSION['guest'] . '. У Вас нет прав добавлять или удалять тесты';
    } else {
        error403();
    }
}

