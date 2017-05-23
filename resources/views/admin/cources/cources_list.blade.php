@extends('admin.master')
@section('title','产品库')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品库 <span class="c-gray en">&gt;</span> 产品库 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="cources_add('添加课程','/admin/add_cources','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加课程</a></span>  </div>

        <div class="text-c">
            <span class="select-box inline">
                <select name="" class="select">
                    <option value="0">课程分类</option>
                    <option value="1">新人</option>

                </select>
                <select name="" class="select">
                    <option value="0">课程状态</option>
                    <option value="1">发布</option>
                    <option value="2">未发布</option>
                    <option value="3">已关闭</option>
                </select>

		    </span>
            <input type="text" name="" id="" placeholder=" 标题" style="width:250px" class="input-text">
            <input type="text" name="" id="" placeholder=" 创建者" style="width:250px" class="input-text">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">

                    <th width="80">编号</th>
                    <th width="80">名称</th>
                    <th width="80">分类</th>
                    <th width="80">观看人数</th>
                    <th width="80">状态</th>
                    <th width="80">发布人</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c">

                    <td>10001</td>
                    <td>如何时刻保持创业激情</td>
                     <td>新人</td>
                     <td>100</td>
                     <td>已发布</td>
                     <td>王小明</td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="product_details('详情','/admin/product_details','10001')" href="javascript:;" title="详情"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="product_details('查看','/admin/product_in','10001')" href="javascript:;" title="查看"><i class="Hui-iconfont">&#xe709;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript">
        $('.table-sort').dataTable({
            "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[3,5,6]}// 不参与排序的列
            ]
        });


        /*项目-详情*/
        function product_details(title,url,id,w,h){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*项目-删除*/
        function product_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '',
                    dataType: 'json',
                    success: function(data){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }
        /*课程-添加*/
        function cources_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

    </script>
@endsection