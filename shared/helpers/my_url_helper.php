<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *自定义helper文件
 */
if ( ! function_exists('static_url')) { 
    function static_url($uri = '', $timestamp = '') {
        static $s_base_url;
        if( ! $s_base_url) {
            $ci =& get_instance();
            $ci->load->config('my_url');
            $static_arr = $ci->config->item('static_url');
            $s_base_url = '';
            $static_sum = array_sum($static_arr);
            foreach ($static_arr as $url => $static_num) {
                $rand_num = mt_rand(1, $static_sum);
                if ($rand_num <= $static_num) {
                    $s_base_url = rtrim($url, '/') . '/';
                    break;
                } else {
                    $static_sum -= $static_num;
                }
            }
        }
        return $s_base_url . $uri . ( ! empty($timestamp) ? "?$timestamp" : '');
    }
}

if ( ! function_exists('C')) {
    // read config
    function C($config_path) {
        $CI =& get_instance();
        $keys = explode('.', trim($config_path, '.')); 
        $config = array_shift($keys);
        $CI->load->config($config, TRUE);
        $config = $CI->config->item($config);
        while(!is_null($key = array_shift($keys))) {
            if(is_array($config) && array_key_exists($key, $config)) {
                $config = $config[$key];
            } else {
                trigger_error('Config read error : ' . $config_path);
                return FALSE;
            }
        }
        return $config;
    }
}
