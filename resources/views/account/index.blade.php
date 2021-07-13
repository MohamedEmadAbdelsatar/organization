@extends('adminlte::page')

@section('title', 'الحسابات')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الحسابات</h1></div>
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
      <h3 class="card-title" style="float: right;">تعديل رصيد الحسابات</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('account.save')}}">
        @csrf
      <div class="card-body">
        @foreach($accounts as $account)
            <div class="form-group row" style="text-align: right;">
                <label for="name" class=" col-form-label" style="padding-left: 0px;">{{$account->name}}</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="name" name="charge[]" value="{{$account->charge}}" required>
                    @if($errors->has('charge'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('charge') }}</span>
                    @endif
                </div>
            </div>
        @endforeach

          <div class="col-sm-3">
            <button type="submit" class="btn btn-info" style="width:80px;">حفظ</button>
          </div>
      </div>
      <!-- /.card-body -->
    </form>
</div>
@stop
