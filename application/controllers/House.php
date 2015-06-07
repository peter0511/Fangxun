<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
    public function __construct() {
        parent::__construct();
        //$this->load->library(array('AppSecurity', 'YmtMemcached', 'Crawl'));
        $this->load->Model(array('Mlocation'));
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
        //echo '<pre>'; var_dump($a); echo '</pre>'; die();
		$this->load->view('House/address');
        $this->load->view('Common/footer');
	}
}
