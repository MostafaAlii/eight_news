@foreach(getPostCategory($id) as $row)
    <ul>
        <li>{{$row->name}}</li>
    </ul>
@endforeach
