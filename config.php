<?php


if(SITE === 'local'){	

	return require 'local.php';
	
}else{
	
	return require 'dev.php';
}