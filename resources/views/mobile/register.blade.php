<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>会员管理</title>

    <!-- header binge -->
    <include file="Public/header" />
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{$Think.config.URL}js/jquery.cookie.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!-- header end -->
    <script type="text/javascript" src="{$Think.config.URL}js/jquery.form.min.js"></script>
    <script type="text/javascript" src="{$Think.config.URL}js/new/unify.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function(){


            jQuery('.taglist .close').click(function(){
                jQuery(this).parent().remove();
                return false;
            });

        });
    </script>

</head>


<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>
<body>

<!-- header binge -->
<include file="Public/head" />

<!-- header end -->

<div class="rightpanel">
    <!-- head binge -->

    <include file="Public/nav" name='会员管理'/>

    <!-- head end -->

    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div>
                    <div class="widgetbox personal-information">
                        <h4 class="widgettitle">会员管理</h4>
                        <div class="widgetcontent" id="user" method="get">
                            <form id="form" action="{:U('Admin/s_manage')}">
                                <input type="hidden" value="{$type}" id="type">
                                <select name="type" style="width: 80px;" id="select1">
                                    <option value="1">手机号</option>
                                    <option value="2">姓名</option>
                                </select>
                                <input type="text" class="input-xlarge" name="content" placeholder="请输入要搜索的手机号码或姓名" style="width:150px;" value="{$content}">
                                <input type="hidden" value="{$is_adopt}" id="is_adopt">
                                <select name="is_adopt" style="width:100px;" id="select2">
                                    <option value="">选择状态</option>
                                    <option value="-1">未完善个人资料</option>
                                    <option value="0">申请中</option>
                                    <option value="1">通过审核</option>
                                    <option value="2">未通过</option>
                                    <option value="3">已取消申请</option>
                                </select>
                                <!-- <if condition="$limits eq '1'">
                                    <input type="hidden" value="{$loan_people}" id="loan_people">
                                    <select name="loan_people" style="width:100px;" id="select3">
                                        <option value="">选择审核人员</option>
                                            <volist name="info" id="vo">
                                                <option value="{$vo.userid}">{$vo.userid}</option>
                                            </volist>
                                    </select>
                                </if> -->
                                <span>日期：<input type="text" id="datepicker1" style="width:80px" name="apply_time1" value="{$apply_time1}">至<input type="text" id="datepicker2" style="width:80px" name="apply_time2" value="{$apply_time2}"></span>
                                <input type="submit" class="btn btn-primary" value="搜索" name="submit">
                            </form>
                            <div  id="tab1">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="300px;">昵称</th>
                                        <th width="100px;">姓名</th>
                                        <th width="200px;">手机</th>
                                        <th width="300px;">注册时间</th>
                                        <!-- <th width="200px;">状态</th> -->
                                        <th width="200px;">操作</th>
                                        <!-- <th width="100px;">审核人员</th>
                                        <th width="100px;">推荐人</th> -->
                                    </tr>
                                    <volist name="list" id="vo">
                                        <tr id="s_manage{$vo.id}">
                                            <td>{$vo.uname}</td>
                                            <td>{$vo.name}</td>
                                            <td><a href="{:U('Admin/user_details',array('id'=>$vo[id]))}">{$vo.phone}</a></td>
                                            <td>{$vo.time}</td>
                                            <!-- <td>
                                                <if condition="$vo.status eq -1">
                                                       未完善个人资料
                                                   <elseif condition="$vo.status eq 0"/>
                                                       提交资料,审核中
                                                   <elseif condition="$vo.status eq 1"/>
                                                       通过审核
                                                   <elseif condition="$vo.status eq 2"/>
                                                       未通过
                                                <elseif condition="$vo.status eq 3"/>
                                                       重新提交资料,审核中
                                                   </if>
                                            </td> -->
                                            <!-- <td>{$vo.loan_people}</td>
                                            <td>{$vo.recommend}</td> -->
                                            <td>	<a href="#myModal" role="button" class="btn btn-default" data-toggle="modal" onclick="loan({$vo.id},1)" id="{$vo.id}">审核</a>
                                            </td>
                                        </tr>
                                    </volist>
                                </table>
                                {$page}
                            </div>

                        </div>

                    </div>
                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">确定收款</h3>
                        </div>
                        <div class="modal-body">
                            <p>是否已经确定还款</p>
                        </div>
                        <div id="showtype" style="display:none">
                            信用度<input type="text" value="" id="credit"/>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="" id="pid">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                            <button class="btn btn-primary" onclick="is_Loan()">确定收款</button>
                            <button class="btn btn-primary" onclick="no_Loan()">未收款</button>
                        </div>
                    </div>
                </div><!--row-fluid-->


                <!-- footer binge -->
                <include file="Public/footer" />

                <!-- footer end -->



            </div><!--maincontentinner-->
        </div><!--maincontent-->

    </div><!--rightpanel-->

</div><!--mainwrapper-->

</body>

<script>
    function loan(id,huankuan_type){
        var id = id;
        var type = huankuan_type;
        $('#pid').val(id);

        if(type == 1){
            $("#showtype").show();
        }
    }
    var type = $('#type').val();
    $('#select1').find("option[value='"+type+"']").attr("selected",true);
    var is_adopt = $('#is_adopt').val();
    $('#select2').find("option[value='"+is_adopt+"']").attr("selected",true);
    var loan_people = $('#loan_people').val();
    $('#select3').find("option[value='"+loan_people+"']").attr("selected",true);

    //日期选择器
    $(function() {
        $( "#datepicker1" ).datepicker({ dateFormat:"yy-mm-dd" });
        $( "#datepicker2" ).datepicker({ dateFormat:"yy-mm-dd" });
    });
    //搜索手机用户
    function user_search(){
        $('#table #tr').siblings('tr').remove();
        $('#form').ajaxSubmit({
            type:"POST",
            url:"{:U('Admin/s_manage_search')}",
            datatype:"json",
            success:function(data){
                $.each(data,function(){
                    if(this.is_adopt == -1){
                        $('#table').append("<tr>"
                            +"<td>"+this.uname+"</td>"
                            +"<td>"+this.name+"</td>"
                            +"<td><a href='/index.php/Admin/user_details?phone="+this.phone+"'>"+this.phone+"</a></td>"
                            +"<td>"+this.time+"</td>"
                            +"<td>未完善个人资料</td>"
                            +"<if condition='"+this.loan_people+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.loan_people+"</td>"
                            +"</if>"
                            +"<if condition='"+this.recommend+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.recommend+"</td>"
                            +"</if>"
                            +"</tr>");
                    }else if(this.is_adopt == 0){
                        $('#table').append("<tr>"
                            +"<td>"+this.uname+"</td>"
                            +"<td>"+this.name+"</td>"
                            +"<td><a href='/index.php/Admin/user_details?phone="+this.phone+"'>"+this.phone+"</a></td>"
                            +"<td>"+this.time+"</td>"
                            +"<td><span style='color:red'>申请中</span></td>"
                            +"<if condition='"+this.loan_people+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.loan_people+"</td>"
                            +"</if>"
                            +"<if condition='"+this.recommend+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.recommend+"</td>"
                            +"</if>"
                            +"</tr>");
                    }else if(this.is_adopt == 1){
                        $('#table').append("<tr>"
                            +"<td>"+this.uname+"</td>"
                            +"<td>"+this.name+"</td>"
                            +"<td><a href='/index.php/Admin/user_details?phone="+this.phone+"'>"+this.phone+"</a></td>"
                            +"<td>"+this.time+"</td>"
                            +"<td>通过审核</td>"
                            +"<if condition='"+this.loan_people+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.loan_people+"</td>"
                            +"</if>"
                            +"<if condition='"+this.recommend+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.recommend+"</td>"
                            +"</if>"
                            +"</tr>");
                    }else if(this.is_adopt == 2){
                        $('#table').append("<tr>"
                            +"<td>"+this.uname+"</td>"
                            +"<td>"+this.name+"</td>"
                            +"<td><a href='/index.php/Admin/user_details?phone="+this.phone+"'>"+this.phone+"</a></td>"
                            +"<td>"+this.time+"</td>"
                            +"<td>未通过审核</td>"
                            +"<if condition='"+this.loan_people+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.loan_people+"</td>"
                            +"</if>"
                            +"<if condition='"+this.recommend+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.recommend+"</td>"
                            +"</if>"
                            +"</tr>");
                    }else if(this.is_adopt == 3){
                        $('#table').append("<tr>"
                            +"<td>"+this.uname+"</td>"
                            +"<td>"+this.name+"</td>"
                            +"<td><a href='/index.php/Admin/user_details?phone="+this.phone+"'>"+this.phone+"</a></td>"
                            +"<td>"+this.time+"</td>"
                            +"<td>已取消申请</td>"
                            +"<if condition='"+this.loan_people+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.loan_people+"</td>"
                            +"</if>"
                            +"<if condition='"+this.recommend+" eq null'>"
                            +"<td></td>"
                            +"<else/>"
                            +"<td>"+this.recommend+"</td>"
                            +"</if>"
                            +"</tr>");
                    }
                });
                $('#tab1').css('display','none');
                $('#tab2').css('display','block');
            }
        })
    }
</script>
</html>
