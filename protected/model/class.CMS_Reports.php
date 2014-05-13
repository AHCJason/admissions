<?php

class CMS_Reports extends CMS_Table {
		
	public static function fetchNames() {
		$sql = "SELECT * from reports";
		
		$obj = static::generate();
		return $obj->fetchCustom($sql);
	}
	
}