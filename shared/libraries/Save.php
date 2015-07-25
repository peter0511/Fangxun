<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save {

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array('MHouse'));
    }

}
