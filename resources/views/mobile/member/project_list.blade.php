@extends('mobile.master')

@section('title','创客|项目建立')
@section('content')
    <table class="weui-table weui-border-tb">

        <tr ><td colspan="2"style="text-align: left">   <a href="/project_details">新型茶园培养基地项目 </a></td></tr>
        <tr><td>人力资源</td><td>2017-03-28 12:34</td></tr>
        <tr><td colspan="2">状态：审核中</td></tr>
    </table>


    <section class="weui-menu">
        <div class="weui-menu-inner">
            <em></em>
            <a href="project_add"> <span> 新增报备</span></a>
        </div>
    </section>
    @endsection