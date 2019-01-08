<?php

// Машина
class Car
{
    public $mark;
    public $model;
    public $color;

    public function __construct($mark, $model, $color)
    {
        $this->mark = $mark;
        $this->model = $model;
        $this->color = $color;
    }
    public function getCar()
    {
        echo $this->mark . ' / ' . $this->model . ' / ' . $this->color;
    }
}

$carAudi = new Car('Audi', 'R8', 'red');
$carBMV = new Car('BMV', 'X5', 'black');

// Телевизор
class TV
{
    public $mark;
    public $resolution;
    public $color;

    public function __construct($mark, $resolution, $color)
    {
        $this->mark = $mark;
        $this->resolution = $resolution;
        $this->color = $color;
    }
    public function getTV()
    {
        echo $this->mark . ' / ' . $this->resolution . ' / ' . $this->color;
    }
}
$tvLG = new TV('LG', '4K', 'black');
$tvSony = new TV('Sony', 'FULL HD', 'white');

// Шариковая ручка
class BallpointPen
{
    public $mark;
    public $collection;
    public $color;

    public function __construct($mark, $collection, $color)
    {
        $this->mark = $mark;
        $this->collection = $collection;
        $this->color = $color;
    }
    public function getPen()
    {
        echo $this->mark . ' / ' . $this->collection . ' / ' . $this->color;
    }
}
$penParker = new BallpointPen('Parker', 'Jotter', 'blue');
$penPero = new BallpointPen('Pero', 'Caran', 'red');

// Утка
class Duck
{
    public $breed;
    public $dwelling;

    public function __construct($breed, $dwelling)
    {
        $this->breed = $breed;
        $this->dwelling = $dwelling;
    }
    public function getDuck()
    {
        echo $this->breed . ' / ' . $this->dwelling;
    }
}
$duckPekin = new Duck ('Пекинская утка', 'Китай');
$duckRussia = new Duck ('Русская утка', 'Россия');

// Товар
class Goods
{
    public $name;
    public $category;
    public $price;

    public function __construct($name, $category, $price)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }
    public function getGoods()
    {
        echo $this->name . ' / ' . $this->category . ' / ' . $this->price;
    }
}
$goodsApple = new Goods('iPhone', 'Телефон', 60001);
$goodsSamsung = new Goods('Samsung', 'Телефон', 59999);