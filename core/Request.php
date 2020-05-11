<?php

class Request {


	public static function uri(){

		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		// dd($_SERVER['REQUEST_URI']);
		// dd(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
	}

	public static function method(){

		return $_SERVER['REQUEST_METHOD'];
	}

	
}