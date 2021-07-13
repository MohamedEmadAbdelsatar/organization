@extends('adminlte::page')

@section('title', 'المحافظات')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">المحافظات</h1></div>
    <br>
    @if (\Session::has('success'))
        <div class="alert alert-success" dir="rtl">
            <ul dir="rtl">
                <li style="float:right;"><li>{!! \Session::get('success') !!}</li></li>
            </ul>
        </div>
    @endif
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">تعديل بيانات محافظة </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('governorate.update',$governorate->id)}}">
        @csrf
      <div class="card-body">
        <div class="form-group row" style="text-align: right;">
          <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المحافظة</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="name" placeholder="الإسم" name="name" value="{{$governorate->name}}" required>
            @if($errors->has('name'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-info" style="width:80px;">حفظ</button>
          </div>

        </div>
      </div>
      <!-- /.card-body -->
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
