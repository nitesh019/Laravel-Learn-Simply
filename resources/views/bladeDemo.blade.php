@isset($user)
 <h3>Username = {{$user}}</h3>
 <h4>Password = {{$pass}}</h4>
@endisset


@isset($role)
   @if($role==='admin')
     <h2>Admin Dashboard</h2>
   @elseif($role==='guest')
      <h2>Guest Dashboard</h2>

   @endif



@endisset


@isset($score)

  @switch($score)
     @case($score >=90)
       <strong>Grade A</strong>
       @break
     @case($score>=80)
       <strong>Grade B</strong>
       @break
     @default
         <strong>Fail</strong>
  @endswitch


@endisset




@isset($empRecords)
  <ul>
     @foreach($empRecords as $r)
      <li>{{$r}}</li>
     @endforeach


  </ul>


@endisset
