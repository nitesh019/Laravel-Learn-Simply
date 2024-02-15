@extends('Form.default')


@section('content')

   <form
         action="{{url('handleSubmit')}}"
         method="POST"
         enctype="multipart/form-data"
         >
      @csrf
      <p>
         <label for="user">Username</label>
         <input type="text" name="username" id="user">
      </p>
      <p>
         <label for="pass">Password</label>
         <input type="password" name="password" id="pass">
      </p>
      <p>

         <input type="file" name="book">
      </p>
      <p>
        <input type="submit" value="Login">
      </p>
   </form>


@endsection
