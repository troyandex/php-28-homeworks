<?php
    // main task
    $firstName = 'Константин';
    $yearOfBirth = 1990;
    $currentYear = 2018;
    $age = $currentYear - $yearOfBirth;
    $email = 'troyandex@gmail.com';
    $city = 'Ижевск';
    $about = 'краткий текст о себе';
    // additional task
    $x = $_GET['x'];
    $a = 1;
    $b = 1;
    $answer = '*';
    $reserve = '*';
    
    if ( $x != NULL) {
        do {
            if ( $a > $x ) {
                $answer = 'НЕ входит';
                break;
            } elseif ( $a == $x ) {
                $answer = 'входит';
                break;
            } else {
                $reserve = $a;
                $a += $b;
                $b = $reserve;
            }
        } while ( $answer == NULL );
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.1 «Введение в PHP»</title>
</head>
<body>
    <h1>Страница пользователя - <?php echo $firstName ?></h1>
    <dl>
        <dt><strong>Имя</strong></dt>
        <dl><?php echo $firstName ?></dl>
        <dt><strong>Возраст</strong></dt>
        <dl><?php echo $age ?></dl>
        <dt><strong>Адрес электронной почты</strong></dt>
        <dl><?php echo $email ?></dl>
        <dt><strong>Город</strong></dt>
        <dl><?php echo $city ?></dl>
        <dt><strong>О себе</strong></dt>
        <dl><?php echo $about ?></dl>
    </dl>

    <hr>
    <h2>Дополнительное задание к лекции 1.1 «Введение в PHP»</h1>
    <form action="" method="get">
        Введите число:
        <input type="number" name="x">        
    </form>

    <p>Число <?php echo $x . ' ' .  $answer  ?> в числовой ряд Фибоначи</p>
    x = <?php echo $x  ?>
    a = <?php echo $a  ?>
    b = <?php echo $b  ?>
    r = <?php echo $reserve  ?>
    ans = <?php echo $answer  ?>

</body>
</html>