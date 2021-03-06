<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    public $current_user = NULL;
    public $current_mobile = NULL;
    public $current_user_name = NULL;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array('MUser'));
        //$this->current_user = $this->CI->MUser->current();
    }

    public function login($user) {
        $this->CI->MUser->set_current($user);
    }

    public function logined() {
        $users = $this->CI->MUser->user_current();
        if ($users->status == C('user.yuangong.code.lizhi')) {
            redirect('login');
        }
        return $users;
    }
}
