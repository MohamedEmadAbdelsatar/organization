<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقرير القروض لمقترض</title>
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
    <center><h1>تقرير القروض الصادرة لمقترض {{$borrower->name}}</h1></center>
    <table class="table table-bordered">
        <thead>
            <th>م</th>
            <th>المبلغ</th>
            <th>المسدد</th>
            <th>المتبقى</th>
            <th>الحالة</th>
            <th>تاريخ إصدار القرض</th>
            <th>بداية السداد</th>
            <th>نهاية السداد</th>
        </thead>
        <tbody>
            @foreach ($borrower->loans as $loan)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$loan->value}}</td>
                    <td>{{$loan->total_paid}}</td>
                    <td>{{$loan->remaining}}</td>
                    <td>@if($loan->status == '1'){{'مسدد'}} @else {{'غير مسدد'}} @endif</td>
                    <td>{{\Carbon\Carbon::parse($loan->created_at)->format('Y-m-d')}}</td>
                    <td>{{$loan->start}}/{{$loan->start_year}}</td>
                    <td>{{$loan->end}}/{{$loan->end_year}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
