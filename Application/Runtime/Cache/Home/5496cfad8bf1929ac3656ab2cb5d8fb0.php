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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyLife</title>
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/bootstrap.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/common.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/region.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/testfy.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/chooseCity.css">
   
    <script src = "/shejuyi/Public/Home/js/bootstrap.js"></script>
    <script src = "/shejuyi/Public/Home/js/jquery.page.js"></script>
    <script src = "/shejuyi/Public/Home/js/upLoadImg.js"></script>

</head>
<body>



<div class = "container">
    <div class = "testifyBox">
        <h2 >个人认证</h2>
        <div class = "col-md-8">
            <ul class = "testUl">
                <li>
                    <p>姓名</p>
                    <input type="text" name = "real_name"/> <span class = 'remider'>
                </li>
                <li>
                    <p>身份证号</p>
                    <input type="text" name = "id_card"/>
                </li>


               <!--  <li>
                    <input type="radio"> <span>我有单位</span>
                    <input type="radio"> <span>我是自由职业者</span>
                </li> -->
               <!--  <li>
                    <p>社区编码</p>
                    <input type="text" name = "community_code">
                </li>

                <li style = "display:none" id = "community_name">
                    <p>社区名字</p>
                    <input type="text" name = "community_name" disabled="true">
                </li> -->

            </ul>

        </div>
        <div class = "col-md-4">

            <div id="preview" class = "testImg">
                <img id="imghead"  border=0 src='/shejuyi/Public/Home/imgs/uploadImg.png'>
            </div>

            <div class = "uploadBtn">
                <div class = "uploadImg">
                    上传社工证明
                </div>
                <input type="file" onchange="previewImage(this)">
            </div>


        </div>
        <div class = "clearfix"></div>
        <div class = "submitBox">
            <input type="submit" value = "提交">
        </div>

    </div>
</div>
</body>
<script src = "/shejuyi/Public/Home/js/cityBoxShow.js"></script>

<script type="text/javascript">

    //将用户填的社区代码换成社区名字
    $("input[name=community_code]").blur(function(){
        var community_code = $("input[name=community_code]").val();
        //获取社区名字
        $.ajax({
            url:"getCommunityName",
            type:"post",
            data:{community_code:community_code},
            dataType:"json",
            success:function(data){
                if(data.state == 0)
                {
                    $("#community_name").css("display","none");
                    $("input[name=community_name]").val("");
                    layer.msg("请查证社区代码,所填社区代码不存在");
                }
                else
                {
                    $("#community_name").css("display","block");
                    $("input[name=community_name]").val(data.community_name);
                }
            }
        })
    })
    //搜集个人信息
    $("input[type=submit]").click(function(){
        var real_name = $("input[name=real_name]").val();  //社区员工姓名
        var id_card = $("input[name=id_card]").val();      //社区员工身份证号
        // var community_code = $("input[name=community_code]").val();

        $.ajax({
            url:"docommunityPersonIdenty",
            data:{real_name:real_name,id_card:id_card},
            dataType:"json",
            type:"post",
            success:function(data){
                if(data.state == 1)
                {
                   layer.msg("用户认证成功", function(){
                       window.parent.parent.location.reload();
                    window.parent.close();
                    window.close();
                    }); 
                }else
                {
                    layer.msg("用户认证失败");
                }
            }
        })

    });
</script>












</script>
</html>