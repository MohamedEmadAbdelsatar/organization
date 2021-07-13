@extends('adminlte::page')

@section('title', 'المقترضين')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">المقترضين</h1></div>
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
      <h3 class="card-title" style="float: right;">إدخال مقترض جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('borrower.update',$borrower->id)}}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <center><h3>بيانات المقترض</h3></center>
                <div class="card-body">
                    <div class="form-group row" style="text-align: right;">
                      <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المقترض</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="name" value="{{$borrower->name}}" required>
                        @if($errors->has('name'))
                            <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="governorate_1" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="governorate_id" id="governorate_1">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}" @if($borrower->governorate_id == $governorate->id) selected @endif>{{$governorate->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('governorate_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('governorate_id') }}</span>
                            @endif
                        </div>
                        <label for="city_1" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="city_id" id="city_1">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}" @if($borrower->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('city_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('city_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" placeholder=" " name="phone" value="{{$borrower->phone}}" required>
                            @if($errors->has('phone'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="national_id" placeholder=" " name="national_id" value="{{$borrower->national_id}}" required>
                            @if($errors->has('national_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('national_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="location" value="{{$borrower->location}}" name="location" required>
                            @if($errors->has('location'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('location') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="job" value="{{$borrower->job}}" name="job" required>
                            @if($errors->has('job'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('job') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <center><h3>بيانات الضامن</h3></center>
                <div class="card-body">
                    <div class="form-group row" style="text-align: right;">
                      <label for="guaranator_name" class=" col-form-label" style="padding-left: 0px;">إسم الضامن</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="guaranator_name" placeholder="الإسم" name="guaranator_name" required value="{{$borrower->guaranator_name}}">
                        @if($errors->has('guaranator_name'))
                            <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_governorate_2" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_governorate_id" id="guaranator_governorate_2">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}" @if($borrower->guaranator_governorate_id == $governorate->id) selected @endif>{{$governorate->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('guaranator_governorate_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_governorate_id') }}</span>
                            @endif
                        </div>
                        <label for="guaranator_city_2" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_city_id" id="guaranator_city_2">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}" @if($borrower->guaranator_city_id == $city->id) selected @endif>{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('guaranator_city_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_city_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_phone" value="{{$borrower->guaranator_phone}}" name="guaranator_phone" required>
                            @if($errors->has('guaranator_phone'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_national_id" value="{{$borrower->guaranator_national_id}}" name="guaranator_national_id" required>
                            @if($errors->has('guaranator_national_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_national_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_location" value="{{$borrower->guaranator_location}}" name="guaranator_location" required>
                            @if($errors->has('guaranator_location'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_location') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_job" value="{{$borrower->guaranator_job}}" name="guaranator_job" required>
                            @if($errors->has('guaranator_job'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_job') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <center>
                    <button type="submit" class="btn btn-info" style="width:120px;">حفظ</button>
                </center>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
      <!-- /.card-body -->
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


