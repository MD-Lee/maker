@extends('admin.master')
@section('title','线下回款')
@section('content')
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>实收费用：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$amount}}" placeholder="" id="bamount" name="bamount">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">支付方式：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box">
                    <select name="pay_method" class="select">
                        @foreach($payment_type as $k=>$v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach

                    </select>
                    </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="content" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>

<input type="hidden" name="id"value="{{$id}}">
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
                bamount:{
                    required:true
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){

                $("#form-member-add").ajaxSubmit({
                    type: 'post',
                    url: "/admin/add_payment",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        layer.msg('添加成功!',{icon:1,time:1000});
                        var index = parent.layer.getFrameIndex(window.name);

                        parent.layer.close(index);

                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){

                        layer.msg('error!',{icon:1,time:1000});
                    }
                });

            }
        });
    });
</script>
@endsection