@extends('mobile.master')

@section('title','创客|新增项目')
@section('content')
    <form>
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">项目名称:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='d2'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">产品名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入产品名称" type="text">
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">客户全称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入客户全称" type="text">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">客户所在地:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='ssx'/>

                </div>

            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">详细地址</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入详细地址" type="text">
                </div>
            </div>

            <div class="weui_cells_title">客户需求：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="客户需求" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">跟进情况：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="跟进情况" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">合作状态</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="radio" value="1">合作 <input type="radio" value="2">未合作
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">合同金额:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='d2'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">上传合同</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                   <input type="file">
                </div>
            </div>




        </div>
        <div class="weui_btn_area">
            <a id="formSubmitBtn" href="javascript:" class="weui_btn weui_btn_primary">提交</a>
        </div>
    </form>
    @endsection
    @section('my-js')
    </script><script src="/js/picker.js"></script><script src="/js/picker-city.js"></script>
    <script src="/js/select.js"></script>
    <script>
        $(function(){

            $("#d2").select({
                title: "项目名称",
                items: [
                    {
                        title: "人力资源",
                        value: "001",
                    },
                    {
                        title: "教育",
                        value: "002",
                    },
                    {
                        title: "互联网",
                        value: "003",
                    }
                ],
                onChange: function(d) {
                    $.alert("你选择了"+d.values+d.titles);
                }
            });

            $("#ssx").cityPicker({
                title: "选择省市县"
            });

        });

    </script>
@endsection
