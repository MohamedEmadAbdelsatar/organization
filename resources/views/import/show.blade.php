@extends('adminlte::page')

@section('title', 'الوارد')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الوارد</h1></div>
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
      <h3 class="card-title" style="float: right;">تفاصيل توريد </h3>
    </div>
    <!-- /.card-header -->
    <table class="table table-bordered table-hover dataTable dtr-inline" dir="rtl" style="text-align: right;">
        <tbody>
            <tr>
                <td>إسم المورد</td>
                <td><a href="{{route('supplier.show',$import->supplier->id)}}">{{$import->supplier->name}}</a></td>
            </tr>
            <tr>
                <td>قيمة الوارد</td>
                <td>{{$import->value}}</td>
            </tr>
            <tr>
                <td>نسبة المعاملة</td>
                <td>%{{$import->earn}}</td>
            </tr>
            <tr>
                <td>الأرباح</td>
                <td>{{$import->interest}}</td>
            </tr>
            <tr>
                <td>إجمالى المستحق</td>
                <td>{{$import->total}}</td>
            </tr>
            <tr>
                <td>إجمالى المبلغ المسدد من الأساسى</td>
                <td>{{$import->base_total_paid}}</td>
            </tr>
            <tr>
                <td>إجمالى المبلغ المسدد من الأرباح</td>
                <td>{{$import->interest_total_paid}}</td>
            </tr>
            <tr>
                <td>إجمالى المبلغ المسدد</td>
                <td>{{$sum = $import->base_total_paid+$import->interest_total_paid}}</td>
            </tr>
            <tr>
                <td>قيمة القسط من الأساسى</td>
                <td>{{$import->base_installment}}</td>
            </tr>
            <tr>
                <td>قيمة القسط من الأرباح</td>
                <td>{{$import->interest_installment}}</td>
            </tr>
            <tr>
                <td>عدد الأقساط المدفوعة من الأساسى</td>
                <td>{{$import->paid_base_batches}}</td>
            </tr>
            <tr>
                <td>عدد الأقساط المدفوعة من الأرباح</td>
                <td>{{$import->paid_interest_batches}}</td>
            </tr>
            <tr>
                <td>تاريخ بداية السداد</td>
                <td>
                    @switch($import->start)
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
                    , {{$import->start_year}}
                </td>
            </tr>
            <tr>
                <td>تاريخ أخر قسط</td>
                <td>
                    @switch($import->end)
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
                    , {{$import->end_year}}
                </td>
            </tr>
            <tr>
                <td>نظام تقسيط الأساسى</td>
                <td>@switch($import->base_payment) @case(1) {{'شهرى'}} @break @case(3) {{'ربع سنوى'}} @break @case(6) {{'نصف سنوى'}} @break @case(12) {{'سنوى'}} @break @endswitch</td>
            </tr>
            <tr>
                <td>نظام تقسيط الأرباح</td>
                <td>@switch($import->interest_payment) @case(1) {{'شهرى'}} @break @case(3) {{'ربع سنوى'}} @break @case(6) {{'نصف سنوى'}} @break @case(12) {{'سنوى'}} @break @endswitch</td>
            </tr>
            <tr>
                <td>مسدد</td>
                <td>@if($import->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</td>
            </tr>
            <tr>
                <td>الباقى من الأساسى</td>
                <td>{{$import->base_remaining}}</td>
            </tr>
            <tr>
                <td>الباقى من الأرباح</td>
                <td>{{$import->interest_remaining}}</td>
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
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">النوع</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">التاريخ</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">القيمة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الحالة</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($import->batches as $batch)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($batch->type == 1) {{'أساسى'}} @else {{'أرباح'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$batch->month_name}},{{$batch->year}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$batch->value}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($batch->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</span></td>
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
