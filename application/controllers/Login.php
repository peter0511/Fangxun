<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends REAL_Controller {
    
	public function index() {
		$this->load->view('login');
	}
}
