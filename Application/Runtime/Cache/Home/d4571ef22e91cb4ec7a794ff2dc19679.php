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
 <table class="layui-table" lay-data="{height:315, url:'/shejuyi/index.php/Home/Community/inviteprojectlist', page:true, id:'invite_project'}" lay-filter="invite_project">
  <thead>
    <tr>
      <th lay-data="{field:'id', width:80, sort: true,width:'20%',align:'center'}">ID</th>
      <th lay-data="{field:'sjy_community_project_title',width:'50%',align:'center'}">项目名称</th>
      <th lay-data="{field:'',toolbar:'#inviteop',width:'30%',align:'center'}">操作</th>
    </tr>
  </thead>
</table>
<script>
layui.use('table', function(){
  var table = layui.table;
 })
</script>
<script type="text/html" id="inviteop">
  <a class="layui-btn layui-btn-danger layui-btn-xs invite" lay-event="invite" flag='{{d.sjy_id}}'>邀请</a>
</script>		
 </body>
 <script type="text/javascript">
 	var origanization_id = "<?php echo ($origanization_id); ?>";
 	$('body').on('click','.invite',function(){
 	//$("button").click(function(){
 		var project_id = $(this).attr("flag");
 		$.ajax({
 			url:'/shejuyi/index.php/Home/Community/do_invite_project',
 			type:"post",
 			data:{id:project_id,origanization_id:origanization_id},
 			dataType:"json",
 			success:function(data){
 				if(data == 1)
 				{
 					layer.msg("项目邀请发送成功");
 				}else if(data == 2){
 					layer.msg("该项目已经邀请过该机构,无需重复邀请");
 				}else if(data == 3){
 					layer.msg("该机构就该项目已发项目书给您,无需再邀请");
 				}
 			},
 			async:false
 		})
 		return false;
 	})
 </script>
 </html>