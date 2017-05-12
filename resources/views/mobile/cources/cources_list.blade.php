@extends('mobile.master')

@section('title','创客|在线培训')
@section('content')

    <div class='page-hd' >
        <div class="weui_tab" style="height:44px;"   id="tab5">
            <div class="weui_tab_nav">
                <a href="javascript:" class="weui_navbar_item weui_nav_green"> 新人 </a>
                <a href="javascript:" class="weui_navbar_item weui_nav_green"> 创客|小薇 </a>
                <a href="javascript:" class="weui_navbar_item weui_nav_green"> 导师 </a>
            </div>
        </div>

    </div>
    <ul>
        <li>视频名称</li>
        <li>王小明</li>
        <li>时长：23:45   观看人数：10</li>
    </ul>

@endsection
@section('my-js')

    <script>
        $(function(){
            $('#tab5').tab({defaultIndex:0,activeClass:"bg_green"});
        });

    </script>
@endsection