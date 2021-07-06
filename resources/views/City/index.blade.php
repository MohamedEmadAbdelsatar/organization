@extends('adminlte::page')

@section('title', 'المدن')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">المدن</h1></div>
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">إدخال مدينة جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('city.save')}}">
        @csrf
      <div class="card-body">
        <div class="form-group row" style="text-align: right;">
          <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المدينة</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="الإسم" name="name">
          </div>
          <label for="governorate" class="col-form-label" style="padding-left: 0px;">أختر المحافظة</label>
          <div class="col-sm-3">
            <select class="form-control" name="governorate" id="governorate">
                @foreach ($governorates as $governorate)
                    <option value="{{$governorate->id}}">{{$governorate->name}}</option>
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

<div class="card">
    <div class="card-header">
      <h2 class="card-title" style="float: right;">المحافظات</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info" dir="rtl">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المدينة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المحافظة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">إختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                @foreach($cities as $city)
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$city->name}}</span></td>
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$city->governorate->name}}</span></td>
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
