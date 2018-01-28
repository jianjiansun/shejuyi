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
     <button id = "group">社区机构认证</button>
     <button id = "person">个人社工认证</button>

     <script type="text/javascript">
     //代表单位注册
     $("#group").click(function(){
     	  layer.open({
                    type:2,
                    title:"社区认证",
                    content:"communityIdenty",
                    btnAlign: 'c',
                    area:["100%","100%"],
                })
  //    	var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		// parent.layer.close(index); //再执行关闭        
     })
     //社区职工
     $("#person").click(function(){
          layer.open({
                    type:2,
                    title:"个人认证",
                    content:"communityPersonIdenty",
                    btnAlign: 'c',
                    area:["100%","100%"],
                })
  //        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        // parent.layer.close(index); //再执行关闭        
     })
     </script>
</body>
</html>