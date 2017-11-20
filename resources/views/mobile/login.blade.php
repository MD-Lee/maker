@extends('mobile.master')

@section('title','登录')
@section('content')
<form id="form" action="" name="myForm" method="post" >
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">

            <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text"  id="username" name="username" placeholder="请输入姓名"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="password"  id ="password" name="password" />
            </div>
        </div>
    </div>
    <div class="page_bd page_bd_spacing">
        <div class="button_sp_area">
            <!--<a href="/login" class="weui_btn weui_btn_plain_primary" id="formSubmitBtn">登录</a> -->
			
			<input type="submit" class="weui_btn weui_btn_plain_primary" value="登录"></input>

        </div>
    </div>
	 </form>
    <a href="/register" class="bk_bottom_tips bk_important">没有帐号? 去注册</a>
@endsection
@section('my-js')
<script src="/js/zepto.min.js"></script>
	
@endsection

