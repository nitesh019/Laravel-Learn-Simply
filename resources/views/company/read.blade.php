<a href="{{url('/create')}}">Create New Record</a>
<br><br>
@if(session('status'))
  <span style="color:green"><strong>{{session('status')}}</strong></span>
@endif
<br>
<table border="1">
     <thead>
          <tr>
             <th>ID</th>
              <th>NAME</th>
              <th>IMAGE</th>
               <th>PRICE</th>
          </tr>
     </thead>
     <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->image}}</td>
                    <td>{{$p->price}}</td>
                </tr>

            @endforeach
     </tbody>
</table>
