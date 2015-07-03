<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    public $current_user = NULL;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array('MUser'));
        $this->current_user = $this->CI->MUser->current();
    }
}
