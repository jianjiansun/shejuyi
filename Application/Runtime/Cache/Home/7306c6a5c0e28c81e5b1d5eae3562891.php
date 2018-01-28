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
<link href="/shejuyi/Public/Home/css/common1.css" type="text/css" rel="stylesheet"/>
<link href="/shejuyi/Public/Home/css/index1.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<!-- 服务对象<input type = "text" name = "server_object"/>
	项目介绍<textarea name = "project_introduce"></textarea>
	项目目标<textarea name = "project_goal"></textarea> -->
	<!-- 项目周期 <div class="layui-input-inline">
      <input class="layui-input" placeholder="开始日" name = "start_time" id="LAY_demorange_s">
    </div>
    <div class="layui-input-inline">
      <input class="layui-input" placeholder="截止日" name = "end_time" id="LAY_demorange_e">
    </div> -->
    
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">项目名称</label>
          <div class="layui-input-block">
            <input name="project_name" required="" lay-verify="required" placeholder="请输入项目名称" autocomplete="off" value="<?php echo ($project_info["sjy_community_project_title"]); ?>" class="layui-input" type="text">
		 <input name="project_id" hidden="true" value = "<?php echo ($project_info["sjy_id"]); ?>" type="text" />
          </div>
        </div>
     	 <div class="layui-form-item">
          <label class="layui-form-label">项目需求(包括项目介绍)</label>
          <div class="layui-input-block">
           <textarea placeholder="请输入项目介绍" name = "demand_describe" class="layui-textarea"><?php echo ($project_info["sjy_community_project_demand"]); ?></textarea>
          </div>
        </div>
         
        <div class="layui-form-item">
          <label class="layui-form-label">服务对象</label>
          <div class="layui-input-block">
            <select name="server_object" lay-verify="required">
              <option value=""></option>
              <?php if(is_array($service_object)): foreach($service_object as $key=>$val): if($project_info['sjy_community_project_service_area_id'] == $val['sjy_id']): ?><option value="<?php echo ($val["sjy_id"]); ?>" selected><?php echo ($val["service_object_name"]); ?></option>
                <?php else: ?>
                       <option value="<?php echo ($val["sjy_id"]); ?>"><?php echo ($val["service_object_name"]); ?></option><?php endif; endforeach; endif; ?>
            </select>
          </div>
        </div>
          <div class="layui-form-item">
          <label class="layui-form-label">征集周期</label>
             <div class="layui-input-block">
                   <div class="layui-input-inline">
                  <input class="layui-input LAY_demorange_s" placeholder="开始日" name = "collect_start_time" id="LAY_demorange">
             </div>
            </div>
        </div>

         <div class="layui-form-item">
      	<label class="layui-form-label">项目周期</label>
      		 <div class="layui-input-block">
      	         <div class="layui-input-inline">
      					<input class="layui-input" placeholder="开始日" name = "start_time" id="LAY_demorange_s">
   				 </div>
    		  </div>
    	</div>
       <div class="layui-form-item">
              <div class="img-box full">
                  <section class=" img-section">
                    <p class="up-p">项目宣传图：<span class="up-span">最多可以上传5张图片，马上上传</span></p>
                    <div class="z_photo upimg-div clear">
                               <?php if(is_array($project_imgs)): foreach($project_imgs as $key=>$val): ?><section class="up-section fl">
                                  <span class="up-span"></span>
                                  <img src="/shejuyi/Public/Home/img/a7.png" class="close-upimg">
                                  <img src="/shejuyi/Public/Home/img/buyerCenter/3c.png" class="type-upimg" alt="添加标签">
                                  <img src="/shejuyi<?php echo ($val["sjy_community_project_image"]); ?>" id="<?php echo ($val["sjy_id"]); ?>" class="up-img">
                                    <p class="img-namep"></p>
                                    <input id="taglocation" name="taglocation" value="" type="hidden">
                                    <input id="tags" name="tags" value="" type="hidden">
                                </section><?php endforeach; endif; ?>
                                 <section class="z_file fl">
                                  <img src="/shejuyi/Public/Home/img/a11.png" class="add-img">
                                  <input type="file" name="file" id="file" class="file" value="" accept="image/jpg,image/jpeg,image/png,image/bmp" multiple />
                                 </section>
                         </div>
                   </section>
          </div>
          <aside class="mask works-mask">
            <div class="mask-content">
              <p class="del-p">确定删除么</p>
              <p class="check-p"><span class="del-com wsdel-ok">确定</span><span class="wsdel-no">取消</span></p>
            </div>
          </aside>
    
  
          <script src="/shejuyi/Public/Home/js/imgPluginNew4.js"></script>
       </div>
      </form>
	<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;
	laydate.render({
   	 	elem: '#LAY_demorange_s',
		  range:'~',
      value:'<?php echo ($time); ?>'
 	 });
      
        laydate.render({
         elem:'#LAY_demorange',
         range:'~',
         value:'<?php echo ($collect_time); ?>'
})
  
})


 //图片上传
       $(function(){
                $("#file").takungaeImgup({
                    formData: { "path": "Content/Images/", "name": "uploadpic" }, //path参数会发送给服务器，name参数代表上传图片成功后，自动生成input元素的name属性值
                    url: "/shejuyi/index.php/Home/Community/add_project_image",    //发送请求的地址，服务器地址
                    success: function (data) {
 
                    },
                    error: function (err) {
                        layer.msg(err);
                    }
                });
            })

//收集表单信息 
function send_project()
{
        var project_id   = $("input[name='project_id']").val(); //项目id
	var project_name = $("input[name=project_name]").val();  //项目名字
         var server_area = $("select[name=server_range]").val();   //项目服务领域
         var demand_describe = $("textarea[name=demand_describe]").val() //项目需求简介
         // var introduce = $("textarea[name=introduce]").val();  //项目方介绍
         var collect_start_time = $("input[name=collect_start_time]").val(); //项目征集开始时间
         
         // var main_join = $("textarea[name=main_join]").val();  //参与主体
         // var declare_range = $("textarea[name=declare_range]").val(); //申报范围
         var start_time = $("input[name=start_time]").val();  //项目开始时间
         
         var flag = 0;

    
	 $.ajax({
                 url:"/shejuyi/index.php/Home/Community/doeditproject",
                 type:"post",
                 dataType:"json",
                 data:{project_name:project_name,project_id:project_id,server_area:server_area,demand_describe:demand_describe,collect_start_time:collect_start_time,start_time:start_time},
                 success:function(data){
                         if(data.state == 0)
                         {
                                 layer.msg(data.errorInfo);
                         }else{
                                 flag = 1;
                         }
                 },
                 async:false
         })
         if(flag == 1)
         {
            return true;
         }else{
                 return false;
         }

}
</script>
</body>
</html>