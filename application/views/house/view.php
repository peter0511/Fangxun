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
<div class="form-horizontal">
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3">房东姓名</label>
    <div class="col-lg-6">
        <div class="view-control">aaaaaa</div>
    </div>
</div>
<!-- Telephone -->
<div class="form-group">
    <label class="control-label col-lg-3">房东电话</label>
    <div class="col-lg-6">
        <div class="view-control">bbbb</div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东身份证</label>
    <div class="col-lg-6">
        <div class="view-control">cccc</div>
    </div>
</div>
<!-- Country -->
<div class="form-group">
    <label class="control-label col-lg-3">房源位置</label>
    <div class="col-lg-3">
        <div class="view-control">dddd</div>
    </div>
    <div class="col-lg-3">
        <div class="view-control">eeee</div>
    </div>
    <div class="col-lg-3">
        <div class="view-control">eeee</div>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-8">具体地址</label>
    <div class="col-lg-3">
        <div class="view-control">号楼</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">单元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">室</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-8">房源条件</label>
    <div class="col-lg-3">
        <div class="view-control">年代</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">朝向</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">楼层</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-8">房源户型</label>
    <div class="col-lg-2">
        <div class="view-control">室</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">厅</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">卫</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">平米</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东报价</label>
    <div class="col-lg-2">
        <div class="view-control">租金元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">长租最低价为元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">押金:元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-2">
        <div class="view-control">收取中介费:元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">装修状态</label>
    <div class="col-lg-6">
        <?php foreach ($decoration as $key => $value): ?>
        <input type="radio" name="decoration" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">家电情况</label>
    <div class="col-lg-6">
        <?php foreach ($appliance as $key => $value): ?>
        <input type="radio" name="appliance" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- City -->
<div class="form-group">
    <label class="control-label col-lg-3">其余备注</label>
    <div class="col-lg-6">
        <textarea class="view-control"  name="condition" placeholder="如小区环境,门口公交"></textarea>
    </div>
</div>
<!--<div class="form-group">
    <label class="control-label col-lg-3">房源照片</label>
    <div class="col-lg-6">
        <input type="file" class="view-control" name="telephone">
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
</div>
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
