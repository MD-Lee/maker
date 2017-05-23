@extends('mobile.master')

@section('title','创客|新增报备')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <form id="form" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">项目名称:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" @if($id) value="{{$pname}}" @else id='d2' @endif  />

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">产品名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入产品名称" @if($id)value="{{$product_name}}" @else id="d4"  @endif type="text">
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">客户全称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入客户全称" type="text" name="customer_name" @if($rid)value="{{$report_info->customer_name}}"@endif>
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label" >客户所在地:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text"  id='ssx'name="customer_area" @if($rid)value="{{$report_info->customer_area}}"@endif/>

                </div>

            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label" >详细地址</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入详细地址" type="text" name="customer_address" @if($rid)value="{{$report_info->customer_address}}"@endif>
                </div>
            </div>

            <div class="weui_cells_title">客户需求：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="客户需求" rows="3" name="customer_require">@if($rid){{$report_info->customer_require}}@endif</textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">跟进情况：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="跟进情况" rows="3" name="content"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">合作状态</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="radio" name="status" value="1">合作 <input type="radio"name="status" checked value="2">未合作
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">合同金额:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" name="amount" type="text" @if($rid)value="{{$report_info->amount}}"@endif/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">上传合同</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                   <input type="file" name="doc" id="doc">
                </div>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="{{$id}}">
        <input type="hidden" name="rid" id="rid" value="{{$rid}}">
        <div class="weui_btn_area">
            <a id="formSubmitBtn" href="javascript:" class="weui_btn weui_btn_primary">提交</a>
        </div>
    </form>
    @endsection
    @section('my-js')
        <script src="/js/zepto.min.js"></script>
   <script src="/js/picker.js"></script>
   <script src="/js/picker-city.js"></script>
    <script src="/js/select.js"></script>
    <script>
        $(function(){
            var $url = "{{url('get_project_name')}}";
            $.ajax({
                type:'post',
                url:$url,
                dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function (data) {
                    $("#d2").select({
                        title: data.title,
                        items: data.item,
                        onChange: function(d) {
                            var $url = "{{url('get_project_list')}}";
                            $.ajax({
                                type:'post',
                                url:$url,
                                data:{'id':d.values},
                                dataType:'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                                success:function (data) {
                                    $("#d4").select({
                                        title: data.title,
                                        items: data.item,
                                        onChange: function(d) {
                                            $('#d4').val(d.titles);
                                            $('#id').val(d.value);
                                            //$.alert("你选择了"+d.values+d.titles);
                                        }
                                    });
                                }
                            })
                        }
                    });
                }
            })


            $("#ssx").cityPicker({
                title: "选择省市县"
            });

        });
        var $form = $("#form");
        $("#formSubmitBtn").on("click", function(){
            $form.validate(function(error){
                if(error){
                }else{

                    $form.submit();
                    //$.toptips('验证通过提交','ok');
                }
            });

        });
    </script>
@endsection
