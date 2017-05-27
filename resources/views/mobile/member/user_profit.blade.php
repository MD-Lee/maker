@extends('mobile.master')

@section('title','创客|分润明细')
@section('content')

    <div class="weui_panel weui_panel_access">

        <table class="report_table" cellpadding="0" cellspacing="0">
            @foreach($user_profit as $up)
                <tr>
                    <td class="title" colspan="2">产品名称:{{$up->product_name}}</td>
                </tr>
                <tr>
                    <td class="title" colspan="2">客户名称:{{$up->customer_name}}</td>
                </tr>
                <tr>
                    <td style="width:50%">回款金额:{{$up->bamount}}</td>
                    <td style="width:50%">分润比例:{{$up->product_profit}}</td>
                </tr>
                <tr>
                    <td>分润金额：{{$up->profit}}</td>
                    <td>{{$up->updated_at}}</td>
                </tr>
                <tr><td class="line" colspan="2"></td></tr>
            @endforeach
        </table>


        <section class="weui-menu">
            <div class="weui-menu-inner">
                <em></em>
                <a href="report_add"> <span> 新增报备</span></a>
            </div>
        </section>
        @endsection

        @section('my-js')
            <script src="/js/updown.js"></script><script src="/js/lazyimg.js"></script>
            <script>
                $(function(){
                });
            </script>
            <script>
                $(function(){
//页数
                    var page = 1;
                    // 每页展示10个
                    var size =10;
                    $('.weui_panel').dropload({
                        scrollArea : window,
                        autoLoad : true,//自动加载
                        domDown : {//上拉
                            domClass   : 'dropload-down',
                            domRefresh : '<div class="dropload-refresh f15 "><i class="icon icon-20"></i>上拉加载更多</div>',
                            domLoad    : '<div class="dropload-load f15"><span class="weui-loading"></span>正在加载中...</div>',
                            domNoData  : '<div class="dropload-noData">没有更多数据了</div>'
                        },
                        loadDownFn : function(me){//加载更多
                            page++;
                            window.history.pushState(null, document.title, window.location.href);
                            var result = '';
                            $.ajax({
                                type: 'post',
                                url:'/dropload_project?type=3&page='+page+'&size='+size,

                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                                success: function(data){
                                    var arrLen = data.length;

                                    if(arrLen > 0){
                                        for(var i=0; i<arrLen; i++){
                                            result+='<tr><td class="title" colspan="2">'+data[i]['product_name']+'</td></tr>'
                                                  +'<tr><td class="title" colspan="2">'+data[i]['customer_name']+'</td></tr>'
                                                  +'<tr><td style="width:50%">回款金额:'+data[i]['bamount']+
                                                        '</td><td style="width:50%">分润比例'+data[i]['product_profit']+
                                                '</td></tr><tr><td>分润金额：'+data[i]['profit']+'</td><td>'+data[i]['updated_at']+'</td> </tr><tr><td class="line" colspan="2"></td></tr>';
                                        }
                                        // 如果没有数据
                                    }else{
                                        // 锁定
                                        me.lock();
                                        // 无数据
                                        me.noData();
                                    }

                                    // 为了测试，延迟1秒加载
                                    setTimeout(function(){
                                        $('.report_table').append(result);
                                        var lazyloadImg = new LazyloadImg({
                                            el: '.weui-updown [data-img]', //匹配元素
                                            top: 50, //元素在顶部伸出长度触发加载机制
                                            right: 50, //元素在右边伸出长度触发加载机制
                                            bottom: 50, //元素在底部伸出长度触发加载机制
                                            left: 50, //元素在左边伸出长度触发加载机制
                                            qriginal: false, // true，自动将图片剪切成默认图片的宽高；false显示图片真实宽高
                                            load: function(el) {
                                                el.style.cssText += '-webkit-animation: fadeIn 01s ease 0.2s 1 both;animation: fadeIn 1s ease 0.2s 1 both;';
                                            },
                                            error: function(el) {

                                            }
                                        });
                                        //
                                        // 每次数据加载完，必须重置
                                        me.resetload();
                                    },1000);
                                },
                                error: function(xhr, type){
                                    alert('Ajax error!');
                                    // 即使加载出错，也得重置
                                    me.resetload();
                                }
                            });
                        }
                    });






                });
            </script>
@endsection