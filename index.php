<?php
//Необходимо считать из консоли произвольное*
// кол-во чисел от пользователя, сложить их и вывести результат.
$array = [];
addToArray($array);

function addToArray($array)
{
	echo "Введите число: ";
	$input = trim(fgets(STDIN));

	if(is_numeric($input)) {
		array_push($array, $input);
	} else {
		echo "Введенное значение не является числом" . PHP_EOL;
	}

	echo "Продолжать вводить? Y/N";
	$continue = trim(fgets(STDIN));

	checkContinue($continue, $array);

}

function checkContinue($continue, $array)
{
	if($continue == "Y")  {
		echo "Yes" . PHP_EOL;
		addToArray($array);
	} elseif($continue == "N") {
		echo "No" . PHP_EOL;
		$summa = array_sum($array);
		echo "Сумма всех введенных значений = $summa";
	} else {
		echo "Продолжать вводить? Y/N";
		$continue = trim(fgets(STDIN));
		checkContinue($continue, $array);
	}
}
