<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Import Large CSV File useing Queue</h1>

        <br>

        @if(session('status'))
            <strong style="color: green">{{session('status')}}</strong>
        @endif
       <br>

       {{Form::open(['url'=>'items_import', 'files'=>true])}}
       {{Form::file('csv')}}
       {{Form::submit('Import')}}
       {{Form::close()}}

</body>
</html>
