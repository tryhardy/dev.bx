<?php
/*Задача
Последовательность состоит из натуральных чисел и завершается командой stop.
Всего вводится не более 20 чисел.
Определите, сколько элементов этой последовательности равны ее наибольшему элементу.

***Формат входных данных***
Вводится последовательность целых чисел, оканчивающаяся командой stop

***Формат выходных данных***
Выведите ответ на задачу (одно число).

***Тесты***
Как минимум 2 разных теста.

Ввод - 1 2 4 6 6 2 3 4 5 6 1 2 3 4 5 1 4 5 6 2 2
Вывод - Вы ввели более 20 чисел

Ввод -
Вывод - Вы ничего не ввели

Ввод - 1 2 Оввао
Вывод - Введенное значение не является числом

Ввод - 1 2 4 6 6
Вывод - 2

Ввод - 1 2 3 1
Вывод - 1
 */

class firstQuest implements  ITests
{
	public function getInstructions(){
		echo "Вводите цифры через пробел. Завершите ввод командой stop" . PHP_EOL . PHP_EOL;
	}

	public function readNumbers($console, $args = "")
	{
		if($args) {
			$args = explode( " ", $args);
		} else {
			$args = $this->readFromConsole($console);
		}

		$args = array_diff($args, array(''));

		if(is_array($args) && count($args) > 20) {
			return "Вы ввели более 20 чисел";
		} elseif(count($args) == 0) {
			return "Вы ничего не ввели";
		}

		$tmpValue = "";
		$counter = 1;
		foreach($args as $key => $arg) {

			if(!is_numeric($arg)) {
				return "Введенное значение не является числом";
			}

			if($tmpValue && $tmpValue <= $arg){
				if($tmpValue == $arg) {
					$counter += 1;
				}
				$tmpValue = $arg;
			} elseif(!$tmpValue) {
				$tmpValue = $arg;
			}
		}

		return (string)$counter;
	}

	private function readFromConsole($console)
	{
		$this->getInstructions();
		$array = [];
		$value = "";
		while($value != "stop"){
			echo $console;
			$value =  trim(fgets(STDIN));

			if($value !== "stop") {
				$array[] = $value;
			}
		}
		return $array;
	}

	private function readFromArgs()
	{

	}


	public function runTest($arg1, $arg2, $expectedResult, $message = "")
	{
		$result = $this->readNumbers($arg1, $arg2);
		echo $message . ($result === $expectedResult ? "test passed" : "test failed") . PHP_EOL . PHP_EOL;
	}

}

interface ITests
{
	public function runTest($arg2, $arg1, $expectedResult, $message = "");
}