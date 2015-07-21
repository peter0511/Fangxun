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
                <th>#</th>
                <th>房东姓名</th>
                <th>房东联络人</th>
                <th>房东电话</th>
                <th>房东身份证号</th>
                <th>房东地址</th>
                <th>租or售</th>
                <th>房东房源地址</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($landlord as $val): ?>
            <tr>
                <td><?php echo $val['id']; ?></td>
                <td><?php echo $val['name']; ?></td>
                <td><?php echo $val['user']; ?></td>
                <td><?php echo $val['mobile']; ?></td>
                <td><?php echo $val['identity']; ?></td>
                <td><?php echo $val['site']; ?></td>
                <td><?php echo $val['type']; ?></td>
                <td><?php echo $val['house']; ?></td>
                <!--<td><span class="label <?php echo $val['status'] == '在职' ? 'label-success' : 'label-danger'; ?>"><?php echo $val['status']; ?></span></td>
                <td><?php echo $val['create']; ?></td>
                <td>
                    <button class="btn btn-xs btn-success"><i class="icon-ok"></i> </button>
                    <button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
                    <button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button>
                </td>-->
            </tr>
            <?php endforeach; ?>
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
