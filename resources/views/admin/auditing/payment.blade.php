@extends('admin.master')
@section('title','产品库')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 财务中心 <span class="c-gray en">&gt;</span> 回款审核 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            关键词：<input type="text" name="" id="" placeholder=" 输入产品名称/客户名称" style="width:250px" class="input-text">

            回款状态： <span class="select-box inline">
                <select name="" class="select">
                    <option value="0">已回款</option>
                    <option value="0">未回款</option>


                </select>


		    </span>
            产品分类
            <span class="select-box inline">
                <select name="" class="select">
                    <option value="0">人力资源</option>
                    <option value="1">教育</option>

                </select>
                <select name="" class="select">
                    <option value="0">劳务派遣</option>

                </select>

		    </span>

            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">序号</th>
                    <th width="80">产品名称</th>
                    <th width="80">产品分类</th>
                    <th width="80">客户名称</th>
                    <th width="80">应收回款</th>
                    <th width="80">回款状态</th>
                    <th width="80">支付方式</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($project_report as $v)
                <tr class="text-c">
                    <td>{{$v->id}}</td>
                    <td>{{$v->product_name}}</td>
                     <td>{{$v->pname}}</td>
                     <td>{{$v->customer_name}}</td>
                     <td>{{$v->amount}}</td>
                     <td>{{$v->bstatus_name}}</td>
                     <td>{{$v->pay_method}}</td>
                    <td class="f-14 td-manage">
                      @if($v->bstatus ==2)  <a style="text-decoration:none" class="ml-5" onclick="payment_add('线下收款','/admin/add_payment/{{$v->id}}','800','500')" href="javascript:;" title="收款">收款</a>@endif
                        <a style="text-decoration:none" class="ml-5" onClick="payment_details('查看','/admin/report_details/{{$v->id}}/1')" href="javascript:;" title="查看">详情</a>
                        <a style="text-decoration:none" class="ml-5" onClick="payment_del(this,'{{$v->id}}')" href="javascript:;" title="删除">删除</a>
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
                {"orderable":false,"aTargets":[3,5,6]}// 不参与排序的列
            ]
        });


        /*回款-详情*/
        function payment_details(title,url,id,w,h){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*回款-删除*/
        function  payment_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '/admin/del_payment/'+id,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        if(data.error ==1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }else{
                            alert("删除失败");
                        }

                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }
        /*回款-添加*/
        /*
         参数解释：
         title	标题
         url		请求的url
         id		需要操作的数据id
         w		弹出层宽度（缺省调默认值）
         h		弹出层高度（缺省调默认值）
         */

        function payment_add(title,url,w,h){
            layer_show(title,url,w,h);
        }

    </script>
@endsection