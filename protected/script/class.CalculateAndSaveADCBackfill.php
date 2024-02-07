<?php

class CalculateAndSaveADCBackfill extends CLIScript {
	protected static $firstRun = '2014-06-06 00:01:00';
	protected static $intervalDays = 1;
	protected static $intervalHours = 0;
	protected static $intervalMinutes = 0;
	protected static $enabled = true;
	
	
	public static function exec() {
		#$date = date('Y-m-d 23:59:59', strtotime('now - 1 day'));
		
		$date = date('Y-m-d', strtotime('2023-08-24'));
		echo($date);
		
		#return;
		for($i=0;$i < 1; $i++)
		{
			$date = date('Y-m-d 23:59:59', strtotime($date. '+ 1 day'));
			echo("Processing date $i: ".$date."\n");
			
			$dayCount = date('j', strtotime($date));
			#$last_day_of_prev_month = date('Y-m-d', strtotime(date('Y-m', strtotime($date)).'-00'));
			$last_day_of_prev_month = date('Y-m-t', strtotime($date. '- 1 month'));
			
			$currentVals = array();
			
			$obj = new CMS_Census_Data_Month();
			
			// If first day of month
			if ($dayCount == 1) {
				// Calculate total ADC for month and save to the census_data table
				CMS_Census_Data::calcAndSaveData($last_day_of_prev_month);
				
				// clear the census_data month table for all locations
				$obj->clearTable();
			}
			
					
			// Get the census for today for all locations
			$todayCensus = CMS_ROOM::fetchCurrentCensus($date);
			
			
			// save census info to census_data_month
			foreach ($todayCensus[0] as $c) {
				$obj->saveDayCensusData($c->facility, $c->census, $date);
			}
		}
		echo("Last Date: ".$date."\n");
		echo("\n\nEND\n\n");
		return;
		
	

/*
 *
 * This code can be used to calculate values for a month all at once
		$i = 0;
		while ($i < 4) {
			if ($i != 0) {
				$date = date('Y-m-d 23:59:59', strtotime($date . " + 1 days"));
			}
			
			$todayCensus = CMS_ROOM::fetchCurrentCensus($date);
			
			// save census info to census_data_month
			foreach ($todayCensus[0] as $c) {
				$obj->saveDayCensusData($c->facility, $c->census, $date);
			}	
			$i++;
		}
*/

	}
}