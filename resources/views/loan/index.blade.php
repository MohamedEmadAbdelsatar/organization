@extends('adminlte::page')

@section('title', 'القروض')

@section('content_header')
    <div class="row" dir="rtl"><h1 style="float:right;">القروض</h1></div>
    <br>
    @if (\Session::has('fail'))
        <div class="alert alert-danger" dir="rtl">
            <ul dir="rtl">
                <li style="float:right;">{!! \Session::get('fail') !!}</li>
            </ul>
        </div>
    @endif
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
      <h3 class="card-title" style="float: right;">إدخال قرض جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('loan.save')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="borrower_id" class=" col-form-label" style="padding-left: 0px;">إسم المقترض</label>
                <div class="col-sm-3">
                    <select class="form-control" id="borrower_id" name="borrower_id" required>
                        @foreach ($borrowers as $borrower)
                            <option value="{{$borrower->id}}">{{$borrower->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('borrower_id'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('borrower_id') }}</span>
                    @endif
                </div>
                <label for="value" class="col-form-label" style="padding-left: 0px;">قيمة القرض</label>
                <div class="col-sm-2">
                    <input type="text" id="value" class="form-control" name="value" placeholder="أدخل قيمة القرض" required>
                    @if($errors->has('value'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('value') }}</span>
                    @endif
                </div>
                <label for="earn" class="col-form-label" style="padding-left: 0px;">قيمة المعاملة</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="earn" name="earn" placeholder="أدخل قيمة القرض" value="16" readonly>
                    @if($errors->has('earn'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('earn') }}</span>
                    @endif
                </div>
                <label for="account_id" class="col-form-label" style="padding-left: 0px;"> إقتراض من</label>
                <div class="col-sm-2">
                    <select class="form-control" id="account_id" name="account_id" required>
                        @foreach ($accounts as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                        @endforeach
                    </select>
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
                        <option value="12" selected>ديسمبر</option>
                    </select>
                    @if($errors->has('end'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('end') }}</span>
                    @endif
                </div>
                <label for="end_year" class="col-form-label" style="padding-left: 0px;">سنة</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="end_year" name="end_year" value="{{ now()->year }}" readonly>
                    @if($errors->has('end_year'))
                        <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('end_year') }}</span>
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
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">المقترض</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">القيمة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الباقى</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الحالة</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">إختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->borrower->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->value}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$loan->remaining}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">@if($loan->status == 0) {{'غير مسدد'}} @else {{'مسدد'}} @endif</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;"><a type="button" class="btn btn-success active" href="{{route('loan.show',$loan->id)}}">التفاصيل</a> - <button type="button" class="btn btn-danger del-btn delete-one" title="مسح" data-url="{{route('loan.destroy', $loan->id)}}">حذف</button></span></td>
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
    $('#start').on('change', function(){

        var val = $(this).val()
        console.log(val)
        if(val == 1){
            var end = 12
            var this_year = $("#start_year").val()
            $('#end_year').val(this_year)
        } else {
            var end = val - 1
            var this_year = parseInt($("#start_year").val())
            $('#end_year').val(this_year + 1)
        }
        $('#end').val(end)
    });

    $('#start_year').on('change', function(){
        var start_year = parseInt($("#start_year").val())
        var month = $('#start').val()

        if(month == 1){
            $('#end_year').val(start_year)
        } else {
            $('#end_year').val(start_year + 1)
        }
    })

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
