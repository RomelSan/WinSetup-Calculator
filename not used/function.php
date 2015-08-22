<?php
     
    /**
     * Convert bytes to human readable format
     *
     * @param integer bytes Size in bytes to convert
     * @return string
     */
    function bytesToSize($bytes, $precision = 2)
    {  
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;
        $terabyte = $gigabyte * 1024;
       
        if (($bytes >= 0) && ($bytes < $kilobyte)) {
            return $bytes . ' B';
     
        } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
            return round($bytes / $kilobyte, $precision) . ' KB';
     
        } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
            return round($bytes / $megabyte, $precision) . ' MB';
     
        } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
            return round($bytes / $gigabyte, $precision) . ' GB';
     
        } elseif ($bytes >= $terabyte) {
            return round($bytes / $terabyte, $precision) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }
	
	function terasToGigas($teras, $precision = 2)
		{
       $bytes = $teras * 1024 * 1024 * 1024 * 1024;
        if (($teras >= 0) && ($teras < 1024)) 
		{
            return round($bytes / 1024 / 1024 / 1024, $precision) . ' gB (Base 2)';
        }
    }
	
	function terasToGigas10($teras, $precision = 2)
		{
       $bytes = $teras * 1000 * 1000 * 1000 * 1000;
        if (($teras >= 0) && ($teras < 1024)) 
		{
		return round($bytes / 1024 / 1024 / 1024, $precision) . ' gB (Base 10)';
        }
    }
	/*
	$value = terasToGigas(3);
	$value10 = terasToGigas10(3);
	echo $value;
	echo '<br>';
	echo $value10;
	*/