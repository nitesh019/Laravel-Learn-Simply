@extends('Todo.master')

@section('title')
    Create Todo
@endsection

@section('content')

<div class="container">
    {{Form::open(['route'=>'todo.store'])}}

    {{Form::text('title',null,['placeholder'=>'Enter Title', 'class'=>'form-control'])}}
    @error('title')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>

    {{Form::date('date',null,['placeholder'=>'Enter date', 'class'=>'form-control'])}}
    @error('date')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>


    {{Form::textarea('description',null, [ 'placeholder'=>'add a discription', 'class'=>'form-control'] )}}
    @error('description')
        <span style="color:red">{{$message}}</span>
    @enderror
    <br>
    {{Form::submit('Create Todo')}}


    {{Form::close()}}
</div>

@endsection
