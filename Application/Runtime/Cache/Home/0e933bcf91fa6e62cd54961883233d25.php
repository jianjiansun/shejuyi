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
     <input type='hidden' name='project_id' value='<?php echo ($project_id); ?>' />
      <table class="layui-table" lay-data="{height:300,even:true, page:true, id:'downbook'}" lay-filter="test">
      <thead>
        <tr>
          <th lay-data="{field:'id', width:80, sort: true,align:'center'}">ID</th>
          <th lay-data="{field:'sjy_project_book_name', width:222,align:'center'}">项目书</th>
          <th lay-data="{field:'sjy_project_book_send_time', width:200, sort: true,align:'center'}">发送时间</th>
          <th lay-data="{field:'project_book_send_people',width:150,align:'center'}">发送人</th>
          <th lay-data="{field:'',width:100,toolbar: '#downloadbooklistop',align:'center'}">操作</th>
          
        </tr>
      </thead>
    </table>
  <script type="text/html" id="downloadbooklistop">
    <a class="layui-btn layui-btn-xs down" flag='{{d.sjy_id}}' lay-event="">下载</a>
  </script>
</body>
<script type="text/javascript">
        var project_id = $('input[name=project_id]').val();
        layui.use('table', function(){
         var table = layui.table;
         table.reload('downbook', {
  url: '/shejuyi/index.php/Home/Origanization/downloadbooklist'
  ,where: {project_id:project_id} //设定异步数据接口的额外参数
  //,height: 300
});
})
        $('body').on('click','.down',function(){
	//$(".down").click(function(){
		var id = $(this).attr("flag");
		location.href="/shejuyi/index.php/Home/Origanization/dodownprojectbook?id="+id
	})
</script>
</html>