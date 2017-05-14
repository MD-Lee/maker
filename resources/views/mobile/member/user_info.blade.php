@extends('mobile.master')

@section('title','创客|我的资料')
@section('content')
    <form>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" placeholder="请输入姓名" type="text">
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">性别</label></div>
            <div class="weui_cell_bd weui_cell_primary">
               <input type="radio" value="1">男 <input type="radio" value="2">女
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">生日:</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" value="2016-12-10" id='date'/>

            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" required="" pattern="[0-9]{11}" maxlength="11" placeholder="输入你现在的手机号" emptytips="请输入手机号" notmatchtips="请输入正确的手机号" type="tel">

            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">省市县:</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" value="" id='ssx'/>

            </div>

        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">详细地址</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" placeholder="请输入详细地址" type="text">
            </div>
        </div>

    </div>
    <div class="weui_btn_area">
        <a id="formSubmitBtn" href="javascript:" class="weui_btn weui_btn_primary">提交</a>
    </div>
   </form>
    @endsection
@section('my-js')
    <script src="/js/zepto.min.js"></script>
</script><script src="/js/picker.js"></script><script src="/js/picker-city.js"></script>
    <script>
        $(function(){
            $("#date").datetimePicker({title:"选择日期",m:1});
            $("#ssx").cityPicker({
                title: "选择省市县"
            });
        });

    </script>
    @endsection