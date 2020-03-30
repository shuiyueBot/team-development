<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('/admin/store')}}" method="post">
	<div class="form-group">
        @csrf
		<label class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-10">
			<input class="form-control name" id="focusedInput" name="admin_name" type="text"  >
			{{$errors->first('admin_name')}}
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword" class="col-sm-2 control-label">
			密码
		</label>
		<div class="col-sm-10">
			<input class="form-control" id="disabledInput" type="text" name="admin_pwd" placeholder="请输入密码..." >
			{{$errors->first('admin_pwd')}}
		</div>
	</div>
	
		<div class="form-group">
			<label for="disabledTextInput"  class="col-sm-2 control-label">手机号
			</label>
			<div class="col-sm-10">
				<input type="text" id="disabledTextInput" class="form-control" name="admin_tel"  placeholder="请输入手机号">
				{{$errors->first('admin_tel')}}
			</div>
		</div>
		<div class="form-group">
			<label for="disabledTextInput"  class="col-sm-2 control-label">邮箱
			</label>
			<div class="col-sm-10">
				<input type="text" id="disabledTextInput" class="form-control" name="admin_email"  placeholder="请输入邮箱">
				{{$errors->first('admin_email')}}
			</div>
		</div>
	
	<div class="form-group has-success">
		<label class="col-sm-2 control-label" for="inputSuccess">
			级别
		</label>
		<div>
            <input type="radio" name="admin_level" value="1">经理
            <input type="radio"  name="admin_level" value="2">业务员
		</div>
	</div>
	<center><input type="submit" value="添加"></center>
</form>

</body>
</html>
<script src="/jquery"></script>
<script>
	$(document).on("blur",".name",function(){
		var _this=$(this);
		_this.val();
		if(_this==''){
			alert("用户名不能为空");
		}
	})
</script>