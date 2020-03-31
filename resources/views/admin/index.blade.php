<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h4>管理员展示</h4>
<form >
        <input type="text" name="name" placeholder="请输入名称...">
        <input type="submit" value="搜索">

</form>
<table class="table table-striped">
	
	<thead>
		<tr>
			<th>管理员名称</th>
			<th>管理员邮箱</th>
			<th>管理员电话</th>
            <th>管理员级别</th>
			<th>操作</th>
        </tr>
	</thead>
	<tbody>
        @foreach($adminInfo as $k=>$v)
		<tr admin_id="{{$v->admin_id}}">
            <td ziduan="admin_name">
                <span class="span">{{$v->admin_name}}</span>
                <input type="text" style="display:none;" value="{{$v->admin_name}}" class="Changval">
            </td>
			<td>{{$v->admin_email}}</td>
            <td>{{$v->admin_tel}}</td>
            <td>{{$v->admin_level==1?'经理':'业务员'}}</td>
			<td><a href="">删除</a>||<a href="">编辑</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$adminInfo->appends($query)->links()}}
</body>
</html>
<script src="/jquery"></script>
<script>
    $(document).on("click",".span",function(){
        //隐藏span标签，显示input
       var _this=$(this);
       _this.hide();
       _this.next("input").show();
    })
    $(document).on("blur",".Changval",function(){
            //获取字段，id，新值
            var _this=$(this);
            var ziduan=_this.parent().attr("ziduan");
            var admin_id=_this.parents("tr").attr("admin_id");
            var val=_this.val();
            $.post(
                "/admin/SetName",
                {'_token':'{{csrf_token()}}',ziduan:ziduan,admin_id:admin_id,val:val},
                function(res){
                    if(res==1){
                        _this.prev("span").html(val).show();
                        _this.hide();
                        
                    }
                }
            )
    })
</script>