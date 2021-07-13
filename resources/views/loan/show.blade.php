@extends('adminlte::page')

@section('title', 'القروض')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">القروض</h1></div>
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
      <h3 class="card-title" style="float: right;">تفاصيل قرض </h3>
    </div>
    <!-- /.card-header -->
    <table class="table table-bordered table-hover dataTable dtr-inline" dir="rtl" style="text-align: right;">
        <tbody>
            <tr>
                <td>إسم المقترض</td>
                <td><a href="{{route('borrower.show',$loan->borrower->id)}}">{{$loan->borrower->name}}</a></td>
            </tr>
            <tr>
                <td>قيمة القرض</td>
                <td>{{$loan->value}}</td>
            </tr>
            <tr>
                <td>نسبة المعاملة</td>
                <td>%{{$loan->earn}}</td>
            </tr>
            <tr>
                <td>إجمالى المستحق</td>
                <td>{{$loan->total}}</td>
            </tr>
            <tr>
                <td>إجمالى المبلغ المسدد</td>
                <td>{{$loan->total_paid}}</td>
            </tr>
            <tr>
                <td>قيمة القسط</td>
                <td>{{$loan->installment}}</td>
            </tr>
            <tr>
                <td>تاريخ بداية السداد</td>
                <td>
                    @switch($loan->start)
                        @case(1)
                        {{'يناير'}}
                        @break
                        @case(2)
                        {{'فبراير'}}
                        @break
                        @case(3)
                        {{'مارس'}}
                        @break
                        @case(4)
                        {{'إبريل'}}
                        @break
                        @case(5)
                        {{'مايو'}}
                        @break
                        @case(6)
                        {{'يونيو'}}
                        @break
                        @case(7)
                        {{'يوليو'}}
                        @break
                        @case(8)
                        {{'أغسطس'}}
                        @break
                        @case(9)
                        {{'سبتمبر'}}
                        @break
                        @case(10)
                        {{'أكتوبر'}}
                        @break
                        @case(11)
                        {{'نوفمبر'}}
                        @break
                        @case(12)
                        {{'ديسمبر'}}
                        @break
                    @endswitch
                    , {{$loan->start_year}}
                </td>
            </tr>
            <tr>
                <td>تاريخ أخر قسط</td>
                <td>
                    @switch($loan->end)
                        @case(1)
                        {{'يناير'}}
                        @break
                        @case(2)
                        {{'فبراير'}}
                        @break
                        @case(3)
                        {{'مارس'}}
                        @break
                        @case(4)
                        {{'إبريل'}}
                        @break
                        @case(5)
                        {{'مايو'}}
                        @break
                        @case(6)
                        {{'يونيو'}}
                        @break
                        @case(7)
                        {{'يوليو'}}
                        @break
                        @case(8)
                        {{'أغسطس'}}
                        @break
                        @case(9)
                        {{'سبتمبر'}}
                        @break
                        @case(10)
                        {{'أكتوبر'}}
                        @break
                        @case(11)
                        {{'نوفمبر'}}
                        @break
                        @case(12)
                        {{'ديسمبر'}}
                        @break
                    @endswitch
                    , {{$loan->end_year}}
                </td>
            </tr>
            <tr>
                <td>نظام القسط</td>
                <td>شهرى</td>
            </tr>
            <tr>
                <td>مسدد</td>
                <td>@if($loan->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</td>
            </tr>
            <tr>
                <td>عدد الدفعات المسددة</td>
                <td>{{$loan->paid_months}}</td>
            </tr>
            <tr>
                <td>عدد الدفعات غير المسددة</td>
                <td>{{$loan->un_paid_months}}</td>
            </tr>
            <tr>
                <td>الباقى</td>
                <td>{{$loan->remaining}}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card">
    <div class="card-header">
      <h2 class="card-title" style="float: right;">دفعات السداد</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info" dir="rtl">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">التاريخ</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">القيمة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الحالة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">عدد مرات التأخير</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($loan->months as $month)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$month->month_name}},{{$month->year}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$month->value}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($month->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$month->late}}</span></td>
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

    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });


</script>
@stop
