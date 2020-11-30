<?php
//Calculator.php

class Calculator
{
	public function add(int $a, int $b): int
	{
		return $a + $b;
	}

	public function subtract(int $a, int $b): int
	{
		return $a - $b;
	}

	public function multiply(float $a, float $b): float
	{
		return $a * $b;
	}

	public function divide(int $a, int $b): float
	{
		if($b === 0)
		{
			throw new \InvalidArgumentException('Divider cant be a zero');
		}

		return $a / $b;
	}

	public function exponent(int $a, int $b): float
	{
		return $a ** $b;
	}

	public function squareRoot(int $a): float
	{
		if($a < 0)
		{
			throw new \InvalidArgumentException('Ar u mad, bro?');
		}

		return sqrt($a);
	}
}
