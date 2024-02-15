@extends('Form.default')

@section('title')
    create list
@endsection

@section('content')

<a href="{{route('company.create')}}"><button>Create Company</button></a>

<br><br>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>address</th>
        <tr>
        </thead>
        <tbody>
            @foreach ($company as $c)
            <tr>
                <td> {{$c->id}} </td>
                <td> {{$c->name}} </td>
                <td> {{$c->email}} </td>
                <td> {{$c->address}} </td>
            </tr>
            @endforeach
        </tbody>
</table>

@endsection
