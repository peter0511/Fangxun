<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
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
            '技术' => 0, 
            '老板' => 1,
            '经理' => 2,
            '外勤' => 3,
        ),
        'text' => array(
            0 => '技术',
            1 => '老板',
            2 => '经理',
            3 => '外勤',
        ),
    ),
);
