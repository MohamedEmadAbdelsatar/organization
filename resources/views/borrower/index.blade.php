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
                      <label for="name" class=" col-form-label" style="padding-left: 0px;">إسم المقترض</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" placeholder="الإسم" name="name" required>
                        @if($errors->has('name'))
                            <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="governorate_1" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="governorate_id" id="governorate_1">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('governorate_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('governorate_id') }}</span>
                            @endif
                        </div>
                        <label for="city_1" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="city_id" id="city_1">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('city_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('city_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" placeholder=" " name="phone" required>
                            @if($errors->has('phone'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="national_id" placeholder=" " name="national_id" required>
                            @if($errors->has('national_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('national_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="location" placeholder=" " name="location" required>
                            @if($errors->has('location'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('location') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="job" placeholder=" " name="job" required>
                            @if($errors->has('job'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('job') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <center><h3>بيانات الضامن</h3></center>
                <div class="card-body">
                    <div class="form-group row" style="text-align: right;">
                      <label for="guaranator_name" class=" col-form-label" style="padding-left: 0px;">إسم الضامن</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="guaranator_name" placeholder="الإسم" name="guaranator_name" required>
                        @if($errors->has('guaranator_name'))
                            <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_governorate_2" class="col-form-label">أختر المحافظة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_governorate_id" id="guaranator_governorate_2">
                                @foreach ($governorates as $governorate)
                                    <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('guaranator_governorate_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_governorate_id') }}</span>
                            @endif
                        </div>
                        <label for="guaranator_city_2" class="col-form-label">أختر المدينة</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="guaranator_city_id" id="guaranator_city_2">
                                @foreach ($cities as $city)
                                    @if($city->governorate_id == $governorates->first()->id)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('guaranator_city_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_city_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_phone" class=" col-form-label" style="padding-left: 0px;">رقم الهاتف</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_phone" placeholder=" " name="guaranator_phone" required>
                            @if($errors->has('guaranator_phone'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_national_id" class=" col-form-label" style="padding-left: 0px;">الرقم القومى</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_national_id" placeholder=" " name="guaranator_national_id" required>
                            @if($errors->has('guaranator_national_id'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_national_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_location" class=" col-form-label" style="padding-left: 0px;">محل الإقامة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_location" placeholder=" " name="guaranator_location" required>
                            @if($errors->has('guaranator_location'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_location') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="guaranator_job" class=" col-form-label" style="padding-left: 0px;">الوظيفة</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="guaranator_job" placeholder=" " name="guaranator_job" required>
                            @if($errors->has('guaranator_job'))
                                <span class="error" style="width:100%;margin-top: .25rem;font-size: 80%;color: #dc3545;">{{ $errors->first('guaranator_job') }}</span>
                            @endif
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
      <h2 class="card-title" style="float: right;">قائمة المقترضين</h2>
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
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">العنوات</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">رقم الهاتف</span></th>
                            <th tabindex="0" aria-controls="example2" ><span style="float:right;">الإختيارات</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($borrowers as $borrower)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->city->name}}, {{$borrower->governorate->name}}</span></td>
                                    <td class="dtr-control sorting_1" tabindex="0"><span style="float:right;">{{$borrower->phone}}</span></td>
                                    <td><span style="float:right;"><a type="button" class="btn btn-success active" href="{{route('borrower.show',$borrower->id)}}">التفاصيل</a> - <a type="button" class="btn btn-success active" href="{{route('borrower.edit',$borrower->id)}}">تعديل</a> - <button type="button" class="btn btn-danger del-btn delete-one" title="مسح" data-url="{{route('borrower.destroy', $borrower->id)}}">حذف</button></span></span></td>
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

    $('#governorate_1').on('change',function(){
        var id = $(this).val()
        var token = $('input[name="_token"]').val();
        $.ajax({
            url:'/governorates/cities',
            method:'post',
            data:{
                id:id,
                _token:token,
            },
            success:function(response){
                $('#city_1').empty()
                console.log(response)
                $.each(response,function(index, element){
                    var html = "<option value='"+element.id+"'>"+element.name+"</option>"
                    $('#city_1').append(html);
                });
            }
        });
    });

    $('#guaranator_governorate_2').on('change',function(){
        var id = $(this).val()
        var token = $('input[name="_token"]').val();
        $.ajax({
            url:'/governorates/cities',
            method:'post',
            data:{
                id:id,
                _token:token,
            },
            success:function(response){
                $('#guaranator_city_2').empty()
                console.log(response)
                $.each(response,function(index, element){
                    var html = "<option value='"+element.id+"'>"+element.name+"</option>"
                    $('#guaranator_city_2').append(html);
                });
            }
        });
    });
</script>
@stop
