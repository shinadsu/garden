<?php


class Apple
{
    public $type = 'apple'; // тип 
    public $weight = ''; //вес яблока

    public function __construct($weight)
    {
        $this->weight = $weight;
    }
}

class Pear
{
    public $type = 'pear'; // тип 
    public $weight = ''; // вес груши



    public function __construct($weight)
    {
        $this->weight = $weight;
    }
}

// класс для контейниризации яблок и груш 
class FruitContainer
{

    public $applecontainer = [];
    public $pearcontainer = [];

    public function __construct($applecontainer, $pearcontainer)
    {
        $this->applecontainer = $applecontainer;
        $this->pearcontainer = $pearcontainer;
    }
}

class FruitCollector
{
    // количество деревьев в саду 
    protected $appleTreesCount = 10;
    protected $pearTreesCount = 15;

    // минимальный и максимальный вес для яблока
    protected $minAppleWeight = 150;
    protected $maxAppleWeight = 180;

    // минимальный и максимальный вес для груши
    protected $minPearWeight = 130;
    protected $maxPearWeight = 170;

    protected $number;

    // минимальный и максимальный сбор с одной яблни
    protected $minfruitsforapples = 40;
    protected $maxfruitsforapples = 50;

    // минимальный и максимальный сбор с одной яблни
    protected $minfruitsforpears = 0;
    protected $maxfruitsforpears = 20;


    // сбор всех фруктов и распределение их по контейнерам 
    public function collectFruits()
    {
        $apple = $this->collectApples();
        $pears = $this->collectPears();
        return new FruitContainer($apple, $pears);
    }


    // собираем урожай с яблок
    public function collectApples()
    {
        $apples = array();
        for ($i = 0; $i < $this->appleTreesCount; $i++) {
            $fruitCount = rand($this->minfruitsforapples, $this->maxfruitsforapples);
            for ($j = 1; $j <= $fruitCount; $j++) {
                $appleWeight = rand($this->minAppleWeight, $this->maxAppleWeight);
                $apples[] = new Apple($appleWeight);
            }
        }
        return $apples;
    }



    // собираем урожай с груш
    public function collectPears()
    {
        $pears = array();
        for ($i = 0; $i <= $this->pearTreesCount; $i++) {
            $fruitCount = rand($this->minfruitsforapples, $this->maxfruitsforapples);
            for ($j = 1; $j <= $fruitCount; $j++) {
                $pearWeight = rand($this->minPearWeight, $this->maxPearWeight);
                $pears[] = new Pear($pearWeight);
            }
        }
        return $pears;
    }


    public function getCountFruitsApple()
    {
        // немного неправильно, что реализовал через echo
        $fruits = new FruitCollector;
        $fruit = $fruits->collectFruits()->applecontainer;
        echo count($fruit);
    }

    public function getCountFruitsPear()
    {
        // немного неправильно, что реализовал через echo
        $fruits = new FruitCollector;
        $fruit = $fruits->collectFruits()->pearcontainer;
        echo count($fruit);
    }

    // метод добавления дерева
    public function addtree($number)
    {
        $count = $this->appleTreesCount += $number;
        return $count;
        
    }
}


$fruit = new FruitCollector();
$fruits = $fruit->collectFruits(); // переменная нужна для исползования ее в цикле 
// $fruit->getCountFruitsApple(); // выводит общее количесто собраных яблок с урожая, можно раскоментировать
// $fruit->getCountFruitsPear(); // выводит общее количество груш с урожая, можно раскоментировать
// $fruit->addtree(); // добавляет дерево, можно раскоментировать, в теле нужно написать число типа Int


for ($i = 0; $i < count($fruits->applecontainer); $i++) 
{
    $applearr = [
        "индетификационный номер яблока" => $i,
        "тип урожая" => $fruits->applecontainer[$i]->type,
        "вес" => $fruits->applecontainer[$i]->weight
    ];
   // раскоментируйте с 149-151 чтобы увидеть список груш

    // echo '<br>';
    // print_r($applearr); // 161-163 выводит масивы с id грушы, его тип и его вес
    // echo '</br>';
}


for ($i = 0; $i < count($fruits->pearcontainer); $i++) 
{
    $peararr = [
        "индетификационный номер груши" => $i,
        "тип урожая" => $fruits->pearcontainer[$i]->type,
        "вес" => $fruits->pearcontainer[$i]->weight
    ];
    /*
    раскоментируйте с 165-167 чтобы увидеть список груш

    echo '<br>';
    print_r($peararr); 
    echo '</br>';

    */
}
