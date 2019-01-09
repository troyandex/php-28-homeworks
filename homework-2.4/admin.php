<?php
require_once 'core.php';
if (!isAuthorized())
{
    header('HTTP/1.1 403 incorrect user');
    echo "<h1>403 Incorrect user</h1>";
    echo '<h2>Wait 5 seconds to return to the main menu, or click <a href="index.php">here</a></h2>';
    echo '<h2>Подождите 5 секунд для того чтобы вернуться в главное меню, либо нажмите <a href="index.php">сюда</a></h2>';
    header('refresh:5; url=index.php');
    die;
}


if (isset($_POST) && isset($_FILES) && isset($_FILES['testfile'])) {
    $file_name = $_FILES['testfile']['name'];
    $tmp_file = $_FILES['testfile']['tmp_name'];
    $uploads_dir = 'server/';
    $path_info = pathinfo($uploads_dir . $file_name);
    if ($path_info['extension'] === 'json') {
        move_uploaded_file($tmp_file, $uploads_dir . $file_name);
        //echo 'Спасибо, Ваш тест загружен!';
        header('Location: ' . 'list.php');
    }else{
        echo 'Извините, нужен файл с расширением JSON';
    }
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузить тест</title>
</head>
<body>
<h1>Добро пожаловать, <?= getLoggedUserData()['name']; ?></h1>

    <h3>Загрузка теста</h3>
    <form method="post" enctype=multipart/form-data>
        <input type=file name=testfile>
        <input type=submit value=Загрузить>
    </form>


    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="admin.php">Загрузить тест</a></li>
        <li><a href="list.php">Список тестов</a></li>
        <li><a href="logout.php">Выход</a></li>
    </ul>
</body>
</html>
