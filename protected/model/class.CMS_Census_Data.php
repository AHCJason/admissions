<?php

class CMS_Census_Data extends CMS_Table {

	public static $table = "census_data";
	
	public function fetchAdcData($facility = false, $year = false) {
		$params = array(
			":facility" => $facility,
			":date_start" => $year ."-01-01 00:00:01",
			":date_end" => $year . "-12-31 23:59:59"
		);
		$sql = "SELECT * FROM census_data where facility_id = :facility and time_period >= :date_start and time_period <= :date_end";
		
		$obj = static::generate();
		return $obj->fetchCustom($sql, $params);
	}
	
	public static function calcAndSaveData($last_day_of_prev_month = "") {
		$obj = static::generate();
		$result = $obj->calcCensusForMonth($last_day_of_prev_month);
		$obj->saveCensusData($result);
	}
	
	
	private function calcCensusForMonth($last_day_of_prev_month = "") {
		if($last_day_of_prev_month != "")
		{
			$params = array(
				":last_day_of_prev_month" => $last_day_of_prev_month
			);
			$sql = "select :last_day_of_prev_month as last_day_of_prev_month, round(avg(census_data_month.census_value), 2) as census_value, facility_id from census_data_month group by facility_id";
			
			$obj = static::generate();
			return $obj->fetchCustom($sql, $params);
		} else {
			$sql = "select round(avg(census_data_month.census_value), 2) as census_value, facility_id from census_data_month group by facility_id";
			
			$obj = static::generate();
			return $obj->fetchCustom($sql);
		}
	}
	
	public function saveCensusData($data = array()) {
		if (!empty ($data)) {
			foreach ($data as $d) {
				$census = new CMS_Census_Data();
				$census->facility_id = $d->facility_id;
				$census->census_value = $d->census_value;
				if(isset($d->last_day_of_prev_month))
				{
					#When running backfill
					$census->time_period = $d->last_day_of_prev_month;
				} else {
					$census->time_period = date('Y-m-t', strtotime("now - 1 month"));
				}
				$census->save();
			}
			
			return true;
		}
		
		
		return false;
		
		
	}

	
}