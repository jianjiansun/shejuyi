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
<script src = "/shejuyi/Public/Home/js/jquery.page.js"></script>
<link href="/shejuyi/Public/Home/css/common1.css" type="text/css" rel="stylesheet"/>
<link href="/shejuyi/Public/Home/css/index1.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
   <!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/shejuyi/Public/ueditor1_4_3_3-utf8-php/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/shejuyi/Public/ueditor1_4_3_3-utf8-php/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
</form>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
});

function dosubmit()
{
   var title = $('input[name=title]').val();
   var con =  ue.getContent();
   var project_id ="<?php echo ($project_id); ?>";
   var flag = 0;
   $.ajax({
	 url:"/shejuyi/index.php/Home/Origanization/doaddprojectrate",
         type:"post",
         data:{title:title,con:con,project_id:project_id},
         dataType:'json',
         success:function(data){
	     if(data)
             {
               flag = 1;
             }
	 },
         async:false
	})
   if(flag)
   {
      return 1;    //发布成功
   }else{
      return 0;
    }
}
</script>
</body>
</html>