@extends('mobile.master')

@section('title','首页')
@section('content')
    <div class="slide" id="slide1">
        <ul>
            <li>
                <a href="#">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="http://7xr193.com1.z0.glb.clouddn.com/1.jpg" alt="">
                </a>
                <div class="slide-desc">零哥章魚 完成传奇世界H5-王者归来任务 获得30金币</div>
            </li>
            <li>
                <a href="#">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="http://7xr193.com1.z0.glb.clouddn.com/2.jpg" alt="">
                </a>
                <div class="slide-desc">23333零哥章魚 完成传奇世界H5-王者归来任务 获得30金币</div>
            </li>
            <li>
                <a href="#">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="http://7xr193.com1.z0.glb.clouddn.com/3.jpg" alt="">
                </a>
                <div class="slide-desc">33333零哥章魚 完成传奇世界H5-王者归来任务 获得30金币</div>
            </li>
        </ul>

    </div>
   <table class="index_table" cellpadding="0" cellspacing="0">
       <tr>
           <td>
               <a href="/project_lists">产品库</a>
           </td>
           <td><a href="/resources_list">资源库</a></td>
       </tr>
       <tr>
           <td> <a href="/cources_lists">在线培训</a></td>
           <td><a href="/person_center">个人中心</a></td>
       </tr>
   </table>
   <div class="blank"></div>

   <div class="product_title">产品信息</div>
   <div class="index_con">
   <table class="report_table">
@foreach($project_info as $v)
       <tr>
       	<td class="title" colspan="2"><a href="/project_details/{{$v->id}}">{{$v->product_name}} </a></td>
       </tr>
       <tr>
       	<td>{{$v->pname}}</td><td>{{$v->created_at}}</td>
       </tr>
       <tr>
       	<td>{{$v->area}}</td><td>已有{{$v->member_number}}人参与</td>
       </tr>
       <tr><td class="line" colspan="2"></td></tr>
@endforeach


   </table>
   </div>
   <div style="height:60px;"></div>


   <section class="weui-menu">
       <div class="weui-menu-inner">
           <em></em>
           <span>首页</span>

       </div>
       <div class="weui-menu-inner">
           <em></em>
          <a href="project_add"> <span>项目建立</span></a>

       </div>
       <div class="weui-menu-inner">
           <em></em>
           <a href="report_add"> <span>业务报备</span></a>
       </div>
   </section>
@endsection
@section('my-js')
    <script src="/js/swipe.js"></script>
    <script>
        $(function(){
            $('#slide1').swipeSlide({
                autoSwipe:true,//自动切换默认是
                speed:3000,//速度默认4000
                continuousScroll:true,//默认否
                transitionType:'cubic-bezier(0.22, 0.69, 0.72, 0.88)',//过渡动画linear/ease/ease-in/ease-out/ease-in-out/cubic-bezier
                lazyLoad:true,//懒加载默认否
                firstCallback : function(i,sum,me){
                    me.find('.dot').children().first().addClass('cur');
                },
                callback : function(i,sum,me){
                    me.find('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
                }
            });
        });

    </script>
    @endsection
