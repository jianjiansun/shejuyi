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
</head>
<body>
<script>
</script>
	<br />
	 <br /> 
           <form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text" name="phone" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" style='width:200px;'>
    </div>
  </div>
  <div class="layui-form-item" id = "showname" style = "display:none">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-block">
      <input type="text" name="truename" required  lay-verify="required" autocomplete="off" class="layui-input" style = 'width:200px;' disabled />
    </div>
  </div>
</form>
</body>
<script type="text/javascript">
       function ok()
       {
          var  phone = $('input[name=phone]').val();
          var  state = 0;
           
          if(flag==1)
          {
          
          $.ajax({
	       url:"/shejuyi/index.php/Home/Community/doAddStaff",
               type:"post",
               dataType:"json",
               data:{phone:phone},
               success:function(data){
                  if(data.state == 1)
                  {
                     state = 1;
                  }
                  
               },
               async:false
	})
         return state;
         }
       }
	var flag = 0
        
        $('input[name=phone]').focus(function(){
        flag = 0;
	$('#showname').css('display','none');
        $('input[name=name]').val('');
})
	$("input[name='phone']").blur(function(){
       // $('input[name=phone]').on('input propertychange change',function(){ 
              // var result = $('input[name=phone]').val(); 
              // if(result.length>=11)
             // {
		phone = $(this).val();
                
		if(phone == "")
		{
			return false;
		}
		
		//执行ajax去查找
		$.ajax({
			url:"/shejuyi/index.php/Home/Community/searchNameByPhone",
			data:{phone:phone},
			dataType:"json",
			type:"post",
			success:function(data)
			{
				if(data.state == 1)
				{
                                        flag = 1;
					showname = data.name;
					
				}else if(data.state == -1)
				{
					flag = -1;  //用户未实名认证
				}else if(data.state == 2)
				{
					flag = 2;   //用户加入其它组织
				}else if(data.state == 3)
				{
					flag = 3;   //该用户已加入本组织
				}else{

                                }
			},
                        async:false
		})
                if(flag == 0)
                {
                  layer.msg('该用户未注册社居易');
                  $(this).val('')
                  return false;
                }else if(flag == 1)
                {
                   $('#showname').css('display','block');
                   $('input[name=truename]').val(showname);
                }else if(flag==2)
                {
                   layer.msg('该用户已加入其他组织');
                   $(this).val("");
                   return false;
                }else if(flag==3)
                {
                   layer.msg('该用户已加入本组织');
                   $(this).val('');
                   return false;
                }else if(flag == -1)
                {
                     layer.msg('该用户未实名认证');
                    $(this).val('');
                    return false;
                }else{
               }	
               
	})
</script>
<script>
</html>