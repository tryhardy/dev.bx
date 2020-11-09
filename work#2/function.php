<?php
//Файл с функцией, работающей с консолью

function readFromConsole($console, $args = null)
{
	if($args !== null) {
		$value = $args;
	} else {
		echo $console;
		$value =  trim(fgets(STDIN));
	}

	if(is_numeric($value)) {
		$value += 0;

		if(is_float($value)) {
			$result = (float) $value;
		} else {
			$result = (int) $value;
		}

		return $result;

	} else {
		if($value == '' || $value == 'true') {
			$result = (bool) true;
			return $result;

		} else if($value == 'false') {
			$result = false;
			return $result;

		} else if($value == '!stop') {
			$result = null;
			return $result;

		} else {
			$result = $value;
			return $result;

		}
	}
}
