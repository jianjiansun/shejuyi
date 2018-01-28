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
	
<meta charset="UTF-8">
    <title>EasyLife</title>
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/bootstrap.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/common.css">
    <script src = "/shejuyi/Public/Home/js/bootstrap.js"></script>
    <script src = "/shejuyi/Public/Home/js/jquery.page.js"></script>
</head>
<body>
<div class="site-text site-block">
      <form class="layui-form" action="">
          <img id="touxiang" src="/shejuyi<?php echo ($touxiang); ?>" style="width:100px;height:100px;border-radius:50%;cursor:pointer"/>
        <div class="layui-form-item">
          <label class="layui-form-label">姓名</label>
          <div class="layui-input-block">
            <input name="realname" value="<?php echo ($userInfo["sjy_community_user_real_name"]); ?>" required="" disabled="disabled" lay-verify="required" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">手机号</label>
          <div class="layui-input-block">
            <input name="phonenumber" value="<?php echo ($userInfo["sjy_community_login_id"]); ?>" required="" disabled="disabled" lay-verify="required" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">邮箱</label>
          <div class="layui-input-block">
            <input name="email" required="" value="<?php echo ($userInfo["sjy_community_user_email"]); ?>"  lay-verify="required" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">所在社区</label>
          <div class="layui-input-block">
            <input required="" disabled="disabled" value="<?php echo ($userInfo["sjy_community_name"]); ?>" lay-verify="required" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
      </form>
    </div>
</body>
</html>
<script>
     //我的项目被点击
       $("#touxiang").click(function(){
            layer.open({
                type:2,
                title:"修改头像",
                content:"/shejuyi/index.php/Home/Community/uploadtouxiang",
                area:["80%","95%"],
                btnAlign: 'c',
                btn:["确定"],
                yes: function(index, layero){
                    //获取修改图片窗口 执行修改头像操作 修改成功后关闭窗口 并更新此页面头像
                     var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：
                     var body =  top.layer.getChildFrame('body', index)
                     var res = iframeWin.submit();
                     if(res)
                     {
                        layer.close(layer.index);
                        //替换头像
                        $("#touxiang").attr("src","/shejuyi"+res);
                        
                        window.parent.changeavator("/shejuyi"+res);
                     }
                }
            })
       })

       function submit()
       {
          //获取邮箱地址
          var email = $("input[name='email']").val();
          $.ajax({
            url:"/shejuyi/index.php/Home/Community/updatePersonInfo",
            type:"post",
            dataType:"json",
            data:{email:email},
            success:function(data){
              
            }
          })
       }
</script>