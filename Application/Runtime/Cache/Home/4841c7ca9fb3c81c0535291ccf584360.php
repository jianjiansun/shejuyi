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
<?php echo ($project['sjy_community_project_title']); ?>
<body>
    <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/showdownprojectbook/id/<?php echo ($id); ?>', page:true, id:'test'}" lay-filter="test">
        <thead>
            <tr>
              <th lay-data="{field:'ID', width:'10%'}">ID</th>
              <th lay-data="{field:'origanization_name', width:'20%'}">组织机构名字</th>
              <th lay-data="{field:'sjy_project_book_name', width:'20%'}">文件名</th>
              <th lay-data="{field:'sjy_project_book_send_time', width:'20%'}">时间</th>
              <th lay-data="{field:'sjy_id', width:'30%',align:'center', toolbar: '#bar'}">操作</th>
            </tr>
        </thead>
      </table>
	
	<script type="text/javascript">

       layui.use('table', function(){
  var table = layui.table;
});
	</script>


<script type="text/html" id="bar">
  <a href = "/shejuyi/index.php/Home/Community/download?id={{d.sjy_id}}" class="layui-btn layui-btn-xs">下载</a>
  <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-xs ok">同意</a>
</script>
<script type="text/javascript">
   $("body").on("click", ".ok", function() {
        var project_book_id = $(this).attr("flag");
        var project_name;
        var origanization_name;
        //根据项目书id查询信息
        $.ajax({
             url:"/shejuyi/index.php/Home/Community/searchbybookid",
             data:{project_book_id:project_book_id},
             type:"post",
             dataType:"json",
             success:function(data){
              project_name = data.project_name;
              origanization_name = data.origanization_name;
             },
             async:false
        })
        var html = "<span>项目名:</span><span style='color:red'>"+project_name+"</span><br /><span >机构名:</span><span style='color:red'>"+origanization_name+"</span>"
        layer.confirm(html, {icon: 3, title:'确定采购信息'}, function(index){
           //执行采购该项目操作
           $.ajax({
               url:"/shejuyi/index.php/Home/Community/agreenproject",
               data:{project_book_id:project_book_id},
               type:"post",
               dataType:"json",
               success:function(data){
                  if(data == 1)
                  {
                    layer.msg("等待机构方确认即可开始项目");
                    parent.location.reload();
                  }
               }
           })
        layer.close(index);
      });
        
    });
</script>
</body>
</html>