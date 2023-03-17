<?php
/* структура
Классы
сад{
	Деревья(10 яблонь, 15 груш)
			f добавить дерево
			f Собирать плоды со всех деревьев, добавленных в сад
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

    
    
    public function info() {
    	for ($i=0; $i < $this->harvest_n; $i++) { 
    		$this->fruit_mass[$i]->getWeight();
    	}
	}

}

$tree_test = new tree('apple');
$tree_test->info();


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

$fruits1 = new fruit('apple');
$fruits2 = new fruit('pear');
$fruits1->getWeight();
$fruits2->getWeight();

?>