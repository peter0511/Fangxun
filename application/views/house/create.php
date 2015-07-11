<div class="mainbar">

<!-- Page heading -->
<div class="page-head">
    <!-- Page heading -->
    <h2 class="pull-left">西宁
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
<form class="form-horizontal">
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3">房东姓名</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="name" placeholder="房东的姓名,你不会不知道吧">
    </div>
</div>
<!-- Telephone -->
<div class="form-group">
    <label class="control-label col-lg-3">房东电话</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="mobile" placeholder="房东的电话">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东身份证</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="identity" maxlength=18 placeholder="身份证号应该是18位对不!">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东地址</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="site" placeholder="哪个区哪条街哪个小区几号楼几单元几室">
    </div>
</div>
<!-- Country -->
<div class="form-group">
    <label class="control-label col-lg-3">房源位置</label>
    <div class="col-lg-3">
    <select class="form-control town" name="town">
        <option value=""> --- 市区 --- </option>
        <?php foreach($town as $val): ?>
        <option value="<?php echo $val['id']; ?>" class="true"><?php echo $val['name']; ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="col-lg-3">
        <select class="form-control street" name="street">
            <option value="" disabled> --- 街道,如果没有到.去添加地址页面添加 --- </option>
        </select>
    </div>
    <div class="col-lg-3">
        <select class="form-control community" name="community">
            <option value="" disabled> --- 社区,如果没有到.去添加地址页面添加 --- </option>
        </select>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-3">具体地址</label>
    <div class="col-lg-6">
        <textarea class="form-control" name="address" placeholder="仅仅需要几号楼几单元几室"></textarea>
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-3">房东期望价</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="expect" placeholder="仅仅需要写多少元,不需要单位元">
    </div>
</div>
<!-- City -->
<div class="form-group">
    <label class="control-label col-lg-3">房屋条件</label>
    <div class="col-lg-6">
        <textarea class="form-control"  name="condition" placeholder="房屋条件,精装简装,是否有卫生间厨房,是否有家具,诸如此类"></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房源状态</label>
    <div class="col-lg-6">
        <?php foreach ($house as $key => $value): ?>
        <input type="radio" name="status" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!--<div class="form-group">
    <label class="control-label col-lg-3">房源照片</label>
    <div class="col-lg-6">
        <input type="file" class="form-control" name="telephone">
    </div>
</div>-->
<div class="form-group">
    <div class="col-lg-6 col-lg-offset-1">
        <label class="checkbox inline"><input type="checkbox" name="agree" value="agree">确定了哦!怕你看不到,再问一遍,你真的确定了啊!!</label>
    </div>
</div>
<!-- Buttons -->
<div class="form-group">
    <!-- Buttons -->
    <div class="col-lg-6 col-lg-offset-1">
        <a type="submit" class="btn btn-success">确定录入了</a>
        <button type="reset" class="btn btn-default">不对重写吧</button>
    </div>
</div>
</form>
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
<script src="<?php echo static_url('js/house.js'); ?>"></script> 
