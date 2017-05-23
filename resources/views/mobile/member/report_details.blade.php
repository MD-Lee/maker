@extends('mobile.master')

@section('title','创客|报备详情')
@section('content')

<div class="weui_cells">

    <div class='page-hd' >
        <div class="weui_tab" style="height:44px;"   id="tab5">
            <div class="weui_tab_nav"> <a href="javascript:" class="weui_navbar_item weui_nav_green"> 详情 </a> <a href="javascript:" class="weui_navbar_item weui_nav_green"> 历史记录 </a></div>
        </div>

    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>项目名称:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->pname}}</div>
    </div>

    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <p>产品名称:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->product_name}}</div>
    </div>

    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <p>客户全称:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->customer_name}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>客户所在地:</p>
        </div>
        <div class="weui_cell_ft">  {{$report_info->customer_area}}</div>
    </div>


    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>详细地址:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->customer_address}}</div>
    </div>


    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>客户需求:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->customer_require}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>跟进情况:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->follow}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>合作状态:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->pstatus}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>合同金额:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->amount}}</div>
    </div>

    <div class="weui_cell" style="margin-top: 2px">
        <div class="weui_cell_bd weui_cell_primary">
            <p>上传合同:</p>
        </div>
        <div class="weui_cell_ft">{{$report_info->agreement_doc}}</div>
    </div>

</div>
    @endsection