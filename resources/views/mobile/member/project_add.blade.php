@extends('mobile.master')

@section('title','创客|新增项目')
@section('content')
    <form id="form" action="" method="post">
        {{ csrf_field() }}
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">产品名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" placeholder="请输入产品名称" @if($id) value="{{$project->product_name}}"@endif name="product_name" type="text" required  maxlength="22" placeholder="请输入产品名称" emptyTips="请输入产品名称" notMatchTips="请输入产品名称">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">项目名称:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                	<select class="weui_select2">
                    	<option>人力资源</option>
                    	<option>教育</option>
                    	<option>互联网</option>
                    </select>
                    <a class="creat_project" href="javascript:void();" onclick="showAll('.add_pro')">创建项目</a>
                    <!--<input class="weui_input" type="text" @if($id) value="{{$project->pid}}" @endif id='d2'/>-->
                </div>
            </div>
            <div style="height:1px; background:#ececec; margin-left:15px;"></div>
            
            <div class="weui_cells_title">产品利润描述：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="profit_description" class="weui_textarea" placeholder="产品利润描述" name="profit_description" rows="3">@if($id){{$project->profit_description}}@endif</textarea>
                </div>
            </div>
            <div class="weui_cells_title">产品内容：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="content" class="weui_textarea" placeholder="产品内容" name="content" rows="3">@if($id){{$project->content}}@endif</textarea>
                </div>
            </div>
            <div class="weui_cells_title">目标用户：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="目标用户"name="customer" rows="3">@if($id){{$project->customer}}@endif </textarea>
                </div>
            </div>
            <div class="weui_cells_title">解决了哪些根本性问题：</div>
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="解决了哪些根本性问题" name="problems" rows="3">@if($id) {{$project->problems}}@endif</textarea>
                </div>
            </div>
            <div class="weui_cells_title">盈利点在哪里：</div>
            <div class="weui_cell">

                <div class="weui_cell_bd weui_cell_primary">
                    <textarea id="textarea" class="weui_textarea" placeholder="盈利点在哪里" name="profit_point" rows="3">@if($id) {{$project->profit_point}}@endif</textarea>
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">产品利润:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" @if($id) value="{{$project->product_profit}}"@endif name="product_profit" id='d2'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训方式:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" @if($id)value="{{$project->product_profit}}"@endif name="train_methods" id='d3'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训开始时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" name="train_start_time" @if($id)value="{{$project->train_start_time}}"@endif id='date'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训结束时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" name="train_end_time" @if($id)value="{{$project->train_end_time}}"@endif id='date1'/>

                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">培训地点:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" name="area" @if($id)value="{{$project->area}}"@endif id='ssx'/>

                </div>

            </div>

            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">详细地址</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" name="address" placeholder="请输入详细地址" type="text" @if($id)value="{{$project->address}}"@endif>
                </div>
            </div>

        </div>

        <input type="hidden" name="id" value="{{$id}}">
        <div class="weui_btn_area">
            <a id="formSubmitBtn" href="javascript:"  class="weui_btn weui_btn_primary">提交</a>
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
                    $.alert("你选择了"+d.titles);
                }
            });
            $("#d3").select({
                title: "培训方式",
                items: [
                    {
                        title: "线上"

                    }
                ],
                onChange: function(d) {
                    $('#d3').val(d.titles);
                    //$.alert("你选择了"+d.values+d.titles);
                }
            });
            $("#date").datetimePicker({title:"选择日期",m:1});
            $("#date1").datetimePicker({title:"选择日期",m:1});
            $("#ssx").cityPicker({
                title: "选择省市县"
            });
			
            /*var max = $('#count_max').text();
            $('.weui_textarea').on('input', function(){
                var text = $(this).val();
                var len = text.length;
                $('#count').text(len);
                if(len > max){
                    $(this).closest('.weui_cell').addClass('weui_cell_warn');
                }
                else{
                    $(this).closest('.weui_cell').removeClass('weui_cell_warn');
                }
            });*/

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
    <script>
	$(function(){
		$('.close_R').click(function () {
			$(".add_pro").hide();
			$('.mask').hide();
		});
	});
	
	function showMask(){  
		$("#mask").css("height",$(document).height());  
		$("#mask").css("width",$(document).width());  
		$("#mask").show();  
	}  
	//让指定的DIV始终显示在屏幕正中间  
	function letDivCenter(divName){   
		var top = ($(window).innerHeight() - $(divName).height())/2;   
		var left = ($(window).width() - $(divName).width())/2;   
		var scrollTop = $(document).scrollTop();   
		var scrollLeft = $(document).scrollLeft();   
		$(divName).css( {  left : left ,top:top} ).show();  
	}
	
	function showAll(divName,id){  
		showMask(); 
		letDivCenter(divName);  
	}
		
	</script>
    
@endsection

<!--弹窗-->
<div class="mask" id="mask"></div>
<div class="add_pro">
	<a class="close_R" href="javascript:void();">关闭</a>
    <div class="add_pro_tle">
        <input type="text" placeholder="请输入项目名称"/>
    </div>
    <div class="add_pro_btn">
        <a class="" href="javascript:void()">提交</a>
    </div>

</div>
