@extends('admin.master')
@section('title','产品库')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品库 <span class="c-gray en">&gt;</span> 产品库 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        {{--<div class="text-c">
            <span class="select-box inline">
                <select name="" class="select">
                    <option value="0">项目</option>
                    <option value="1">人力资源</option>
                    <option value="2">教育</option>
                </select>
		    </span>
            <input type="text" name="" id="" placeholder=" 产品名称" style="width:250px" class="input-text">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
        </div>--}}
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong>{{$sum}}</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">序号</th>
                    <th width="80">项目名称</th>
                    <th width="80">产品名称</th>
                    <th width="80">区域</th>
                    <th width="80">参与人数</th>
                    <th width="120">发布时间</th>

                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $v)
                <tr class="text-c">
                    <td><input type="checkbox" value="{{$v->id}}" name="del_id"></td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->pname}}</td>
                    <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="product_details('详情','/admin/project_details/{{$v->id}}')" title="详情">{{$v->product_name}}</u></td>
                    <td>{{$v->area}}</td>
                     <td>{{$v->member_number}}</td>
                    <td>{{$v->created_at}}</td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="product_details('详情','/admin/project_details/{{$v->id}}')" href="javascript:;" title="详情"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="product_details('查看','/admin/product_in/{{$v->id}}')" href="javascript:;" title="查看"><i class="Hui-iconfont">&#xe709;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{$v->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>

                    </td>
                </tr>
                @endforeach
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
                {"orderable":false,"aTargets":[3,6]}// 不参与排序的列
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
                    url: '/admin/del_project/'+id,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        if(data.error){
                            alert(data.msg);
                        }else{
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }

                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }

        function datadel() {
            layer.confirm('确认要删除吗？',function(index){
                var str="";
                $('input[name="del_id"]:checked').each(function(){

                    str+=$(this).val()+',';
                })
                $.ajax({
                    type: 'POST',
                    url: '/admin/delall_project',
                    data:{'str':str},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        if(data.error){
                            alert(data.msg);
                        }else{
                            $('input[name="del_id"]:checked').each(function(){

                                $(this).parents("tr").remove();
                            })
                            layer.msg('已删除!',{icon:1,time:1000});
                        }

                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });



        }
    </script>
@endsection