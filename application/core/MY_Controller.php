<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $this->load->library(array('Auth'));
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
        $data['user'] = $this->user->name;
        $this->load->helper('my_url');
        $this->load->view('Common/top', $data);
        $this->load->view('Common/left');
    }

    protected function _return_json($data) {
        echo json_encode($data);
        exit;
    }
}

class REAL_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form_helper', 'my_url'));
    }
}
