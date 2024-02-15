<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2> Enter the Company Details below :- </h2>

        {{Form::open(['route'=>'company.store'])}}
        <br>
            {{Form::label('name','Company Name')}}
            {{Form::text('name')}}

            <br><br>
            {{Form::label('email','Company Email')}}
            {{Form::text('email')}}
            <br><br>
            {{Form::label('address','Company Address')}}
            {{Form::text('address')}}
            <br><br>
            {{Form::submit('Save')}}


        {{Form::close()}}
</body>
</html>
