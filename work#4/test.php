<?php
/*
*  @test getDirectoryStatus() - 'Вы не передали путь к папке';

*  @test getDirectoryStatus('фывфывыфв') - 'Указанной папки не существует';

*  @test getDirectoryStatus('./emptyDir') - 'Указанная директория пуста';

*  @test - getDirectoryStatus('./noFilesDir') -
	$arr =  [
		'dirs' => [
			'directory-1' => [
				'is_readable' => true,
				'is_writable' => true,
			],
			'directory-2' => [
				'is_readable' => false,
				'is_writable' => false,
			]
		],
		'files' => "В директории не содержится файлов"
	];

*  @test - getDirectoryStatus('./noDirsDir') -
	$arr =  [
		'dirs' => "В директории не содержится папок",
		'files' => [
			'image.jpg' => [
				'is_readable' => true,
				'is_writable' => false,
				'size' => 639981
			],
			'map.jpg' => [
				'is_readable' => false,
				'is_writable' => true,
				'size' => 314251
			],
		]
	];

* @test getDirectoryStatus('./notEmptyDir') -
	$arr =  [
		'dirs' => [
			'directory-1' => [
				'is_readable' => false,
				'is_writable' => false
			],
		],
		'files' => [
			'image.jpg' => [
				'is_readable' => true,
				'is_writable' => false,
				'size' => 639981
			],
			'map.jpg' => [
				'is_readable' => false,
				'is_writable' => true,
				'size' => 314251
			],
			'test.txt' => [
				'is_readable' => true,
				'is_writable' => true,
				'size' => 21
			],
			'test-2.txt' => [
				'is_readable' => false,
				'is_writable' => false,
				'size' => 21
			],
		]
	];
*/

function test()
{
	$result = getDirectoryStatus();
	assertEquals("Вы не передали путь к папке", $result, "getDirectoryStatus() - 'Вы не передали путь к папке': ");

	$result = getDirectoryStatus('фывфывыфв');
	assertEquals("Указанной папки не существует", $result, "getDirectoryStatus('фывфывыфв') - 'Указанной папки не существует': ");

	$result = getDirectoryStatus('./emptyDir');
	assertEquals("Указанная директория пуста", $result, "getDirectoryStatus('./emptyDir') - 'Указанная директория пуста': ");

	$result = getDirectoryStatus('./noFilesDir');
	$resultArray =  [
		'dirs' => [
			'directory-1' => [
				'is_readable' => true,
				'is_writable' => true,
			],
			'directory-2' => [
				'is_readable' => false,
				'is_writable' => false,
			]
		],
		'files' => "В директории не содержится файлов"
	];
	assertEquals($resultArray, $result, "getDirectoryStatus('./noFilesDir') - $resultArray: ");

	$result = getDirectoryStatus('./noDirsDir');
	$resultArray =  [
		'dirs' => "В директории не содержится папок",
		'files' => [
			'image.jpg' => [
				'is_readable' => true,
				'is_writable' => false,
				'size' => 639981
			],
			'map.jpg' => [
				'is_readable' => false,
				'is_writable' => true,
				'size' => 314251
			],
		]
	];
	assertEquals($resultArray, $result, "getDirectoryStatus('./noDirsDir') - $resultArray: ");

	$result = getDirectoryStatus('./notEmptyDir');
	$resultArray =  [
		'dirs' => [
			'directory-1' => [
				'is_readable' => false,
				'is_writable' => false
			],
		],
		'files' => [
			'1.jpg' => [
				'is_readable' => true,
				'is_writable' => false,
				'size' => 639981
			],
			'2.jpg' => [
				'is_readable' => false,
				'is_writable' => true,
				'size' => 314251
			],
			'3.txt' => [
				'is_readable' => true,
				'is_writable' => true,
				'size' => 21
			],
			'4.txt' => [
				'is_readable' => false,
				'is_writable' => false,
				'size' => 21
			],
		]
	];
	assertEquals($resultArray, $result, "getDirectoryStatus('./notEmptyDir') - $resultArray: ");
}

function assertEquals($expectedResult, $currentResult, $message)
{
	echo $message . ($currentResult === $expectedResult ? "test passed" : "test failed") . PHP_EOL;
}