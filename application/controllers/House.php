<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {

	public function index() {
		$this->load->view('House/index');
        $this->load->view('Common/footer');
	}

	public function add() {
		$this->load->view('House/create');
        $this->load->view('Common/footer');
	}
}
