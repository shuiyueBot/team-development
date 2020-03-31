<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>登陆</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('login/loginDo')}}" method="post"> 
	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-sm-5">
            @csrf
			<h3>登陆</h3>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword" class="col-sm-2 control-label">
			管理员用户名
		</label>
		<div class="col-sm-10">
			<input class="form-control" id="disabledInput" type="text" name="admin_name">
		</div>
	</div>
	
		<div class="form-group">
			<label for="disabledTextInput"  class="col-sm-2 control-label">管理员密码
			</label>
			<div class="col-sm-10">
				<input type="password" id="disabledTextInput" class="form-control"  name="admin_pwd">
			</div>
		</div>
		<center><button type="submit" class="btn btn-info">登陆</button></center>
</form>

</body>
</html>