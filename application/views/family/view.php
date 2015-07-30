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
    <div class="pull-left"><span class="label label-danger"><?php echo $status; ?></span> 的房源 <span class="label label-info"><?php echo $id; ?></span>号</div>
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
<div class="form-horizontal add" data-url="family">
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3">房东姓名</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $landlord; ?></div>
    </div>
</div>
<!-- Telephone -->
<div class="form-group">
    <label class="control-label col-lg-3">房东电话</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $mobile; ?></div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东身份证</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $identity; ?></div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东住址</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $site; ?></div>
    </div>
</div>
<!-- Country -->
<div class="form-group">
    <label class="control-label col-lg-3">房源位置</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $location; ?></div>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-8">具体地址</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $address; ?></div>
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-8">房源条件</label>
    <div class="col-lg-3">
        <div class="view-control"><?php echo $birth; ?> 年</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">朝向: <?php echo $orientation; ?></div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">楼层: <?php echo $storey; ?></div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-8">房源户型</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $house_type; ?></div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">产权</label>
    <div class="col-lg-2">
        <div class="view-control">产权年限:<?php echo $property; ?></div>
    </div>
    <div class="col-lg-2">
        <div class="view-control">产权类型:<?php echo $property_type; ?></div>
    </div>
    <div class="col-lg-2">
        <div class="view-control">建筑类型:<?php echo $house_status; ?></div>
    </div>
    <div class="col-lg-2">
        <div class="view-control">建筑结构:<?php echo $structure; ?></div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东报价</label>
    <div class="col-lg-3">
        <div class="view-control"><?php if($loan): ?>可以贷款<?php endif; ?></div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">总价: <?php echo $d_expect; ?>万元</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-lg-3">
        <div class="view-control">我们收取: <?php echo $cash; ?>元中介费</div>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">装修状态</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $decoration; ?></div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">家电情况</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $appliance; ?></div>
    </div>
</div>
<!-- City -->
<div class="form-group">
    <label class="control-label col-lg-3">其余备注</label>
    <div class="col-lg-6">
        <div class="view-control"><?php echo $condition; ?></div>
    </div>
</div>
<!-- Buttons -->
<div class="form-group">
    <!-- Buttons -->
    <div class="col-lg-6 col-lg-offset-1">
        <?php if($statuss == C('house.house.sale_code.weishou')): ?>
        <button class="btn btn-success edit" data-val="<?php echo C('house.house.sale_code.yishou'); ?>">已经售出,填写合同编号</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endif; ?>
        <a class="btn btn-default">修改</a>
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
<script src="<?php echo static_url('js/house.js'); ?>"></script> 
