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
	
<meta charset="utf-8" />
</head>
<body>

同意
 <input type='radio' name='reply' value=1 />
拒绝
 <input type = 'radio' name = 'reply' value = 0 /><br />
<input type = 'hidden' name = 'id' value='<?php echo ($id); ?>' />
备注
<textarea></textarea>
</body>
<script>
   function reply()
   {
      var replyvalue = $('input[name=reply]:checked').val();
      var con = $('textarea').val();
      var id = $('input[name=id]').val();
      var flag;
      $.ajax({
	url:"/shejuyi/index.php/Home/Community/doreply",
        type:"post",
        dataType:"json",
       data:{id:id,replyvalue:replyvalue,con:con},
       success:function(data){
           flag = data;
	},
        async:false
})
   return flag;
   }
</script>
</html>