<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title><?php //echo implode('-', array_reverse($title))?></title>
    <meta name="Keywords" content="<?php //echo implode(',', $meta_keywords)?>"/>
    <meta name="Description" content="<?php //echo $meta_desc?>"/>
    <!-- Stylesheets -->
    <link href="<?php echo static_url('css/bootstrap.css'); ?>" rel="stylesheet">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="<?php echo static_url('css/font-awesome.css'); ?>">
    <link href="<?php echo static_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo static_url('css/view.css'); ?>" rel="stylesheet">
    <script src="<?php echo static_url('js/jquery.js'); ?>"></script> <!-- jQuery -->
    <!-- jQuery UI -->
    <link rel="stylesheet" href="<?php //echo static_url('css/jquery-ui.css'); ?>">
    <!-- Calendar -->
    <link rel="stylesheet" href="<?php //echo static_url('css/fullcalendar.css'); ?>">
    <!-- prettyPhoto -->
    <link rel="stylesheet" href="<?php //echo static_url('css/prettyPhoto.css'); ?>">
    <!-- Star rating -->
    <link rel="stylesheet" href="<?php //echo static_url('css/rateit.css'); ?>">
    <!-- Date picker -->
    <link rel="stylesheet" href="<?php //echo static_url('css/bootstrap-datetimepicker.min.css'); ?>">
    <!-- CLEditor -->
    <link rel="stylesheet" href="<?php //echo static_url('css/jquery.cleditor.css'); ?>">
    <!-- Uniform -->
    <link rel="stylesheet" href="<?php //echo static_url('css/uniform.default.css'); ?>">
    <!-- Bootstrap toggle -->
    <link rel="stylesheet" href="<?php //echo static_url('css/bootstrap-switch.css'); ?>">
    <!-- Main stylesheet -->
</head>
<body>
<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
<div class="conjtainer">
    <!-- Menu button for smallar screens -->
    <div class="navbar-header">
        <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span>菜单</span>
        </button>
        <!-- Site name for smallar screens -->
        <a href="index.html" class="navbar-brand hidden-lg">首页</a>
    </div>
    <!-- Navigation starts -->
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
            <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
            <li class="dropdown dropdown-big">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><i class="icon-cloud-upload"></i></span><?php echo $user; ?>,欢迎回来!</a>
                <!-- Dropdown -->
            </li>
            <!-- Sync to server link -->
        </ul>
        <!-- Search form -->
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown pull-right">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="icon-user"></i> 管理员 <b class="caret"></b>
                </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> 资料</a></li>
                    <li><a href="#"><i class="icon-cogs"></i> 设置</a></li>
                    <li><a href="<?php echo site_url('Login/quit'); ?>"><i class="icon-off"></i> 退出</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
</div>
<header>
    <div class="container">
        <div class="row">

            <!-- Logo section -->
            <div class="col-md-4">
                <!-- Logo. -->
                <div class="logo">
                    <h1><a href="#">Mac<span class="bold"></span></a></h1>
                    <p class="meta">后台管理系统</p>
                </div>
                <!-- Logo ends -->
            </div>

            <!-- Button section -->
            <div class="col-md-4">

                <!-- Buttons -->
                <ul class="nav nav-pills">

                    <!-- Comment button with number of latest comments count -->
                    <li class="dropdown dropdown-big">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon-comments"></i> 聊天 <span class="label label-info">6</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <!-- Heading - h5 -->
                                <h5><i class="icon-comments"></i> 聊天</h5>
                                <!-- Use hr tag to add border -->
                                <hr>
                            </li>
                            <li>
                                <!-- List item heading h6 -->
                                <h6><a href="#">你好 :)</a> <span class="label label-warning pull-right">10:42</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <h6><a href="#">你怎么样?</a> <span class="label label-warning pull-right">20:42</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <h6><a href="#">你在干撒呢?</a> <span class="label label-warning pull-right">14:42</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <div class="drop-foot">
                                    <a href="#">查看所有</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- Message button with number of latest messages count-->
                    <li class="dropdown dropdown-big">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon-envelope-alt"></i> 收件箱 <span class="label label-primary">6</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <!-- Heading - h5 -->
                                <h5><i class="icon-envelope-alt"></i> 消息</h5>
                                <!-- Use hr tag to add border -->
                                <hr>
                            </li>
                            <li>
                                <!-- List item heading h6 -->
                                <h6><a href="#">你好啊?</a></h6>
                                <!-- List item para -->
                                <p>最近咋样啊...</p>
                                <hr>
                            </li>
                            <li>
                                <h6><a href="#">今天很好啊?</a></h6>
                                <p>相当好...</p>
                                <hr>
                            </li>
                            <li>
                                <div class="drop-foot">
                                    <a href="#">查看所有</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- Members button with number of latest members count -->
                    <li class="dropdown dropdown-big">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon-user"></i> 用户 <span class="label label-success">6</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <!-- Heading - h5 -->
                                <h5><i class="icon-user"></i> 用户</h5>
                                <!-- Use hr tag to add border -->
                                <hr>
                            </li>
                            <li>
                                <!-- List item heading h6-->
                                <h6><a href="#">Ravi Kumar</a> <span class="label label-warning pull-right">免费</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <h6><a href="#">Balaji</a> <span class="label label-important pull-right">高级</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <h6><a href="#">Kumarasamy</a> <span class="label label-warning pull-right">免费</span></h6>
                                <div class="clearfix"></div>
                                <hr>
                            </li>
                            <li>
                                <div class="drop-foot">
                                    <a href="#">查看所有</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

            <!-- Data section -->

            <div class="col-md-4">
                <div class="header-data">

                    <!-- Traffic data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i class="icon-signal bred"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#">7000</a> <em>访问</em></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!-- Members data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with blue background -->
                            <i class="icon-user bblue"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#">3000</a> <em>用户</em></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!-- revenue data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with green background -->
                            <i class="icon-money bgreen"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#">5000</a><em>订单</em></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>
