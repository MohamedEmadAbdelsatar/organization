<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقرير السداد</title>
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
    <center><h1>تقرير السداد عن شهر {{$month_name}} عن سنة {{$year}}</h1></center>
    <table class="table table-bordered">
        <thead>
            <th>م</th>
            <th>إسم العميل</th>
            <th>المبلغ</th>
        </thead>
        <tbody>
            @foreach ($months as $month)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$month->borrower->name}}</td>
                    <td>{{$month->value}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
