<?php

class News
{
    private $id;
    private $title;
    private $text;
    private $data;

    public function __construct($id, $title, $text, $data)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->data = $data;
    }
    public function getNewsId()
    {
        return $this->id;
    }
    public function getNews()
    {
        $html = '<h2> News #' . $this->id . ' - "' . $this->title . '"</h2>' . '<p>' . $this->text . '</p>' . '<h5> date: ' . $this->data . '</h5>';
        return $html;
    }
    public function getNewsTitle()
    {
        $html = $this->title;
        return $html;
    }
}
// создаем новости
$news = []; // массив обьектов новостей
$news[] = new News(1, 'Just news', 'Try to do HomeWorks early, but don\'t works', '8th January, 2019.');
$news[] = new News(2, 'Second news', 'I want to learn PHP', '8th January, 2019.');
$news[] = new News(3, 'Third  news', 'When is summer coming?', '8th January, 2019.');

$newsId = null; // временный id из GET
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        ul {font-weight: bold;}
        li {font-weight: normal;}
    </style>
    <title>HW 3.1 «Классы и объекты» (доп)</title>
</head>
<body>
<div>
    <!-- Выводим выбранную новость -->
    <?php 
        if (!empty($_GET['newsId'])) {
            $newsId = $_GET['newsId'];
            foreach ($news as $note) {
                if ($note->getNewsId() == $newsId) {
                    echo $note->getNews();
                }
            }
        } else {
            echo '<h3> Выберите новость ниже... </h3>';
        }
    ?>
    <hr>
    <!-- Выводим список заголовков новостей -->
    <ul>Список всех новостей (ссылки меняют $_GET):
        <?php foreach($news as $note) : ?>
        <li><a href="?newsId=<?=$note->getNewsId();?>"><?=$note->getNewsTitle();?></a></li> 
        <?php endforeach; ?>
    </ul>

    <a href="./index.php">Вернуться к основному заданию</a>
</div>
</body>
</html>
