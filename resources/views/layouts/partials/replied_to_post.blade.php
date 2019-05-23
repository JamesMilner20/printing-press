<a class="dropdown-item"  href="{{route('home.post',$notification->data['product']['id'])}}">
    {{$notification->data['user']['name']}} commented on <strong>{{$notification->data['product']['name']}}</strong>
</a>