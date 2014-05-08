<?php

class PageControllerLogin extends PageController {

	public function index() {
		smarty()->assign("path", input()->path);
	}

	public function login() {
		
		//Look for @ symbol in username
		if (strpos(input()->post("email"), "@")) {
			auth()->login(input()->post("email"), input()->post("password"));
		} elseif (SITE_EMAIL != "") { // if no @ symbol use the global email address
			$username = input()->post("email") . SITE_EMAIL;
			auth()->login($username, input()->post("password"));	
		} else {
			$username = input()->post("email") . "@aptitudeit.net";
			auth()->login($username, input()->post("password"));	
		}
					
		if (auth()->valid()) {
			if (input()->path == '') {
				$this->redirect(auth()->getRecord()->homeURL());
			} else {
				$this->redirect(urldecode(input()->path));
			}
		} else {
			feedback()->error("You provided an invalid username or password.");
			if (input()->path == '') {
				$this->redirect(SITE_URL . "/?page=login");
			} else {
				$this->redirect(SITE_URL . "/?page=login&path=" . input()->path);
			}
		}
	}

	public function logout() {
		auth()->logout();
		$this->redirect(SITE_URL . "/?page=home");

	}


}