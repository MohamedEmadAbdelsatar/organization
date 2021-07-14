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
                    <input type="number" step="1" class="form-control" id="name" name="charge[]" value="{{$account->charge}}" required>
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

<div class="card">
    <div class="card-header">
      <h2 class="card-title" style="float: right;">التفاصيل</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info" dir="rtl">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">النوع</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">التفاصيل</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">العميل</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">قرض / وارد</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;"> التاريخ </span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($log->method == 'add') {{'إيداع'}} @else {{'سحب'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$log->body}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($log->type == 1) <a href="{{route('borrower.show',$log->user_id)}}"> @foreach($borrowers as $borrower) @if($borrower->id == $log->user_id) {{$borrower->name}} @endif @endforeach</a> @else <a href="{{route('supplier.show',$log->user_id)}}">@foreach($suppliers as $supplier) @if($supplier->id == $log->user_id) {{$supplier->name}} @endif @endforeach</a> @endif</span></td>
                                    <td><span style="float:right;">@if($log->type == '1') {{'قرض'}} @else {{'وارد'}} @endif</span></td>
                                    <td><span style="float:right;">{{\Carbon\Carbon::parse($log->created_at)->format('Y/m/d')}}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@stop
