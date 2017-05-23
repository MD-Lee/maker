@extends('mobile.master')

@section('title','登录')
@section('content')
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">

            <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="name"  name="name" placeholder="请输入姓名"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="id"  name="idcard" />
            </div>
        </div>
    </div>
    <div class="page_bd page_bd_spacing">
        <div class="button_sp_area">
            <a href="javascript:;" class="weui_btn weui_btn_plain_primary">登录</a>

        </div>
    </div>
    <a href="/register" class="bk_bottom_tips bk_important">没有帐号? 去注册</a>
@endsection

