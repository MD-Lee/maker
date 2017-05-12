@extends('admin.master')
@section('title','添加课程')
@section('content')
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="title" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box">
                    <select name="" class="select">
                        <option value="1">新人</option>
                        <option value="11">├成长案例</option>
                    </select>
                    </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">课程简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="beizhu" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程目标：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="target" name="target">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>适用人群：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="people" id="people">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">课程图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker"><div class="webuploader-pick">选择图片</div></div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">附件：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" name="uploadfile" id="uploadfile" readonly="" nullmsg="请添加附件！" style="width:200px" type="text">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont"></i> 浏览文件</a>
				<input multiple="" name="file-2" class="input-file" type="file">
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频时长：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input style="width:250px" type="text" class="input-text" value="" placeholder="" id="target" name="target">-
                <input style="width:250px" type="text" class="input-text" value="" placeholder="" id="target" name="target">
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:16
                },
                sex:{
                    required:true,
                },
                mobile:{
                    required:true,
                    isMobile:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                uploadfile:{
                    required:true,
                },

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                //$(form).ajaxSubmit();
                var index = parent.layer.getFrameIndex(window.name);
                //parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>
@endsection