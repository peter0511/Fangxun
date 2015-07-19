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
        'sale_code' => array(
            'weishou' => 2,
            'yishou' => 3,
        ),
        'sale_text' => array(
            2 => '尚未售出',
            3 => '已经出售',
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
    'property' => array(
        'text' => array(
            0 => '70年产权',
            1 => '50年产权',
            2 => '40年产权',
        ),
    ),
    'property_type' => array(
        'text' => array(
            0 => '商品房',
            1 => '商住两用房',
            2 => '经济适用房',
            3 => '公房',
        ),
    ),
    'house_type' => array(
        'text' => array(
            0 => '普通住房',
            1 => '公寓',
            2 => '别墅',
            3 => '平房',
        ),
    ),
    'structure' => array(
        'text' => array(
            0 => '板楼',
            1 => '塔楼',
            2 => '板塔结合',
        ),
    ),
);
