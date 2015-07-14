<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'identity' => 18,
    'house' => array(
        'code' => array(
            'weizu' => 0, 
            'yizu' => 1,
        ),
        'text' => array(
            0 => '尚未出租',
            1 => '已经出租',
        ),
    ),
    'decoration' => array(
        'code' => array(
            'jianzhuang' => 0, 
            'jinzhuang' => 1,
        ),
        'text' => array(
            0 => '简装修',
            1 => '精装修',
        ),
    ),
    'appliance' => array(
        'code' => array(
            'youjuwudian' => 0,
            'youjudian' => 1,
            'wujuwudian' => 2,
        ),
        'text' => array(
            0 => '有简单家具,无家电',
            1 => '有家具家电,拎包入住',
            2 => '无家具,无家电',
        ),
    ),
);
