@extends('mobile.master')

@section('title','注册')


@section('content')
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="name"  name="name" placeholder="请输入姓名"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">身份证</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="id"  name="idcard" placeholder="请输入身份证号"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">上传身份证</label></div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files" id="uploaderFiles">
                    <img class="weui-uploader__file" id="" ></img>
                </ul>
                <div class="weui-uploader__input-box">
                    <input id="uploaderInput" name="" class="weui-uploader__input" type="file" accept="image/*" multiple/>
                </div>

            </div>
            <div class="weui-uploader__bd">
                <ul class="weui-uploader__files" id="uploaderFiles">
                    <img class="weui-uploader__file" id="" ></img>
                </ul>
                <div class="weui-uploader__input-box">
                    <input id="uploaderInput" name="" class="weui-uploader__input" type="file" accept="image/*" multiple/>
                </div>

            </div>
        </div>



        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">手机号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="tel" title="请正确输入" name="tel" pattern="[0-9]*" placeholder="请输入手机号"/>
            </div>
            <div class="weui-cell__ft">
                <button class="weui-vcode-btn">获取验证码</button>
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="id" name="validate_code" placeholder="请输入验证码"/>
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="id"  name="password" placeholder="请输入密码"/>
            </div>
        </div>

    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">注册</a>

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
                    $(".weui-uploader__file").attr('src',src);


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