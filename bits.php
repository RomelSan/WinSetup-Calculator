<?php
require 'antihacking.php'; // Anti Hacking Module



if (!isset($_GET['bits']) && !isset($_GET['bytes']))
	{
		echo "Megabits to Megabytes Input Required, example: bits.php?bits=Number";
		echo "<br>";
		echo "Megabytes to Megabits Input Required, example: bits.php?bytes=Number";
		die();
	}		
	
	if (isset($_GET['bits']))
	{
		if ( strlen( $_GET[ 'bits' ] ) <= 0 )
			{
				die("No data to process.");
			}
			
		$ourParamId = $_GET['bits'];
		$codeText = sanitize($ourParamId);
		Bits_to_bytes($codeText);
	}
	
	if (isset($_GET['bytes']))
	{
		if ( strlen( $_GET[ 'bytes' ] ) <= 0 )
			{
				die("No data to process.");
			}
			
		$ourParamId = $_GET['bytes'];
		$codeText = sanitize($ourParamId);
		Bytes_to_bits($codeText);
	}
	
	function Bits_to_bytes($input) // Conversion function
	{
		$conversion = $input / 8 ;
		$kilobytes = $conversion * 1000;
		echo 'Megabits = ' . number_format($input, 3, '.', ',');
		echo '<br>';
		echo 'Megabytes = ' . number_format($conversion, 3, '.', ',');
		echo '<br>';
		echo 'Kilobytes = ' . number_format($kilobytes, 3, '.', ',');
		
	}
	
	function Bytes_to_bits($input) // Conversion function
	{
		$conversion = $input * 8 ;
		echo 'Megabytes = ' . number_format($input, 3, '.', ',');
		echo '<br>';
		echo 'Megabits = ' . number_format($conversion, 3, '.', ',');
	}
	
	
	
	