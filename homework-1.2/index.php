<?php
    // Исходный массив
    $continents = [
	    'Africa' => ['Giraffa camelopardalis rothschildi', 'Loxodonta'],
	    'Antarctica' => ['Aptenodytes forsteri'],
	    'Australia' => ['Macropus'],
	    'Eurasia' => ['Pteromys volans', 'Bison bonasus', 'Apodemus agrarius'],
	    'North America' => ['Mammuthus columbi', 'Bison bison'],
	    'South America' => ['Eunectes murinus']
    ];
    // 1-----------------------------------------------------------------------
    echo '<h1>Пример выполнения задания "Жестокое обращение с животными"</h1>';
	echo '<h2>1. Исходный массив:</h2>';
	echo "<details><pre>";
	print_r ($continents); //  выводит первоначальный масив 
	foreach ($continents as $continents_key => $animals)
	{
	    $continent[] = $continents_key;
	    echo "<h3>$continents_key</h3>";
	    echo implode(", ", $animals); // заменил цикл на implode
	    foreach ($animals as $two) // подготовка для двойных названий
	    {
	        $two_words = explode(" ", $two);
	        if (count($two_words) == 2) 
	        {
	            $double_name[] = $two;
	            $first_world[] = $two_words[0];
	            $second_word[] = $two_words[1];
	        }
	    }
    }
    echo "</pre></details>";
    // 2-----------------------------------------------------------------------
    echo '<hr>';
	echo '<h2>2. Названия, состоящие из двух слов:</h2>';
	foreach ($double_name as $item) 
	{
	    echo "$item<br>";
	}
	echo '<hr>';
    shuffle($second_word);
    
    // 3-----------------------------------------------------------------------
	echo '<h2>3. "Фантазийные" названия:</h2>';
	foreach ($second_word as $last)
	{
	    $title = array_shift($continent);
	    $first = array_shift($first_world);
	    echo "<h3>$title</h3>";
	    echo $first . ' ' . $last . '<br>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Домашнее задание к лекции 1.3 «Строки, массивы и объекты»</title>
  <style>
  	* { padding: 0; margin: 0; }
  	h2 { text-decoration:underline; margin: 1em 0 0 0; }
  	body { padding-left: 1em; height: 913px; }
  	hr { margin-top: 1em; }
  </style>
</head>
<body>	
    
</body>
</html>