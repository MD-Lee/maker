@extends('admin.master')
@section('title','首页')
@section('content')
    @include('admin.nav')
    <header class="navbar-wrapper">
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">创客资源管理系统 欢迎您，王小明</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>

                <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

                <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                    <ul class="cl">
                        <li>超级管理员</li>
                        <li class="dropDown dropDown_hover">
                            <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                                <li><a href="#">切换账户</a></li>
                                <li><a href="#">退出</a></li>
                            </ul>
                        </li>
                        <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active">
                        <span title="首页" data-href="welcome.html">首页</span>
                        <em></em></li>
                </ul>
            </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
        </div>
        <div id="iframe_box" class="Hui-article">
            <div class="page-container">
                  <div id="container" style="min-width:700px;height:400px"></div>
            </div>
        </div>
    </section>





    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
    <script type="text/javascript" src="/admin/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container', {
                title: {
                    text: '新增审核项目',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: WorldClimate.com',
                    x: -20
                },
                xAxis: {
                    categories: ['一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月']
                },
                yAxis: {
                    title: {
                        text: '个数 '
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '个'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: '新增待审核项目',
                    data: [7.0, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
                },]
            });
        });
    </script>
    <!--/此乃百度统计代码，请自行删除-->
    @endsection