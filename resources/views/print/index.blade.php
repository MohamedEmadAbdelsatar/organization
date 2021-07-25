@extends('adminlte::page')

@section('title', 'الطباعة')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الطباعة</h1></div>
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">الطباعة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('print.pay')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="month" class=" col-form-label" style="padding-left: 0px;">طباعة تقرير السداد عن شهر:</label>
                <div class="col-sm-3">
                    <select class="form-control" id="month" name="month">
                        <option value="1">يناير</option>
                        <option value="2">فبراير</option>
                        <option value="3">مارس</option>
                        <option value="4">ابريل</option>
                        <option value="5">مايو</option>
                        <option value="6">يونيو</option>
                        <option value="7">يوليو</option>
                        <option value="8">أغسطس</option>
                        <option value="9">سبتمبر</option>
                        <option value="10">أكتوبر</option>
                        <option value="11">نوفمبر</option>
                        <option value="12">ديسمبر</option>
                    </select>
                </div>
                <label for="year" class=" col-form-label" style="padding-left: 0px;">لسنة : </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="year" name="year" value="{{ now()->year }}">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info" style="width:80px;">طباعة</button>
                </div>
            </div>
        </div>
      <!-- /.card-body -->
    </form>
    <form class="form-horizontal" method="POST" action="{{route('print.late')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="month" class=" col-form-label" style="padding-left: 0px;">طباعة تقرير المتعثرين عن شهر:</label>
                <div class="col-sm-3">
                    <select class="form-control" id="month" name="month">
                        <option value="1">يناير</option>
                        <option value="2">فبراير</option>
                        <option value="3">مارس</option>
                        <option value="4">ابريل</option>
                        <option value="5">مايو</option>
                        <option value="6">يونيو</option>
                        <option value="7">يوليو</option>
                        <option value="8">أغسطس</option>
                        <option value="9">سبتمبر</option>
                        <option value="10">أكتوبر</option>
                        <option value="11">نوفمبر</option>
                        <option value="12">ديسمبر</option>
                    </select>
                </div>
                <label for="year" class=" col-form-label" style="padding-left: 0px;">لسنة : </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="year" name="year" value="{{ now()->year }}">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info" style="width:80px;">طباعة</button>
                </div>
            </div>
        </div>
      <!-- /.card-body -->
    </form>
    <form class="form-horizontal" method="POST" action="{{route('print.borrower')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="borrower" class=" col-form-label" style="padding-left: 0px;">طباعة تقرير القروض لمقترض : </label>
                <div class="col-sm-2">
                    <select type="date" class="form-control select2" id="borrower" name="borrower" >
                        @foreach($borrowers as $borrower)
                            <option value="{{$borrower->id}}">{{$borrower->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('borrower'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('borrower') }}</span>
                    @endif
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-info" style="width:80px;">طباعة</button>
                </div>
            </div>
        </div>
    </form>
    <form class="form-horizontal" method="POST" action="{{route('print.batches')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="supplier" class=" col-form-label" style="padding-left: 0px;">طباعة تقرير دفعات السداد لمورد   : </label>
                <div class="col-sm-2">
                    <select type="date" class="form-control select2" id="supplier" name="supplier" >
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('supplier'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('supplier') }}</span>
                    @endif
                </div>
                <label for="month" class=" col-form-label" style="padding-left: 0px;"> عن شهر:</label>
                <div class="col-sm-2">
                    <select class="form-control" id="month" name="month">
                        <option value="1">يناير</option>
                        <option value="2">فبراير</option>
                        <option value="3">مارس</option>
                        <option value="4">ابريل</option>
                        <option value="5">مايو</option>
                        <option value="6">يونيو</option>
                        <option value="7">يوليو</option>
                        <option value="8">أغسطس</option>
                        <option value="9">سبتمبر</option>
                        <option value="10">أكتوبر</option>
                        <option value="11">نوفمبر</option>
                        <option value="12">ديسمبر</option>
                    </select>
                </div>
                <label for="year" class=" col-form-label" style="padding-left: 0px;">لسنة : </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="year" name="year" value="{{ now()->year }}">
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-info" style="width:80px;">طباعة</button>
                </div>
            </div>
        </div>
    </form>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$(function(){
    $('.select2').select2()
})
</script>
@stop
