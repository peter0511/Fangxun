<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">导航</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav" style="">
        <!-- Main menu with font awesome icon -->
        <li><a href="<?php echo site_url(); ?>" class="open"><i class="icon-home"></i> 首页</a>
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
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i>房源信息<span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="">
                <li><a href="<?php echo site_url('house'); ?>">房源列表</a></li>
                <li><a href="<?php echo site_url('house/add'); ?>">添加房源</a></li>
                <li><a href="#">备用</a></li>
                <!--<li><a href="support.html">帮助页</a></li>
                <li><a href="invoice.html">购物清单</a></li>
                <li><a href="profile.html">个人资料</a></li>
                <li><a href="gallery.html">相册页面</a></li>-->
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> 页面模块2  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul style="">
                <li><a href="media.html">媒体</a></li>
                <li><a href="statement.html">描述</a></li>
                <li><a href="error.html">错误</a></li>
                <li><a href="error-log.html">错误日志</a></li>
                <li><a href="calendar.html">日历</a></li>
                <li><a href="grid.html">网格</a></li>
            </ul>
        </li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i>图表</a></li>
        <li><a href="tables.html"><i class="icon-table"></i>表格</a></li>
        <li><a href="forms.html"><i class="icon-tasks"></i>表单</a></li>
        <li><a href="ui.html"><i class="icon-magic"></i>UI图标</a></li>
        <li><a href="calendar.html"><i class="icon-calendar"></i>日历</a></li>
    </ul>
</div>

<!-- Sidebar ends -->

