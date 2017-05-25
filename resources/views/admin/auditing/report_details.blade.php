@extends('admin.master')
@section('title','项目详情')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">项目名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->product_name}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->pname}}
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">客户全称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->customer_name}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">客户所在地：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->customer_area}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->customer_address}}
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">客户需求：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->customer_require}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">跟进情况：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->follow}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">合作状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    已合作
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">上传合同：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$report_info->agreement_doc}}
                </div>
            </div>


            历史跟进情况
            @foreach($follow_infos as $v)
            <div class="row cl">

                <div class="formControls col-xs-8 col-sm-9">
                  {{$v->content}}
                </div>
            </div>
            @endforeach

            @if($t)
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">实收金额：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{$report_info->bamount}}
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">备注：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{$report_info->content}}
                    </div>
                </div>
                @endif

        </form>
    </article>
@endsection