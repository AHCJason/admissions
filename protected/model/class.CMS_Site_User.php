<?php

class CMS_Site_User extends CMS_Table {

	public static $table = "site_user";
	protected static $metadata = array(
		"email" => array(
			"widget" => "text"
		),
		"pubid" => array(
			"widget" => "off"
		),
		"password" => array(
			"label" => "Password",
			"widget" => "password",
			"options" => array(
				"type" => "encrypted"
			),
			"callback_beforeSave" => "CMS_Site_User::encryptPassword"
		),
		"default_facility" => array(
			"widget" => "related_single",
			"options" => array(
				"table" => "facility"
			)
		)
	);
	protected static $metaLoaded = false;
	protected $vc = null;
	protected $default_facility_vouch = null;

	public function getTitle() {
		return "{$this->first} {$this->last}";
	}

	public static function encryptPassword($val, &$obj) {
		return Authentication::encryptPassword($val);
	}

	public function getFullName() {
		return $this->first . " " . $this->last;
	}
	
	public function fullName() {
		return $this->getFullName();
	}
	
	//shimed to check facilities object local.
	public function hasAccess(CMS_Facility $facility) {
		/*if (CMS_Table::areRelated($this, $facility) || $this->isAdmissionsCoordinator() == 1) {
			return true;
		}
		return false;*/
		
		//demoting isAdmissionsCoordinator() from cross access;
		//if($this->isAdmissionsCoordinator() == 1)
		//{
		//	//not yet
		//	//return true;
		//}
		
		$facilities = $this->getFacilities();
		foreach ($facilities as $f) {
			//echo($f->getRecord()->pubid);
			if ($f->getRecord()->pubid == $facility->getRecord()->pubid ) {
				return true;
			}
 		}
		
		return false;
		
		
	}
	
	public function guessDefaultFacility() {
		$facilities = $this->getFacilities();
		if (count($facilities) > 0) {
			$this->default_facility = $facilities[0]->id;
			$this->save();
		} else {
			return false;
		}
	}
	
	public function getFacilities($sortAlfa = true) {
		if (! isset($this->_facilities)) {
			if(isset($_COOKIE['VouchCookie']))
			{
				$vc = $this->VouchCookie();
				if($vc->status == 200){
					
					$db1 = db()->dbname;
					$db2 = db()->dbname2;
					
					$params = array();
					
					//now to less hardcode db names, and run this query to take ac_location.public_id to get admit_ahc.locations to get the admit locations
					$sql = "SELECT {$db1}.facility.* FROM {$db1}.facility LEFT JOIN {$db2}.ac_location ON {$db2}.ac_location.id = {$db1}.facility.id WHERE {$db2}.ac_location.public_id IN (";
					foreach($vc->Available_Loc as $key => $value) {
						$sql .= ":Available_Loc$key, ";
						$params[":Available_Loc$key"] = $value;
					}
					//fix hanging fencewire.
					$sql = trim($sql, ", ");
					$sql .= ")";
					$this->_facilities = array();
					$this->_facilities = db()->getRowsCustom($sql, $params, Model::clsname("facility"));
					//die(db()->debugSQL());
				} else {
					die("failed validation");
				}
			} else {
	
				//DB adds introduce duplicates
				//$this->_facilities = $this->related("facility");
				
				//let's go remove the duplicates from the DB.
				$this->_facilities = array();
				$toParse = $this->related("facility");
				$alreadyInc = [""];
				
				foreach($toParse as &$val)
				{
					if(!in_array($val->pubid, $alreadyInc))
					{
						array_push($this->_facilities, $val);
						$alreadyInc[] = $val->pubid;
					}
				}
				//It's cached in the session so one alpha sort sticks so make it default.
				if($sortAlfa) {
					usort($this->_facilities, function($a, $b) {
						return strcmp($a->getTitle(), $b->getTitle());
					});
				}
			}
		}
		//die(var_dump($this->_facilities));
		return $this->_facilities;
	}
	
	public function getDefaultFacility() {
		//to fix, make default facility cary over from the other DB to this one, for now the guess seems to work.
		if ($this->default_facility != '') {
			$facility = new CMS_Facility($this->default_facility);
			if (! $facility->valid() || !$this->hasAccess($facility) ) {
				if ($this->guessDefaultFacility() !== false) {
					return $this->getDefaultFacility();
				}
			} else {
				return $facility;
			}
		} else {
			if ($this->guessDefaultFacility() !== false) {
				return $this->getDefaultFacility();
			}
		}
		return false;
	}
	
	public function homeURL() {
		if ($this->isAdmissionsCoordinator() == 1) {
			return SITE_URL . "?page=coord";
		} else {
			$facility = new CMS_Facility($this->getDefaultFacility()->pubid);
			return SITE_URL . "?page=facility&id={$facility->pubid}";
			//return SITE_URL . "/?page=facility&id={$this->default_facility}";
		}
	}
	
	public function isAdmissionsCoordinator() {
		if ($this->is_coordinator == 1) {
			return true;
		} else {
			return $this->hasRole("admissions_coordinator");
		}
	}
	
	public function isFacilityAdmin() {
		if ($this->has_role == 'facility_administrator') {
			return true;
		}
	}
	
	public function getRoles($user_id) {
		$sql = "SELECT `role`.`id`, `role`.`name`, `facility`.`id` as facility_id, `facility`.`name` as facility_name FROM `site_user_role` INNER JOIN `role` on `role`.`id` = `site_user_role`.`role` INNER JOIN `facility` on `facility`.`id` = `site_user_role`.`facility`  WHERE `site_user` = :user_id";
		$params[":user_id"] = $user_id;
		return $this->fetchCustom($sql, $params);
	}
	
	public function canCreateAdmit(CMS_Facility $facility) {
		// admissions coordinators can do this regardless of facility
		if ($this->isAdmissionsCoordinator()) {
			return true;
		}
		// admin assistants for this facility can do this
		if ($this->hasRole("admin_assistant", $facility)) {
			return true;
		} elseif ($this->hasRole("home_health", $facility)) {
			return true;
		}
		// nobody else
		return false;
	}
	
	public function canEditInquiry(CMS_Facility $facility) {
		// these two role/capability combos are currently pinned to each other.
		return $this->canCreateAdmit($facility);
	}
		
	public function canEditNursing(CMS_Facility $facility = null) {
		return
			$this->hasRole("intake_nurse", $facility) ||
			$this->hasRole("admissions_nurse", $facility) ||
			$this->hasRole("admin_assistant", $facility) ||
			$this->hasRole("admissions_coordinator");
	}
	
	public function hasRole($role, $facility = null)
	{
		$roles = $this->getRolesFromSession();
		$toRet = false;
		
		
		//var_dump($roles);
		foreach ($roles as $k => $r) {
			if ($r == $role) {
				//return true;
				$toRet = true;
				break;
			}
 		}
		
		//echo("//Checking role on $role:   ".($toRet+0)."\n");
 		return $toRet;
		
	}
	
	public function hasPermission($perm) {
		$groups = $this->getGroupsFromSession();
		//var_dump($groups);
		foreach ($groups as $g) {
			if ($g->description == $perm) {
				return true;
			}
 		}

 		return false;
	}
	
	public function getRawVouchCookie() {
		if(!is_null($this->vc) && isset($this->vc->raw_cookie)) {
			return $this->vc->raw_cookie;
		} else {
			return null;
		}
	}
	
	//take session public_id and go get permissions for groups from VouchCookie
	//take session public_id and go get permissions for groups from DB if local auth
	protected function getGroupsFromSession() {
		if(isset($_COOKIE['VouchCookie']))
		{
			$vc = $this->VouchCookie();
			if($vc->status == 200){

				$db2 = db()->dbname2;
				//gets list of permissions from group permission from group membership from ac
				$sql = "SELECT * FROM {$db2}.ac_permission WHERE id IN (SELECT permission_id FROM {$db2}.ac_group_permission WHERE group_id IN (SELECT id FROM {$db2}.ac_group WHERE name IN (";
				foreach($vc->Useraccess as $key => $value) {
					$sql .= ":access$key, ";
					$params[":access$key"] = $value;
				}
				//fix hanging fencewire.
				$sql = trim($sql, ", ");
				$sql .= ")))";
				
				return db()->getRowsCustom($sql, $params);
			} else {
				die("failed validation");
			}
			#var_dump($content);
			#var_dump($response['http_code']);
			#var_dump($headers);
		} //else {
			//get id from pubID in ac_user, lookup group_ids in ac_user_group, use group_id to get list of permission_id from ac_group_permission, user permission_id to get names of permissions from ac_permission.
			//$sql = "SELECT * FROM ac_permission WHERE id IN (SELECT permission_id FROM ac_group_permission WHERE group_id IN (SELECT group_id FROM ac_user_group WHERE user_id = (SELECT id FROM ac_user WHERE public_id = :public_id)))";
			//$params[":public_id"] = session()->authentication_record;
			//return db()->getRowsCustom($sql, $params, $this);
		//}
	}
	
	//modified to get roles directly
	protected function getRolesFromSession() {
		if(isset($_COOKIE['VouchCookie']))
		{
			$vc = $this->VouchCookie();
			if($vc->status == 200){

				return $vc->Useraccess;
			} else {
				die("failed validation");
			}
			#var_dump($content);
			#var_dump($response['http_code']);
			#var_dump($headers);
		} //else {
			//get id from pubID in ac_user, lookup group_ids in ac_user_group, use group_id to get list of permission_id from ac_group_permission, user permission_id to get names of permissions from ac_permission.
			//$sql = "SELECT * FROM ac_permission WHERE id IN (SELECT permission_id FROM ac_group_permission WHERE group_id IN (SELECT group_id FROM ac_user_group WHERE user_id = (SELECT id FROM ac_user WHERE public_id = :public_id)))";
			//$params[":public_id"] = session()->authentication_record;
			//return db()->getRowsCustom($sql, $params, $this);
		//}
	}
	
	//stolen from framework\protected\Libs\Authentication
	public function VouchCookie()
	{
		if(is_null($this->vc) && isset($_COOKIE['VouchCookie'])){
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, "http://localhost:9090/vp_in_a_path/validate");
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADERFUNCTION,
				function($curl, $header) use (&$headers)
				{
					$len = strlen($header);
					$header = explode(':', $header, 2);
					if (count($header) < 2) // ignore invalid headers
					return $len;

					$headers[(trim($header[0]))] = trim($header[1]);

					return $len;
				}
			);
			curl_setopt( $ch, CURLOPT_COOKIE, "VouchCookie=" . $_COOKIE['VouchCookie']);
			$content = curl_exec( $ch );
			$response = curl_getinfo( $ch );
			curl_close ( $ch );
			
			$this->vc = (object)[];
			$Vouch = &$this->vc;
			$Vouch->status = $response['http_code'];

			if($Vouch->status === 200)
			{	
				$Vouch->success = $headers['X-Vouch-Success'];

				//AHC OKTA vs DEV Okta
				if(isset($headers['X-Vouch-Idp-Claims-Preferred-Username']))
				{
					$Vouch->login = $headers['X-Vouch-Idp-Claims-Preferred-Username'];
				} else {				
					$Vouch->login = $headers['X-Vouch-Idp-Claims-Login'];
				}

				//decode useraccess claim for groups
				$Vouch->Useraccess = explode(",", $headers['X-Vouch-Idp-Claims-Useraccess']);
				#var_dump($access);
				#$access = explode
				array_walk($Vouch->Useraccess, function(&$value){
					$value = trim($value, "\" ");
				});

				//decode available locations
				$Vouch->Available_Loc = explode(",", $headers['X-Vouch-Idp-Claims-Available-Locations']);
				#var_dump($access);
				#$access = explode
				array_walk($Vouch->Available_Loc, function(&$value){
					$value = trim($value, "\" ");
				});

				$Vouch->default_module = $headers['X-Vouch-Idp-Claims-Defaultmodule'];
				if(isset($headers['X-Vouch-Idp-Claims-Default-Location'])) {
					$Vouch->default_location = $headers['X-Vouch-Idp-Claims-Default-Location'];
				} else {
					$Vouch->default_location = $Vouch->Available_Loc[0];
				}
				$Vouch->name = $headers['X-Vouch-Idp-Claims-Name'];
				$Vouch->first_name = $headers['X-Vouch-Idp-Claims-Given-Name'];
				$Vouch->last_name = $headers['X-Vouch-Idp-Claims-Family-Name'];
				$Vouch->email = $headers['X-Vouch-Idp-Claims-Email'];
				$Vouch->okta_userid = $headers['X-Vouch-Idp-Claims-Sub'];

				$Vouch->raw_cookie = $_COOKIE['VouchCookie'];
			}
		} 
		return $this->vc;
	}
	
	/* //hijacked for my purpouses on merging to vouch
	public function hasRole($role, CMS_Facility $facility = null) {
		// figure out what was meant by $role: object, id, or name
		if (is_object($role)) {
			if (get_class($role) == "CMS_Role") {
				if ($role->valid()) {
					$roleid = $role->id;
				}
			}
		} else {
			if (Validate::is_natural($role)->success() || Validate::is_pubid($role)->success()) {
				$roleObj = new CMS_Role($role);
				if ($roleObj->valid()) {
					$roleid = $roleObj->id;
				}
			}
			if (! isset($roleid)) {
				$obj = new CMS_Role;
				$roleObj = current($obj->fetch(array('name' => $role)));
				if ($roleObj != false) {
					if ($roleObj->valid()) {
						$roleid = $roleObj->id;
					}
				}
			}
		}
		
		if ($roleid == '' || ! isset($roleid)) {
			return false;
		}
		
		$sql = "select * from site_user_role where site_user=:userid and role=:roleid";
		
		$params = array(
			":userid" => $this->id,
			":roleid" => $roleid
		);
		
		// optionally restrict to a single facility
		if (! is_null($facility) ) {
			$sql .= " and facility=:facilityid";
			$params[":facilityid"] = $facility->id;
		}
		
		$row = db()->getRowCustom($sql, $params);
		if ($row == false) {
			return false;
		}
		return true;
	}
	*/
	public function setRole(CMS_Role $role, CMS_Facility $facility) {
		db()->simple_insert("site_user_role", array(
			"site_user" => $this->id,
			"facility" => $facility->id,
			"role" => $role->id
		));
	}
	
	public function clearRoles(CMS_Facility $facility) {
		db()->query("delete from site_user_role where site_user=:userid and facility=:facilityid", array(
			":facilityid" => $facility->id,
			":userid" => $this->id
		));
	}
	
	public function deleteUser($user_id) {
		db()->query("delete from site_user where id=:userid", array(
			":userid" => $user_id
		));
		db()->query("delete from site_user_role where site_user=:userid", array(
			":userid" => $user_id
		));
		db()->query("delete from x_site_user_link_facility where site_user=:userid", array(
			":userid" => $user_id
		));
		
		return true;
	}
	
	public function findUsersByFacility($facility_id) {
		$sql = "select 
				site_user.pubid, 
				site_user.first, 
				site_user.last, 
				site_user.email,
				site_user.phone,
				role.description
			from site_user 
			left join x_site_user_link_facility 
				on site_user.id = x_site_user_link_facility.site_user 
				and x_site_user_link_facility.facility = {$facility_id}
			left join site_user_role
				on site_user.id = site_user_role.site_user
				and site_user_role.facility = {$facility_id}
			left join role 
				on site_user_role.role = role.id
			where site_user.default_facility = {$facility_id} OR x_site_user_link_facility.facility = {$facility_id}
			group by site_user.id
			order by site_user.last asc";
		$obj = static::generate();
		return $obj->fetchCustom($sql);
	}
	
	public function findUserByPubid($pubid) {
		$sql = "select * from site_user where pubid = '{$pubid}'";
		$obj = static::generate();
		return $obj->fetchCustom($sql);
	}
	
	public function findUser($pubid = false, $facility = false) {
		$sql = "select * from site_user 
			left join site_user_role
				on site_user.id = site_user_role.site_user
				and site_user_role.facility = {$facility}
			where site_user.pubid = '{$pubid}'";
		$obj = static::generate();
		return $obj->fetchCustom($sql);
		
	}
}
