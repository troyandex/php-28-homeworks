<?php
include_once 'db_enter.php';
//echo '<pre>';
//var_dump($_GET);
//var_dump($_POST);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Tables</title>
</head>
<p>

<h1>Добро пожаловать в конструктор таблиц MySQL</h1>
<?php
if (empty($_GET)) :?>
    <p>
    <form action="index.php" method="get">
        Я хочу создать таблицу
        <input type="text" name="name" placeholder="название таблицы"> на
        <input type="text" name="cols" placeholder="количество ячеек"> ячеек
        <input type="submit" value="Создать">
    </form></p>
<?php elseif (empty($_POST)) :
    $cols = (int)$_GET['cols'];
    $name = (string)strip_tags($_GET['name']); ?>
    <p>Введите названия столбцов (начиная со второго*) для таблицы <b><?= $name ?></b> и их парметры<br>
        *Первый столбец устанавливается по-умолчанию и называется `id`</p>
    <form action="index.php?cols=<?= $cols ?>&name=<?= $name ?>" class="create-rows" method="post">
        <table>
            <?php
            for ($i = 0; $i < $cols; $i++) {
                echo '<tr><td><input type="text" placeholder="название столбца" name="col' . $i . '"></td> ';
                echo '<td><select name="param' . $i . '">';
                echo '<option value="int (11)">int (11)</option>';
                echo '<option value="varchar (100)">varchar (100)</option>';
                echo '</select></td></tr>';
            }
            ?>
        </table>
        <br>
        <input type="submit" value="Создать таблицу '<?= $name ?>' на <?= $cols ?> столбцов">
    </form>
    <p><a href="index.php">Отменить создание таблицы</a></p>
<?php endif; ?>
<p>Существующие таблицы:<br>
    <a class="small" href="index.php">обновить</a></p>
<?php
if (!array_key_exists('tablename', $_GET)) {
    $sql = "Show TABLES";
    $showTable = $db->prepare($sql);
    $showTable->execute();
    $tables = $showTable->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tables as $table) {
        $tableName = "Tables_in_" . DB_NAME;
        echo "<a href=\"tables.php?tablename={$table[$tableName]}\">" . $table[$tableName] . "</a><br>";
    }
}
?>

</body>
</html>