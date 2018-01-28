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
	
 <div class = "searchHouseCondition">
 <?php if(is_array($citys)): foreach($citys as $key=>$val): ?><input type = "radio" name = "city" value = "<?php echo ($val["sjy_origanization_city"]); ?>" /><?php echo ($val["city"]); endforeach; endif; ?>

    <script type="text/javascript">
        function choose_city()
        {
            var cityid = $("input:radio[name=city]:checked").val();
            var flag = 0;
            $.ajax({
                url:"setcity",
                type:"post",
                dataType:"json",
                data:{cityid:cityid},
                success:function(data)
                {
                    if(data)
                    {
                        flag = 1;
                    }else{
                        flag = 0;
                    }
                },
                async:false
            })
            if(flag)
            {
                return 1;
            }else{
                return 0;
            }
        }
    </script>
</div>