@extends('Form.default')

@section('content')
   {{Form::open(['url'=>'handleFormBuilderSubmit','files'=>true])}}

   {{Form::label('user','Username')}}
   {{Form::text('username',null,['placeholder'=>'Enter Username'])}}
   <!-- Another way of printing validation message -->
   @error('username')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>
   {{Form::label('password','Password')}}
   {{Form::password('password',['placeholder'=>'*********'])}}
  <!-- Another way of printing validation message -->
   @error('password')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>
   {{Form::label('Year','year')}}
   {{Form::date('year')}}
  <!-- Another way of printing validation message -->
   @error('year')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>

   {{Form::submit('Send')}}


   {{Form::close()}}
@endsection
