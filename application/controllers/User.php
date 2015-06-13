<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index() { 
        
		$this->load->view('User/index');
        $this->load->view('Common/footer');
	}

	public function add() {

        
		$this->load->view('User/create');
        $this->load->view('Common/footer');
	}
}
