@foreach($newsInfo as $k=>$v)
    <tr>
        <td>{{$v->new_id}}</td>
        <td>{{$v->new_name}}</td>
        <td>{{$v->type_name}}</td>
        <td><img src="{{env('uploads_url')}}{{$v->new_img}}" height="35" width="35"></td>
        <td>{{$v->new_man}}</td>
        <td>{{date("Y-m-d H:i:s,$v->new_time")}}</td>
        <td>{{$v->new_desc}}</td>
        <td>{{$v->new_content}}</td>
    </tr>
@endforeach
<tr><td colspan="8">{{$newsInfo->links()}}</td></tr>