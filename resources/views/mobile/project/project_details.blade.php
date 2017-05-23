@extends('mobile.master')

@section('title','产品详情')
@section('content')

<div class="weui_cells">


    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <p>产品名称:</p>
        </div>
        <div class="weui_cell_ft">{{$project->product_name}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>项目名称:</p>
        </div>
        <div class="weui_cell_ft">{{$project->product_name}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>产品分润:</p>
        </div>
        <div class="weui_cell_ft">{{$project->product_profit}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>产品内容:</p>
        </div>
        <div class="weui_cell_ft">{{$project->content}}</div>
    </div>
    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>目标用户:</p>
        </div>
        <div class="weui_cell_ft">{{$project->customer}}</div>
    </div><div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>解决了哪些根本性问题:</p>
        </div>
        <div class="weui_cell_ft">{{$project->problems}}</div>
    </div><div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>盈利点在哪里:</p>
        </div>
        <div class="weui_cell_ft">{{$project->profit_point}}</div>
    </div><div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>培训时间:</p>
        </div>
        <div class="weui_cell_ft">{{$project->train_start_time}}-{{$project->train_end_time}}</div>
    </div>
    </div><div class="weui_cell" style="margin-top: 2px">
    <div class="weui_cell_bd weui_cell_primary">
        <p>培训地点:</p>
    </div>
    <div class="weui_cell_ft"> {{$project->area}}</div>
    </div>
    </div><div class="weui_cell" style="margin-top: 2px">
    <div class="weui_cell_bd weui_cell_primary">
        <p>详细地址:</p>
    </div>
    <div class="weui_cell_ft">{{$project->address}}</div>
    </div>




    <div style="text-align: right">
        @if($type==1)
            <a href="{{url('project_add/'.$project->id.'')}}" class="weui_btn weui_btn_mini weui_btn_primary">修改</a>
        @else
            <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary">立即参与</a>
        @endif

    </div>
</div>
    @endsection