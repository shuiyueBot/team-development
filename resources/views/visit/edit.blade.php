<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>拜访会议修改</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>拜访会议修改</h2></center>

<form  action="{{url('/visit/update/'.$visit->visit_id)}}" method="post" class="form-horizontal" role="form">
    @csrf
    <div class="form-group">
        <label class="col-sm-2 control-label">业务员名称</label>
        <div class="col-sm-8">

            <select name="slae_id">
                <option value="0">---请选择---</option>
                @foreach($sale as $v)
                    <option value="{{$v->slae_id}}">{{$v->slae_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">客户名称</label>
        <div class="col-sm-8">

            <select name="cust_id">
                <option value="0">---请选择---</option>
                @foreach($cust as $v)
                    <option value="{{$v->cust_id}}">{{$v->cust_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">拜访人</label>
        <div class="col-sm-8">
            <input class="form-control" id="focusedInput"  name="visit_man" type="text"  placeholder="该输入拜访人..." value="{{$visit->visit_man}}">
            <b style="color:red">{{$errors->first('visit_man')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">拜访地址</label>
        <div class="col-sm-8">
            <input class="form-control" id="focusedInput" name="visit_address" type="text"  placeholder="该输入拜访地址..." value="{{$visit->visit_address}}">
            <b style="color:red">{{$errors->first('visit_address')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">拜访详情</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="visit_desc">{{$visit->visit_desc}}</textarea>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">下次访问时间</label>
        <div class="col-sm-8">
            <input class="form-control" id="focusedInput" name="visit_nexttime" type="text"  placeholder="该输入下次访问时间..." value="{{$visit->visit_nexttime}}">
            <b style="color:red">{{$errors->first('visit_nexttime')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-2">
            <input class="form-control" id="focusedInput" type="submit" value="修改">
        </div>
    </div>
</form>

</body>
</html>