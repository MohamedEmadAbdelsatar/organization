@extends('adminlte::page')

@section('title', 'المدن')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">المدن</h1></div>
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
      <h3 class="card-title" style="float: right;">تعديل بيانات المدينة </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('city.update',$city->id)}}">
        @csrf
      <div class="card-body">
        <div class="form-group row" style="text-align: right;">
          <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المدينة</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="الإسم" name="name" value="{{$city->name}}" required>
            @if($errors->has('name'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <label for="governorate" class="col-form-label" style="padding-left: 0px;">أختر المحافظة</label>
          <div class="col-sm-3">
            <select class="form-control" name="governorate_id" id="governorate" required>
                @foreach ($governorates as $governorate)
                    <option value="{{$governorate->id}}" @if($governorate->id == $city->governorate->id) selected @endif>{{$governorate->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-sm-2">
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

