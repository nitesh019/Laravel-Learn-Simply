<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Brand</th>
                <th>Product</th>
                <th>Product Count</th>
            </tr>
        </thead>
        <tbody
        @foreach ($brand as $b)
         <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->brand_name}}</td>
            <td>
                @foreach ($b->product as $p )
                    {{$p->name}},
                @endforeach

            </td>
            <td>
                {{count($b->product)}}
            </td>
         </tr>
         @endforeach
         </tbody>
    </table>
</body>
</html>
