<?php
$json = file_get_contents(__DIR__ . '/phone-book.json');
$data = json_decode($json, true);
$item = "";
//echo "<pre>";
//print_r($json);
//print_r($data);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Домашнее задание к лекции 2.1 «Установка и настройка веб-сервера»</title>
    <meta charset="UTF-8">
    <style>
        .container { max-width: 950px; margin: 0 auto; }
        h1 { font-weight: bold;}
        table { border-collapse: collapse; }
        td , th { padding: 5px; border: 1px solid black; }

    </style>
</head>

<body>
<div>
    <div class="container">
        <h1>Телефонная книга</h1>
            <table>
                <caption></caption>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['firstName']; ?></td>
                        <td><?php echo $item['lastName']; ?></td>
                        <td><?php echo $item['address']; ?></td>
                        <td><?php echo $item['phoneNumber']; ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
    </div>
</div>
</body>
</html>