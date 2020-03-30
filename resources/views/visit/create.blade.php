<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>拜访会议添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<center><a style="float:right" href="{{url('/visit/index')}}" class="btn btn-default">列表</a></center>
<body>
<center><h2>拜访会议添加</h2></center>

<form  action="{{url('/visit/store')}}" method="post" class="form-horizontal" role="form">
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
            <input class="form-control" id="focusedInput"  name="visit_man" type="text"  placeholder="该输入拜访人...">
            <b style="color:red">{{$errors->first('visit_man')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">拜访地址</label>
        <div class="col-sm-8">
            <input class="form-control" id="focusedInput" name="visit_address" type="text"  placeholder="该输入拜访地址...">
            <b style="color:red">{{$errors->first('visit_address')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">拜访详情</label>
        <div class="col-sm-8">
         <textarea class="form-control" name="visit_desc"></textarea>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">下次访问时间</label>
        <div class="col-sm-8">
            <input class="form-control" id="focusedInput" name="visit_nexttime" type="text"  placeholder="该输入下次访问时间...">
            <b style="color:red">{{$errors->first('visit_nexttime')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-2">
            <input class="form-control" id="focusedInput" type="submit" value="添加">
        </div>
    </div>
</form>
<script>
    $('input[name="visit_man"]').blur(function(){
        $(this).next().empty();
        var visit_man=$(this).val();
        var reg=/^[u4e00-\u9fa5]{2,}$/;
        if(!reg.test(visit_man)){
            $(this).next().text('商品名称需有中文组成长度为2位以上！');
            return;
        }

        var obj=$(this);
        // 唯一性验证
        $.ajax({
            url:"/visit/checkonly",
            data:{visit_man:visit_man},
            // async:true,
            dataType:'json',
            success:function(result){
                if(result.count>0){
                    // alert(123);
                    obj.next().text('拜访人已存在！');
                }
            }
        });
    });

    $('button').click(function(){
        var nameflag=true;
        var brand_name=$('input[name="visit_man"]').val();
        var reg=/^[u4e00-\u9fa5]{2,}$/;
        if(!reg.test(visit_man)){
            $('input[name="visit_man"]').next().text(
                '拜访人需有中文组成长度为2位以上！');
            return;
        }

        // 唯一性验证
        $.ajax({
            url:"/visit/checkonly",
            data:{visit_man:visit_man},
            async:false,
            dataType:'json',
            success:function(result){
                if(result.count>0){
                    $('input[name="visit_man"]').next().text('拜访人已存在！');
                    nameflag=false;

                }
            }
        });
        if(!nameflag){
            return;
        }

        $('form').submit();
    });
</script>
</body>
</html>