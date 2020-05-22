<?php



return [

	'database' => [
		'name' => 'rachunki',//'dla niemiec',
		// 'name' => 'marshipdes_wyd',//'dla polski',
		
		'charset' =>'utf8',
		'username' => 'root',
		'password' => '',
		'connection' => 'mysql:host=localhost',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
];