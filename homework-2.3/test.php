<?php
$file_list = glob('server/*.json');
$test = [];
if (!isset(glob('server/*.json')[$_GET['test']])) { // если нет теста - 404
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo "<h2>404 Not Found</h2>";
    echo "<h2>error - wrong test number</h2>";
    exit;
}

foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {  // в параметре гет номер теста который декодим
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
        $test = $decode_file;
    }
}
$questions = $test['questions']; // масив из вопросов с ответами выбраного (по гет) теста
$title = $test['title'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Тест: <?=$test['title']?></title>
    <meta charset="UTF-8">
    <style>
        .container { max-width: 950px; margin: 0 auto; }
        h1 {margin-bottom: 0.2em;}
        li {margin: 3px 0;}
        .button {margin: 15px;}
        .answer:hover {text-decoration: underline;}
        img {margin 5px auto}
    </style>
</head>

<body>
<div class="container">
    <h2>Меню:</h2>
    <ul>
        <li><a href="admin.php">Форма загрузки тестов</a></li>
        <li><a href="list.php">Список тестов</a></li>
    </ul>

    <h2>Тест: <?=$test['title']?></h2>
    <form method="post">
        <fieldset>
            <p>Введите ваше имя: <input type="text" name="name"></p>
            <?php
//            echo "<br><pre>";
//            print_r($_POST);
//            echo "<br></pre>";

            // кол-во ответов:
            $post_true = 0; // верно пользователь
            $post_false = 0; // ошибочно пользователь
            $result_true = 0; // должно быть верных

            foreach ($questions as $key1 => $number) : // для каждого вопроса по порядку
                $question = $number['question']; // массив с вопросами
                $answers[] = $number['answers']; // массив с ответами
                ?>
                <h4>Вопрос: <?=$question;?></h4>
                <?php
                foreach ($answers[$key1] as $key2 => $item) :
                    if ($item['result'] === true) {
                        $result_true++; // плюсуем количество верных ответов
                    };

                    if (count($_POST) > 0) { // если есть пост - проверяем
                        $answers_key = "$key1-$key2"; // ключ текущего ответа для сверки
                        $name = $_POST['name'];
                        if (isset($_POST[$answers_key])) { // если есть пост с таким же как вопрос индексом
                            global $selected;
                            $selected = "checked";
                            if ($item['result'] === true) { // и он верный
                                $post_true++; // плюсуем верно
                            } else {
                                $post_false++; // иначе плюсуем ошибку
                            }
                        } else {
                            $selected = "";
                        }
                    } else {
                        $selected = "";
                    };
                    ?>
                    <label class="answer">
                        <input type="checkbox" name="<?php echo $key1."-".$key2;?>" value="<?php echo $key1."-".$key2;?>" <?=$selected?>>
                        <?=$item['answer'];?>
                    </label>
                <?php
                endforeach; // конец обработки вопроса
                ?>

            <?php
            endforeach;

            // если есть ответы - выводим результат
            if (count($_POST) > 0) {
                if ($post_true === $result_true && $post_false === 0) {
                    echo '<h4>Результат: Правильно!</h4>';
                    $result = "Тест пройден";

                }elseif ($post_true > 0) {
                    echo '<h4>Результат: Почти угадали (попробуйте еще)</h4>';
                    $result = "Тест почти пройден";
                }else{
                    echo '<h4>Результат: Совсем не то</h4>';
                    $result = "Тест не пройден";
                }
                // через 5 секунды редирект на сертификат
                echo "Благодарим за уделенное время. <br> Сертификат по итогам теста: <br>";
                echo "<img src=\"certificate.php?name=$name&title=$title&result=$result\" alt=\"Сертификат\">";
            }
            ?>
        </fieldset>
        <input class="button" type="submit" value="Отправить">
    </form>

</div>
</body>
