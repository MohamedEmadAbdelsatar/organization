@extends('adminlte::page')

@section('title', 'المقترضين')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">المقترضين</h1></div>
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">إدخال مقترض جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('borrower.save')}}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <center><h3>بيانات المقترض</h3></center>
                <div class="card-body">
                    <div class="form-group row" style="text-align: right;">
                      <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المورد</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" placeholder="الإسم" name="name">
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="governorate" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="governorate" id="governorate">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="city" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="city" id="city">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" placeholder=" " name="phone">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="national_id" placeholder=" " name="national_id">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="location" placeholder=" " name="location">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="job" placeholder=" " name="job">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <center><h3>بيانات الضامن</h3></center>
                <div class="card-body">
                    <div class="form-group row" style="text-align: right;">
                      <label for="guaranator_name" class=" col-form-label" style="padding-left: 0px;">إسم المورد</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="guaranator_name" placeholder="الإسم" name="guaranator_name">
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_governorate" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_governorate" id="guaranator_governorate">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="guaranator_city" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_city" id="guaranator_city">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_phone" placeholder=" " name="guaranator_phone">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_national_id" placeholder=" " name="guaranator_national_id">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_location" placeholder=" " name="guaranator_location">
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_job" placeholder=" " name="guaranator_job">
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

<div class="card">
    <div class="card-header">
      <h2 class="card-title" style="float: right;">قائمة الموردين</h2>
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
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">نسبة المعاملة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">إختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                @foreach($borrowers as $borrower)
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->name}}</span></td>
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->percent}} %</span></td>
                                <td><span style="float:right;">تعديل - حذف</span></td>
                                @endforeach
                            </tr>
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
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
</script>
@stop
