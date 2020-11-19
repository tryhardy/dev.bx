<?php

function getDirectoryStatus($dir = "")
{
	if(!$dir) {
		return "Вы не передали путь к папке";
	}

	if(!file_exists($dir)) {
		return "Указанной папки не существует";
	}

	$dh  = opendir($dir);
	while (false !== ($entry = readdir($dh))) {
		$result[] = $entry;
	}
	closedir($dh);

	$elemsToRemove = [".", ".."];
	$result = array_diff($result, $elemsToRemove);

	if (!count($result)) {
		return "Указанная директория пуста";
	}

	$tmpArray = [];
	foreach($result as $item) {
		$path = $dir . '/' . $item;
		if(is_dir($path)) {
			$isReadable = is_readable($path);
			$isWritable = is_writable($path);
			$tmpArray["dirs"][$item]["is_readable"] = $isReadable ? true : false;
			$tmpArray["dirs"][$item]["is_writable"] = $isWritable ? true : false;
		} else {
			$isReadable = is_readable($path);
			$isWritable = is_writable($path);
			$tmpArray["files"][$item]["is_readable"] = $isReadable ? true : false;
			$tmpArray["files"][$item]["is_writable"] = $isWritable ? true : false;
			$tmpArray["files"][$item]["size"] = filesize($path);
		}
	}

	if(!$tmpArray["files"]) {
		$tmpArray["files"] = "В директории не содержится файлов";
	}

	if(!$tmpArray["dirs"]) {
		$tmpArray["dirs"] = "В директории не содержится папок";
	}

	$result = $tmpArray;
	ksort($result);

	return $result;
}
