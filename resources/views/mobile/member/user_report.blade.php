@extends('mobile.master')

@section('title','创客|业务报备')
@section('content')
    <table class="weui-table weui-border-tb">

        <tr ><td colspan="2"style="text-align: left">   <a href="/report_details">新型茶园培养基地项目 </a></td></tr>
        <tr><td>新型茶园培养基地项目</td><td>人力资源</td></tr>
        <tr><td >状态：已合作</td><td>2017-03-28 12:34</td></tr>
    </table>


    <section class="weui-menu">
        <div class="weui-menu-inner">
            <em></em>
            <a href="report_add"> <span> 新增报备</span></a>
        </div>
    </section>
    @endsection