@foreach(postsTages($id) as $row)
    <ul>
        <li>{{$row->name}}</li>
    </ul>
@endforeach
