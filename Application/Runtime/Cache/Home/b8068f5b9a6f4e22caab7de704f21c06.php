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
	

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/shejuyi/Public/Home/webuploader/MyWebUpload.js"></script>
</head>
<body>
<br />
<span style='color:red;font-size:12px;margin-left:80px;'>*只能是pdf，doc，docx文件(不超过2M)</span>
<script>
    $(function () {
        $("#uploader").powerWebUpload({auto: false,fileNumLimit:1,fileSingleSizeLimit:2*1024*1024});
    })
    function GetFiles1() {
        var data = $("#uploader").GetFilesAddress();
        alert(data[0])
    }
</script>
<input type="hidden" name="community_id" value="<?php echo ($community_id); ?>">
<input type="hidden" name="project_id" value="<?php echo ($project_id); ?>">
<div id="uploader" style="margin-left:100px;margin-top:30px;"></div>
<!-- <input type="button" value="1111"  onclick="GetFiles1()"/> -->
<!-- <div id="uploader2" style="margin-left:10px"></div>
<input type="button" value="22222" onclick="GetFiles2()" /> -->
</body>
</html>