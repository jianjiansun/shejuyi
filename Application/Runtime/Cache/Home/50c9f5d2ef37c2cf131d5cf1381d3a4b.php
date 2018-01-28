<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	 <script type="text/javascript" src = "/shejuyi/Public/Common/js/jquery.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/js/jquery-ui.min.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/layer/layer.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/js/jquery-ui.min.js"></script>
	 <link  rel="stylesheet" href = "/shejuyi/Public/Common/layui/css/layui.css" />
	 <script type="text/javascript" src = "/shejuyi/Public/Common/layui/layui.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Home/js/jquery.citys.js"></script> 
	 <script type="text/javascript" src="/shejuyi/Public/Home/js/jquery.timers.min.js"></script> 
	
	 <meta charset = "utf-8" />
</head>
<body>
     <script>
	if('<?php echo ($link); ?>'=='community')
	{
	   top.location.href = "/shejuyi/index.php/Home/Community/index";
	}
	if('<?php echo ($link); ?>'== 'origanization')
	{
	   top.location.href = "/shejuyi/index.php/Home/Origanization/index";
	}
     </script>
      <br /><br /><br />
	  <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">手机号</label>
          <div class="layui-input-block">
            <input name = "phone" required="" lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
      	<div class="layui-form-item">
          <label class="layui-form-label">验证码</label>
          <div class="layui-input-block">
            <input name = "code" required="" lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <input type = "hidden" name = "type" value = "<?php echo ($type); ?>" />
      </form>
      <button id = "getCode" class="layui-btn layui-btn-radius layui-btn-normal">获取验证码</button>
	
	<script type="text/javascript">
		//获取验证码
	    $("#getCode").click(function(){
	    	var mobile = $("input[name=phone]").val();
	    	var type = $("input[name=type]").val();
	    	$.ajax({
	    		url:"/shejuyi/index.php/Home/Login/getCode",
	    		type:"post",
	    		data:{mobile:mobile,type:type},
	    		dataType:"json",
	    		success:function(data)
	    		{
	    			if(data.state==1)
	    			{
	    				layer.msg("验证码发送成功");
	    				$("#getCode").attr("disabled",true);
	    				$("#getCode").css("color","grey");
	    				//启动定时器
	    				var i = 60;
	    				$('body').everyTime('1s','A',function(){
						  $("#getCode").text(i);
						  i--;
						  if(i<=-1)
						  {
						  	  $('body').stopTime ();
						  	  $("#getCode").attr("disabled",false);
						  	  $("#getCode").css("color","#fff");
						  	  $("#getCode").text("获取验证码");
						  }
						});
	    			}else{
	    				layer.msg("验证码发送失败！请重试")
	    			}
	    		}
	    	})
	    })
		//处理用户登陆逻辑
		function login()
		{
			var code = $("input[name=code]").val();   //验证码
			var mobile = $("input[name=phone]").val();   //手机号
	    	var type = $("input[name=type]").val();   //类型
			// if(code == "<?php echo (session('codes')); ?>")
			// {
				//调用服务器端 将数据写入
				var isLogin = 0;
				$.ajax({
					url:"/shejuyi/index.php/Home/Login/dologin",
					type:"post",
					dataType:"json",
					data:{phone:mobile,type:type,code:code},
					success:function(data){
						if(data.state == 2)
						{
							isLogin = 1;
						}else if(data.state==1){
							isLogin = 0;
							layer.msg("验证码错喽");
						}else{
							isLogin = 0;
							layer.msg("登陆失败");
						}
					},
					async:false
				})
			// }else{
			// 	isLogin = 0;
			// 	layer.msg("验证码输入错误");
			// }

			if(isLogin == 1)
			{
				return true;
			}else{
				return false;
			}

		}
	</script>
</body>
</html>