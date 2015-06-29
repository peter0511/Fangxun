<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    protected $app_uid;
    protected $app_id;
    protected $app_version;
    public function __construct() {
        parent::__construct();
        $this->load->helper('my_url');
        $this->load->view('Common/top');
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
        $this->load->helper('form_helper');
        $this->load->helper('my_url');
    }
}
