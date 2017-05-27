@extends('mobile.master')

@section('title','创客|我的资料')
@section('content')
    <form id="form" action="" method="post">
        {{ csrf_field() }}
        <div class="weui_cells weui_cells_form">

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" name="uname" placeholder="请输入姓名" value="{{$user_info->uname}}" type="text" required  maxlength="22" placeholder="输入你姓名" emptyTips="请输入姓名" notMatchTips="请输入正确的姓名">
                </div>
                <div class="weui_cell_ft">
                    <i class="weui_icon_warn"></i>
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">性别</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="radio" name="sex" @if($user_info->sex ==1 ) checked @endif  value="1">男 <input type="radio" @if($user_info->sex ==2) checked @endif name="sex"value="2">女
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">生日:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" name="birthday" value="{{$user_info->birthday}}" id='date'/>

                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" name="mobile" type="tel" value="{{$user_info->mobile}}" required pattern="[0-9]{11}" maxlength="11" placeholder="输入你现在的手机号" emptyTips="请输入手机号" notMatchTips="请输入正确的手机号">
                </div>
                <div class="weui_cell_ft">
                    <i class="weui_icon_warn"></i>
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">省市县:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" name="area" value="{{$user_info->area}}" id='ssx'/>

                </div>

            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">详细地址</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" name="address" placeholder="请输入详细地址" type="text" value="{{$user_info->address}}">
                </div>
            </div>

        </div>
        <input type="hidden" value="{{$user_info->id}}" name="user_id">
        <div class="weui_btn_area">
            <a id="formSubmitBtn" href="javascript:" class="weui_btn weui_btn_primary">提交</a>
        </div>
    </form>


@endsection

@section('my-js')
    <script src="/js/zepto.min.js"></script>
    <script src="/js/picker.js"></script>
    <script src="/js/picker-city.js"></script>
    <script>
        $(function(){
            $("#date").datetimePicker({title:"选择日期",m:1});
            $("#ssx").cityPicker({
                title: "选择省市县"
            });
        });
        var $form = $("#form");

        $("#formSubmitBtn").on("click", function(){
            $form.validate(function(error){
                if(error){

                }else{
                    $form.submit();
                    //$.toptips('验证通过提交','ok');
                }
            });

        });
    </script>
@endsection