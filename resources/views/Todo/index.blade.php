@extends('Todo.master')

@section('title')
    Todo List
@endsection

@section('content')

    @if(session('success'))
    <p style="color:green">{{session('success')}}</p>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ( $todos as $todo )
        <div class="col">
            <div class="card" >
                <div class="card-body">
                <h3 class="card-title">{{ $todo->title }}</h3>
                <p class="card-text">{{ $todo->date }}.</p>
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary" href="{{route('todo.show', $todo->id)}}"> view </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>


@endsection
