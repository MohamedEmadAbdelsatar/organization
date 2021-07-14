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
      <h3 class="card-title" style="float: right;">تسديد وارد</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{route('import.save_payment')}}">
        @csrf
        <div class="card-body">
            <div class="form-group row" style="text-align: right;">
                <label for="supplier_id" class="col-form-label" style="padding-left: 0px;">إسم المورد</label>
                <div class="col-sm-3">
                    <select class="form-control" id="supplier_id" name="supplier_id">
                        <option></option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="myloan" class="form-group row col-sm-4" style="text-align: right;"></div>
                <div id="mymonth" class="form-group row col-sm-4" style="text-align: right;"></div>
            </div>
            <div class="form-group row" style="text-align: right;">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info" style="width:80px;">دفع</button>
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
    $('#supplier_id').on('change', function(){
        $('#myloan').empty();
        $('#mymonth').empty();
        var id = $(this).val()
        var token = $('input[name="_token"]').val();
        if(id){
            $.ajax({
                url:'/supplier/imports',
                method:'post',
                data:{
                    id:id,
                    _token:token,
                },
                success:function(response){
                    $('#myloan').empty();
                    if(typeof(response) != 'object')
                    {
                        alert(response)
                    }
                    else
                    {
                        var html = '<label for="load_id" class=" col-form-label" style="padding-left: 0px;">إختر التوريد</label><div class="col-sm-8"><select class="form-control" id="import_id" name="import_id"><option></option>';
                        $.each(response, function(index, element){
                            html += '<option value="'+element.id+'">'+element.value+'</option>';
                        })
                        html += '</select></div>'
                        $('#myloan').append(html);
                    }
                    $('#import_id').on('change', function(){
                        var import_id = $(this).val()
                        var token = $('input[name="_token"]').val();
                        $('#mymonth').empty();
                        if(import_id){
                            $.ajax({
                                url:'/import/batches',
                                method:'post',
                                data:{
                                    import_id:import_id,
                                    _token:token,
                                },
                                success:function(response){
                                    $('#mymonth').empty();
                                    if(typeof(response) != 'object')
                                    {
                                        alert(response)
                                    }
                                    else
                                    {
                                        var html = '<label for="batch_id" class=" col-form-label" style="padding-left: 0px;">إختر القسط</label><div class="col-sm-8"><select class="form-control" id="batch_id" name="batch_id"><option></option>';
                                        $.each(response, function(index, element){
                                            if(element.type == '1'){
                                                var type = 'الأساسى';
                                            } else {
                                                var type = 'الفوائد';
                                            }
                                            html += '<option value="'+element.id+'">'+element.month_name+' - '+element.value+' - '+type+'</option>';
                                        })
                                        html += '</select></div>'
                                        $('#mymonth').append(html);
                                    }
                                }
                            })
                        }
                    })
                }
            });
        }
    });
</script>
@stop
