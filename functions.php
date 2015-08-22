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
			$Windows_Wim = 4.7; //Windows WIM
			$Office = 3; //Office Installed
			$Framework = 0.03; // .Net Framework 3.5
			$Updates_Reservation = 2; // Windows Updates Reservation 
			$WindowsTotal = $Windows + $Office + $Framework + $Updates_Reservation; // Windows Total All.
			
			$RecoveryImage = ($WindowsTotal - $Windows + $Windows_Wim) - $Updates_Reservation; // Recovery Image Os
			$RecoveryTool = 0.3;// Recovery Tools 300mb
			$EfiPartition = 0.26;// 260mb Microsoft Recommended for 4k drives
			$MSRPartition = 0.128; // MSR Partition
			$TotalPartitions = $RecoveryImage + $RecoveryTool + $EfiPartition + $MSRPartition; // Total Partitions
			
			$TotalSetup = $WindowsTotal + $TotalPartitions; // Total Windows Setup Plus Partitions Creation
			$Total = $TotalSetup + $GLOBALS['loss']; // Total Setup Space Consumption plus Base 10 miscalculation.
			$free = $GLOBALS['base10'] - $TotalSetup; // Free Space for Base 10 Disks
			$freeHDDnoRecovery = $free + $RecoveryImage; // Free Space for HDD without Recovery Image
			$freeSSD = $GLOBALS['base2'] - $TotalSetup; // Free Space for SSD Disks
			$freeSSDnoRecovery = $freeSSD + $RecoveryImage; // Free Space for SSD without Recovery Image
			
			$WIMBOOT = $Windows_Wim + $Framework; // Wimboot Partition Reservation for basic Windows Image
			$WIMBOOT_Free = $GLOBALS['base2'] - $WIMBOOT - $Office - ($TotalPartitions - $RecoveryImage) - $Updates_Reservation; // Space Free for user
			
			echo '<br>';
			echo 'Windows Setup = ' . $Windows . ' GB';
			echo '<br>';
			echo 'Office Setup = ' . $Office . ' GB';
			echo '<br>';
			echo '.Net Framework 3.5 = ' . $Framework . ' GB';
			echo '<br>';
			echo 'Windows Updates Reservation = ' . $Updates_Reservation . ' GB';
			echo '<br>';
			echo 'Windows Total Space = ' . $WindowsTotal . ' GB';
			echo '<br>';
			echo '<br>';
			
			echo 'Windows WIM File = ' . $Windows_Wim . ' GB';
			echo '<br>';
			echo '<br>';
			echo 'Recovery Image = ' . $RecoveryImage . ' GB';
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
			echo 'Free Space for HDD After Complete Setup Without Recovery Image = ' . number_format($freeHDDnoRecovery, 2, '.', ',') . ' GB';
			echo '<br>';
			echo 'Free Space for SSD After Complete Setup = ' . number_format($freeSSD, 2, '.', ',') . ' GB';
			echo '<br>';
			echo 'Free Space for SSD After Complete Setup Without Recovery Image = ' . number_format($freeSSDnoRecovery, 2, '.', ',') . ' GB';
									
			echo '<br><br>';
			echo 'Windows WIMBOOT Space Reservation = ' . $WIMBOOT . ' GB';
			echo '<br>';
			echo 'Windows WIMBOOT User Free Space = ' . $WIMBOOT_Free . ' GB';
			echo '<br>';
		}
		else 
		{
			die("Invalid Data");
		}		
	}
	
	