{{Form::open(['url'=>'/search/result','method'=>'GET'])}}
    <h2>Get Users By ID</h2>
    @if(session('error'))
           {{session('error')}}
    @endif
    <br><br>
    {{Form::text('user_id',null,['placeholder'=>'Enter user Id'])}}
    {{Form::submit('Search')}}
{{Form::close()}}
