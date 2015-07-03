<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends REAL_Controller {
    
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
            $this->Muser->set_current($user);
        }
    }
}
