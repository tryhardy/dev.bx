<?php
/*
*  @test readFromConsole('', '') - true;
*  @test readFromConsole('', 'false') - false;
*  @test readFromConsole('', '!stop') - null;
*  @test readFromConsole('', '1.3') - 1.3;
*  @test readFromConsole('', '1') - 1;
*  @test readFromConsole('', 'test') = 'test;
*/

function test()
{
	$result = readFromConsole('', '');
	assertEquals(true, $result, "readFromConsole('', '') - true: ");

	$result = readFromConsole('', 'false');
	assertEquals(false, $result,  "readFromConsole('', 'false') - false: ");

	$result = readFromConsole('', '!stop');
	assertEquals(null, $result, "readFromConsole('', '!stop') - null: ");

	$result = readFromConsole('', '1.3');
	assertEquals(1.3, $result, "readFromConsole('', '1.3') - 1.3: ");

	$result = readFromConsole('', '1');
	assertEquals(1, $result, "readFromConsole('', '1') - 1: ");

	$result = readFromConsole('', 'test');
	assertEquals('test', $result, "readFromConsole('', 'test') - 'test' ");
}

function assertEquals($expectedResult, $currentResult, $message)
{
	echo $message . ($currentResult === $expectedResult ? "test passed" : "test failed") . PHP_EOL;
}