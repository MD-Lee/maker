@extends('mobile.master')

@section('title','注册')


@section('content')
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">

            <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="name"  name="name" placeholder="请输入姓名"/>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id"  name="idcard" placeholder="请输入身份证号"/>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">上传身份证</label></div>
            <div class="weui_uploader_bd">
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input" accept="image/*" multiple="" type="file">
                </div>
            </div>
            <div class="weui_uploader_bd">
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input" accept="image/*" multiple="" type="file">
                </div>
            </div>
        </div>



        <div class="weui_cell weui_cell_vcode">
            <div class="weui_cell_hd">
                <label class="weui_label">手机号</label>
            </div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="tel" title="请正确输入" name="tel" pattern="[0-9]*" placeholder="请输入手机号"/>
            </div>
            <div class="weui_cell_ft">
                <i class="weui_icon_warn"></i>
                <a href="javascript:;" class="weui-vcode-btn">获取验证码</a>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id" name="validate_code" placeholder="请输入验证码"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id"  name="password" placeholder="请输入密码"/>
            </div>
        </div>

    </div>
    <div class="weui_btn-area">
        <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">注册</a>

    </div>
    <a href="/login" class="bk_bottom_tips bk_important">已有帐号? 去登录</a>
@endsection
@section('my-js')
    <script>
        $(function(){
            $gallery = $("#gallery"), $galleryImg = $("#galleryImg"),
                $uploaderInput = $("#uploaderInput"),
                $uploaderFiles = $("#uploaderFiles")
            ;

            $uploaderInput.on("change", function(e){
                var src, url = window.URL || window.webkitURL || window.mozURL, files = e.target.files;
                for (var i = 0, len = files.length; i < len; ++i) {
                    var file = files[i];

                    if (url) {
                        src = url.createObjectURL(file);
                    } else {
                        src = e.target.result;
                    }
                    $(".weui_uploader__file").attr('src',src);


                }
            });
            $uploaderFiles.on("click", "li", function(){
                $galleryImg.attr("style", this.getAttribute("style"));
                $gallery.fadeIn(100);
            });
            $gallery.on("click", function(){
                $gallery.fadeOut(100);
            });
        });

    </script>
@endsection