@extends('adminlte::page')

@section('title', 'الموردين')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">الموردين</h1></div>
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
            @if($errors->has('name'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <label for="percent" class=" col-form-label" style="padding-left: 0px;">نسبة المعاملة</label>
          <div class="col-sm-3">
            <input type="num" step="any" class="form-control" id="percent" placeholder="%" name="percent">
            @if($errors->has('percent'))
                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('percent') }}</span>
            @endif
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
                                <td><span style="float:right;"><a type="button" class="btn btn-success active" href="{{route('supplier.edit',$supplier->id)}}">تعديل</a> - <button type="button" class="btn btn-danger del-btn delete-one" title="مسح" data-url="{{route('supplier.destroy', $supplier->id)}}">حذف</button></span></td>
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
    $(document).ready(function(){
            $('body').on('click', '.delete-one', function () {
                let url = $(this).data('url');
                Swal.fire({
                    title: "هل انت متأكد؟",
                    text: "هل انت متأكد من انك تريد مسح المطعم بكل ما فيه؟",
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
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@stop
