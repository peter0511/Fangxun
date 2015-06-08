<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xnfx extends MY_Controller {

	public function index() {
		$this->load->view('Index');
        $this->load->view('Common/footer');
	}
}
