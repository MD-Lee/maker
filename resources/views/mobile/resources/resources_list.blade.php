@extends('mobile.master')

@section('title','创客|资源库')
@section('content')

    <div class='page-hd' >
        <div class="weui_tab" style="height:44px;"   id="tab5">
            <div class="weui_tab_nav"> <a href="javascript:" class="weui_navbar_item weui_nav_green"> 寻求资源 </a> <a href="javascript:" class="weui_navbar_item weui_nav_green"> 提供资源 </a></div>
        </div>

    </div>
<ul>
    <li>新兴茶园培育基地项目</li>
    <li>王小明</li>
    <li>2017-03-28 12:34 <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary">进入圈子</a></li>
</ul>
    <section class="weui-menu">

            <div class="weui-menu-inner">
                <a href="/resources_add">
                <em></em>
                <span>提供资源</span>
                </a>
            </div>

        <div class="weui-menu-inner">
            <em></em>
            <span>寻求资源</span>

        </div>

    </section>
@endsection
@section('my-js')
    <script src="/js/zepto.min.js"></script>
    <script>
        $(function(){
          $('#tab5').tab({defaultIndex:0,activeClass:"bg_green"});
        });

    </script>
 @endsection