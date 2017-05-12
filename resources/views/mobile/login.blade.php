@extends('mobile.master')

@section('title','登录')
@section('content')
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">用户名</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="name"  name="name" />
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="id"  name="idcard" />
            </div>
        </div>
    </div>
    <div class="page__bd page__bd_spacing">
        <div class="button-sp-area">
            <a href="javascript:;" class="weui-btn weui-btn_plain-primary">登录</a>

        </div>
    </div>
    <a href="/register" class="bk_bottom_tips bk_important">没有帐号? 去注册</a>
@endsection

