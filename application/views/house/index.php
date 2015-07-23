<div class="mainbar">
<style type="text/css">
.widget-foot>a{
    position: relative;
    float: right;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    border: 1px solid #ddd;
}
</style>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="icon-table"></i> Tables</h2>

    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="icon-home"></i> Home</a>
        <!-- Divider -->
        <span class="divider">/</span>
        <a href="#" class="bread-current">Dashboard</a>
    </div>

    <div class="clearfix"></div>

</div>
<!-- Page heading ends -->

<!-- Matter -->

<div class="matter">
<div class="container">

<!-- Table -->

<div class="row">

<div class="col-md-12">

<div class="widget">

    <div class="widget-head">
        <div class="pull-left">我的房源</div>
        <div class="widget-icons pull-right">
            <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
            <a href="#" class="wclose"><i class="icon-remove"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="widget-content">

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <?php if(!empty($house)): ?>
            <tr>
                <th>#</th>
                <th>负责人</th>
                <th>房源位置</th>
                <th>房源户型</th>
                <th>租金</th>
                <th>装修状况</th>
                <th>家电情况</th>
                <th>楼层</th>
                <th>录入时间</th>
                <th>状态</th>
                <?php if(isset($is_mine) && $is_mine == C('user.is_mine.code.yes')): ?>
                <th>操作</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($house as $val): ?>
            <tr>
                <td><?php echo $val['id']; ?></td>
                <td><?php echo $val['user']; ?></td>
                <td><?php echo $val['location']; ?></td>
                <td><?php echo $val['type']; ?></td>
                <td><?php echo $val['expect']; ?></td>
                <td><?php echo $val['decoration']; ?></td>
                <td><?php echo $val['appliance']; ?></td>
                <td><?php echo $val['storey']; ?></td>
                <td><?php echo $val['time']; ?></td>
                <td><span class="label <?php echo $val['status'] == '已经出租' ? 'label-success' : 'label-danger'; ?>"><?php echo $val['status']; ?></span></td>
                <?php if(isset($is_mine) && $is_mine == C('user.is_mine.code.yes')): ?>
                <td>
                    <a class="btn btn-xs btn-success" href="<?php echo site_url('house/view/'.$val['id']); ?>">aa</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach;else: ?>
            <tr>你新来的同事?还没有传过数据吧!</tr>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="widget-foot">
            <?php echo $pager; ?>
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
