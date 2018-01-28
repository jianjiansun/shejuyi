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
	<div class="layui-tab layui-tab-brief" lay-filter="project-status">
  <ul class="layui-tab-title">
    <li class="layui-this" lay-id='g'>我邀请的</li>
    <li lay-id='a'>收到的项目书</li>
    <li lay-id='b'>确认中的项目</li>
    <li lay-id='c'>进行中的项目</li>
    <li lay-id='d'>结项目申请</li>
    <li lay-id='e'>已完成的项目</li>
    <li lay-id='f'>我发布的项目</li>
  </ul>
    <div class="layui-tab-content">
         <div class="layui-tab-item layui-show">
          <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/inginvitate', page:true, id:'statusg'}" lay-filter="statusg">
        <thead>
              <tr>
                <th lay-data="{field:'ID', width:'5%'}">ID</th>
                <th lay-data="{field:'project_name', width:'12%'}">项目名字</th>            
                <th lay-data="{field:'origanization_name', width:'8%'}">项目对接方</th>
                 <th lay-data="{field:'collect_time', width:'15%'}">项目招标周期</th>
                <th lay-data="{field:'project_time', width:'14%'}">项目执行周期</th>
                 <th lay-data="{field:'invitate_time', width:'14%'}">项目邀请日期</th>
                 <th lay-data="{field:'invitate_people', width:'9%'}">邀请人</th>
                <th lay-data="{field:'state',width:'9%', align:'center'}">状态</th>
                <th lay-data="{field:'',width:'14%', align:'center', toolbar: '#inginvitateop'}">操作</th>
              </tr>
          </thead>
      </table>
        </div>
        <div class="layui-tab-item">
          <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/reciveprojectbook', page:true, id:'statusa'}" lay-filter="statusa">
        <thead>
            <tr>
              <th lay-data="{field:'ID', width:'5%'}">ID</th>
              <th lay-data="{field:'sjy_community_project_title', width:'15%'}">项目名字</th>
              <th lay-data="{field:'sjy_community_project_service_area', width:'15%'}">项目服务对象</th>
              <th lay-data="{field:'sjy_community_project_collect_time', width:'20%'}">项目征集日期</th>
              <th lay-data="{field:'sjy_community_project_doing_time', width:'20%'}">项目执行日期</th>
              <th lay-data="{field:'sjy_id',width:'25%', align:'center', toolbar: '#barDemo'}">操作</th>
            </tr>
        </thead>
      </table>
        </div>
        <div class="layui-tab-item">
                <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/confirmproject', page:true, id:'statusb'}" lay-filter="statusb">
        <thead>
            <tr>
              <th lay-data="{field:'ID', width:'5%'}">ID</th>
              <th lay-data="{field:'project_name', width:'9%'}">项目名字</th>
              <th lay-data="{field:'origanization_name', width:'9%'}">项目对接方</th>
              <th lay-data="{field:'project_book_name', width:'9%'}">项目书</th>
              <th lay-data="{field:'time', width:'18%'}">项目执行日期</th>
              <th lay-data="{field:'community_agreen_project_start_people', width:'9%'}">操作人</th>
              <th lay-data="{field:'community_agreen_project_start_time', width:'9%'}">操作时间</th>
              <th lay-data="{field:'state',width:'9%', align:'center'}">状态</th>
              <th lay-data="{field:'',width:'23%', align:'center', toolbar: '#op'}">操作</th>
            </tr>
        </thead>
      </table>
        </div>
        <div class="layui-tab-item">
	    <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/ingproject', page:true, id:'statusc'}" lay-filter="statusc">
          <thead>
              <tr>
                <th lay-data="{field:'ID', width:'5%'}">ID</th>
                <th lay-data="{field:'sjy_community_project_title', width:'10%'}">项目名字</th>
                <th lay-data="{field:'sjy_origanization_name', width:'10%'}">项目对接方</th>
                <th lay-data="{field:'project_times', width:'15%'}">项目周期</th>
                <th lay-data="{field:'community_agreen_project_start_time', width:'15%'}">我方同意日期</th>
                <th lay-data="{field:'community_agreen_project_start_people', width:'10%'}">我方同意人</th>
                <th lay-data="{field:'project_start_time', width:'15%'}">对方同意时间</th>
                <th lay-data="{field:'',width:'20%', align:'center', toolbar: '#ingprojectop'}">操作</th>
              </tr>
          </thead>
        </table>

	</div>
        <div class="layui-tab-item">
		    <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/applyendproject', page:true, id:'statusd'}" lay-filter="statusd">
            <thead>
                <tr>
                  <th lay-data="{field:'ID', width:'5%'}">ID</th>
                  <th lay-data="{field:'sjy_community_project_title', width:'10%'}">项目名字</th>
                  <th lay-data="{field:'sjy_community_project_service_area', width:'10%'}">项目服务对象</th>
                  <th lay-data="{field:'sjy_origanization_name', width:'15%'}">项目对接方</th>
                  <th lay-data="{field:'project_start_time', width:'15%'}">项目开始日期</th>
                  <th lay-data="{field:'project_apply_end_time',width:'15%'}">申请日期</th>
                  <th lay-data="{field:'state',width:'5%', align:'center'}">状态</th>
                  <th lay-data="{field:'',width:'25%', align:'center', toolbar: '#applyend'}">操作</th>
                </tr>
            </thead>
          </table>

	</div>
        <div class="layui-tab-item">
  <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/endproject', page:true, id:'statuse'}" lay-filter="statuse">
              <thead>
                  <tr>
                   <th lay-data="{field:'ID', width:'5%'}">ID</th>
                    <th lay-data="{field:'sjy_community_project_title', width:'10%'}">项目名字</th>
                    <th lay-data="{field:'sjy_community_project_service_area', width:'15%'}">项目服务对象</th>
                    <th lay-data="{field:'sjy_origanization_name', width:'10%'}">项目对接方</th>
                    <th lay-data="{field:'project_start_time', width:'15%'}">项目开始日期</th>
                    <th lay-data="{field:'project_apply_end_time',width:'15%'}">申请日期</th>
                      <th lay-data="{field:'project_end_time',width:'15%'}">操作日期</th>
                    <th lay-data="{field:'',width:'15%', align:'center', toolbar: '#end'}">操作</th>
                  </tr>
              </thead>
           </table>

	</div>
        <div class='layui-tab-item'>
            <table class="layui-table" lay-data="{height:455, url:'/shejuyi/index.php/Home/Community/mysendproject', page:true, id:'statusf'}" lay-filter="statusf">
                <thead>
                    <tr>
                     <th lay-data="{field:'id', width:'5%'}">ID</th>
                      <th lay-data="{field:'sjy_community_project_title', width:'10%'}">项目名字</th>
                      <th lay-data="{field:'sjy_community_project_service_area', width:'10%'}">项目服务对象</th>
                      <th lay-data="{field:'collect_times', width:'20%'}">项目招标周期</th>
                       <th lay-data="{field:'project_times', width:'20%'}">项目执行周期</th>
                       <th lay-data="{field:'sjy_community_project_send_time', width:'10%'}">项目发布时间</th>
                      <th lay-data="{field:'sjy_community_project_send_prople_name', width:'10%'}">项目发布人</th>
                      <th lay-data="{field:'',width:'15%', align:'center', toolbar: '#mysendproject'}">操作</th>
                    </tr>
               </thead>
             </table>
              
       </div>
  </div>
</div>      
    <script type="text/javascript">

    layui.use('table', function(){
   table = layui.table;
});
    layui.use('element', function(){
  var element = layui.element;
      element.on('tab(project-status)', function(){
     var id = this.getAttribute('lay-id');
         table.reload('status'+id, {
  where: {}
  ,page: {
    curr: 1 //重新从第 1 页开始
  }
});  
  });
  
  //…
});
      $("#downprojectbook").click(function(){
          //项目id
          var id = $(this).attr("flag");
           layer.open({
                type:2,
                title:"下载项目书",
                content:"/shejuyi/index.php/Home/Community/downprojectbook/id/"+id,
                area:["40%","50%"],
            })
           return false;
      })
    </script>

<script type="text/html" id="barDemo">
  <a href = "/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.sjy_id}}" target="blank" class="layui-btn layui-btn-xs detail">查看项目</a>
  <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-xs down">查看项目书</a>
</script>
<script type="text/javascript">
   $("body").on("click", ".down", function() {
        var project_id = $(this).attr("flag");
         layer.open({
                type:2,
                title:"查看项目书",
                content:"/shejuyi/index.php/Home/Community/downprojectbook?id="+project_id,
                area:["80%","95%"]
            })
    });
</script>
 

<script type="text/html" id="inginvitateop">
    {{#  if(d.status == -2){ }}
    <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-xs reinvitate">重新邀请</a>
    <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-danger layui-btn-xs delmyinvitate">删除</a>
    {{#  } }}
     <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
</script>
<script>
//重新邀请
$('body').on('click','.reinvitate',function(){
    var id = $(this).attr('flag');
    layer.confirm('是否重新邀请?', {icon: 3, title:'重新邀请'}, function(index){
    $.ajax({
      url:'/shejuyi/index.php/Home/Community/reinvitate',
      type:'post',
      dataType:'json',
      data:{id:id},
      success:function(data)
      {
          if(data)
          {
            // element.tabChange('project-status', "g");
                  layer.msg('重新邀请成功')
                  table.reload('statusg', {
                  where: {}
                  ,page: {
                    curr: 1 //重新从第 1 页开始
                  }
                });
          }
      }
    })
    layer.close(index)
    })
})
//删除拒绝邀请的
$('body').on('click','.delmyinvitate',function(){
    var id = $(this).attr('flag');
    var obj = $(this);
    layer.confirm('是否删除?', {icon: 3, title:'删除'}, function(index){
    $.ajax({
      url:'/shejuyi/index.php/Home/Community/delmyinvitate',
      type:'post',
      dataType:'json',
      data:{id:id},
      success:function(data)
      {
          if(data)
          {
            // element.tabChange('project-status', "g");
                  layer.msg('删除成功')
                  obj.parent().parent().parent().remove()
          }
      }
    })
    layer.close(index)
    })
})
</script>
 <script type="text/html" id="op">
    <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
    <a href = "/shejuyi/index.php/Home/Community/download?id={{d.project_book_id}}" class="layui-btn layui-btn-xs">下载项目书</a>
    {{#  if(d.status == -3){ }}
    <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-xs restart">重新邀约</a>
    <a flag="{{d.sjy_id}}" class="layui-btn layui-btn-danger layui-btn-xs delmyinvitate">删除</a>
    {{#  } }} 
</script>
<script type="text/javascript">
  $('body').on('click','.restart',function(){
    var id = $(this).attr('flag');
    layer.confirm('是否重新邀请?', {icon: 3, title:'重新邀请'}, function(index){
    $.ajax({
      url:'/shejuyi/index.php/Home/Community/restart',
      type:'post',
      dataType:'json',
      data:{id:id},
      success:function(data)
      {
          if(data)
          {
            // element.tabChange('project-status', "g");
                  layer.msg('重新邀请成功')
                  table.reload('statusb', {
                  where: {}
                  ,page: {
                    curr: 1 //重新从第 1 页开始
                  }
                });
          }
      }
    })
    layer.close(index)
    })
})
</script>
<script type = 'text/html' id = 'ingprojectop'>
	  <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
          <a flag='{{d.project_id}}' flag2='{{d.sjy_id}}'  class="layui-btn layui-btn-xs projectrate" lay-event="rate">进度</a>
          <a href='/shejuyi/index.php/Home/Community/download?id={{d.project_book_id}}' class='layui-btn layui-btn-xs' lay-event='down'>下载项目书</a>
</script>
<script type = 'text/html' id = 'applyend'>
           <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
           <a flag='{{d.project_id}}' flag2='{{d.sjy_id}}'  class="layui-btn layui-btn-xs projectrate" lay-event="rate">进度</a>
           <a href='/shejuyi/index.php/Home/Community/download?id={{d.project_book_id}}' class='layui-btn layui-btn-xs' lay-event='down'>下载项目书</a>
           <a flag='{{d.sjy_id}}'  class = 'layui-btn layui-btn-xs reply' lay-event='reply'>审核</a>
 </script>

<script type = 'text/html' id = 'end'>
            <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
            <a flag='{{d.project_id}}' flag2='{{d.sjy_id}}'  class="layui-btn layui-btn-xs projectrate" lay-event="rate">进度</a>
            <a href='/shejuyi/index.php/Home/Community/download?id={{d.project_book_id}}' class='layui-btn layui-btn-xs' lay-event='down'>下载项目书</a>
  </script>

<script type = 'text/html' id = 'mysendproject'>
             <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.sjy_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
             <a flag='{{d.sjy_id}}'  class="layui-btn layui-btn-xs edit" lay-event="edit">编辑</a>
   </script>
<script>
   //编辑项目进度
  $('body').on('click','.edit',function(){
	var project_id = $(this).attr('flag');
        layer.open({
        type:2,
        title:'编辑项目',
        content:'/shejuyi/index.php/Home/Community/editproject/id/'+project_id,
        area:['100%','100%'],
        btn:['确定'],
        btnAlign:'c',
        yes:function(index,layero){
             var iframeWin = window[layero.find('iframe')[0]['name']];
              var res = iframeWin.send_project();  //子页面点击确认
              if(res)
              {
  
                  layer.msg("项目修改成功", function(){
                   layer.closeAll();
                  });
              }

	
}
})
})
</script>
<script>
    $('body').on('click','.projectrate',function(){
	var project_id = $(this).attr('flag')
        var project_id_flag = $(this).attr('flag2');
        layer.open({
	     type:2,
             title:"查看项目进度",
             content:"/shejuyi/index.php/Home/Origanization/projectrate?project_id="+project_id+"&project_id_flag="+project_id_flag,
             area:['50%','70%']
	})
})
</script>
<script type="text/javascript">
   $("body").on("click", ".down", function() {
        var project_id = $(this).attr("flag");
         layer.open({
                type:2,
                title:"查看项目书",
                content:"/shejuyi/index.php/Home/Community/downprojectbook?id="+project_id,
                area:["80%","95%"]
            })
    });
</script>
<script>
  $('body').on('click','.reply',function(){
	var id = $(this).attr('flag')
        var obj = $(this);
        layer.open({
	type:2,
        title:"审核项目",
        content:"/shejuyi/index.php/Home/Community/replyproject?id="+id,
        area:["30%",'30%'],
        btn:["确定","取消"],
        btnAlign:'c',
        yes:function(index,layero){
	var iframeWin = window[layero.find('iframe')[0]['name']];
        var res = iframeWin.reply();
        layer.close(index);
        if(res == 1)
        {
            layer.msg('同意该项目结束')
            obj.parent().parent().parent().remove();
        }
        if(res == 2)
        {
           layer.msg('拒绝结束该项目')
        }
}
})
})
</script>
</body>
</html>