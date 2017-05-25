@extends('admin.master')
@section('title','产品参与人列表')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品库 <span class="c-gray en">&gt;</span> 产品参与人 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            状态：
            <span class="select-box inline">

                <select name="" class="select">
                    <option value="1">合作</option>
                    <option value="2">未合作</option>
                </select>
		    </span>
            日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"></div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">序号</th>
                    <th width="80">参与人</th>
                    <th width="80">手机号</th>
                    <th width="80">报备客户</th>
                    <th width="80">状态</th>
                    <th width="120">参与时间</th>
                </tr>
                </thead>
                <tbody>
@foreach($member_join_project as $v)
                <tr class="text-c">

                    <td>{{$v->id}}</td>
                    <td>{{$v->uname}}</td>
                    <td>{{$v->mobile}}</td>
                    <td>{{$v->customer_name}}</td>
                    <td>{{$v->status}}</td>
                    <td>{{$v->created_at}}</td>

                </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript">
        $('.table-sort').dataTable({
            "aaSorting": [[0, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[1,2]}// 不参与排序的列
            ]
        });
    </script>
@endsection