<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقرير دفعات السداد لمورد </title>
    <style>
        table{
            width:100%;
            font-size:15px;
        }
        table, th, td{
            border: 2px solid black;
            border-collapse: collapse;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
</head>
<body dir="rtl">
    <center><h1>تقرير دفعات السداد لمورد عن شهر {{$month}} / {{$year}} لمورد: {{$supplier->name}}</h1></center>
    <table class="table table-bordered">
        <thead>
            <th>م</th>
            <th> قيمة التوريد الأصلى</th>
            <th>المبلغ</th>
            <th>الحالة</th>
            <th>النوع</th>
        </thead>
        <tbody>
            @foreach ($batches as $batch)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$batch->import->value}}</td>
                    <td>{{$batch->value}}</td>
                    <td>@if($batch->status == '1'){{'مسدد'}} @else {{'غير مسدد'}} @endif</td>
                    <td>@if($batch->type == '1'){{'قسط من الأساسى'}} @else {{'قسط من الأرباح'}} @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
