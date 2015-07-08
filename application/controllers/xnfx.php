<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xnfx extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Auth');
        $user = $this->auth->logined();
        if (!isset($user['uid'])) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('Index');
        $this->load->view('Common/footer');
	}
}
