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
    <div class="pull-left"><span class="label label-danger"><?php echo isset($statuss) ? $statuss : '新建';?></span> 的房源 <span class="label label-info"><?php echo isset($id) ? $id.'号' : ''; ?></span></div>
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
<form class="form-horizontal add" data-url="house">
<!-- Name -->
<div class="form-group">
    <label class="control-label col-lg-3">房东姓名</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="房东的姓名,你不会不知道吧">
    </div>
</div>
<!-- Telephone -->
<div class="form-group">
    <label class="control-label col-lg-3">房东电话</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="mobile" value="<?php echo isset($mobile) ? $mobile : ''; ?>" placeholder="房东的电话">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东身份证</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="identity" value="<?php echo isset($identity) ? $identity : ''; ?>" maxlength=18 placeholder="身份证号应该是18位对不!">
    </div>
</div>
<!-- Country -->
<div class="form-group">
    <label class="control-label col-lg-3">房源位置</label>
    <div class="col-lg-3">
    <select class="form-control town" name="town">
        <option value="<?php echo isset($tow) ? $tow->id : '';?>"><?php echo isset($tow) ? $tow->name : ' --- 市区 --- ';?></option>
        <?php foreach($town as $val): ?>
        <option value="<?php echo $val['id']; ?>" class="true"><?php echo $val['name']; ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="col-lg-3">
        <select class="form-control street" name="street">
            <option value="<?php echo isset($stree) ? $stree->id : ''; ?>" disabled><?php echo isset($stree) ? $stree->name : ' -- 街道,没有就去添加地址页面添加-- '?></option>
        </select>
    </div>
    <div class="col-lg-3">
        <select class="form-control community" name="community">
            <option value="<?php echo isset($communit) ? $communit->id : ''?>" disabled><?php echo isset($communit) ? $communit->name : ' -- 小区,没有就去添加地址页面添加-- '; ?></option>
        </select>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-8">具体地址</label>
    <div class="col-lg-8">
        <input type="text" class="filterinput" name="build" value="<?php echo isset($build) ? $build : ''; ?>" placeholder="仅可用阿拉伯数字">号楼&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="element" value="<?php echo isset($element) ? $build : ''; ?>" placeholder="仅可用阿拉伯数字">单元&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="house" value="<?php echo isset($hous) ? $hous : ''; ?>" placeholder="仅可用阿拉伯数字">室
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-8">房源条件</label>
    <div class="col-lg-8">
        <input type="text" class="filterinput" name="birth" value="<?php echo isset($birth) ? $birth : ''; ?>">年代&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="orientation" value="<?php echo isset($orientation) ? $orientation : ''; ?>" placeholder="坐北朝南,坐南朝北">朝向&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="storey" value="<?php echo isset($storey) ? $storey : ''; ?>" placeholder="5/12,必须按此格式来填写楼层!">楼层
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-8">房源户型</label>
    <div class="col-lg-8">
        <input type="text" class="filterinput" name="room" value="<?php echo isset($room) ? $room : ''; ?>" placeholder="仅可用阿拉伯数字">室&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="hall" value="<?php echo isset($hall) ? $hall : '';?>" placeholder="仅可用阿拉伯数字">厅&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="toilet" value="<?php echo isset($toilet) ? $toilet : ''; ?>" placeholder="仅可用阿拉伯数字">卫&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="area" value="<?php echo isset($area) ? $area : ''; ?>" placeholder="仅可用阿拉伯数字">平米
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东报价</label>
    <div class="col-lg-12">
        租金:<input type="text" style=""class="filterinput" name="h_expect" value="<?php echo isset($h_expect) ? $h_expect : ''; ?>" placeholder="仅可用阿拉伯数字">元&nbsp;&nbsp;&nbsp;&nbsp;
        长租最低价:<input type="text" class="filterinput" name="d_expect" value="<?php echo isset($d_expect) ? $d_expect : ''; ?>" placeholder="仅可用阿拉伯数字">元&nbsp;&nbsp;&nbsp;&nbsp;
        押金:<input type="text" class="filterinput" name="deposit" value="<?php echo isset($deposit) ? $deposit : ''; ?>" placeholder="仅可用阿拉伯数字">元&nbsp;&nbsp;&nbsp;&nbsp;
        我们收取的中介费:<input type="text" class="filterinput" name="cash" value="<?php echo isset($cash) ? $cash : ''; ?>" placeholder="仅可用阿拉伯数字">元
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">装修状态</label>
    <div class="col-lg-12">
        <?php if(isset($decoratio)): ?><div class="col-lg-2">你已选择:<?php echo $decoratio; ?></div><?php endif; ?>
        <?php foreach ($decoration as $key => $value): ?>
        <input type="radio" name="decoration" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">家电情况</label>
    <div class="col-lg-12">
        <?php if(isset($applianc)): ?><div class="col-lg-2">你已选择:<?php echo $applianc; ?></div><?php endif; ?>
        <?php foreach ($appliance as $key => $value): ?>
        <input type="radio" name="appliance" value="<?php echo $key; ?>"><?php echo $value; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php endforeach; ?>
    </div>
</div>
<!-- City -->
<div class="form-group">
    <label class="control-label col-lg-3">其余备注</label>
    <div class="col-lg-6">
        <textarea class="form-control"  name="condition" placeholder="如小区环境,门口公交"><?php echo isset($condition) ? $condition : ''; ?></textarea>
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
        <a class="btn btn-success success" data-id="<?php echo isset($id) ? $id : ''; ?>">确定录入了</a>
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
<script src="<?php echo static_url('js/select_address.js'); ?>"></script> 
