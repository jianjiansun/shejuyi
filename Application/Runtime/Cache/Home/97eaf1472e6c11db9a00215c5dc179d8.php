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
<div class="layui-tab layui-tab-brief" lay-filter="mycommunity" >
  <ul class="layui-tab-title">
    <li class="layui-this" lay-id='baseinfo'>基本信息</li>
    <li lay-id='mystaff'>员工管理</li>
    <li lay-id = 'pic'>社区风采</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
    	<form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">社区名字</label>
          <div class="layui-input-block">
            <input name="title" disabled="disabled" required="" value="<?php echo ($community_base_info["sjy_community_name"]); ?>" lay-verify="required" placeholder="请输入机构名字" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">社区地址</label>
          <div class="layui-input-block">
            <input name="title" disabled="disabled" value="<?php echo ($community_base_info["full_address"]); ?>" required="" lay-verify="required" placeholder="请输入机构名字" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">固定电话</label>
          <div class="layui-input-block">
          	<?php if($role == 1): ?><input name="phone" value="<?php echo ($community_base_info["sjy_community_phone"]); ?>" required="" lay-verify="required" placeholder="请输入机构名字" autocomplete="off" class="layui-input" type="text">
            	<?php else: ?>
            	<input name="title" value="<?php echo ($community_base_info["sjy_community_phone"]); ?>" disabled="disabled" required="" lay-verify="required" placeholder="请输入机构名字" autocomplete="off" class="layui-input" type="text"><?php endif; ?>
          </div>
        </div>
        <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">社区简介</label>
          <div class="layui-input-block">
          	<?php if($role == 1): ?><textarea placeholder="请输入内容" class="layui-textarea" ><?php echo ($community_base_info["sjy_community_introduce"]); ?></textarea>
            	<?php else: ?>
            	<textarea placeholder="请输入内容" disabled="disabled" class="layui-textarea"><?php echo ($community_base_info["sjy_community_introduce"]); ?></textarea><?php endif; ?>
          </div>
        </div>
        </form>
    </div>
    <div class="layui-tab-item">
    	<?php if($role == 1): ?><button class="layui-btn layui-btn-small" id="add_staff">添加员工</button><?php endif; ?>
       <table class="layui-table" lay-data="{height:400, url:'/shejuyi/index.php/Home/Community/mystaff',even:true,page:true, id:'mystaff',size:'lg'}" lay-filter="mystaff">
    <thead>
      <tr>
        <th lay-data="{field:'id', width:'15%', sort: true,align:'center'}">ID</th>
        <th lay-data="{field:'sjy_community_user_image',align:'center',templet: '#touxiang',width:'20%',style:'height:50px'}">头像</th>
        <th lay-data="{field:'sjy_community_user_real_name', width:'20%',align:'center'}">姓名</th>
        <th lay-data="{field:'sjy_community_login_id', width:'20%', sort: true,align:'center'}">手机号</th>
        <th lay-data="{field:'sjy_community_user_email',align:'center',width:'15%'}">邮箱</th>
        <th lay-data="{field:'',align:'center',toolbar: '#mystaffop',width:'10%'}">操作</th>
      </tr>
    </thead>
  </table>
 <script type="text/html" id="touxiang">
   
    <img src="/shejuyi{{d.sjy_community_user_image}}" style="width:40px;height:40px;border-radius:50%" /> 
   
 </script>
 <script type='text/html' id='mystaffop'>
   <a class="layui-btn layui-btn-danger layui-btn-xs del_staff" flag='{{d.sjy_id}}' lay-event="del">删除</a>
  </script>

    </div>
    <div class="layui-tab-item">
    	<div class="img-box full">
			<section class=" img-section">
				<p class="up-p">机构风采：<span class="up-span">最多可以上传5张图片，马上上传</span></p>
				<div class="z_photo upimg-div clear" >
					         <?php if(is_array($community_images)): foreach($community_images as $key=>$val): ?><section class="up-section fl">
		               		<span class="up-span"></span>
		               		<img src="/shejuyi/Public/Home/img/a7.png" class="close-upimg">
		               		<img src="/shejuyi/Public/Home/img/buyerCenter/3c.png" class="type-upimg" alt="添加标签">
		               		<img src="/shejuyi<?php echo ($val["sjy_community_images"]); ?>" id="<?php echo ($val["sjy_id"]); ?>" class="up-img">
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
		
	
    <script src="/shejuyi/Public/Home/js/imgPluginNew3.js"></script>
    </div>
  </div>
</div>
 
<script>
         layui.use('table', function(){
    var table = layui.table;
  })
 </script>
<script>
//注意：选项卡 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
 
  var layid = top.location.hash.replace(/^#info=/, '');
    element.tabChange('mycommunity',layid ); 
  element.on('tab(mycommunity)', function(elem){
    
    top.location.hash = 'info='+ $(this).attr('lay-id');
   });
   
});
</script>
      <script type="text/javascript">
      //图片上传
       $(function(){
                $("#file").takungaeImgup({
                    formData: { "path": "Content/Images/", "name": "uploadpic" }, //path参数会发送给服务器，name参数代表上传图片成功后，自动生成input元素的name属性值
                    url: "/shejuyi/index.php/Home/Community/uploadcommunityimgs",    //发送请求的地址，服务器地址
                    success: function (data) {
 
                    },
                    error: function (err) {
                        layer.msg(err);
                    }
                });
            })
        //提交确认
      		function submit()
      		{
      			//固定电话
      			var phone = $("input[name='phone']").val();
      			//简介
      			var introduce = $("textarea").val();
      		
      			//执行ajax 发送信息
      			$.ajax({
      				url:"/shejuyi/index.php/Home/Community/updateCommunityInfo",
      				data:{phone:phone,introduce:introduce},
      				dataType:"json",
      				type:"post",
      				success:function(){

      				}
      			})
      		}

          //删除员工
          $('body').on('click','.del_staff',function(){
          //$(".del_staff").click(function(){
            var user_id = $(this).attr("flag");
            var flag = 0;
            var obj = $(this);
           layer.confirm('确定删除么?', {icon: 3, title:'删除提示'}, function(index){
            //执行ajax删除
            $.ajax({
              url:"/shejuyi/index.php/Home/Community/delStaff",
              type:"post",
              dataType:"json",
              data:{user_id:user_id},
              success:function(data){
                  if(data == 1)
                  {
                    flag = 1;
                  }
              },
              async:false
            })
            if(flag == 1)
            {
                //删除节点
                obj.parent().parent().parent().remove()
                layer.msg("删除成功");
            }else{
              layer.msg("删除失败");
            }
           layer.close(index);
            });

          })

          //增加员工
             $("#add_staff").click(function(){
               layer.open({
                 type:2,
                 title:"增加员工",
                 content:"/shejuyi/index.php/Home/Community/addStaff",
                 area:["30%","40%"],
                 btn:['确定'],
                 btnAlign:'c',
                 yes:function(index,layero)
                {
                   var iframeWin = window[layero.find('iframe')[0]['name']]
                     var val = iframeWin.ok();
                   if(val)
                   {
                      layer.close(index);
                      self.location.reload();                    
                   }
                    
                }
                
             })
           })
      </script>
<body>
</html>