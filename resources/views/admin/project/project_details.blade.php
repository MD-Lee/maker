@extends('admin.master')
@section('title','项目详情')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-article-add" method="post">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->product_name}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">项目名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->pname}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品分润：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->product_profit}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->content}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">目标用户：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->customer}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">解决了哪些根本性问题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->problems}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">盈利点在哪里：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->profit_point}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">培训时间：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->train_start_time}} ——    {{$project_info->train_end_time}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">培训地点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->area}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$project_info->address}}
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态{{$project_info->status}}：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="radio" name="status" @if($project_info->status ==1 ) checked @endif value="1" class="input-radio" >审核通过
                    <input type="radio" name="status" @if($project_info->status == 2 ) checked @endif  value="2" class="input-radio" >审核不通过
                </div>
            </div>
            <div class="row cl" @if($project_info->status ==1 )style="display: none" @endif>
                <label class="form-label col-xs-4 col-sm-2">理由：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="reason" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{$project_info->reason}}</textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                </div>
            </div>
            <div class="row cl">
            <div class="col-9 col-offset-2">
                <input class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" type="submit">
            </div>
            </div>
            <input type="hidden" name="id" value="{{$project_info->id}}">
        </form>
    </article>
@endsection