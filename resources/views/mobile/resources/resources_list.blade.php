@extends('mobile.master')

@section('title','创客|资源库')
@section('content')
    <div class='page-hd' >
        <div class="weui_tab" style="height:44px;"   id="tab5">
            <div class="weui_tab_nav">
                <a href="javascript:" class="weui_navbar_item weui_nav_green"> 中国 </a>
                <a href="javascript:" class="weui_navbar_item weui_nav_green"> 美国 </a>
             </div>
     </div>
    </div>
@endsection
@section('my-js')
    <script>
        $(function(){

         $('#tab5').tab({defaultIndex:1,activeClass:"bg_green"});

        });

    </script>
 @endsection