<!DOCTYPE>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo static_url('css/Login_style.css'); ?>" />
</head>
<body>
<h2 align="center">SenPng 修改制作</h2>
<div class="login_frame"></div>
<div class="LoginWindow">
    <div>
        <?php echo form_open('Login/verify', array('class' => 'login', 'onsubmit' => 'return user_input()')); ?>
            <p>
                <label for="login">帐号:</label>
                <input type="text" name="name" class="name" value="">
            </p>

            <p>
                <label for="password">密码:</label>
                <input type="password" name="pass" class="pass" value="">
            </p>

            <p class="login-submit">
                <button type="submit" class="login-button">登录</button>
            </p>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript" src="<?php echo static_url('js/Login_javascript.js'); ?>"></script>
<div id="timeArea"><script> LoadBlogParts();</script></div>

<div style="text-align:center;">
    <p>来源:<a href="###" target="_blank">Peter丶攀 之手</a></p>
</div>

</body>
</html>
