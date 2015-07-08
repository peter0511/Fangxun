<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    public $current_user = NULL;
    public $current_mobile = NULL;
    public $current_user_name = NULL;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array('Muser'));
        //$this->current_user = $this->CI->MUser->current();
    }

    public function login($user) {
        $this->CI->Muser->set_current($user);
    }

    public function logined() {
        return $this->CI->Muser->user_current();
    }


}
