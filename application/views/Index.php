<!-- Main bar -->
<div class="mainbar">

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="icon-home"></i> 首页</h2>

    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="icon-home"></i> 首页</a>
        <!-- Divider -->
        <span class="divider">/</span>
        <a href="#" class="bread-current">控制台</a>
    </div>

    <div class="clearfix"></div>

</div>
<!-- Page heading ends -->



<!-- Matter -->

<div class="matter">
<div class="container">

<!-- Today status. jQuery Sparkline plugin used. -->

<div class="row">
    <div class="col-md-12">
        <!-- List starts -->
        <ul class="today-datas">
            <!-- List #1 -->
            <li>
                <!-- Graph -->
                <div><span id="todayspark1" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                <!-- Text -->
                <div class="datas-text">12,000 visitors/day</div>
            </li>
            <li>
                <div><span id="todayspark2" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                <div class="datas-text">30,000 Pageviews</div>
            </li>
            <li>
                <div><span id="todayspark3" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                <div class="datas-text">15.66% Bounce Rate</div>
            </li>
            <li>
                <div><span id="todayspark4" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                <div class="datas-text">$12,000 Revenue/Day</div>
            </li>
            <li>
                <div><span id="todayspark5" class="spark"><canvas width="250" height="30" style="display: inline-block; width: 250px; height: 30px; vertical-align: top;"></canvas></span></div>
                <div class="datas-text">15,000000 visitors till date</div>
            </li>
        </ul>
    </div>
</div>

<!-- Today status ends -->

<!-- Dashboard Graph starts -->

<div class="row">
    <div class="col-md-8">

        <!-- Widget -->
        <div class="widget">
            <!-- Widget head -->
            <div class="widget-head">
                <div class="pull-left">图表</div>
                <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- Widget content -->
            <div class="widget-content">
                <div class="padd">

                    <!-- Curve chart (Blue color). jQuery Flot plugin used. -->
                    <div id="curve-chart" style="padding: 0px; position: relative;"><canvas class="base" width="744" height="250"></canvas><canvas class="overlay" width="744" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:center;left:-20px;top:228px;width:93px">0</div><div class="tickLabel" style="position:absolute;text-align:center;left:85px;top:228px;width:93px">2</div><div class="tickLabel" style="position:absolute;text-align:center;left:191px;top:228px;width:93px">4</div><div class="tickLabel" style="position:absolute;text-align:center;left:297px;top:228px;width:93px">6</div><div class="tickLabel" style="position:absolute;text-align:center;left:403px;top:228px;width:93px">8</div><div class="tickLabel" style="position:absolute;text-align:center;left:508px;top:228px;width:93px">10</div><div class="tickLabel" style="position:absolute;text-align:center;left:614px;top:228px;width:93px">12</div></div><div class="yAxis y1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:right;top:194px;right:723px;width:21px">-1.0</div><div class="tickLabel" style="position:absolute;text-align:right;top:148px;right:723px;width:21px">-0.5</div><div class="tickLabel" style="position:absolute;text-align:right;top:103px;right:723px;width:21px">0.0</div><div class="tickLabel" style="position:absolute;text-align:right;top:57px;right:723px;width:21px">0.5</div><div class="tickLabel" style="position:absolute;text-align:right;top:11px;right:723px;width:21px">1.0</div></div></div><div class="legend"><div style="position: absolute; width: 50px; height: 48px; top: 9px; right: 9px; opacity: 0.85; background-color: rgb(255, 255, 255);"> </div><table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(30,175,237);overflow:hidden"></div></div></td><td class="legendLabel">sin(x)</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(30,175,237);overflow:hidden"></div></div></td><td class="legendLabel">cos(x)</td></tr></tbody></table></div></div>

                    <hr>
                    <!-- Hover location -->
                    <div id="hoverdata">Mouse hovers at
                        (<span id="x">-4.35</span>, <span id="y">1.22</span>). <span id="clickdata"></span></div>

                    <!-- Skil this line. <div class="uni"><input id="enableTooltip" type="checkbox">Enable tooltip</div> -->

                </div>
            </div>
            <!-- Widget ends -->

        </div>
    </div>

    <div class="col-md-4">

        <div class="widget">

            <div class="widget-head">
                <div class="pull-left">今天统计</div>
                <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="widget-content">
                <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                        <li>
                            <span id="status1"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Visits : 2000</span>
                        </li>
                        <li>
                            <span id="status2"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Unique Visitors : 1,345</span>
                        </li>
                        <li>
                            <span id="status3"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Pageviews : 2000</span>
                        </li>
                        <li>
                            <span id="status4"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Pages / Visit : 2000</span>
                        </li>
                        <li>
                            <span id="status5"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Avg. Visit Duration : 2000</span>
                        </li>
                        <li>
                            <span id="status6"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Bounce Rate : 2000</span>
                        </li>
                        <li>
                            <span id="status7"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">% New Visits : 2000</span>
                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- Dashboard graph ends -->

<!-- Chats, File upload and Recent Comments -->
<div class="row">

<div class="col-md-4">
    <!-- Widget -->
    <div class="widget">
        <!-- Widget title -->
        <div class="widget-head">
            <div class="pull-left">图表</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">
            <!-- Widget content -->
            <div class="padd">

                <ul class="chats">

                    <!-- Chat by us. Use the class "by-me". -->
                    <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                            <img src="<?php echo static_url('avatar/user.jpg'); ?>" alt="">
                        </div>

                        <div class="chat-content">
                            <!-- In meta area, first include "name" and then "time" -->
                            <div class="chat-meta">Ashok <span class="pull-right">3 hours ago</span></div>
                            Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                            <div class="clearfix"></div>
                        </div>
                    </li>

                    <!-- Chat by other. Use the class "by-other". -->
                    <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                            <img src="<?php echo static_url('avatar/user.jpg'); ?>" alt="">
                        </div>

                        <div class="chat-content">
                            <!-- In the chat meta, first include "time" then "name" -->
                            <div class="chat-meta">3 hours ago <span class="pull-right">Ravi</span></div>
                            Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing elit.
                            <div class="clearfix"></div>
                        </div>
                    </li>

                    <li class="by-me">
                        <div class="avatar pull-left">
                            <img src="<?php echo static_url('avatar/user.jpg'); ?>" alt="">
                        </div>

                        <div class="chat-content">
                            <div class="chat-meta">Ashok <span class="pull-right">4 hours ago</span></div>
                            Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                            <div class="clearfix"></div>
                        </div>
                    </li>

                    <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                            <img src="<?php echo static_url('avatar/user.jpg'); ?>" alt="">
                        </div>

                        <div class="chat-content">
                            <!-- In the chat meta, first include "time" then "name" -->
                            <div class="chat-meta">3 hours ago <span class="pull-right">Ravi</span></div>
                            Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                            <div class="clearfix"></div>
                        </div>
                    </li>

                </ul>

            </div>
            <!-- Widget footer -->
            <div class="widget-foot">

                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Type your message here...">
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>


            </div>
        </div>


    </div>
</div>


<!-- File Upload widget -->
<div class="col-md-4">
    <div class="widget">
        <!-- Widget title -->
        <div class="widget-head">
            <div class="pull-left">文件上传</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content">
            <!-- Widget content -->
            <ul class="file-upload">

                <li>
                    <strong><i class="icon-upload-alt"></i> File_Name_Here.Mp3</strong>
                    <div class="file-meta">3.3 of 5MB - 5 mins - 1MB/Sec</div>

                    <div class="progress progress-animated progress-striped">
                        <div class="progress-bar progress-bar-success" data-percentage="100" style="width: 100%;">100%</div>
                    </div>
                </li>

                <li>
                    <strong><i class="icon-ok"></i> Third_File_Here.Mp3</strong>
                    <div class="file-meta">5MB - 5 mins - Stopped</div>
                </li>

                <li>
                    <strong><i class="icon-ok"></i> Third_File_Here.Mp3</strong>
                    <div class="file-meta">5MB - 5 mins - Stopped</div>
                </li>
            </ul>

            <div class="widget-foot">
            </div>

        </div>
    </div>

    <div class="widget">
        <!-- Widget title -->
        <div class="widget-head">
            <div class="pull-left">浏览器统计</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content referrer">
            <!-- Widget content -->

            <table class="table table-striped table-bordered table-hover">
                <tbody><tr>
                    <th><center>#</center></th>
                    <th>Browsers</th>
                    <th>Visits</th>
                </tr>
                <tr>
                    <td><img src="<?php echo static_url('img/chrome.png'); ?>" alt="">
                    </td><td>Google Chrome</td>
                    <td>3,005</td>
                </tr>
                <tr>
                    <td><img src="<?php echo static_url('img/firefox.png'); ?>" alt="">
                    </td><td>Mozilla Firefox</td>
                    <td>2,505</td>
                </tr>
                <tr>
                    <td><img src="<?php echo static_url('img/ie.png'); ?>" alt="">
                    </td><td>Internet Explorer</td>
                    <td>1,405</td>
                </tr>
                <tr>
                    <td><img src="<?php echo static_url('img/opera.png'); ?>" alt="">
                    </td><td>Opera</td>
                    <td>4,005</td>
                </tr>
                <tr>
                    <td><img src="<?php echo static_url('img/safari.png'); ?>" alt="">
                    </td><td>Safari</td>
                    <td>505</td>
                </tr>
                </tbody></table>

            <div class="widget-foot">
            </div>
        </div>
    </div>

</div>


<div class="col-md-4">
    <!-- Widget -->
    <div class="widget">
        <!-- Widget title -->
        <div class="widget-head">
            <div class="pull-left">最近评论</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content">
            <!-- Widget content -->
            <div class="padd">

                <ul class="recent">


                    <li>

                        <div class="recent-content">
                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-xs btn-default"><i class="icon-ok"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-pencil"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-remove"></i> </button>
                            </div>

                            <button class="btn btn-xs btn-danger pull-right">Spam</button>

                            <div class="clearfix"></div>
                        </div>
                    </li>



                    <li>

                        <div class="recent-content">
                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-xs btn-default"><i class="icon-ok"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-pencil"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-remove"></i> </button>
                            </div>

                            <button class="btn btn-xs btn-danger pull-right">Spam</button>

                            <div class="clearfix"></div>
                        </div>
                    </li>



                    <li>

                        <div class="recent-content">
                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-xs btn-default"><i class="icon-ok"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-pencil"></i> </button>
                                <button class="btn btn-xs btn-default"><i class="icon-remove"></i> </button>
                            </div>

                            <button class="btn btn-xs btn-danger pull-right">Spam</button>

                            <div class="clearfix"></div>
                        </div>
                    </li>


                </ul>

            </div>
            <!-- Widget footer -->
            <div class="widget-foot">


                <ul class="pagination pull-right">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>

                <div class="clearfix"></div>

            </div>
        </div>

    </div>

</div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="widget wblack">
            <div class="widget-head">
                <div class="pull-left">黑色图表</div>
                <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-content">
                <div class="padd">

                    <div id="bar-chart" style="padding: 0px; position: relative;"><canvas class="base" width="543" height="250"></canvas><canvas class="overlay" width="543" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#777"><div class="tickLabel" style="position:absolute;text-align:center;left:-9px;top:228px;width:54px">0.0</div><div class="tickLabel" style="position:absolute;text-align:center;left:54px;top:228px;width:54px">2.5</div><div class="tickLabel" style="position:absolute;text-align:center;left:116px;top:228px;width:54px">5.0</div><div class="tickLabel" style="position:absolute;text-align:center;left:179px;top:228px;width:54px">7.5</div><div class="tickLabel" style="position:absolute;text-align:center;left:241px;top:228px;width:54px">10.0</div><div class="tickLabel" style="position:absolute;text-align:center;left:304px;top:228px;width:54px">12.5</div><div class="tickLabel" style="position:absolute;text-align:center;left:367px;top:228px;width:54px">15.0</div><div class="tickLabel" style="position:absolute;text-align:center;left:429px;top:228px;width:54px">17.5</div><div class="tickLabel" style="position:absolute;text-align:center;left:492px;top:228px;width:54px">20.0</div></div><div class="yAxis y1Axis" style="color:#777"><div class="tickLabel" style="position:absolute;text-align:right;top:212px;right:530px;width:13px">0</div><div class="tickLabel" style="position:absolute;text-align:right;top:176px;right:530px;width:13px">10</div><div class="tickLabel" style="position:absolute;text-align:right;top:139px;right:530px;width:13px">20</div><div class="tickLabel" style="position:absolute;text-align:right;top:103px;right:530px;width:13px">30</div><div class="tickLabel" style="position:absolute;text-align:right;top:66px;right:530px;width:13px">40</div><div class="tickLabel" style="position:absolute;text-align:right;top:30px;right:530px;width:13px">50</div><div class="tickLabel" style="position:absolute;text-align:right;top:-7px;right:530px;width:13px">60</div></div></div></div>

                </div>
                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-head">
                <div class="pull-left">快速提交</div>
                <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-content">
                <div class="padd">

                    <div class="form quick-post">
                        <!-- Edit profile form (not working)-->
                        <form class="form-horizontal">
                            <!-- Title -->
                            <div class="form-group">
                                <label class="control-label col-lg-3" for="title">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="title">
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="form-group">
                                <label class="control-label col-lg-3" for="content">Content</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="content"></textarea>
                                </div>
                            </div>
                            <!-- Cateogry -->
                            <div class="form-group">
                                <label class="control-label col-lg-3">Category</label>
                                <div class="col-lg-9">
                                    <select class="form-control">
                                        <option value="">- Choose Cateogry -</option>
                                        <option value="1">General</option>
                                        <option value="2">News</option>
                                        <option value="3">Media</option>
                                        <option value="4">Funny</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Tags -->
                            <div class="form-group">
                                <label class="control-label col-lg-3" for="tags">Tags</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="tags">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="form-group">
                                <!-- Buttons -->
                                <div class="col-lg-offset-2 col-lg-9">
                                    <button type="submit" class="btn btn-success">Publish</button>
                                    <button type="submit" class="btn btn-danger">Save Draft</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>

<!-- Matter ends -->

</div>

<!-- Mainbar ends -->
<div class="clearfix"></div>
