<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends REAL_Controller {

	public function index() {
		$this->load->view('first');
	}
}
