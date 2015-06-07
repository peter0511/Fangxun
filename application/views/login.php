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
    <link rel="stylesheet" href="<?php echo static_url('css/font-awesome.css'); ?>">
    <link href="<?php echo static_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo static_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo static_url('img/favicon.png'); ?>">
</head>

<body>

<!-- Form area -->
<div class="admin-form">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Widget starts -->
                <div class="widget worange">
                    <!-- Widget head -->
                    <div class="widget-head">
                        <i class="icon-lock"></i>好吧,既然进来了就登陆吧.
                    </div>

                    <div class="widget-content">
                        <div class="padd">
                            <!-- Login form -->
                            <form class="form-horizontal">
                                <!-- Email -->
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputEmail">登录号</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="登陆号:如 刘鑫+001 或者 刘鑫+1383838438">
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputPassword">密&nbsp;&nbsp;&nbsp;码</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="你的密码,忘记了?没有找回密码,去找刘鑫吧!">
                                    </div>
                                </div>
                                <!-- Remember me checkbox and sign in button
                                <div class="form-group">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-9 col-lg-offset-2">
                                    <button type="submit" class="btn btn-danger">填好进去</button>
                                    <button type="reset" class="btn btn-default">重新填写</button>
                                </div>
                                <br>
                            </form>

                        </div>
                    </div>

                    <!--<div class="widget-foot">
                        Not Registred? <a href="#">Register here</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
