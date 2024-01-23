@foreach($reviews as $item)
    <tr>
        <td contenteditable="true">{{$loop->index}}</td>
        <td contenteditable="true">{{$item->user_id}}</td>
        <td contenteditable="true">{{$item->name}}</td>
        <td >{{$item->content}}</td>
        <td contenteditable="true">{{$item->num_view}}</td>

        <td>
            <a href="{{route("post.detail",$item->id)}}"><button type="button" class="btn mb-3 btn-warning rounded-pill">xem bài viết</button></a>

        </td>
    </tr>

@endforeach
