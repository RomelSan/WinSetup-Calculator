<?php
require 'antihacking.php';
require 'functions.php';

	if (!isset($_GET['value']))
	{
		die("Input Required, example: calculate.php?value=Number");
	}
	
	if ( strlen( $_GET[ 'value' ] ) <= 0 )
	{
	die("No data to process.");
	}
	
	$ourParamId = $_GET['value'];
	$codeText = sanitize($ourParamId);
	
	calculate($codeText);
	windows($codeText);
	
	
	