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
<form action="{{url('/new/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    新闻名称 <input type="text" name="new_name"><br>
    新闻类型 <select name="type_id" id="">
                <option>--请选择--</option>
                @foreach($res as $k=>$v)
                 <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                @endforeach
            </select><br>
    新闻图片 <input type="file" name="new_img"><br>
    新闻介绍 <input type="text" name="new_desc"><br>
    新闻详情 <textarea name="new_content" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="添加">
</form>
</body>
</html>