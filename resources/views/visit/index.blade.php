<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 条纹表格</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form>
    <center><a style="float:right" href="{{url('/visit/create')}}" class="btn btn-default">添加</a></center>
业务员名称   <select name="slae_name">
    <option value="0">---请选择---</option>
    @foreach($sale as $v)
        <option value="{{$v->slae_name}}">{{$v->slae_name}}</option>
    @endforeach

</select>
    客户名称 <select name="cust_name">
        <option value="0">---请选择---</option>
        @foreach($cust as $v)
            <option value="{{$v->cust_name}}">{{$v->cust_name}}</option>
        @endforeach
    </select>
    <input type="submit" value="搜索">
</form>
<table class="table table-striped">
    <caption>拜访会议列表</caption>
    <thead>
    <tr>
        <th>id</th>
        <th>业务员名称</th>
        <th>客户名称</th>
        <th>拜访人</th>
        <th>拜访时间</th>
        <th>拜访地址</th>
        <th>拜访详情</th>
        <th>下次访问时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
@foreach($visit as $v)
    <tr>
        <td>{{$v->visit_id}}</td>
        <td>{{$v->slae_name}}</td>
        <td>{{$v->cust_name}}</td>
        <td>{{$v->visit_man}}</td>
        <td>{{date("y-m-d h:i:s",$v->visit_time)}}</td>
        <td>{{$v->visit_address}}</td>
        <td>{{$v->visit_desc}}</td>
        <td>{{$v->visit_nexttime}}</td>
        <td><a href="{{url('/visit/destroy/'.$v->visit_id)}}">删除</a>||
            <a href="{{url('/visit/edit/'.$v->visit_id)}}">修改</a>
        </td>
    </tr>
@endforeach
<tr><td colspan="6">{{$visit->appends($query)->links()}}</td></tr>
    </tbody>
</table>

</body>
</html>