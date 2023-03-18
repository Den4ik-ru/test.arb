<?php
/* структура
Классы
сад garden{
	Деревья(10 яблонь, 15 груш)
			f добавить дерево 	addTree
			f Собирать плоды со всех деревьев, добавленных в сад 	basket
			f Подсчитывать общее кол-во собранных плодов для каждого типа деревьев
			f *Необязательно к выполнению: система может посчитать общий вес собранных фруктов каждого вида 
}

Дерево tree{
	id Уникальный номер(i++)
	тип дерева view_fruit(груша, яблоня)
	массив фруктов fruit_mass (груша, яблоко)
	Урожайность harvest_n
		pear_harvest_n (0-20)
		apple_harvest_n (40-50)
			f собрать урожай с дерева (получить один фрукт) returnFruit
			f получить количество фруктов get_n_Fruit

}

fruit{
	тип view
	масса weight
		груши pear (150 - 180)
		яблока apple (130 - 170)
			f получить вес фрукта 	getWeight()
}

Система должна добавить деревья сад;
Произвести сбор продукции со всех деревьев;
Вывести на экран общее кол-во собранных фруктов каждого вида.
*/
$a1 = "apple";
$a2 = "pear";

class garden{
	private $tree_mass = [];
	private $basket = [];

	public function __construct()
	{
		$this->tree_mass = [];
		$this->basket = [];
	}

	public function addTree($view_fruit)
	{
		echo "создано дерево<br>";
		array_push($this->tree_mass, new tree($view_fruit)); 
		//print_r( $this->tree_mass);
	}

	public function addFruitInBasket()
	{
		echo "перемещение фруктов в карзину<br>";
		for ($i=0; $i < count($this->tree_mass); $i++) { 
			print_r($this->tree_mass[0]->getWeight);
			while (0 < $this->tree_mass[$i]->get_n_Fruit()) {
				array_push($this->basket, $this->tree_mass[$i]->returnFruit()); 
			}
		}
		//print_r($this->basket);

	}

	public function getInfoBasket(){	
		echo "подсчет собраных всех фруктов";
		for ($i=0; $i < count($this->basket); $i++) { 
			echo $this->basket[$i]->getWeight;
		}
		print_r($this->basket);
	}
}

$gardens = new garden();
$gardens->addTree('apple');

$gardens->addFruitInBasket();
$gardens->getInfoBasket();

class tree{
	private $id; //Уникальный номер
	private $view_fruit; //тип дерева
	private $harvest_n; //урожайность
	private $fruit_mass = []; //массив фруктов

	public function __construct($view_fruit)
    {
    	$this->id = 1; //																	костыль
    	$this->view_fruit = $view_fruit;
    	if ($view_fruit == 'pear') {
			$this->harvest_n = rand(0, 20);
	    }else{
	    	if($view_fruit == 'apple'){
				$this->harvest_n = rand(40, 50);
			}else{
				$this->harvest_n = 0;
			}
	    }
    	for ($i=0; $i < $this->harvest_n; $i++) { 
    		array_push($this->fruit_mass, new fruit($view_fruit)); 
    	}
    }

    public function get_n_Fruit() {
    	//echo "всего в корзине";
    	echo count($this->fruit_mass);
    	return count($this->fruit_mass);
    }


    public function returnFruit() {
    	//echo "получить один фрукт";
		if (count($this->fruit_mass) > 0) {
			$s = array_pop($this->fruit_mass);
			//print_r($s);
			return $s;
    	}else{
    		echo "весь урожай c дерева собран";
    	}
    }


    public function info() {
    	for ($i=0; $i < $this->harvest_n; $i++) { 
    		$this->fruit_mass[$i]->getWeight();
    	}
	}

}

//тест
/*
$tree_test = new tree('apple');
$tree_test->info();*/


class fruit{
	private $view; //тип
	private $weight; //масса

    public function __construct($view_fruit)
    {
	   	if ($view_fruit == 'pear') {
			$this->weight = rand(150, 180);
			$this->view = $view_fruit;
	    }else{
	    	if($view_fruit == 'apple'){
				$this->weight = rand(130, 170);
				$this->view = $view_fruit;
			}else{
				$this->weight = 0;
    			$this->view = "none";
			}
	    }
    }

    public function getWeight() {
    	echo $this->weight;  
    	echo '<br>';
    	return $this->weight;
    }


}
//тест
/*
$fruits1 = new fruit('apple');
$fruits2 = new fruit('pear');
$fruits1->getWeight();
$fruits2->getWeight();*/

?>