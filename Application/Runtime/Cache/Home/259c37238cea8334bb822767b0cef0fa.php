<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyLife</title>
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/Home/css/common.css">
    <link rel="stylesheet" href="/Public/Home/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
    <script src="/Public/Home/js/jquery-1.12.4.js"></script>
    <script src="/Public/Home/js/bootstrap.js"></script>
    <script src = "/Public/Home/js/autoResizeImage.js"></script>


    <link rel="stylesheet" href="/Public/Home/css/region.css">
    <link rel="stylesheet" href="/Public/Home/css/deliver.css">
    <link rel="stylesheet" href="/Public/Home/css/layui.css">
    <link rel="stylesheet" href="/Public/Home/css/modules/laydate/default/laydate.css">
    <link rel="stylesheet" href="/Public/Home/css/modules/layer/default/layer.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/webuploader.css">

    <link rel="stylesheet" type="text/css" href="/Public/Home/css/demo.css">



    <script src = "/Public/Home/js/laydate.js"></script>
    <script src = "/Public/Home/js/layer.js"></script>

    <script type="text/javascript" src="/Public/Home/js/webuploader.js"></script>

</head>
<body>
<div class = "headLogin">

    <div class = "left changeBan">
        <h2>个人信息管理</h2>
    </div>
    <div class="right person">
        <div class="dropdown pull-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><img src="../imgs/personDl.jpg" alt=""></a>
            <ul class="dropdown-menu">
               <li>
                   <a href="#">账号设置</a>
               </li>
                <li>
                    <a href="#">我的机构</a>
                </li>
                <li>
                    <a href="#">发布项目</a>
                </li>
            </ul>

        </div>
    </div>

</div>
<div class="container" style = "margin-bottom: 40px;">
    <div style = "height: 80px;">
        <h3 class = "deliver-tit">发布项目</h3>
    </div>

    <div class = "col-md-12" style = "background: #FFFFFF;padding: 30px;" >
        <form role="form" class = "deliver-form">
            <div class="form-group">
                <label for="name">项目名称</label>
                <input type="text" name = "project_name" class="form-control" id="name" placeholder="请输入名称">
            </div>

            <div class="form-group">
                <label for="name">服务对象</label>
                <select class ="serverArea" name="server_area" id="">
                <?php if(is_array($service_object)): foreach($service_object as $key=>$val): ?><option value="<?php echo ($val["sjy_id"]); ?>"><?php echo ($val["service_object_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">项目周期</label>
                <input name = "start_time" type="text" id="test1" style = "width: 192px;">
            </div>
            <div class="form-group">
                <label for="name">项目预算</label>
                <input name = "plan_money" type="text" id="" value = ""  onKeyUp="value=value.replace(/[^\d]/g,'')" > <span>万元</span>
            </div>
            <div class="form-group">
                <label for="name">项目书征集周期</label>
                <input name = "collect_start_time" type="text" id="test2" value = "" style = "width: 192px;">
            </div>
            <div class="form-group">
                <label for="name">项目介绍</label>
                <textarea id = "formTextarea" name = "demand_describe" class="form-control ccccc" rows="3" ></textarea>
            </div>

            <div class = "clearfix" style = "height: 200px; position: relative;">
                <label for="name">上传图片</label>
                <div class="page-container">
                    <div id="uploader" class="wu-example">
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div id="filePicker"></div>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none">
                            <div class="progress">
                                <span class="text">0%</span>
                                <span class="percentage"></span>
                            </div>
                            <div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "clearfix" style = "width: 100%;text-align: center;padding-top:200px;">
                <a href = "javascript:;" id = "deliverBtn" type="submit" class="btn btn-default deliver-btn">提交</a>
            </div>


        </form>
    </div>
   
</div>
<div class="row clearfix footerBox">
    <div class="container">
        <div class="copyright fl">
            <p class = "left">北京社居易有限公司 版权所有</p>
            <p class = "right">
                Copyright © EasyLife.com All rights reserved.2017-2020  京ICP证1166666号 京公网安备133333333444
            </p>
        </div>
    </div>
</div>
</body>
<script src="/Public/Home/js/extend-webuploader.js" type="text/javascript"></script>
<script>

    //执行一个laydate实例
    laydate.render({
        elem: '#test1'
        ,range: '~' //或 range: '~' 来自定义分割字符
    });
    laydate.render({
        elem: '#test2'
        ,range: '~' //或 range: '~' 来自定义分割字符
    });


    window.webuploader = {
        config:{
            thumbWidth: 200, //缩略图宽度，可省略，默认为110
            thumbHeight: 130, //缩略图高度，可省略，默认为110
            wrapId: 'uploader' //必填
        },
       //处理客户端新文件上传时，需要调用后台处理的地址, 必填
        uploadUrl: './fileupload.php',
        //处理客户端原有文件更新时的后台处理地址，必填
        updateUrl: './fileupdate.php',
        //当客户端原有文件删除时的后台处理地址，必填
        removeUrl: './filedel.php',
        /* //初始化客户端上传文件，从后台获取文件的地址, 可选，当此参数为空时，默认已上传的文件为空
        initUrl: './fileinit.php'*/
    };


    /*获取提交的内容*/

    $("#deliverBtn").click(function () {

        var project_name = $("input[name='project_name']").val();
        var server_area = $(".serverArea").val();
        var start_time = $("input[name='start_time']").val();
        var plan_money = $("input[name='plan_money']").val();

        var collect_start_time = $("input[name='collect_start_time']").val();
        var demand_describe = $("#formTextarea").val();

        var community_project_images = [];



        for( var i = 0; i < $(".filelist li").length; i++){

         /*  console.log($(".filelist li img").attr("src"));*/

           var imgSrc = $(".filelist li img").attr("src");

            community_project_images.push(imgSrc);

        }





        console.log(project_name);
        console.log(server_area);
        console.log(start_time);
        console.log(plan_money);
        console.log(collect_start_time);
        console.log(demand_describe);
        console.log(community_project_images);




        if( project_name == ""){
            layer.msg('请填写项目名');
            return false;
        }
        if( server_area == ""){
            layer.msg('请填写服务对象');
            return false;
        }

        if( start_time == ""){
            layer.msg('请填写项周期');
            return false;
        }


        if( collect_start_time == ""){
            layer.msg('项目书征集周期');
            return false;
        }
        if( demand_describe == ""){
            layer.msg('项目介绍');
            return false;
        }



        // if( business_licence_img.indexOf('data:image/jpeg;base64,') == -1){
        //     layer.msg('请上传营业执照');
        //     return false;
        // }
        // if( logo_img.indexOf('data:image/jpeg;base64,') == -1){
        //     layer.msg('请上传组织logo');
        //     return false;
        // }



        $.ajax({
            url: "/index.php/Home/Community/doSendProject",
            type: "POST",
            data: {
                project_name : project_name,
                server_area : server_area,
                demand_describe : demand_describe,
                collect_start_time : collect_start_time,
                plan_money:plan_money,
                start_time : start_time,
                community_project_images : community_project_images
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.state == 1)
                {
                    window.location.href = "/index.php/Home/Community/"
                }
            },
            async:false
        });
        return false;





    })






</script>

</html>