<?php

class PageControllerHospital extends PageController {
	
	public function init() {
		Authentication::disallow();
	}
	
	public function searchHospital() {
		$user = auth()->getRecord();
		$facility = new CMS_Facility($user->default_facility);
				
		$term = input()->term;
		if ($term != '') {
			$tokens = explode(" ", $term);
			$params = array();
			$params[":facilitystate"] = $facility->state;
			$sql = "select * from hospital where ";
			foreach ($tokens as $idx => $token) {
				$token = trim($token);
				$sql .= " name like :term{$idx} AND";
				$params[":term{$idx}"] = "%{$token}%";
			}
			$sql = rtrim($sql, " AND");
			$sql .= " AND hospital.state = :facilitystate OR hospital.state = ''";
						
			$results = db()->getRowsCustom($sql, $params);
		} else {
			$results = array();
		}

		json_return($results);

	}
	
	
	public function searchHomeHealth() {
		$user = auth()->getRecord();
		$facility = new CMS_Facility($user->default_facility);
				
		$term = input()->term;
		if ($term != '') {
			$tokens = explode(" ", $term);
			$params = array();
			$params[":facilitystate"] = $facility->state;
			$sql = "select * from hospital where ";
			foreach ($tokens as $idx => $token) {
				$token = trim($token);
				$sql .= " name like :term{$idx} AND";
				$params[":term{$idx}"] = "%{$token}%";
			}
			$sql = rtrim($sql, " AND");
			$sql .= " AND hospital.state = :facilitystate";
			$sql .= " AND hospital.type = 'Home Health'";
						
			$results = db()->getRowsCustom($sql, $params);
		} else {
			$results = array();
		}

		json_return($results);

	}
	
	public function add() {
		$locationTypes = array(
			"Assisted Living",
			"Group Home",
			"Home Health",
			"Hospice",
			"Hospital",
			"Skilled Nursing Facility"
		);
		
		if (input()->type != "") {
			$type = input()->type;	
		} else {
			$type = "";
		}
		
		if (input()->isMicro == 1) {
			$isMicro = true;
		} else {
			$isMicro = false;
		}
				
		smarty()->assign('locationTypes', $locationTypes);
		smarty()->assign('inputType', $type);
		smarty()->assign('isMicro', $isMicro);
		
	}
	
	public function addLocation() {
		$loc = new CMS_Hospital();
		
		if (input()->isMicro == 1) {
			$shadowbox = true;
		} else {
			$shadowbox = false;
		}
						
		if (input()->location_name == "") {
			feedback()->error("Enter the location name and try again.");
			if ($shadowbox) {
				$this->redirect(SITE_URL . "/?page=patient&action=close_window");
			} else {
				$this->redirect(SITE_URL . "?page=coord&action=admit");
			}
			
		} else {
			$loc->name = input()->location_name;
		}
		
		if (input()->type == "") {
			feedback()->error("Select the location type.");
			if ($shadowbox) {
				$this->redirect(SITE_URL . "/?page=patient&action=close_window");
			}
			$this->redirect();
		} else {
			$loc->type = input()->type;
		}
		
		if (input()->address != "") {
			$loc->address = input()->address;
		}
		if (input()->city != "") {
			$loc->city = input()->city;
		}
		
		if (input()->state == "") {
			feedback()->error("Please enter the state in which the facility is located.");
			if ($shadowbox) {
				$this->redirect(SITE_URL . "/?page=patient&action=close_window");
			} else {
				$this->redirect();
			}
			
		} else {
			$validate = Validate::is_USAState(input()->state);
			if ($validate->success() == false) {
				feedback()->error("Please enter a valid state");
			} else {
				$loc->state = input()->state;
			}

		} 
		
		if (input()->zip != "") {
			$loc->zip = input()->zip;
		}
		if (input()->phone != "") {
			$loc->phone = input()->phone;
		}
		if (input()->fax != "") {
			$loc->fax = input()->fax;
		}
		
		
		try {
			$loc->save();
			feedback()->conf($loc->name . " was successfully added");
		} catch (ORMException $e) {
			feedback()->error("An error was encountered while trying to save the new location.");
		}
				
		if (feedback()->wasError()) {
			if ($shadowbox) {
				$this->redirect(SITE_URL . "/?page=patient&action=close_window");
			} else {
				$this->redirect();
			}
			
		} else {
			if ($shadowbox) {
				$this->redirect(SITE_URL . "/?page=patient&action=close_window");
			} else {
				$this->redirect();
			}
						
		}
		
	}
	
	
	
	/*
	 * -------------------------------------------------------------
	 *  MANAGE HOSPITALS
	 * -------------------------------------------------------------
	 * 
	 */
	 
	public function manage() {
		
		// Get list of all case managers
		$getter = CMS_Hospital::generate();
		$getter->paginationOn();
		$getter->paginationSetSliceSize(25);
		
		$slice = trim(strip_tags(input()->slice));
			if ($slice == '' || ! Validate::is_natural($slice)->success()) {
  			$slice = 1;
		}	
		$getter->paginationSetSlice($slice);
		
		$hospitals = $getter->findHospitals();
		
		
				
		smarty()->assign('hospitals', $hospitals);
		smarty()->assignByRef('getter', $getter);

	}
	
	
	
	
	/*
	 * -------------------------------------------------------------
	 *  EDIT HOSPITAL
	 * -------------------------------------------------------------
	 * 
	 */
	 
	
	public function edit() {
		$hospital = new CMS_Hospital(input()->hospital);
		
		smarty()->assign('hospital', $hospital);
		
		$locationTypes = array(
			"Hospital",
			"Hospice",
			"Skilled Nursing Facility",
			"Assisted Living",
			"Group Home"
		);
				
		smarty()->assign('locationTypes', $locationTypes);
		
	}
	
	public function submitEdit() {
		if (auth()->getRecord()->isAdmissionsCoordinator() != 1) {
			redirect(auth()->getRecord()->homeURL());
		}
		$hospital = new CMS_Hospital(input()->hospital);
		
		if (input()->name != '') {
			$hospital->name = input()->name;
		}
		
		if (input()->type != '') {
			$hospital->type = input()->type;
		}
		
		if (input()->address != '') {
			$hospital->address = input()->address;
		}
		
		if (input()->state != '') {
			$hospital->state = input()->state;	
		}
		
		if (input()->city != '') {
			$hospital->city = input()->city;	
		}
		
		if (input()->zip != '') {
			$hospital->zip = input()->zip;	
		}
		
		if (input()->phone != '') {
			$hospital->phone = input()->phone;	
		}
		
		if (input()->fax != '') {
			$hospital->fax = input()->fax;	
		}
		
							
		try {
			$hospital->save();
			feedback()->conf("The information for {$hospital->name} has been saved.");
		} catch (ORMException $e) {
			feedback()->error("Could not save the hospital information.");
		}
		
		if (feedback()->wasError()) {
			$this->redirect(SITE_URL . "/?page=hospital&action=edit&hospital={$hospital->pubid}");
		} else {
			$this->redirect(SITE_URL . "/?page=hospital&action=manage");
		}
	}
	
	
	
		
	/*
	 * -------------------------------------------------------------
	 *  DELETE THE HOSPITAL
	 * -------------------------------------------------------------
	 * 
	 */
	 
	public function delete() {
		if (auth()->getRecord()->isAdmissionsCoordinator() != 1) {
			redirect(auth()->getRecord()->homeURL());
		}
		$hospital = new CMS_Hospital(input()->hospital);
		
				
		if ($hospital->deleteHospital($hospital->id)) {
			feedback()->conf("{$hospital->name} was successfully deleted.");
			$this->redirect(SITE_URL . "/?page=hospital&action=manage");
		} else {
			feedback()->error("Could not delete the hospital.");
			$this->redirect(SITE_URL . "/?page=hospital&action=manage");
		}
	}


}