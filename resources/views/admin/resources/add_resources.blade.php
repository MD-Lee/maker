@extends('admin.master')
@section('title','添加资源')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" method="post">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>需求名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="resource_name" name="resource_name">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
            <input type="hidden" name="type" value="{{$type}}">
        </form>
    </article>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript">
        $(function(){
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $("#form-admin-add").validate({
                rules:{
                    resource_name:{
                        required:true,
                        minlength:1,
                        maxlength:20
                    },
                },
                success:"valid",
                submitHandler:function(form){
                    $("#form-admin-add").ajaxSubmit({
                        type: 'post',
                        url: "/admin/add_resources",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data){
                            layer.msg('添加成功!',{icon:1,time:1000});
                             var index = parent.layer.getFrameIndex(window.name);
                             parent.$('.btn-refresh').click();
                             parent.layer.close(index);
                        },
                        error: function(XmlHttpRequest, textStatus, errorThrown){
                            alert("22");
                            layer.msg('error!',{icon:1,time:1000});
                        }
                    });

                }
            });
        });
    </script>
@endsection