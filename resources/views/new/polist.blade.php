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
    <h3>{{$newsData->new_name}}</h3>
    <h5>
        作者:{{$newsData->new_man}}&nbsp;&nbsp;发布时间:{{date("Y-m-d H:i:s,$newsData->new_time")}}
        点击量:{{$count}}
    </h5>
    <div>
        {{$newsData->new_content}}
    </div>
</body>
</html>