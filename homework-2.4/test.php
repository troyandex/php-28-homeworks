<?php
require_once 'core.php';
$file_list = glob('tests/*.json');

$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
        $test = $decode_file;
    }
}

// Проверяем массив test, если пустой, то 404
if (empty($test)) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$question = $test[0]['question'];
$answers[] = $test[0]['answers'];


// Считаем кол-во правильных ответов
$result_true = 0;
foreach ($answers[0] as $item) {
    if ($item['result'] === true) {
        $result_true++;
    }
}

// Проверяем и считаем правильность введенных ответов
$post_true = 0;
$post_false = 0;
$test_success = 0;
if (!empty($_POST['form_answer'])) {
    foreach ($_POST['form_answer'] as $item) {
        if ($answers[0][$item]['result'] === true) {
            $post_true++;
        }else{
            $post_false++;
        }
    }
    // Сравниваем и выводим результат
    if ($post_true === $result_true && $post_false === 0) {
        $test_success++;
    }elseif ($post_true > 0 && $post_false > 0) {
        echo 'Почти угадали =)';
    }else{
        echo 'Вы ошиблись =(';
    }
}

// создаем сертификат
if (!empty($test_success))
{
    $name = userName();
    $img = imagecreatefromjpeg('img/certificate.jpg'); // 500*226
    $textColor = imagecolorallocate($img,60,80,100);

    $font_file = __DIR__ . '/fonts/OpenSans.ttf';
    if (!file_exists($font_file)) {
        echo 'Файл со шрифтом не найден!';
    }
    imagettftext($img, 12, 0, 90, 100, $textColor, $font_file, "О успешном прохождении теста");
    imagettftext($img, 12, 0, 90, 125, $textColor, $font_file, "Для пользователя: $name");
    imagettftext($img, 12, 0, 90, 150, $textColor, $font_file, 'Оценка: отлично');
    imagettftext($img, 12, 0, 90, 175, $textColor, $font_file, date("d.m.y"));

    //header('Content-Type: image/jpeg');
    $certificateName = 'img/' . $name . '_test' . $_GET['test'] . '_' . date("d_m_y") . '.jpg';
    // echo $certificateName;
    imagejpeg($img, $certificateName);
    imagedestroy($img);

}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тест: <?=$question?></title>
</head>
<body>

<form method="post">
    <fieldset>
        <legend><?=$question?></legend>
        <?php foreach ($answers[0] as $key => $item) : ?>
            <label><input type="checkbox" name="form_answer[]" value="<?=$key;?>"> <?=$item['answer'];?></label>
        <?php endforeach; ?>
    </fieldset>
    <input type="submit" value="Отправить">
</form>


<?php if (!empty($test_success)): ?>
    <img src="<?php echo $certificateName ?>" alt="Ваш сертификат">
<?php endif;?>


<ul>
    <li><a href="index.php">Главная</a></li>
    <li><a href="list.php">Список тестов</a></li>
    <?php if (isAuthorized()) : ?>
        <li><a href="admin.php">Загрузить тест</a></li>
    <?php endif; ?>
</ul>

</body>
</html>


