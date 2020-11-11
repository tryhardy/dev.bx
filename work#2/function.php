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
		if($value == 'true') {
			return true;

		} else if($value == 'false') {
			return false;

		} else if($value == '!stop') {
			$result = null;
			return $result;

		} else {
			$result = $value;
			return $result;

		}
	}
}
