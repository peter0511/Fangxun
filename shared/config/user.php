<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'is_mine' => array(
        'text' => array(
            0 => 'yes',
            1 => 'no',
        ),
        'code' => array(
            'yes' => 0,
            'no' => 1,
        ),
    ),
    'sex' => array(
        'code' => array(
            'nv' => 0,
            'nan' => 1,
        ),
        'text' => array(
            0 => '女',
            1 => '男',
        ),
    ),
    'yuangong' => array(
        'code'       => array(
            'zaizhi' => 0,
            'lizhi'  => 1,
        ),
        'text' => array(
            0  => '在职',
            1  => '离职',
        ),
    ),
    'education' => array(
        'code' => array(
            'benke'      => 0,
            'dazhuan'    => 1,
            'zhongzhuan' => 2,
            'gaozhong'   => 3,
            'chuzhong'   => 4,
            'xiaoxue'    => 5,
        ),
        'text' => array(
            0 => '本科',
            1 => '大专',
            2 => '中专',
            3 => '高中',
            4 => '初中',
            5 => '小学',
        ),
    ),
    'position' => array(
        'code' => array(
            'jishu' => 0, 
            'laoban' => 1,
            'quyuzongjian' => 2,
            'quyujinli' => 3,
            'fengongsijinli' => 4,
            'dianzhu' => 5,
            'zishengzhiyeguwen' => 6,
            'gaojizhiyeguwen' => 7,
            'zhongjizhiyeguwen' => 8,
            'chujizhiyeguwen' => 9,
            'jianxizhiyeguwen' => 10,
        ),
        'text' => array(
            0 => '技术',
            1 => '老板',
            2 => '区域总监',
            3 => '区域经理',
            4 => '分公司经理',
            5 => '店主',
            6 => '资深置业顾问',
            7 => '高级置业顾问',
            8 => '中级置业顾问',
            9 => '初级置业顾问',
            10 => '见习置业顾问',
        ),
    ),
);
