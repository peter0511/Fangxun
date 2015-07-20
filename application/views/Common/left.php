<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">导航</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav" style="">
        <!-- Main menu with font awesome icon -->
        <li><a href="<?php echo site_url('xnfx'); ?>" class="open"><i class="icon-home"></i> 首页</a>
            <!-- Sub menu markup
            <ul>
              <li><a href="#">Submenu #1</a></li>
              <li><a href="#">Submenu #2</a></li>
              <li><a href="#">Submenu #3</a></li>
            </ul>-->
        </li>
        <li class="has_sub"><a href="#" class=""><i class="icon-list-alt"></i>员工信息<span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="display: none;">
                <li><a href="<?php echo site_url('user'); ?>">员工列表</a></li>
                <li><a href="<?php echo site_url('user/add'); ?>">添加员工</a></li>
                <li><a href="#">备用</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url('address'); ?>"><i class="icon-table"></i>添加新地址</a></li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i>租房信息<span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="">
                <li><a href="<?php echo site_url('house'); ?>">我的租房列表</a></li>
                <li><a href="<?php echo site_url('house/init'); ?>">所有租房列表</a></li>
                <li><a href="<?php echo site_url('house/add'); ?>">添加租房信息</a></li>
                <li><a href="#">备用</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i>售房信息<span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="">
                <li><a href="<?php echo site_url('family'); ?>">我的售房列表</a></li>
                <li><a href="<?php echo site_url('family/init'); ?>">所有售房列表</a></li>
                <li><a href="<?php echo site_url('family/add'); ?>">添加售房信息</a></li>
                <li><a href="#">备用</a></li>
            </ul>
        </li>
        <!--<li class="has_sub"><a href="#"><i class="icon-file-alt"></i> 页面模块2  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="">
                <li><a href="media.html">媒体</a></li>
                <li><a href="statement.html">描述</a></li>
                <li><a href="error.html">错误</a></li>
                <li><a href="error-log.html">错误日志</a></li>
                <li><a href="calendar.html">日历</a></li>
                <li><a href="grid.html">网格</a></li>
            </ul>
        </li>-->
        <li><a href="<?php echo site_url('landlord/index'); ?>"><i class="icon-table"></i>房东信息</a></li>
        <li><a href="#"><i class="icon-bar-chart"></i>租户信息</a></li>
        <li><a href="forms.html"><i class="icon-tasks"></i>订单信息</a></li>
        <li><a href="ui.html"><i class="icon-magic"></i>合同信息</a></li>
        <!--<li><a href="calendar.html"><i class="icon-calendar"></i></a></li>-->
    </ul>
</div>

<!--Sidebar ends -->

