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
        <input type="text" class="form-control" name="site" maxlength=18 placeholder="房东家庭住址知道,对你以后回访有好处的哦!">
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
            <option value="" disabled> --- 小区,如果没有找到.去添加地址页面添加 --- </option>
        </select>
    </div>
</div>
<!-- Address -->
<div class="form-group">
    <label class="control-label col-lg-8">具体地址</label>
    <div class="col-lg-12">
        <input type="text" style=""class="filterinput" name="build" placeholder="仅可用阿拉伯数字">号楼&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="element" placeholder="仅可用阿拉伯数字">单元&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="house" placeholder="仅可用阿拉伯数字">室&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<!-- State -->
<div class="form-group">
    <label class="control-label col-lg-8">房源条件</label>
    <div class="col-lg-12">
        <input type="text" class="filterinput" name="birth" placeholder="建筑年代">年代&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="orientation" placeholder="坐北朝南,坐南朝北">朝向&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="storey" placeholder="5/12">楼层
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-8">房源户型</label>
    <div class="col-lg-12">
        <input type="text" style=""class="filterinput" name="room" placeholder="仅可用阿拉伯数字">室&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="hall" placeholder="仅可用阿拉伯数字">厅&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="toilet" placeholder="仅可用阿拉伯数字">卫&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="filterinput" name="j_area" placeholder="建筑面积">平米
        <input type="text" class="filterinput" name="area" placeholder="实际面积">平米
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">产权</label>
    <div class="col-lg-2">
        <select class="form-control" name="property">
            <option value="" class="true"> -- 请选择产权年限 -- </option>
            <?php foreach($property as $key => $val): ?>
            <option value="<?php echo $key; ?>" class="true"><?php echo $val; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-lg-2">
        <select class="form-control" name="property_type">
            <option value="" class="true"> -- 请选择产权类型 -- </option>
            <?php foreach($property_type as $key => $val): ?>
            <option value="<?php echo $key; ?>" class="true"><?php echo $val; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-lg-2">
        <select class="form-control" name="house_type">
            <option value="" class="true"> -- 请选择建筑类型 -- </option>
            <?php foreach($house_type as $key => $val): ?>
            <option value="<?php echo $key; ?>" class="true"><?php echo $val; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-lg-2">
        <select class="form-control" name="structure">
            <option value="" class="true"> -- 请选择建筑结构 -- </option>
            <?php foreach($structure as $key => $val): ?>
            <option value="<?php echo $key; ?>" class="true"><?php echo $val; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-lg-3">房东报价</label>
    <div class="col-lg-12">
        <input type="checkbox" name="loan" value="1" />可以贷款&nbsp;&nbsp;&nbsp;&nbsp;
        总价:<input type="text" class="filterinput" name="d_expect" placeholder="仅可用阿拉伯数字">元&nbsp;&nbsp;&nbsp;&nbsp;
        我们收取的中介费:<input type="text" class="filterinput" name="cash" placeholder="仅可用阿拉伯数字">元
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
        <textarea class="form-control"  name="condition" placeholder="如小区环境,门口公交"></textarea>
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
<script src="<?php echo static_url('js/family.js'); ?>"></script> 
