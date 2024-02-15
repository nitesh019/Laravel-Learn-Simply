@extends('Todo.master')

@section('title')
    Edit Todo
@endsection

@section('content')

<div class="container">
    {{Form::open(['route'=>['todo.update', $todo->id],'method'=> 'PUT'])}}

    {{Form::text('title', $todo->title,['placeholder'=>'Enter Title', 'class'=>'form-control'])}}
    @error('title')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>

    {{Form::date('date',$todo->date,['placeholder'=>'Enter date', 'class'=>'form-control'])}}
    @error('date')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>



    {{Form::textarea('description',$todo->description, [ 'placeholder'=>'add a discription', 'class'=>'form-control'] )}}
    @error('description')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>
    {{Form::submit('Update Todo', ['class'=>'btn btn-primary'])}}


    {{Form::close()}}
</div>

@endsection
