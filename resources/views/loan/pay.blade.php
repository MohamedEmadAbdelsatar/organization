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
      <h3 class="card-title" style="float: right;">إدخال قرض جديدة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('loan.save_payment')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="borrower_id" class="col-form-label" style="padding-left: 0px;">إسم المقترض</label>
                <div class="col-sm-3">
                    <select class="form-control" id="borrower_id" name="borrower_id">
                        <option></option>
                        @foreach ($borrowers as $borrower)
                            <option value="{{$borrower->id}}">{{$borrower->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="myrow" class="form-group row col-sm-8" style="text-align: right;"></div>

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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $('#borrower_id').on('change', function(){

        var id = $(this).val()
        var token = $('input[name="_token"]').val();
        $.ajax({
            url:'/borrower/loans',
            method:'post',
            data:{
                id:id,
                _token:token,
            },
            success:function(response){
                if(typeof(response) != 'object')
                {
                    alert(response)
                }
                else
                {
                    var html = '<label for="load_id" class=" col-form-label" style="padding-left: 0px;">إختر القرض</label><div class="col-sm-4"><select class="form-control" id="load_id" name="load_id"><option></option>';
                    $.each(response, function(index, element){
                        html += '<option value="'+element.id+'">'+element.value+'</option>';
                    })
                    html += '</select></div>'
                    $('#myrow').append(html);
                }
                $('#load_id').on('change', function(){
                    var loan_id = $(this).val()
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                    url:'/loan/months',
                    method:'post',
                    data:{
                        loan_id:loan_id,
                        _token:token,
                    },
                    success:function(response){
                        var html = '<label for="month_id" class=" col-form-label" style="padding-left: 0px;">إختر الشهر</label><div class="col-sm-4"><select class="form-control" id="month_id" name="month_id"><option></option>';
                        $.each(response, function(index, element){
                            html += '<option value="'+element.id+'">'+element.month_name+' - '+element.value+'</option>';
                        })
                        html += '</select></div>'
                        $('#myrow').append(html);
                    }
                    })

                })
            }

        });

    });

</script>
@stop
