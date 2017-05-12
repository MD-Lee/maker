@extends('mobile.master')

@section('title','创客|发布资源')
@section('content')
<form id="form">
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">需求名称</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" placeholder="请输入需求名称" type="text">
            </div>
            <div class="weui_cell_ft">
                <i class="weui_icon_warn"></i>
            </div>
        </div>
    </div>
    <div class="weui_btn_area">
        <a id="formSubmitBtn" href="javascript:" class="weui_btn weui_btn_primary">发布</a>
    </div>
</form>
 @endsection