@extends('adminlte::page')

@section('title', 'الموردين')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الموردين</h1></div>
@stop

@section('content')
<div class="card card-info" dir="rtl">
    <div class="card-header">
      <h3 class="card-title" style="float: right;">إدخال مورد جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('supplier.save')}}">
        @csrf
      <div class="card-body">
        <div class="form-group row" style="text-align: right;">
          <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المورد</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="الإسم" name="name">
          </div>
          <label for="percent" class=" col-form-label" style="padding-left: 0px;">نسبة المعاملة</label>
          <div class="col-sm-3">
            <input type="num" step="any" class="form-control" id="percent" placeholder="%" name="percent">
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-info" style="width:80px;">حفظ</button>
          </div>

        </div>
      </div>
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
                                @foreach($suppliers as $supplier)
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$supplier->name}}</span></td>
                                <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$supplier->percent}} %</span></td>
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
