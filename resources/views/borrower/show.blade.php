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

<div class="card card-info">
    <div class="card-header">
      <h2 class="card-title" style="float: right;"> بيانات المقترض</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info" dir="rtl">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">البيانات</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المقترض</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الضامن</span></th>

                        </tr>
                        </thead>
                        <tbody>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">الإسم</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_name}}</span></td>
                                </tr>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">العنوان</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->city->name}},{{$borrower->governorate->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_city['name']}},{{$borrower->guaranator_governorate['name']}}</span></td>
                                </tr>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">رقم الهاتف</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->phone}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_phone}}</span></td>
                                </tr>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">الرقم القومى</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->national_id}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_national_id}}</span></td>
                                </tr>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">محل الإقامة</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->location}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_location}}</span></td>
                                </tr>
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">الوظيفة</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->job}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->guaranator_job}}</span></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="card">
    <div class="card-header">
      <h2 class="card-title" style="float: right;">القروض</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info" dir="rtl">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المقترض</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">القيمة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الباقى</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الحالة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">إختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($borrower->loans as $loan)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->borrower->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->value}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->remaining}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($loan->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">تعديل - حذف</span></td>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
@stop
