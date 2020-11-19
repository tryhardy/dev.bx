<?php
/*
ПЫ. СЫ. ПЕРЕД ПРОХОЖДЕНИЕМ ТЕСТА ПРОСТАВЬТЕ ПРАВА У ПАПОК И ФАЙЛОВ
*/

include_once("function.php");
include_once ("test.php");

test();

$result = getDirectoryStatus('./notEmptyDir');

echo "<pre>";
print_r($result);
echo "</pre>";
