<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقرير القروض الصادرة</title>
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
    <center><h1>تقرير القروض الصادرة خلال الفترة من {{$start}} إلى {{$end}}</h1></center>
    <table class="table table-bordered">
        <thead>
            <th>م</th>
            <th>إسم العميل</th>
            <th>المبلغ</th>
            <th>بداية السداد</th>
            <th>نهاية السداد</th>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$loan->borrower->name}}</td>
                    <td>{{$loan->value}}</td>
                    <td>{{$loan->start}}/{{$loan->start_year}}</td>
                    <td>{{$loan->end}}/{{$loan->end_year}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
