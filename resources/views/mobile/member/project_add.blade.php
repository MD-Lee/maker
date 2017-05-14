@extends('mobile.master')

@section('title','创客|新增项目')
@section('content')
    <form>
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">产品名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入产品名称" type="text">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">项目名称:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='d2'/>

                </div>
            </div>
            <div class="weui_cells_title">产品利润描述：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="产品利润描述" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">产品内容：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="产品内容" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">目标用户：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="目标用户" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">解决了哪些根本性问题：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="解决了哪些根本性问题" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cells_title">盈利点在哪里：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="盈利点在哪里" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span id="count">0</span>/<span id="count_max">20</span></div>
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">产品利润:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='d2'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训方式:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="" id='d3'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训开始时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="2016-12-10" id='date'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训结束时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" value="2016-12-10" id='date1'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">省市县:</label></div>
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
            $("#d3").select({
                title: "培训方式",
                items: [
                    {
                        title: "线上",
                        value: "001",
                    }
                ],
                onChange: function(d) {
                    $.alert("你选择了"+d.values+d.titles);
                }
            });
            $("#date").datetimePicker({title:"选择日期",m:1});
            $("#date1").datetimePicker({title:"选择日期",m:1});
            $("#ssx").cityPicker({
                title: "选择省市县"
            });

        });

    </script>
@endsection
