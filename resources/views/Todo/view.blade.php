@extends('Todo.master')

@section('title')
    Todo View
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" >
                <div class="card-body">
                <h3 class="card-title">{{ $todo->title }}</h3>
                    <p class="card-text">{{ $todo->date }}.</p>
                    <p class="card-text">{{ $todo->description }}.</p>
                    <p>
                        {{Form::open(['route'=>['todo.destroy',$todo->id],'method'=>'DELETE'])}}
                            <a class="btn btn-info" href="{{route('todo.edit', $todo->id)}}"> Edit </a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        {{Form::close()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
