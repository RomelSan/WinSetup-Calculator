<?php
	function calculate($input)
	{
	
	$teras = $input;
	$bytes = $teras * 1024 * 1024 * 1024 * 1024;
	$bytes10 = $teras * 1000 * 1000 * 1000 * 1000;
        if (($teras >= 0) && ($teras < 1025)) 
		{
            $output_base2 = round($bytes / 1024 / 1024 / 1024, 2);
			$output_base10 = round($bytes10 / 1024 / 1024 / 1024, 2);
			$base10loss = $output_base2 - $output_base10;
			$english_format_number02 = number_format($output_base2, 2, '.', ',');
			$english_format_number10 = number_format($output_base10, 2, '.', ',');
			$english_format_numberLoss = number_format($base10loss, 2, '.', ',');
			echo 'SSD Total Space = ' . $english_format_number02 . ' GB (Base 2)'; 
			echo '<br>';
			echo 'HDD Total Space = ' . $english_format_number10 . ' GB (Base 10)';
			echo '<br>';
			echo 'HDD Lost Space  = ' . $english_format_numberLoss . ' GB lost in Base 10';
			echo '<br>';
			$GLOBALS['base2'] = $output_base2;
			$GLOBALS['base10'] = $output_base10;
			$GLOBALS['loss'] = $base10loss;
        }
	else 
	{
	die("Invalid Data");
	}
	}
	//usage (calculate 3 teras): calculate(3);
//--------------------------------------------------------------------------------------

	function windows($input)
	{
		$teras = $input;
		if (($teras >= 0) && ($teras < 1025)) 
		{
		 	$Windows = 9; //Windows Installed on HDD
			$Office = 3; //Office Installed
			$Framework = 0.03; // .Net Framework 3.5
			$Updates_Reservation = 5; // Windows Updates Reservation 
			$WindowsTotal = $Windows + $Office + $Framework + $Updates_Reservation; // Windows Total All.
			
			$RecoveryTool = 0.3;// Recovery Tools 300mb
			$EfiPartition = 0.26;// 260mb Microsoft Recommended for 4k drives
			$MSRPartition = 0.128; // MSR Partition
			$TotalPartitions = $RecoveryTool + $EfiPartition + $MSRPartition; // Total Partitions
			
			$TotalSetup = $WindowsTotal + $TotalPartitions; // Total Windows Setup Plus Partitions Creation
			$Total = $TotalSetup + $GLOBALS['loss']; // Total Setup Space Consumption plus Base 10 miscalculation.
			$free = $GLOBALS['base10'] - $TotalSetup; // Free Space for Base 10 Disks
			$freeSSD = $GLOBALS['base2'] - $TotalSetup; // Free Space for SSD Disks
			
			echo '<br>';
			echo 'Windows 10 Setup = ' . $Windows . ' GB';
			echo '<br>';
			echo 'Office 2013 Setup = ' . $Office . ' GB';
			echo '<br>';
			echo '.Net Framework 3.5 = ' . $Framework . ' GB';
			echo '<br>';
			echo 'Windows Updates Reservation = ' . $Updates_Reservation . ' GB';
			echo '<br>';
			echo 'Windows Total Space = ' . $WindowsTotal . ' GB';
			echo '<br>';
			echo '<br>';
			
			echo 'Recovery Tool = ' . $RecoveryTool . ' GB';
			echo '<br>';
			echo 'Efi Partition = ' . $EfiPartition . ' GB';
			echo '<br>';
			echo 'MSR Partition = ' . $MSRPartition . ' GB';
			echo '<br>';
			echo 'Total Partitions Space = ' . $TotalPartitions . ' GB';
			echo '<br>';
			
			echo '<br>';
			echo 'Total Windows Setup = ' . $TotalSetup . ' GB';
			echo '<br>';
			echo 'Total Windows Setup and HDD Space Lost Base 10 = ' . number_format($Total, 2, '.', ',') . ' GB';
			echo '<br>';
			echo 'Free Space for HDD After Complete Setup = ' . number_format($free, 2, '.', ',') . ' GB';
			echo '<br>';
			echo 'Free Space for SSD After Complete Setup = ' . number_format($freeSSD, 2, '.', ',') . ' GB';
		}
		else 
		{
			die("Invalid Data");
		}		
	}
	
	