<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index() { 
        
		$this->load->view('User/index');
        $this->load->view('Common/footer');
	}

	public function add() {
        $status = C('status.yuangong.text');
        $education = C('status.education.text');
        $sex = C('status.sex.text');
        $position = C('status.position.text');
        $data['status'] = $status;
        $data['education'] = $education;
        $data['sex'] = $sex;
        $data['position'] = $position;

        
		$this->load->view('User/create',$data);
        $this->load->view('Common/footer');
	}
}
