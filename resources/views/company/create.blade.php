@extends('Form.default')

@section('title')
    create company
@endsection

@section('content')
   {{Form::open(['url'=>'company/store'])}}

   {{Form::label('name','campany name')}}
   {{Form::text('name',null,['placeholder'=>'Enter name'])}}
   <!-- Another way of printing validation message -->
   @error('name')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>
   {{Form::label('email','email')}}
   {{Form::email('email',null,['placeholder'=>'Enter email'])}}
  <!-- Another way of printing validation message -->
   @error('email')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>
   {{Form::label('address','address')}}
   {{Form::text('address',null,['placeholder'=>'Enter address'])}}
  <!-- Another way of printing validation message -->
   @error('address')
          <span style="color:red">{{$message}}</span>
   @enderror
   <br><br>

   {{Form::submit('save')}}


   {{Form::close()}}
@endsection
