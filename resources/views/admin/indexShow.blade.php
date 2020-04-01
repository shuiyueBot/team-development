<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理首页</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
    .fakeimg {
        height: 200px;
         background: #aaa;
    }
  </style>
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
   <h3>管理模式</h3>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">导航</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        @if($level==1)
        <li class="active"><a href="/admin/index">管理员</a></li>
        @endif
        <li><a href="#">业务员</a></li>   
        <li><a href="/visit/index">拜访记录</a></li>

        <li><a href="#">客户</a></li>
      </ul>
    </div>
  </div>
</nav>

</div>
</body>
</html>