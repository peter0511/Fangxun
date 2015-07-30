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
<!-- Country -->
<div class="form-group">
    <label class="control-label col-lg-3">城区</label>
    <div class="col-lg-6">
    <select class="form-control town" name="town">
        <option value=""> --- 请选择城区 --- </option>
        <?php foreach($town as $val): ?>
        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
        <?php endforeach; ?>
    </select>
    </div>
</div>
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3" >街道</label>
    <div class="col-lg-6">
    <select class="form-control street" name="street" disabled>
        <option value=""> --- 请选择街道,如果没有你要的街道,请点我 --- </option>
        <option value=""> --- 请选择街道,如果没有你要的街道,请点我 --- </option>
    </select>
    <input type="hidden" class="form-control" placeholder="请填写没有的街道">
    </div>
</div>
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3" >社区</label>
    <div class="col-lg-6">
        <input type="text" class="form-control community" name="community" placeholder="请填写没有的社区" disabled>
    </div>
</div>
<!-- Buttons -->
<div class="form-group">
    <!-- Buttons -->
    <div class="col-lg-6 col-lg-offset-1">
        <a type="submit" class="btn btn-success">嗯,就这样了</a>
        <button type="reset" class="btn btn-default">不行重写吧</button>
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
<script src="<?php echo static_url('js/address.js'); ?>"></script> 
