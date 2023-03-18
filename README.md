# test.arb/* структура

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
			f собрать урожай с дерева (получить один фрукт) returnFruit()
			f получить количество фруктов get_n_Fruit()
			f изменить id дерева setId
}

fruit{
	тип view
	масса weight
		груши pear (150 - 180)
		яблока apple (130 - 170)
			f получить вес фрукта 	getWeight()
			f получить тип фрукта 	getView()
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
