<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends REAL_Controller {
    
    function __construct() {
        parent::__construct();
    }

	public function index() {
		$this->load->view('login');
	}

    public function verify() {
        $this->load->model('Muser');
        $this->load->library(array('form_validation', 'encrypt'));
        $name = $this->input->post('name', TRUE);
        $pass = $this->input->post('pass', TRUE);
        $user = $this->Muser->get_byo('username', $name);
        $passs = $this->encrypt->decode($user->password);
        $password = sha1($pass);
        if ($passs == $password) {
            $this->auth->login($user);
        }else{
            redirect('login');
        }
    }

    public function quit() {
        $this->load->helper('cookie');
        $this->session->sess_destroy();
        delete_cookie('uid');
        delete_cookie('name');
        delete_cookie('position');
        delete_cookie('status');
        delete_cookie('last_time');
        redirect('home');
    }
}
