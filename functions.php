<?php
//Файл с функцией, работающей с консолью

function readFromConsole($array, $continueInput = "Y")
{
	$continue = $continueInput;

	while($continue == "Y") {
		echo "Введите число: ";
		$input = trim(fgets(STDIN));

		if(is_numeric($input)) {
			$array[]  = $input;
		} else {
			echo "Введенное значение не является числом" . PHP_EOL;
		}

		echo "Продолжать вводить? Y/N";
		$continue = trim(fgets(STDIN));

		readFromConsole($array, $continue);
	}

	while($continue == "N") {
		echo "No" . PHP_EOL;
		$summa = array_sum($array);
		exit("Сумма всех введенных значений = $summa");
	}

	while($continue !== "N" && $continue !== "Y") {
		echo "Продолжать вводить? Y/N";
		$continue = trim(fgets(STDIN));
		readFromConsole($array, $continue);
	}
}

