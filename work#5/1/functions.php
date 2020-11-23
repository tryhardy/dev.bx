<?php
/*������
������������������ ������� �� ����������� ����� � ����������� �������� stop.
����� �������� �� ����� 20 �����.
����������, ������� ��������� ���� ������������������ ����� �� ����������� ��������.

***������ ������� ������***
�������� ������������������ ����� �����, �������������� �������� stop

***������ �������� ������***
�������� ����� �� ������ (���� �����).

***�����***
��� ������� 2 ������ �����.

���� - 1 2 4 6 6 2 3 4 5 6 1 2 3 4 5 1 4 5 6 2 2
����� - �� ����� ����� 20 �����

���� -
����� - �� ������ �� �����

���� - 1 2 �����
����� - ��������� �������� �� �������� ������

���� - 1 2 4 6 6
����� - 2

���� - 1 2 3 1
����� - 1
 */

class firstQuest implements  ITests
{
	public function getInstructions(){
		echo "������� ����� ����� ������. ��������� ���� �������� stop" . PHP_EOL . PHP_EOL;
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
			return "�� ����� ����� 20 �����";
		} elseif(count($args) == 0) {
			return "�� ������ �� �����";
		}

		$tmpValue = "";
		$counter = 1;
		foreach($args as $key => $arg) {

			if(!is_numeric($arg)) {
				return "��������� �������� �� �������� ������";
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