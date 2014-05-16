<?php

class PageControllerHome extends PageController {

	public function init() {
		Authentication::disallow();
	}
	
		
	public function index() {
		$this->redirect(auth()->getRecord()->homeURL());
		
	}
	
	/*
	public function setHospitalNames() {
		// inquiry records
		$pObj = CMS_Patient_Admit::generate();
		$patients = $pObj->fetch();
		foreach ($patients as $p) {
			if ($p->hospital != '' && $p->referral_org_name == '') {
				$hospital = new CMS_Hospital($p->hospital);
				$p->referral_org_name = $hospital->name;
				$p->save();
			}
		}
		
		// AHRs
		$aObj = CMS_Schedule_Hospital::generate();
		$ahrs = $aObj->fetch();
		foreach ($ahrs as $ahr) {
			if ($ahr->hospital != '') {
				$hospital = new CMS_Hospital($ahr->hospital);
				$ahr->hospital_name = $hospital->name;
				$ahr->save();
			}			
		}
		
		exit;
	}
	*/
	
	public function notifyRoleUsers() {
		// glendale
		$facility = new CMS_Facility(1);
		
		// event: schedule changed
		$event = new CMS_Notify_Event(3);
		
		// roles
		$roles = $event->getRolesToNotify();
		
		// users
		foreach ($roles as $role) {
			echo "For role {$role->name}:<br />";
			$users = $role->getUsers($facility);
			vd($users);
		}
		
		exit;
		
	}



}
