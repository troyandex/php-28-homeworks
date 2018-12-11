<!DOCTYPE html>
<html lang="ru">
<head>
    <title></title>
    <meta charset="UTF-8">
    <style>
        * {
            font: 16px sans-serif;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<?php
$directory = './';
$scandir = scandir($directory);

for ($i=0; $i<count($scandir); $i++)
{
    if ($scandir[$i] != '.' && $scandir[$i] != 'index.php' && $scandir[$i] != '..')
    {
        echo '<li><a href="'. $directory . $scandir[$i] . '">'. $scandir[$i] . '</a>';
    }
}
?>
</body>
</html>
