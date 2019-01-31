<?php
require_once __DIR__ . '/core/functions.php';
addLinkToLogout();
checkUserSession();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список тестов</title>
</head>
<body>
<p>Список доступных тестов:</p>
<div style="float: left">

<?php
    $files = scandir(__DIR__ . '/tests/');
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $testName = substr($file, 0, -5);
            $link = "<strong><a href=\"test.php?test={$testName}\">{$testName}</a></strong>";
            echo $link;
            if (isAdmin()) {
                echo "  (<a href=\"list.php?del={$file}\">удалить</a>)";
                if (array_key_exists('del',$_GET)) {
                    unlink(__DIR__ . "/tests/{$_GET['del']}");
                    header('Location: list.php');
                }
            }
            echo '<br>';
        }
    }
?>
</div>

<div style="clear: both">
<?php if (isAdmin()) : ?>
    <p><br><a href="admin.php">Перейти к загрузке тестов</a><br></p>
<?php endif; ?>
</body>
</html>