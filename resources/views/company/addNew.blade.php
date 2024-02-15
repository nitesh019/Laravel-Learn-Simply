{{Form::open(['url'=>'handleSubmit'])}}
<br><br>
     {{Form::label('name','Name')}}
     {{Form::text('name')}}

     <br><br>
     {{Form::label('image','Image')}}
     {{Form::text('image')}}
     <br><br>
     {{Form::label('price','Price')}}
     {{Form::text('price')}}
     <br><br>
     {{Form::submit('Save')}}


{{Form::close()}}
