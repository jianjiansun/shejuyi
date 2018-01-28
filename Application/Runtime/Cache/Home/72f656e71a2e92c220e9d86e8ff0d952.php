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

 <div class="layui-tab layui-tab-brief" lay-filter="project-status">
  <ul class="layui-tab-title">
    <li class="layui-this" lay-id='a'>邀请我的</li>
    <li lay-id='b'>已发送项目书</li>
    <li lay-id='c'>待批复</li>
    <li lay-id='d'>正在进行</li>
    <li lay-id='e'>待结项目</li>    
    <li lay-id='f'>我发布的</li>
    <li lay-id='g'>已完成的项目</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
<table class="layui-table" lay-data="{height:455,even:true, url:'/shejuyi/index.php/Home/Origanization/invateme', page:true, id:'statusa'}" lay-filter="test">
  <thead>
    <tr>
      <th lay-data="{field:'id', width:'7%', sort: true,align:'center'}">ID</th>
      <th lay-data="{field:'project_name', width:'10%',align:'center'}">项目名字</th>
      <th lay-data="{field:'community_name', width:'10%', sort: true,align:'center'}">落地社区</th>
      <th lay-data="{field:'project_service_area',width:'10%',align:'center'}">服务对象</th>
      <th lay-data="{field:'collect_times',width:'15%',align:'center'}">项目征集周期</th>
      <th lay-data="{field:'project_times', sort: true,width:'15%',align:'center'}">项目周期</th>
      <th lay-data="{field:'invitate_time', sort: true,width:'15%',align:'center'}">邀请时间</th>
      <th lay-data="{field:'',width:'18%',toolbar: '#invateop'}">操作</th>
      
    </tr>
  </thead>
</table>
 <script type="text/html" id="invateop">
  <a class="layui-btn layui-btn-xs" lay-event="detail" href="/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.project_id}}" target='_blank'>详情</a>
  <a class="layui-btn layui-btn-xs send_project_book" lay-event="send_project_book" community_id="{{d.community_id}}" project_id="{{d.project_id}}">发送项目书</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs refuse" flag='{{d.sjy_id}}'  lay-event="refuse">拒绝</a>
</script>
<script>
  
 $('body').on('click','.send_project_book',function(){
               var community_id = $(this).attr("community_id");
               var project_id = $(this).attr('project_id');
               layer.open({
                 type:2,
                 title:"发送项目书",
                 content:"/shejuyi/index.php/Home/Origanization/showsendprojectbook/community_id/"+community_id+"/project_id/"+project_id,
                 area:["30%","30%"]
              })
 })
 
  

    
</script>		         
		         
		        
		     
    </div>
    <div class='layui-tab-item'>
	<table class="layui-table" lay-data="{height:455,even:true,url:'/shejuyi/index.php/Home/Origanization/alreadysendprojectbook', page:true, id:'statusb'}" lay-filter="test">
    <thead>
      <tr>
        <th lay-data="{field:'id', width:'10%', sort: true,align:'center'}">ID</th>
        <th lay-data="{field:'project_name', width:'15%',align:'center'}">项目名字</th>
        <th lay-data="{field:'community_name', width:'15%', sort: true,align:'center'}">落地社区</th>
        <th lay-data="{field:'collect_times',width:'20%',align:'center'}">项目征集周期</th>
        <th lay-data="{field:'project_times', sort: true,width:'20%',align:'center'}">项目周期</th>
        <th lay-data="{field:'',width:'20%',toolbar: '#alreadysendprojectbookop',align:'center'}">操作</th>
  
      </tr>
    </thead>
  </table>
<script type="text/html" id="alreadysendprojectbookop">
   <a class="layui-btn layui-btn-xs" lay-event="detail" href='/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.project_id}}' target="_blank">详情</a>
   <a class="layui-btn layui-btn-xs downloadprojectbook" flag='{{d.project_id}}' lay-event="">下载项目书</a>
 </script>

    </div>
    <div class="layui-tab-item">
        <table class="layui-table" lay-data="{height:455,even:true, url:'/shejuyi/index.php/Home/Origanization/waitdelproject', page:true, id:'statusc'}" lay-filter="test">
      <thead>
        <tr>
          <th lay-data="{field:'id', width:'10%', sort: true,align:'center'}">ID</th>
          <th lay-data="{field:'project_name', width:'15%',align:'center'}">项目名字</th>
          <th lay-data="{field:'community_name', width:'15%', sort: true,align:'center'}">落地社区</th>
          <th lay-data="{field:'collect_times',width:'15%',align:'center'}">征集周期</th>
          <th lay-data="{field:'project_times',width:'15%',align:'center'}">项目周期</th>
          <th lay-data="{field:'community_agreen_project_start_time',width:'15%',align:'center'}">社区同意时间</th>
          <th lay-data="{field:'',width:'15%',toolbar: '#waitdelprojectop',align:'center'}">操作</th>
  
        </tr>
      </thead>
    </table>
<script type="text/html" id="waitdelprojectop">
   <a class="layui-btn layui-btn-xs agreenproject" lay-event="agreen" flag='{{d.sjy_id}}' flag1='{{d.project_id}}'>同意</a>
   <a class="layui-btn layui-btn-danger layui-btn-xs refuseproject" lay-event="refuse" flag='{{d.sjy_id}}'>拒绝</a>
   <a class="layui-btn layui-btn-xs" lay-event="downbook" href='/shejuyi/index.php/Home/Origanization/dodownprojectbook/id/{{d.project_book_id}}'>下载项目书</a>
   <a  class="layui-btn layui-btn-xs" lay-event="detail" href='/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.project_id}}' target='_blank'>详情</a>
 </script>
<script>
	$('body').on('click','.agreenproject',function(){
        
        var id = $(this).attr('flag');
        var project_id = $(this).attr('flag1');
        var obj = $(this);
        layer.confirm('确定开始执行该项目?', {icon: 3, title:'执行项目'}, function(index){
	$.ajax({
	url:'/shejuyi/index.php/Home/Origanization/agreenproject',
        dataType:'json',
        type:'post',
        data:{id:id,project_id:project_id},
        success:function(data){
             if(data)
              {
                   obj.parent().parent().parent().remove()
                   layer.msg('开始执行项目');
                   //obj.parent().parent().remove()
                  
              }
	},
        async:false
})
        return false;
        layer.close(index);
})
});
        //拒绝项目
     $('body').on('click','.refuseproject',function(){
	var id = $(this).attr('flag');
        var obj = $(this);
       layer.confirm('确定拒绝执行该项目?', {icon: 3, title:'执行项目'}, function(index){
       $.ajax({
	url:'/shejuyi/index.php/Home/Origanization/refuseproject',
        data:{id:id},
        dataType:'json',
        type:'post',
        success:function(data){
	if(data){
	   obj.parent().parent().parent().remove()
           layer.msg('已拒绝该项目');
	}
       
},
	async:false
})
     return false;
     layer.msg('已拒绝执行该项目');
})
})
</script>

		         
		     
    </div>
   <div class='layui-tab-item'>
	       <table class="layui-table" lay-data="{height:455,even:true,url:'/shejuyi/index.php/Home/Origanization/ingproject', page:true, id:'statusd'}" lay-filter="test">
   <thead>
     <tr>
       <th lay-data="{field:'id', width:'10%', sort: true}">ID</th>
       <th lay-data="{field:'project_title', width:'20%'}">项目名称</th>
       <th lay-data="{field:'community_name',width:'20%'}">落地社区</th>
       <th lay-data="{field:'project_times',width:'20%'}">项目周期</th>
       <th lay-data="{field:'',width:'30%',align:'center', toolbar: '#ingprojectop'}">操作</th>
     </tr>
   </thead>
 </table>
<script type="text/html" id="ingprojectop">
     <a class="layui-btn layui-btn-xs editrate" lay-event="editrate" flag='{{d.project_id}}'>编辑进度</a>
     <a class="layui-btn layui-btn-xs lookprojectrate" lay-event="lookprojectrate" flag='{{d.project_id}}' flag2='{{d.sjy_id}}'>查看进度</a>
     <a class="layui-btn layui-btn-danger layui-btn-xs submitproject" lay-event="submitproject" flag='{{d.sjy_id}}'>结项目</a>
     <a class="layui-btn layui-btn-xs" lay-event="" href='/shejuyi/index.php/Home/Origanization/dodownprojectbook/id/{{d.project_book_id}}'>下载项目书</a>
    <a  class="layui-btn layui-btn-xs" lay-event="detail" href='/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.project_id}}' target='_blank'>详情</a>
  </script>

   </div>
  <div class='layui-tab-item'>
	 <table class="layui-table" lay-data="{height:455,even:true,url:'/shejuyi/index.php/Home/Origanization/waitendproject', page:true, id:'statuse'}" lay-filter="test">
     <thead>
       <tr>
         <th lay-data="{field:'id', width:'10%', sort: true}">ID</th>
         <th lay-data="{field:'project_title', width:'20%'}">项目名称</th>
         <th lay-data="{field:'community_name',width:'20%'}">落地社区</th>
         <th lay-data="{field:'project_apply_end_time',width:'20%'}">申请日期</th>
         <th lay-data="{field:'',width:'30%',align:'center', toolbar: '#waitendprojectop'}">操作</th>
       </tr>
     </thead>
   </table>
   <script type='text/html' id='waitendprojectop'>
       <a class="layui-btn layui-btn-xs lookprojectrate" lay-event="lookprojectrate" flag='{{d.project_id}}' flag2='{{d.sjy_id}}'>查看进度</a>
       <a class="layui-btn layui-btn-xs" lay-event="" href='/shejuyi/index.php/Home/Origanization/dodownprojectbook/id/{{d.project_book_id}}'>下载项目书</a>
      <a  class="layui-btn layui-btn-xs" lay-event="detail" href='/shejuyi/index.php/Home/Origanization/projectinfo/id/{{d.project_id}}' target='_blank'>详情</a>
 
   </script>

  </div> 
    <div class="layui-tab-item">
       <table class="layui-table" lay-data="{height:455,even:true,url:'/shejuyi/index.php/Home/Origanization/mysendproject', page:true, id:'statusf'}" lay-filter="test">
  <thead>
    <tr>
      <th lay-data="{field:'id', width:'10%', sort: true,align:'center'}">ID</th>
      <th lay-data="{field:'sjy_origanization_project_title', width:'15%',align:'center'}">项目名称</th>
      <th lay-data="{field:'sjy_origanization_project_service_object', width:'15%', sort: true,align:'center'}">项目对象</th>
      <th lay-data="{field:'sjy_project_times',width:'20%',align:'center'}">项目周期</th>
      <th lay-data="{field:'send_time',width:'15%',align:'center'}">发布时间</th>
      <th lay-data="{field:'operator',width:'10%',align:'center'}">发布者</th>
      <th lay-data="{field:'',width:'15%',align:'center', toolbar: '#myprojectop'}">操作</th>
    </tr>
  </thead>
</table>
<script type="text/html" id="myprojectop">
  <a class="layui-btn layui-btn-xs" lay-event="detail" href='/shejuyi/index.php/Home/Community/project_info/id/{{d.sjy_id}}' target="_blank">详情</a>
  <a flag='{{d.sjy_id}}' class="layui-btn layui-btn-xs editproject" lay-event="edit">编辑</a>
  <a flag='{{d.sjy_id}}' class="layui-btn layui-btn-danger layui-btn-xs delproject" lay-event="del">删除</a>
</script>
<script>
 $("body").on("click", ".editproject", function() {
           var id = $(this).attr("flag");
         layer.open({
                 type:2,
                 title:"编辑项目",
                 content:"/shejuyi/index.php/Home/Origanization/editProject?id="+id,
                 btnAlign: 'c',
                 btn:["确定"],
                 area:["100%","100%"],
                 yes: function(index, layero){
             //获取子页面窗口
             // alert(2);
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

          
     });

$('body').on('click','.delproject',function(){
	      var id = $(this).attr("flag");
         var delprojectflag = 0;
         $.ajax({
                 url:"/shejuyi/index.php/Home/Origanization/delproject",
                 data:{id:id},
                 type:"post",
                 dataType:"json",
                 success:function(data){
                         if(data){
                                 delprojectflag = 1;
                         }
                 },
                 async:false
         })
         if(delprojectflag == 1)
         {
                 layer.msg("删除成功");
                 $(this).parent().parent().remove();
         }

})

</script>
    </div>
    <div class="layui-tab-item">
	 <table class="layui-table" lay-data="{height:455,even:true,url:'/shejuyi/index.php/Home/Origanization/endproject', page:true, id:'statusg'}" lay-filter="test">
                <thead>
                    <tr>
                     <th lay-data="{field:'ID', width:'10%'}">ID</th>
                      <th lay-data="{field:'sjy_community_project_title', width:'10%'}">项目名字</th>
                      <th lay-data="{field:'sjy_community_project_service_area', width:'10%'}">项目服务对象</th>
                      <th lay-data="{field:'sjy_community_name', width:'10%'}">项目方</th>
                      <th lay-data="{field:'project_start_time', width:'15%'}">项目开始日期</th>
                      <th lay-data="{field:'project_apply_end_time',width:'15%'}">申请结束日期</th>
                        <th lay-data="{field:'project_end_time',width:'15%'}">结束日期</th>
                      <th lay-data="{field:'',width:'15%', align:'center', toolbar: '#end'}">操作</th>
                    </tr>
                </thead>
            </table>

    </div>
  </div>
</div>
 
<script>
 layui.use('table', function(){
    table = layui.table;
});

//注意：选项卡 依赖 element 模块，否则无法进行功能性操作
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
});
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

//拒绝
//$(".refuse").click(function(){
$('body').on('click','.refuse',function(){
	var id = $(this).attr("flag");
	//执行拒绝发送
	var flag = 0;
	$.ajax({
		url:"/shejuyi/index.php/Home/Origanization/refuse_send",
		data:{id:id},
		type:"post",
		dataType:"json",
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
		layer.msg("已拒绝该项目");
		//删除节点
		$(this).parent().parent().parent().remove();
	}
})
//下载项目书
$('body').on('click','.downloadprojectbook',function(){
//$(".downloadprojectbook").click(function(){
	var project_id = $(this).attr("flag");
	layer.open({
		type:2,
		title:"下载项目书",
		content:"/shejuyi/index.php/Home/Origanization/downloadprojectbook?project_id="+project_id,
		area:["60%","60%"]

	})
})
//编辑项目进度
$('body').on('click','.editrate',function(){
//$('.editrate').click(function(){
     var project_id = $(this).attr('flag');
     var index =  layer.open({
                 type:2,
                 title:"编辑项目进度",
                 content:"/shejuyi/index.php/Home/Origanization/editprojectrate?project_id="+project_id,
                 area:["100%","100%"],
                 btnAlign: 'c',
                 btn:['确定','重置'],
                 yes:function(index,layero){
			 var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：
			var res = iframeWin.dosubmit();
                        if(res)
                        {
                             layer.msg('编辑项目进度成功',function(){
                                   layer.close(index);
                             });
                        }
		}
 
         })

})

//查看项目进度
$('body').on('click','.lookprojectrate',function(){
//$('.lookprojectrate').click(function(){
        var project_id = $(this).attr('flag');
        var project_id_flag = $(this).attr('flag2');
	layer.open({
	type:2,
        title:"查看项目进度",
        content:"/shejuyi/index.php/Home/Origanization/projectrate?project_id="+project_id+"&project_id_flag="+project_id_flag,
        area:['50%','70%']
})
})
//结项目申请
$('body').on('click','.submitproject',function(){
//$('.submitproject').click(function(){
        var id = $(this).attr('flag')
        var flag = 0;
        var obj = $(this);
	layer.confirm('确定提交结项目申请?', function(index){
         //发送ajax执行结项目
 	 $.ajax({
	 url:"/shejuyi/index.php/Home/Origanization/submitproject",
         type:"post",
         dataType:"json",
         data:{id:id},
         success:function(data){
                 if(data)
                 {
                    layer.close(index);
                    flag = 1;
                    layer.msg('提交结项目申请成功');
                 }
	 },
         async:false
})
       if(flag)
      {
         
         obj.parent().parent().parent().remove();
      }
         
 })
})
</script>
</script>
<script type = 'text/html' id = 'end'>
             <a href='/shejuyi/index.php/Home/Origanization/projectinfo?id={{d.project_id}}' target="_blank"  class="layui-btn layui-btn-xs" lay-event="detail">详情</a>
             <a flag='{{d.project_id}}' flag2='{{d.sjy_id}}'  class="layui-btn layui-btn-xs projectrate" lay-event="rate">进度</a>
             <a href='/shejuyi/index.php/Home/Community/download?id={{d.project_book_id}}' class='layui-btn layui-btn-xs' lay-event='down'>下载项目书</a>
</script>

</body>
</html>