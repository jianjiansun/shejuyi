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
   <!--  <link rel="stylesheet" type="text/css" href="/Public/Home/css/webuploader.css"> -->

    <link rel="stylesheet" type="text/css" href="/Public/Home/css/demo.css">


   
    <script src="/Public/Home/js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/hammer.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>
    <script src = "/Public/Home/js/laydate.js"></script>
    <script src = "/Public/Home/js/layer.js"></script>
    <script src="/Public/Home/js/layui.js"></script>
    <script src="/Public/Home/js/layui.all.js"></script>
    <style type="text/css">
* {
        margin: 0;
        padding: 0;
    }
    
    #upBox {
        width: 100%;
        padding: 20px;
        border: 1px solid #666;
        margin: auto;
        margin-top: 5px;
        margin-bottom: 5px;
        position: relative;
        border-radius: 10px;
    }
    
    #inputBox {
        width: 50%;
        height: 40px;
        border: 1px solid cornflowerblue;
        color: cornflowerblue;
        border-radius: 20px;
        position: relative;
        text-align: center;
        line-height: 40px;
        overflow: hidden;
        font-size: 16px;
    }
    
    #inputBox input {
        width: 114%;
        height: 40px;
        opacity: 0;
        cursor: pointer;
        position: absolute;
        top: 0;
        left: -14%;
    }
    
    #imgBox {
        text-align: left;
    }
    
    .imgContainer {
        display: inline-block;
        width: 15%;
        height: 160px;
        margin-left: 1%;
        border: 1px solid #666666;
        position: relative;
        margin-top: 30px;
        box-sizing: border-box;
    }
    
    .imgContainer img {
        width: 100%;
        height: 150px;
        cursor: pointer;
    }
    
    .imgContainer p {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 30px;
        background: black;
        text-align: center;
        line-height: 30px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        display: none;
    }
    
    .imgContainer:hover p {
        display: block;
    }
    /* #btn {
        /* display: inline-block; */
    /* text-align: center; */
    /* margin: auto; */
    /* line-height: 30px;
        outline: none;
        width: 100px;
        height: 30px;
        background: cornflowerblue;
        border: 1px solid cornflowerblue;
        color: white;
        cursor: pointer;
        margin-top: 30px;
        border-radius: 5px; */
}
*/
</style>
    

</head>
<body>
<div class = "headLogin">

    <div class = "left changeBan">
        <h2>发布项目</h2>
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
        <form role="form" class = "deliver-form" id="upBox">
            <div class="form-group">
                <label for="name">项目名称</label>
                <input type="text" name = "project_name" class="form-control" id="name" placeholder="请输入项目名称">
            </div>

            <div class="form-group">
                <label for="name">服务对象</label>
                <select class ="serverArea" name="server_area" lay-verify="" id="">
                <?php if(is_array($service_object)): foreach($service_object as $key=>$val): ?><option value="<?php echo ($val["sjy_id"]); ?>"><?php echo ($val["service_object_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">项目周期</label>
                <input name = "start_time" type="text" placeholder="请选择项目周期" id="test1" style = "width: 192px;">
            </div>
             <div class="form-group">
                <label for="name">项目预算</label>
                <input name = "plan_money" placeholder="请输入项目预算" type="text" id="" value = ""  onKeyUp="value=value.replace(/[^\d]/g,'')" > <span>万元</span>
            </div>
            <div class="form-group">
                <label for="name">项目介绍</label>
                <textarea id = "formTextarea" placeholder="请输入项目介绍" name = "demand_describe" class="form-control ccccc" rows="3" ></textarea>
            </div>
            <div class="form-group">
                <label for="name">项目主图</label>
                        <div class="ycupload-mainbox">
                                    <div class="ycupload-line"></div>
                                    <div style="height:30px;"></div>
                                    <div  style="min-height:1px;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right:0;padding-left:36px;">
                                                    <!--<a href="javascript:void(0);" class="cover-uploadBtn">
                                                        <img src="img/yc_uploadimg_06.png"/>
                                                        <div id="clipArea"></div>
                                                        <input type="file" id="file">
                                                        <button id="clipBtn">截取</button>
                                                    </a>
                                                    <div id="view"></div>-->
                                                    <div style="min-height:1px;line-height:160px;text-align:center;position:relative;" ontouchstart="">
                                                        <div class="cover-wrap" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background: rgba(0, 0, 0, 0.4);z-index: 10000000;text-align:center;">    
                                                            <div class="" style="width:900px;height:600px;margin:100px auto;background-color:#FFFFFF;overflow: hidden;border-radius:4px;">
                                                                <div id="clipArea" style="margin:10px;height: 520px;"></div>
                                                                <div class="" style="height:56px;line-height:36px;text-align: center;padding-top:8px;">
                                                                    <button onclick="return false" id="clipBtn" style="width:120px;height: 36px;border-radius: 4px;background-color:#ff8a00;color: #FFFFFF;font-size: 14px;text-align: center;line-height: 36px;outline: none;">确定</button>
                                                                    <button onClick="javascript:$('.cover-wrap').fadeOut();" style="width:120px;height: 36px;border-radius: 4px;background-color:#ff8a00;color: #FFFFFF;font-size: 14px;text-align: center;line-height: 36px;outline: none;">关闭</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view" style="width:214px;height:160.5px;" title="请上传 428*321 的项目主图"></div>
                                                        <div style="height:10px;"></div>
                                                        <div class="" style="width:140px;height:32px;border-radius: 4px;background-color:#ff8a00;color: #FFFFFF;font-size: 14px;text-align:center;line-height:32px;outline:none;margin-left:37px;position:relative;">
                                                            点击上传主图
                                                            <input type="file" id="file" style="cursor:pointer;opacity:0;filter:alpha(opacity=0);width:100%;height:100%;position:absolute;top:0;left:0;">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div style="height:25px;"></div>
                        </div>
            </div>
            <div class="form-group">
                <label for="name">项目相册</label>
                 <div style="width: 100%;position: relative;">

                    <div id="inputBox"><input type="file" title="请选择图片" id="file1" multiple accept="image/png,image/jpg,image/gif,image/JPEG" />点击选择图片</div>
                    <div id="imgBox"></div>
                </div>
            </div>
          <!--   <div class = "clearfix" style = "height: 200px; position: relative;">
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
            </div> -->
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
<script src="/Public/Home/js/uploadImg20180401sjj.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        imgUpload({
            inputId: 'file1', //input框id
            imgBox: 'imgBox', //图片容器id
            buttonId: 'deliverBtn', //提交按钮id
            upUrl: '/index.php/Home/Origanization/doSendProject', //提交地址
            data: 'project_images', //参数名
            num: "5" //上传个数
        })
    </script>
 <script type="text/javascript">
        
        //上传封面
        //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
        var clipArea = new bjj.PhotoClip("#clipArea", {
            size: [428, 321],// 截取框的宽和高组成的数组。默认值为[260,260]
            outputSize: [428, 321], // 输出图像的宽和高组成的数组。默认值为[0,0]，表示输出图像原始大小
            //outputType: "jpg", // 指定输出图片的类型，可选 "jpg" 和 "png" 两种种类型，默认为 "jpg"
            file: "#file", // 上传图片的<input type="file">控件的选择器或者DOM对象
            view: "#view", // 显示截取后图像的容器的选择器或者DOM对象
            ok: "#clipBtn", // 确认截图按钮的选择器或者DOM对象
            loadStart: function() {
                // 开始加载的回调函数。this指向 fileReader 对象，并将正在加载的 file 对象作为参数传入
                $('.cover-wrap').fadeIn();
                console.log("照片读取中");
            },
            loadComplete: function() {
                 // 加载完成的回调函数。this指向图片对象，并将图片地址作为参数传入
                console.log("照片读取完成");
            },
            //loadError: function(event) {}, // 加载失败的回调函数。this指向 fileReader 对象，并将错误事件的 event 对象作为参数传入
            clipFinish: function(dataURL) {
                 // 裁剪完成的回调函数。this指向图片对象，会将裁剪出的图像数据DataURL作为参数传入
                $('.cover-wrap').fadeOut();
                $('#view').css('background-size','100% 100%');
                console.log(dataURL);
                $("form").append("<input type='hidden' name='main_image' value='"+dataURL+"' />");
            }
        });
        //clipArea.destroy();
        </script>
<script>

    //执行一个laydate实例
    laydate.render({
        elem: '#test1'
        ,range: '~' //或 range: '~' 来自定义分割字符
        ,min: '<?php echo ($nowtimw); ?>'
    });
    laydate.render({
        elem: '#test2'
        ,range: '~' //或 range: '~' 来自定义分割字符
        ,min: '<?php echo ($nowtimw); ?>'
    });


    // window.webuploader = {
    //     config:{
    //         thumbWidth: 200, //缩略图宽度，可省略，默认为110
    //         thumbHeight: 130, //缩略图高度，可省略，默认为110
    //         wrapId: 'uploader' //必填
    //     },
    //    //处理客户端新文件上传时，需要调用后台处理的地址, 必填
    //     uploadUrl: './fileupload.php',
    //     //处理客户端原有文件更新时的后台处理地址，必填
    //     updateUrl: './fileupdate.php',
    //     //当客户端原有文件删除时的后台处理地址，必填
    //     removeUrl: './filedel.php',
    //     /* //初始化客户端上传文件，从后台获取文件的地址, 可选，当此参数为空时，默认已上传的文件为空
    //     initUrl: './fileinit.php'*/
    // };


    /*获取提交的内容*/

    // $("#deliverBtn").click(function () {

    //     var project_name = $("input[name='project_name']").val();
    //     var server_area = $(".serverArea").val();
    //     var start_time = $("input[name='start_time']").val();
    //     var plan_money = $("input[name='plan_money']").val();

    //     var collect_start_time = $("input[name='collect_start_time']").val();
    //     var demand_describe = $("#formTextarea").val();

    //     var community_project_images = [];



    //     for( var i = 0; i < $(".filelist li").length; i++){

    //      /*  console.log($(".filelist li img").attr("src"));*/

    //        var imgSrc = $(".filelist li img").attr("src");

    //         community_project_images.push(imgSrc);

    //     }





    //     console.log(project_name);
    //     console.log(server_area);
    //     console.log(start_time);
    //     console.log(plan_money);
    //     console.log(collect_start_time);
    //     console.log(demand_describe);
    //     console.log(community_project_images);




    //     if( project_name == ""){
    //         layer.msg('请填写项目名');
    //         return false;
    //     }
    //     if( server_area == ""){
    //         layer.msg('请填写服务对象');
    //         return false;
    //     }

    //     if( start_time == ""){
    //         layer.msg('请填写项周期');
    //         return false;
    //     }


    //     if( collect_start_time == ""){
    //         layer.msg('项目书征集周期');
    //         return false;
    //     }
    //     if( demand_describe == ""){
    //         layer.msg('项目介绍');
    //         return false;
    //     }



    //     // if( business_licence_img.indexOf('data:image/jpeg;base64,') == -1){
    //     //     layer.msg('请上传营业执照');
    //     //     return false;
    //     // }
    //     // if( logo_img.indexOf('data:image/jpeg;base64,') == -1){
    //     //     layer.msg('请上传组织logo');
    //     //     return false;
    //     // }



    //     $.ajax({
    //         url: "/index.php/Home/Origanization/doSendProject",
    //         type: "POST",
    //         data: {
    //             project_name : project_name,
    //             server_area : server_area,
    //             demand_describe : demand_describe,
    //             collect_start_time : collect_start_time,
    //             plan_money:plan_money,
    //             start_time : start_time,
    //             community_project_images : community_project_images
    //         },
    //         dataType: "json",
    //         success: function (data) {
    //             console.log(data);



    //             if(data.state == 1)
    //             {
    //                 layer.msg("f发布不成功");
    //                 window.location.href = "/index.php/Home/Origanization/"
    //             }else{
    //                 layer.msg(data.errorInfo );
    //             }
    //         },

    //         async:false
    //     });
    //     return false;





    // })






</script>

</html>