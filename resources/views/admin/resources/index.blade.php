@extends('admin.master')
@section('title','产品库')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资源库 <span class="c-gray en">&gt;</span> 寻求资源 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">

        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="resources_add('添加资源','/admin/add_resources','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加资源</a></span>  </div>

        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">

                    <th width="80">序号</th>
                    <th width="80">需求名称</th>
                    <th width="80">发布人</th>
                    <th width="120">发布时间</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c">

                    <td>10001</td>
                    <td>谁有新兴茶园培育基地资源</td>
                     <td>王建一</td>
                    <td>2014-6-11 11:11:42</td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="resources_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>

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
            "aaSorting": [[ 0, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[1,2,4]}// 不参与排序的列
            ]
        });



        /*项目-删除*/
        function resources_del(obj,id){
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
        /*
         参数解释：
         title	标题
         url		请求的url
         id		需要操作的数据id
         w		弹出层宽度（缺省调默认值）
         h		弹出层高度（缺省调默认值）
         */
        /*管理员-增加*/
        function resources_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
    </script>
@endsection