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
    @if (\Session::has('wrong'))
        <div class="alert alert-danger" dir="rtl">
            <ul dir="rtl">
                <li style="float:right;">{!! \Session::get('wrong') !!}</li>
            </ul>
        </div>
    @endif
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">إدخال وارد جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('import.save')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="supplier_id" class=" col-form-label" style="padding-left: 0px;">إسم المورد</label>
                <div class="col-sm-3">
                    <select class="form-control select2" id="supplier_id" name="supplier_id" required>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('supplier_id'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('supplier_id') }}</span>
                    @endif
                </div>
                <label for="value" class="col-form-label" style="padding-left: 0px;">قيمة الوارد</label>
                <div class="col-sm-2">
                    <input type="text" id="value" class="form-control" name="value" required>
                    @if($errors->has('value'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('value') }}</span>
                    @endif
                </div>
                <label for="earn" class="col-form-label" style="padding-left: 0px;">قيمة المعاملة</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="earn" name="earn" >
                    @if($errors->has('earn'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('earn') }}</span>
                    @endif
                </div>

                <label for="period" class="col-form-label" style="padding-left: 0px;"> المدة بالشهور </label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="period" name="period" >
                    @if($errors->has('period'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('period') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row" style="text-align: right;">
                <label for="start" class="col-form-label" style="padding-left: 0px;"> يبدأ من</label>
                <div class="col-sm-2">
                    <select class="form-control" id="start" name="start" required>
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
                    @if($errors->has('start'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('start') }}</span>
                    @endif
                </div>
                <label for="start_year" class="col-form-label" style="padding-left: 0px;">سنة</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="start_year" name="start_year" value="{{ now()->year }}">
                    @if($errors->has('start_year'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('start_year') }}</span>
                    @endif
                </div>
                <label for="end" class="col-form-label" style="padding-left: 0px;">إلى</label>
                <div class="col-sm-3">
                    <select class="form-control" id="end" name="end" readonly>
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
                    @if($errors->has('end'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('end') }}</span>
                    @endif
                </div>
                <label for="end_year" class="col-form-label" style="padding-left: 0px;">سنة</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="end_year" name="end_year" readonly>
                    @if($errors->has('end_year'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('end_year') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row" style="text-align: right;">
                <label for="base_payment" class="col-form-label" style="padding-left: 0px;">نظام تقسيط المبلغ الأساسى</label>
                <div class="col-sm-2">
                    <select class="form-control" id="base_payment" name="base_payment">
                        <option value="1">شهرى</option>
                        <option value="3">ربع سنوى</option>
                        <option value="6">نصف سنوى</option>
                        <option value="12">سنوى</option>
                    </select>
                    @if($errors->has('base_payment'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('base_payment') }}</span>
                    @endif
                </div>
                <label for="interest_payment" class="col-form-label" style="padding-left: 0px;">نظام تقسيط الفوايد</label>
                <div class="col-sm-2">
                    <select class="form-control" id="interest_payment" name="interest_payment">
                        <option value="1">شهرى</option>
                        <option value="3">ربع سنوى</option>
                        <option value="6">نصف سنوى</option>
                        <option value="12">سنوى</option>
                    </select>
                    @if($errors->has('interest_payment'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('interest_payment') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row" style="text-align: right;">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info" style="width:80px;">حفظ</button>
                </div>
            </div>
        </div>
      <!-- /.card-body -->
    </form>
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
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المورد</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">القيمة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الباقى من الأساسى</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الباقى من الأرباح</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الحالة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">إختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($imports as $import)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$import->supplier->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$import->value}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$import->base_remaining}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$import->interest_remaining}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($import->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;"><a type="button" class="btn btn-success active" href="{{route('import.show',$import->id)}}">التفاصيل</a> - <button type="button" class="btn btn-danger del-btn delete-one" title="مسح" data-url="{{route('import.destroy', $import->id)}}">حذف</button></span></td>
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
    $(function(){
    $('.select2').select2()
    })
    $('body').on('click', '.delete-one', function () {
                let url = $(this).data('url');
                Swal.fire({
                    title: "هل انت متأكد؟",
                    text: "هل انت متأكد من انك تريد مسح المقترض بكل ما فيه؟",
                    type: "question",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "نعم متأكد!",
                    cancelButtonText: "الغاء",
                }).then(function (t) {
                    if (t.value) {
                        let formElement = document.createElement('form');
                        formElement.setAttribute('action', url);
                        formElement.setAttribute('method', 'post');
                        formElement.setAttribute('class', 'd-none');

                        let tokenElement = document.createElement('input');
                        tokenElement.setAttribute('name', '_token');
                        tokenElement.setAttribute('value', '{{ csrf_token() }}');
                        tokenElement.setAttribute('type', 'hidden');

                        formElement.append(tokenElement);

                        let methodElement = document.createElement('input');
                        methodElement.setAttribute('name', '_method');
                        methodElement.setAttribute('value', 'DELETE');
                        methodElement.setAttribute('type', 'hidden');

                        formElement.append(methodElement);

                        $("body").append(formElement);

                        formElement.submit();
                    }
                });
            });
    $('#start, #start_year, #period').on('change', function(){
        var start_month = parseInt($('#start').val())
        start_month--
        var start_year = parseInt($('#start_year').val())
        var period = parseInt($('#period').val())
        var years = 0;
        var months = 0;
        console.log(period+' - '+start_month+' - '+start_year)
        if(start_year && period){
            if(period > 12){
                years = Math.floor(period / 12);
                months = period % 12;
                if((start_month+months) >= 12){
                    years++
                    months = months - 12;
                }
            } else {
                if((start_month+period) >= 13){
                    years = 1;
                    months += period-12;
                } else {
                    months += period;
                }
            }
            $('#end').val(months+start_month)
            $('#end_year').val(years+start_year)
        }
    });

    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });


</script>
@stop
