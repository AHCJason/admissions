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

	
}