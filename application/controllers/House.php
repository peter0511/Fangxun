<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
    protected $user;
    public function __construct() {
        parent::__construct();
        $this->load->Model(array('Mlocation'));
        $this->load->library('Auth');
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('House/index');
        $this->load->view('Common/footer');
	}

	public function add() {
		$this->load->view('House/create');
        $this->load->view('Common/footer');
	}

	public function address() {
        //$a = $this->MLocation->count('1');
		$this->load->view('House/address');
        $this->load->view('Common/footer');
	}
}
