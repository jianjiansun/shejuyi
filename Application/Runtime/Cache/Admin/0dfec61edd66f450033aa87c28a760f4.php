<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LarryCMS后台登录</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/login.css" media="all">
</head>
<body>
<div class="layui-canvs"></div>
<div class="layui-layout layui-layout-login">
	<h1>
		 <strong>LarryCMS管理系统后台</strong>
		 <em>Management System</em>
	</h1>
	<div class="layui-user-icon larry-login">
		 <input name='login_name' type="text" placeholder="账号" class="login_txtbx"/>
	</div>
	<div class="layui-pwd-icon larry-login">
		 <input name="password" type="password" placeholder="密码" class="login_txtbx"/>
	</div>
    <div class="layui-val-icon larry-login">
    	<div class="layui-code-box">
    		<input type="text" id="code" name="code" placeholder="验证码" maxlength="4" class="login_txtbx">
            <img src="/index.php/Admin/Login/verify" alt="" class="verifyImg" id="verifyImg" onClick="javascript:this.src='/index.php/Admin/Login/verify?id='+Math.random();">
    	</div>
    </div>
    <div class="layui-submit larry-login">
    	<input type="button" value="立即登陆" class="submit_btn"/>
    </div>
    <div class="layui-login-text">
    	<p>© 2016-2017 Larry 版权所有</p>
        <p>鄂xxxxxx</p>
    </div>
</div>
<script type="text/javascript" src="/Public/Admin/common/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/login.js"></script>
<script type="text/javascript" src="/Public/Admin/jsplug/jparticle.jquery.js"></script>
<script type="text/javascript">
$(function(){
	$(".layui-canvs").jParticle({
		background: "#141414",
		color: "#E6E6E6"
	});
	//登录链接测试，使用时可删除
	$(".submit_btn").click(function(){
	  //密码
	  var password = $("input[name=password]").val();
	  if(!password)
	  {
	  	 layer.msg('密码不能为空');
	  	 return false;
	  }
	  //用户名
	  var login_name = $('input[name=login_name]').val();
	  if(!login_name)
	  {
	  	layer.msg('用户名不能为空');
	  	return false;
	  }
	  //验证码
	  var verify = $('input[name=code]').val();
	  if(!verify)
	  {
	  	layer.msg('验证码不能为空');
	  	return false;
	  }

	  $.ajax({
	  	url:'/index.php/Admin/Login/dologin',
	  	data:{password:password,login_name:login_name,verify:verify},
	  	type:'POST',
	  	dataType:"json",
	  	success:function(data){
	  		if(data.state == 0)
	  		{
	  			layer.msg(data.errorInfo);
	  			return false;
	  		}else{
	  			layer.msg('登录成功');
	  			location.href = "/index.php/Admin/Index/index";
	  		}
	  	},
	  	async:false
	  })
	  
	});
});
</script>
</body>
</html>