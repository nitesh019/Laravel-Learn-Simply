<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2> Update the Company Details below :- </h2>

        {{Form::open(['route'=>['company.update',$companyRecord->id],'method'=>'PUT'])}}
        <br>
            {{Form::label('name','Company Name')}}
            {{Form::text('name',$companyRecord->name)}}

            <br><br>
            {{Form::label('email','Company Email')}}
            {{Form::text('email',$companyRecord->email)}}
            <br><br>
            {{Form::label('address','Company Address')}}
            {{Form::text('address',$companyRecord->address)}}
            <br><br>
            {{Form::submit('Update')}}


        {{Form::close()}}
</body>
</html>
