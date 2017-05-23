@extends('mobile.master')

@section('title','创客|参与的产品')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <div class="weui_panel weui_panel_access">
    <table class="weui-table weui-border-tb">
        @foreach($user_join_projects as $v)
        <tr ><td colspan="2"style="text-align: left">{{$v->product_name}}</td></tr>
        <tr><td>{{$v->pname}}</td><td>{{$v->created_at}}</td></tr>
        <tr><td>{{$v->area}}</td><td>已有{{$v->number}}人参与</td></tr>
        <tr><td colspan="2"><a href="report_add/{{$v->npid}}" class="weui_btn weui_btn_primary">新增报备</a></td></tr>
            @endforeach
    </table>
    </div>

@endsection

@section('my-js')
    <script src="/js/updown.js"></script>
    <script src="/js/lazyimg.js"></script>
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
                        url:'/dropload_project?type=2&page='+page+'&size='+size,

                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data){
                            var arrLen = data.length;

                            if(arrLen > 0){
                                for(var i=0; i<arrLen; i++){
                                    result+='<a href="/project_details" class="weui_media_box weui_media_appmsg">'
                                        +'<tr><td colspan="2"><h4 class="weui_media_title">'
                                        +data[i]['product_name']
                                        +'</h4></td></tr>'
                                        +'<tr><td style="text-align: left">人力资源</td><td style="text-align: right">2015-12-01</td></tr>'
                                        +'<tr> <td style="text-align: left">青岛市-李沧区</td><td style="text-align: right">已有100人参与</td></tr>'
                                        +'</a>';
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
                                $('.weui-table').append(result);
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