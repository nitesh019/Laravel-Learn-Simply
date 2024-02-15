<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <br>
       <a href="{{route('company.create')}}">Create Company</a>
      <br>
       @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
       @endif
      <br>
     <table border="1">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Address</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->address}}</td>
                    <td>
                    {{Form::open(['route'=>['company.destroy',$c->id],'method'=>'DELETE'])}}
                       <a href="{{route('company.edit',$c->id)}}">Edit</a>
                        &nbsp;&nbsp;
                        <button type="submit">Delete</button>
                    {{Form::close()}}

                    </td>
                </tr>
            @endforeach
            @if(!count($companies))
                <tr>
                    <td colspan="4">No Records Available</td>
                </tr>
            @endif
        </tbody>
     </table>
</body>
</html>
