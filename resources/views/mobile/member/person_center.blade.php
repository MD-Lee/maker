@extends('mobile.master')

@section('title','个人中心')
@section('content')
    <div>
        <ul>
            <li>王小明</li>
            <li>余额 <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary">提现</a></li>
        </ul>

    </div>
    <div class="weui_cells weui_cells_access">

        <a class="weui_cell" href="/user_info">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>我的资料</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="javascript:;">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>金融理财</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="/user_profit">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>分润明细</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="/project_list">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>项目建立</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>  <a class="weui_cell" href="/user_project">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>参与的产品</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="/user_resources">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>发布的资源</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="/user_report">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>业务报备</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>
        <a class="weui_cell" href="/user_code">
            <div class="weui_cell_hd"><img src="" alt="" style="width:20px;margin-right:5px;display:block"></div>
            <div class="weui_cell_bd weui_cell_primary">
                <p>推荐二维码</p>
            </div>
            <div class="weui_cell_ft"></div>
        </a>


    </div>
    @endsection