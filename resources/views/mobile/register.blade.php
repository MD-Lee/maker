@extends('mobile.master')

@section('title','注册')
@section('content')
    <form id="form" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input"  type="text" required  maxlength="22" placeholder="输入你姓名" emptyTips="请输入姓名" notMatchTips="请输入正确的姓名"  name="uname" placeholder="请输入姓名"/>

            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id" name="idcard" placeholder="请输入身份证号" required pattern="(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\w)" emptyTips="请输入身份证号" notMatchTips="请输入正确的身份证号"/>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">上传身份证</label></div>
            <div class="weui_uploader_bd">
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input" id="file1" name="front" accept="image/*" multiple="" type="file">
                </div>
                <img src="" id="img1" >
            </div>
            <div class="weui_uploader_bd">
                <div class="weui_uploader_input_wrp">
                    <input class="weui_uploader_input"  id="file2" name="back" accept="image/*" multiple="" type="file">
                </div>
                <img src="" id="img2" >
            </div>
        </div>


        <div class="weui_cell weui_cell_vcode">
            <div class="weui_cell_hd">
                <label class="weui_label">手机号</label>
            </div>
            <div class="weui_cell_bd">
                <input class="weui_input" id="mobile" name="mobile" type="tel"  required pattern="[0-9]{11}" maxlength="11" placeholder="输入你现在的手机号" emptyTips="请输入手机号" notMatchTips="请输入正确的手机号">
            </div>
            <div class="weui_cell_ft">
                <i class="weui_icon_warn"></i>
                <a href="javascript:;" class="weui-vcode-btn" id="sendcode">获取验证码</a>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id" id="validate_code" name="validate_code" placeholder="请输入验证码" required pattern="[0-9]{6}" maxlength="6" emptyTips="请输入验证码" notMatchTips="请输入正确的验证码"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
            <div class="weui_cell_bd">
                <input class="weui_input" type="id" id="password" name="password" placeholder="请输入密码" required emptyTips="请输入密码"/>
            </div>
        </div>

    </div>
    <div class="weui_btn-area">
        <input type="hidden" id="verify">
        <a class="weui_btn weui_btn_primary" href="javascript:" id="formSubmitBtn">注册</a>

    </div>
    </form>
    <a href="/login" class="bk_bottom_tips bk_important">已有帐号? 去登录</a>
@endsection
@section('my-js')
    <script src="/js/zepto.min.js"></script>
    <script>
        $("#file1").change(function(){
            var lee=this.files[0].name;
            if(!/.(gif|jpg|jpeg|png|GIF|JPG|bmp)$/.test(lee)){

                alert("图片类型必须是.gif,jpeg,jpg,png,bmp中的一种");
                return false;

            }
            var objUrl = getObjectURL(this.files[0]) ;
            console.log("objUrl = "+objUrl) ;
            if (objUrl) {
               // $("file1").css("backgroundImage","url("+objUrl+")");

                $("#img1").attr("src", objUrl) ;
            }
        }) ;
        $("#file2").change(function(){
            var lees=this.files[0].name;
            if(!/.(gif|jpg|jpeg|png|GIF|JPG|bmp)$/.test(lees)){

                alert("图片类型必须是.gif,jpeg,jpg,png,bmp中的一种");
                return false;

            }
            var objUrl = getObjectURL(this.files[0]) ;
            console.log("objUrl = "+objUrl) ;
            if (objUrl) {
                // $("file1").css("backgroundImage","url("+objUrl+")");
                $("#img2").attr("src", objUrl) ;
            }
        }) ;
        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        };


        var $form = $("#form");

        $("#formSubmitBtn").on("click", function(){
            $form.validate(function(error){
                if(error){

                }else{
                    var validate_code = $("#validate_code").val();
                    var verify = $("#verify").val();

                    var img1 = $("#file1").val();
                    var img2 = $("#file2").val();
                    if(validate_code != verify){
                        alert("验证码错误");
                        return false;
                    }
                    if(img1 =='' || img2 =='' ){
                        alert("请选择上传图片");
                        return false;
                    }

                    $form.submit();
                    //$.toptips('验证通过提交','ok');
                }
            });

        });
    </script>
    <script>
        //到计时控件
        var time = 60;
        var sendcode = document.getElementById("sendcode");
        $(document).ready(function(){
            $("#sendcode").click(function(){
                if($("#mobile").val() == ""){
                    alert('请输入您的手机号');
                }else{
                    var phone = $("#mobile").val();
                    var $url = "{{url('message_verify')}}";
                    $.ajax({
                        type:"POST",
                        url:$url,
                        data:{'phone':phone},
                        datatype:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success:function(data){
                            if(data.error == 1){
                                alert("短信发送成功");
                                $('#verify').val(data.verify);
                                function timedown() {
                                    if (time == 0) {
                                        sendcode.removeAttribute('disabled');
                                        $("#sendcode").text("获取验证码");
                                        time = 60;
                                        clearTimeout(clicktime);
                                    }else{
                                        $("#sendcode").text("重新发送(" + time + ")");
                                        sendcode.setAttribute("disabled", true);
                                        time--;
                                        clicktime = setTimeout(timedown, 1000);
                                    }
                                }
                                timedown();
                            }else if(data.error == 2){
                                alert('短信发送失败');
                            }else{
                                alert('该手机号已注册');
                            }
                        }
                    });
                }
            });
        });
        sendcode.removeAttribute('disabled');

    </script>
@endsection