<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;
require_once (__DIR__ . '/../lib/Calculator.php');

class CalculatorTest extends TestCase
{

	public function testAdd(): void
	{
		$calculator = new Calculator();
		self::assertEquals(4, $calculator->add(2, 2));
	}

	public function testSubtract(): void
	{
		$calculator = new Calculator();
		self::assertEquals(0, $calculator->subtract(2, 2));
	}

	public function multiplyOkProviderData(): array
	{
		return[
			[2, 2, 4],
			[0, 3, 0],
			[5, 5, 25],
			[1,-5, -5],
			[1, 0.5, 0.5],
			[1, 100000, 100000]
		];
	}

	/**
	 * @dataProvider multiplyOkProviderData
	 *
	 * @param float $a
	 * @param float $b
	 * @param float $result
	 */
	public static function testMultiplyOkProvider(float $a, float $b, float $result): void
	{
		$calculator = new Calculator();
		self::assertEquals($result, $calculator->multiply($a, $b));
	}


	public function testDivideException()
	{
		$calculator = new Calculator();

		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Divider cant be a zero');

		$calculator->divide(5, 0);
	}


	public function exponentProviderData(): array
	{
		return[
			[2, 2, 4],
			[0, 0, 1],
			[3, 3, 27],
			[2,-2, 0.25],
		];
	}

	/**
	 * @dataProvider exponentProviderData
	 *
	 * @param int $a
	 * @param int $b
	 * @param float $result
	 */
	public function testExponent(int $a, int $b, float $result): void
	{
		$calculator = new Calculator();
		self::assertEquals($result, $calculator->exponent($a, $b));
	}

	public function testSquareRoot(): void
	{
		$calculator = new Calculator();

		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Ar u mad, bro?');

		self::assertEquals(0, $calculator->squareRoot(0));
		self::assertEquals(1, $calculator->squareRoot(1));
		self::assertEquals(2, $calculator->squareRoot(4));

		$calculator->squareRoot(-2);
	}
}
