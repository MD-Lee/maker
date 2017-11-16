@extends('mobile.master')

@section('title','创客|资源库')
@section('content')
<style>
	body{ background:#fff;}
</style>
<section class="wrapper">
    <div class="hd_tab" >
        <ul class="hd_tab_nav"> 
            <li><a href="javascript:" class="bg_green"> 寻求资源 </a> </li>
            <li><a href="javascript:" class=""> 提供资源 </a></li>
        </ul>
    </div>
    <div class="weui_tabbar_con" style="display:block;">
    	<ul>
        	<li>
                <p class="hd_title">新兴茶园培育基地项目11</p>
                <p class="h_name">王小明</p>
                <p class="hd_ms">
                    <span class="hd_time fl">2017-03-28 12:34 </span>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary fr">进入圈子</a>
                </p>
        	</li>
        	<li>
                <p class="hd_title">新兴茶园培育基地项目11</p>
                <p class="h_name">王小明</p>
                <p class="hd_ms">
                    <span class="hd_time fl">2017-03-28 12:34 </span>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary fr">进入圈子</a>
                </p>
        	</li>
        	<li>
                <p class="hd_title">新兴茶园培育基地项目11</p>
                <p class="h_name">王小明</p>
                <p class="hd_ms">
                    <span class="hd_time fl">2017-03-28 12:34 </span>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary fr">进入圈子</a>
                </p>
        	</li>
        </ul>
    </div>
    <div class="weui_tabbar_con">
    	<ul>
        	<li>
                <p class="hd_title">新兴茶园培育基地项目11</p>
                <p class="h_name">王小明</p>
                <p class="hd_ms">
                    <span class="hd_time fl">2017-03-28 12:34 </span>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary fr">进入圈子</a>
                </p>
        	</li>
        </ul>
    </div>
</section>
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
    <script>
        $(function(){
          	$('.hd_tab_nav li').click(function () {
			$(".weui_tabbar_con").css("display","none");
			$('.hd_tab_nav li').children('a').removeClass("bg_green");
			//display current 
			$(".weui_tabbar_con").eq($(".hd_tab_nav li").index($(this))).css("display","block");
			$(this).children().addClass("bg_green");
		});
		  
        });

    </script>
 @endsection