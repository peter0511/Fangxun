<div class="mainbar">

<!-- Page heading -->
<div class="page-head">
    <!-- Page heading -->
    <h2 class="pull-left">Profile
        <!-- page meta -->
        <span class="page-meta">Something Goes Here</span>
    </h2>


    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="icon-home"></i> Home</a>
        <!-- Divider -->
        <span class="divider">/</span>
        <a href="#" class="bread-current">Profile</a>
    </div>

    <div class="clearfix"></div>

</div>
<!-- Page heading ends -->
<!-- Matter -->
<div class="matter">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="widget wred">
<div class="widget-head">
    <div class="pull-left">Profile</div>
    <div class="widget-icons pull-right">
        <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
        <a href="#" class="wclose"><i class="icon-remove"></i></a>
    </div>
    <div class="clearfix"></div>
</div>
<div class="widget-content">
<div class="padd">
<!-- Profile form -->
<div class="form profile">
<!-- Edit profile form (not working)-->
<?php echo form_open('', array('autocomplete' => 'on', 'class' => 'form-horizontal')); ?>
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3">员工ID</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">登陆账号</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="username">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">员工姓名</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="name">
    </div>
</div>
<!-- Password -->
<div class="form-group">
    <label class="control-label col-lg-3">员工密码</label>
    <div class="col-lg-6">
        <input type="password" class="form-control" name="password" maxlength=16>
    </div>
</div>
<!-- Email -->
<div class="form-group">
    <label class="control-label col-lg-3">出生日期</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="age" placeholder="格式:2014-12-20">
    </div>
</div>
<!-- Telephone -->
<div class="form-group">
    <label class="control-label col-lg-3">员工性别</label>
    <div class="col-lg-6">
        <?php foreach ($sex as $ke => $va): ?>
        <input type="radio" name="sex" value="<?php echo $ke; ?>"><?php echo $va; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-3">员工籍贯</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="native">
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-3">员工电话</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="mobile">
    </div>
</div>
<!-- City -->
<div class="form-group">
    <label class="control-label col-lg-3">员工学历</label>
    <div class="col-lg-6">
        <?php foreach ($education as $k => $v): ?>
        <input type="radio" name="education" value="<?php echo $k; ?>"><?php echo $v; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- Username -->
<div class="form-group">
    <label class="control-label col-lg-3">员工身份证</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="identity" maxlength=18>
    </div>
</div>
<!-- Email -->
<div class="form-group">
    <label class="control-label col-lg-3">家庭地址</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="address">
    </div>
</div>
<!-- Email -->
<div class="form-group">
    <label class="control-label col-lg-3">应急电话</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="phone">
    </div>
</div>
<!-- Email -->
<div class="form-group">
    <label class="control-label col-lg-3">员工职位</label>
    <div class="col-lg-6">
        <?php foreach ($position as $kk => $vv): ?>
        <input type="radio" name="position" value="<?php echo $kk; ?>"><?php echo $vv; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- Email -->
<div class="form-group">
    <label class="control-label col-lg-3">员工状态</label>
    <div class="col-lg-6">
        <?php foreach ($status as $key => $value): ?>
        <input type="radio" name="status" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- City -->
<!--<div class="form-group">
    <label class="control-label col-lg-3">员工照片</label>
    <div class="col-lg-6">
        <input type="file" class="form-control" name="avatar">
    </div>
</div>-->
<!-- Checkbox -->
<div class="form-group">
    <div class="col-lg-6 col-lg-offset-1">
        <label class="checkbox inline"><input type="checkbox" name="agree" value="agree">确定了哦!怕你看不到,再问一遍,你真的确定了啊!!</label>
    </div>
</div>

<!-- Buttons -->
<div class="form-group">
    <!-- Buttons -->
    <div class="col-lg-6 col-lg-offset-1">
        <a type="submit" class="btn btn-success" href="##">嗯 就这样</a>
        <button type="reset" class="btn btn-default">错 我要改</button>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Matter ends -->
</div>
<div class="clearfix"></div>
<script src="<?php echo static_url('js/my.js'); ?>"></script>
