@extends('admin.master')
@section('title','设置')
@section('content')
<div class="page-container">
    <div class="page-container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="" method="post" class="form form-horizontal" id="form-article-add">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>报备上限：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="" id="title" name="number" @if($setting_info) value="{{$setting_info[0]->number}}" @endif>次
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">报备有效期：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box">
                    <select name="time" class="select">
                        @for($i=1;$i<=12;$i++)

                        <option  @if($setting_info)@if($setting_info[0]->time == $i)  selected @endif @endif value="{{$i}}">{{$i}}个月</option>
                        @endfor


                    </select>
                    </span>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            </div>
        </div>
    </form>

</div>

@endsection