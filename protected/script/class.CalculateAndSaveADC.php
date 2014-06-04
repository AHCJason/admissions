<?php

class CalculateAndSaveADC extends CLIScript {
	protected static $firstRun = '2014-06-04 23:59:00';
	protected static $intervalDays = 1;
	protected static $intervalHours = 0;
	protected static $intervalMinutes = 0;
	protected static $enabled = true;
	
	
	public static function exec() {
		$date = date('Y-m-d 23:59:00', strtotime('now'));
		$dayCount = date('j', strtotime($date));
		$currentVals = array();
		
		$obj = new CMS_Census_Data_Month();
		
		// If first day of month
		if ($dayCount == 1) {
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
}