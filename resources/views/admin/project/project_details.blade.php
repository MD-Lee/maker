@extends('admin.master')
@section('title','项目详情')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    新兴茶园培育基地项目
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">项目名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    人力资源
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品分润：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    10%
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    产品内容等等等等
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">目标用户：</label>
                <div class="formControls col-xs-8 col-sm-9">

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">解决了哪些根本性问题：</label>
                <div class="formControls col-xs-8 col-sm-9">

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">盈利点在哪里：</label>
                <div class="formControls col-xs-8 col-sm-9">

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">培训时间：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    2017-01-13 —— 2017-10-18
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">培训地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    山东省-青岛市-市南区
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    福州南路288号
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="radio" class="input-radio" >审核通过
                    <input type="radio" class="input-radio" >审核不通过
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">理由：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="abstract" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                </div>
            </div>
            <div class="row cl">
            <div class="col-9 col-offset-2">
                <input class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" type="submit">
            </div>
            </div>
        </form>
    </article>
@endsection