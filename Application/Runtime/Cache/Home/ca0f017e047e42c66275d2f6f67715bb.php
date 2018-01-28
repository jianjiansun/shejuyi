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
<ul class="layui-timeline">
         <?php if(is_array($projectrate)): foreach($projectrate as $key=>$val): ?><li class="layui-timeline-item">
              <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
         <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title"><?php echo ($val["create_time"]); ?></h3>
         <p>
        <?php echo ($val["sjy_projectrate_title"]); ?>
        <br /><a href = '/shejuyi/index.php/Home/Origanization/projectinfo/rateid/<?php echo ($val["sjy_id"]); ?>/project_id_flag/<?php echo ($project_id_flag); ?>#rate<?php echo ($val["sjy_id"]); ?>' class = 'detail' target="_blank">进度详情</a> 
      </p>
    </div>
  </li><?php endforeach; endif; ?>
</ul>
  </body>
</html>