@extends('Form.default')

@section('content')
   {{Form::open(['url'=>'handleSubmit','files'=>true])}}

     {{Form::label('user','Username')}}
     {{Form::text('username',null,['placeholder'=>'Enter Username'])}}
     <br><br>
     {{Form::label('password','Password')}}
     {{Form::password('password',['placeholder'=>'Enter Password'])}}

     <br><br>
     <!-- Radio Button -->
     {{Form::label('gender','Gender')}}
     {{Form::radio('gender','male')}} Male
     {{Form::radio('gender','female')}} Female

     <br><br>
     <!-- Checkbox -->
     {{Form::label('lang','Language')}}
     {{Form::checkbox('lang[]','English')}} English
     {{Form::checkbox('lang[]','Hindi')}} Hindi
     {{Form::checkbox('lang[]','Spanish')}} Spanish

     <br><br>
     <!-- TextArea -->
     {{Form::label('Comment','Comment')}}
     {{Form::textarea('comment','Please share your experience')}}

     <br><br>
     <!-- Dropdown list -->
     {{Form::label('Location','Location')}}
     {{Form::select('location',[
              'USA'=>'USA',
              'INDIA'=>'INDIA',
              'UK' => 'UK'
      ])}}

      <br><br>
     <!-- Dropdown list -->
     {{Form::label('Document','Upload Docs')}}
     {{Form::file('document')}}

     <br><br>
     {{Form::submit('Send')}}

   {{Form::close()}}
@endsection
