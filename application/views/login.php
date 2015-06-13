<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="">
    <meta name="author" content="">
    <!-- Stylesheets -->
    <link href="<?php echo static_url('css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo static_url('css/style.css'); ?>" rel="stylesheet">
</head>
<body>
<div class="admin-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget worange">
                    <div class="widget-head">
                        <i class="icon-lock"></i>好吧,既然进来了就登陆吧.
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                                <?php echo form_open('login', array('id' => 'login_form', 'class' => 'form-horizontal')); ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputEmail">登录号</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control username" placeholder="如刘鑫登陆,输入001+1383838438 注意: + 也要有哦">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputPassword">密&nbsp;&nbsp;&nbsp;码</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control Password" placeholder="你的密码,忘记了?没有找回密码,去找刘鑫吧!">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-lg-offset-2">
                                    <a type="submit" class="btn btn-danger btn-submit">填好进去</a>
                                    <button  type="reset" class="btn btn-default">重新填写</button>
                                </div>
                                <br>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo static_url('js/jquery.js'); ?>"></script>
<script src="<?php echo static_url('js/our/login.js'); ?>"></script>
</html>
