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
      <h3 class="card-title" style="float: right;"> تسوية قرض لمتعثر </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('loan.settle')}}">
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
                    <button type="submit" id="btn-submit" class="btn btn-info" style="width:80px;">تسوية</button>
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
    $('#btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        console.log(form)
        swal.fire({
            title: "هل انت متأكد؟",
            text:  "هل انت متأكد من انك تريد تسوية القرض ؟  ",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "نعم متأكد!",
            cancelButtonText: "الغاء",
        }).then(function(isConfirmed){
            form.submit();
        });
    });

    $('#borrower_id').on('change', function(){
        $('#myrow').empty()
        var id = $(this).val()
        var token = $('input[name="_token"]').val();
        if(id){
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
                        var html = '<label for="loan_id" class=" col-form-label" style="padding-left: 0px;">إختر القرض</label><div class="col-sm-4"><select class="form-control" id="loan_id" name="loan_id"><option></option>';
                        $.each(response, function(index, element){
                            html += '<option value="'+element.id+'">'+element.value+'</option>';
                        })
                        html += '</select></div>'
                        $('#myrow').append(html);
                    }
                }
            });
        }
    });
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

</script>
@stop
