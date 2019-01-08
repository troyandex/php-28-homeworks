<?php
require_once 'classes.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        ul {font-size: 1.5rem; font-weight: bold;}
        li {font-weight: normal;}
    </style>
    <title>HW 3.1 «Классы и объекты»</title>
</head>
<body>
<div>
    <ul> Теория:
        <li>1. Инкапсуляция - метод используемый в программировании (и не только) 
        позволяющий отделить/экранировать часть кода: визуально и логически, с целью систематизации 
        (легче понять, править и поддерживать) и защиты данных от ошибок и различных воздействий из вне.</li>

        <li>2. Плюсы и минусы обьектов (если правильно понял вопрос):
            <ul>
                <li>+ возможность инкапуслировать логику/методы, а также реализовать наследование.</li>
                <li>- разработка и систематизация на начальном этапе требует времени и опыта </li>
            </ul>
    </ul>

    <ul>Пример вывода:
        <li> <?php $carAudi->getCar();?></li>
        <li> <?php $tvLG->getTV();?></li>
        <li> <?php $penParker->getPen();?></li>
        <li> <?php $duckPekin->getDuck();?></li>
        <li> <?php $goodsApple->getGoods();?></li>
    </ul>

    <a href="news.php">Перейти к доп заданию (новости)</a>
</div>
</body>
</html>



