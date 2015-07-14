<div class="mainbar">

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
        <div class="pull-left">Tables</div>
        <div class="widget-icons pull-right">
            <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
            <a href="#" class="wclose"><i class="icon-remove"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="widget-content">

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>员工编号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>电话号码</th>
                <th>员工职务</th>
                <th>状态</th>
                <th>入职时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($user as $val): ?>
            <tr>
                <td><?php echo $val['id']; ?></td>
                <td><?php echo $val['name']; ?></td>
                <td><?php echo $val['sex']; ?></td>
                <td><?php echo $val['mobile']; ?></td>
                <td><?php echo $val['position']; ?></td>
                <td><span class="label <?php echo $val['status'] == '在职' ? 'label-success' : 'label-danger'; ?>"><?php echo $val['status']; ?></span></td>
                <td><?php echo $val['create']; ?></td>
                <td>
                    <button class="btn btn-xs btn-success"><i class="icon-ok"></i> </button>
                    <button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
                    <button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="widget-foot">


            <ul class="pagination pull-right">
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">Next</a></li>
            </ul>

            <div class="clearfix"></div>

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
