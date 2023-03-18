<?php
/* структура
Классы
сад garden{
	Деревья(10 яблонь, 15 груш)
			f добавить дерево 	addTree
			f Собирать плоды со всех деревьев, добавленных в сад 	basket
			f Подсчитывать общее кол-во собранных плодов для каждого типа деревьев getInfoBasket
			f *Необязательно к выполнению: система может посчитать общий вес собранных фруктов каждого вида getInfoBasket
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
	$gardens = new garden();
	$gardens->addTree('apple');
	$gardens->addTree('pear');

Произвести сбор продукции со всех деревьев;
	$gardens = new garden();
	$gardens->addTree('apple');
	$gardens->addTree('pear');
	$gardens->addFruitInBasket(); //(перемещаем фрукты с дерева в "корзину")

Вывести на экран общее кол-во собранных фруктов каждого вида.
	$gardens = new garden();
	$gardens->addTree('apple');
	$gardens->addTree('pear');
	$gardens->addFruitInBasket();
	$gardens->getInfoBasket();

*/


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
	}

	public function addFruitInBasket()
	{
		echo "перемещение фруктов в карзину<br>";
		for ($i=0; $i < count($this->tree_mass); $i++) { 
			//print_r($this->tree_mass[0]->getWeight);
			while (0 < $this->tree_mass[$i]->get_n_Fruit()) {
				array_push($this->basket, $this->tree_mass[$i]->returnFruit()); 
			}
		}
	}

	public function getInfoBasket(){	
		echo "подсчет собраных всех фруктов";
		$massaInFrytsBasket = [];

		print_r($massaInFrytsBasket);
		for ($i=0; $i < count($this->basket); $i++) { 
			if ($this->basket[$i]->getView() == 'pear') {
				$massaInFrytsBasket['pear']['n'] += 1;
				$massaInFrytsBasket['pear']['mass'] += $this->basket[$i]->getWeight();
		    }else{
		    	if($this->basket[$i]->getView() == 'apple'){
					$massaInFrytsBasket['apple']['n'] += 1;
					$massaInFrytsBasket['apple']['mass'] += $this->basket[$i]->getWeight();
				}else{
					$this->harvest_n = 0;
				}
		    }
		}
		echo "Всего собрано ".$massaInFrytsBasket['pear']['n']+$massaInFrytsBasket['apple']['n']." фруктов <br>";
		echo "собрано грушь ".$massaInFrytsBasket['pear']['n']." шт. ".($massaInFrytsBasket['pear']['mass']/1000)." кг <br>";
		echo "собрано яблок ".$massaInFrytsBasket['apple']['n']." шт. ".($massaInFrytsBasket['apple']['mass']/1000)." кг <br>";
	}
}

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

    public function get_n_Fruit() {//echo "всего в корзине";
    	return count($this->fruit_mass);
    }

    public function returnFruit() {	//echo "получить один фрукт";
		if (count($this->fruit_mass) > 0) {
			$s = array_pop($this->fruit_mass);
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
    	/*echo $this->weight;  
    	echo '<br>';*/
    	return $this->weight;
    }

    public function getView() {
    	// echo $this->view;  
    	// echo '<br>';
    	return $this->view;
    }


}
$gardens = new garden();
$gardens->addTree('apple');
$gardens->addTree('pear');
$gardens->addFruitInBasket();
$gardens->getInfoBasket();

?>