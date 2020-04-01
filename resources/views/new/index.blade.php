<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>新闻ID</td>
            <td>新闻名称</td>
            <td>新闻类型</td>
            <td>新闻图片</td>
            <td>新闻作者</td>
            <td>添加时间</td>
            <td>新闻介绍</td>
            <td>新闻详情</td>
        </tr>
        <tbody id="tbody">
        @foreach($newsInfo as $k=>$v)
        <tr>
            <td>{{$v->new_id}}</td>
            <td>{{$v->new_name}}</td>
            <td>{{$v->type_name}}</td>
            <td><img src="{{env('uploads_url')}}{{$v->new_img}}" height="35" width="35"></td>
            <td>{{$v->new_man}}</td>
            <td>{{date("Y-m-d H:i:s,$v->new_time")}}</td>
            <td>{{$v->new_desc}}</td>
            <td><a href="{{url('/new/polist/'.$v->new_id)}}">详情页</a></td>
        </tr>
        @endforeach
        <tr><td colspan="8">{{$newsInfo->links()}}</td></tr>
        </tbody>
    </table>

</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).on("click",".page-link",function(){
        //获取跳转路径
        var url=$(this).attr("href");
        $.get(
            url,
            function(res){
                $("#tbody").html(res);
            })
        return false;
    })
</script>