@extends('adminlte::page')

@section('title', 'الموردين')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الموردين</h1></div>
    <br>
    @if (\Session::has('success'))
        <div class="alert alert-success" dir="rtl">
            <ul dir="rtl">
                <li style="float:right;">{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">تعديل بيانات مورد </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('supplier.update',$supplier->id)}}">
        @csrf
      <div class="card-body">
        <div class="form-group row" style="text-align: right;">
          <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المورد</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="الإسم" name="name" value="{{$supplier->name}}">
            @if($errors->has('name'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <label for="percent" class=" col-form-label" style="padding-left: 0px;">نسبة المعاملة</label>
          <div class="col-sm-3">
            <input type="num" step="any" class="form-control" id="percent" placeholder="%" name="percent" value="{{$supplier->percent}}">
            @if($errors->has('percent'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('percent') }}</span>
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


