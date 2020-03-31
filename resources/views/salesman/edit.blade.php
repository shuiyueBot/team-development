<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>编辑页</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h3><font color='red'>管理员编辑页</font></h3></center>

<form class="form-horizontal" role="form" action="{{url('salesman/update/'.$res->slae_id)}}" method="post">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="slae_name" name="slae_name"
				   value="{{$res->slae_name}}">
                   <span id="span_name" style="color:red"></span>
                   <b style="color:red">{{$errors->first('slae_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="slae_tel" name="slae_tel"
				   value="{{$res->slae_tel}}">
                   <span id="span_tel"></span>
                   <b style="color:red">{{$errors->first('slae_tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="slae_phone" name="slae_phone"
				   value="{{$res->slae_phone}}">
                   <span id="span_phone"></span>
                   <b style="color:red">{{$errors->first('_phone')}}</b>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>
