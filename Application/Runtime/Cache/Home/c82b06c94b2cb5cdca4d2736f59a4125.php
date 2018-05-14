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
<script src="/Public/Home/js/laydate.js"></script>
<script src="/Public/Home/js/layer.js"></script>
<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>
<script src="/Public/Home/js/uploadImg20180401sjjsendproject.js" type="text/javascript" charset="utf-8"></script>
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
    <div class="headLogin">

        <div class="left changeBan">
            <h2>发布项目</h2>
        </div>
        <!-- <div class="right person">
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
    </div> -->

    </div>
    <div class="container" style="margin-bottom: 40px;">
        <div style="height: 80px;">
            <h3 class="deliver-tit">发布项目</h3>
        </div>

        <div class="col-md-12" style="background: #FFFFFF;padding: 30px;">

            <form role="form" class="deliver-form" id="upBox">
                <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" >
                      <ul class="layui-tab-title">
                        <li class="layui-this">申请项目</li>
                        <li>当前项目</li>
                        <li>历史项目</li>
                      </ul>
                      <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                             <div class="form-group">
                    <label for="name">项目名称</label>
                    <input type="text" name="project_name" class="form-control" id="name" placeholder="请输入项目名称">
                </div>

                <div class="form-group">
                    <label for="name">服务领域</label>
                    <select class="serverArea" name="server_area" lay-verify="" id="">
                <?php if(is_array($service_object)): foreach($service_object as $key=>$val): ?><option value="<?php echo ($val["sjy_id"]); ?>"><?php echo ($val["service_object_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="start_time">项目周期</label>
                    <select name="start_time" lay-verify="">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                    </select> 
                    <!-- <input name="start_time" type="text" placeholder="请选择项目周期" id="test1" style="width: 192px;"> -->
                    <select name="city" lay-verify="">
                          <option value="1">个月</option>
                          <option value="2">年</option>
                    </select>     
                </div>
                 <div class="form-group">
                    <label for="name">机构简介</label>
                    <textarea id="formTextarea" disabled="true" name="origanization_desc" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">项目预算</label>
                    <input name="plan_money" placeholder="请输入项目预算(整数)" type="text" id="" value="" onKeyUp="value=value.replace(/[^\d]/g,'')"> <span>万元</span>
                </div>
                <div class="form-group">
                    <label for="name">项目说明</label>
                    <textarea id="formTextarea" placeholder="请输入项目说明" name="demand_describe" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">项目背景</label>
                    <textarea id="formTextarea" placeholder="请输入项目背景" name="project_background" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">目的意义及目标</label>
                    <textarea id="formTextarea" placeholder="请输入项目目的意义及目标" name="project_goal" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">已有基础及经验</label>
                    <textarea id="formTextarea" placeholder="请输入项目已有基础及经验" name="project_experience" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">目的意义及目标</label>
                    <textarea id="formTextarea" placeholder="请输入项目目的意义及目标" name="project_goal" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">具体方法及途径</label>
                    <textarea id="formTextarea" placeholder="请输入项目具体方法及途径" name="project_way" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">实施进度安排</label>
                    <textarea id="formTextarea" placeholder="请输入项目实施进度安排" name="project_rate_plan" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">预期效果</label>
                    <textarea id="formTextarea" placeholder="请输入项目预期效果" name="project_desired_result" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">涵盖范围及规模</label>
                    <textarea id="formTextarea" placeholder="请输入项目涵盖的范围及规模" name="project_range" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">创新之处</label>
                    <textarea id="formTextarea" placeholder="请输入项目创新之处" name="project_innovate" class="form-control ccccc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">项目主图</label>
                    <div class="ycupload-mainbox">
                        <div class="ycupload-line"></div>
                        <div style="height:30px;"></div>
                        <div style="min-height:1px;">
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
                                                <div class="" style="width:700px;height:400px;margin:100px auto;background-color:#FFFFFF;overflow: hidden;border-radius:4px;">
                                                    <div id="clipArea" style="margin:10px;height: 320px;"></div>
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
                <div class="clearfix" style="width: 100%;text-align: center;padding-top:200px;">
                    <a href="javascript:;" id="deliverBtn" type="submit" class="btn btn-default deliver-btn">提交</a>
                </div>
                <script type="text/javascript">
                    imgUpload({
                        inputId: 'file1', //input框id
                        imgBox: 'imgBox', //图片容器id
                        buttonId: 'deliverBtn', //提交按钮id
                        upUrl: '/index.php/home/origanization/doSendProject', //提交地址
                        data: 'project_images', //参数名
                        num: "5" //上传个数
                    })
                </script>
<script type="text/javascript">
    //上传封面
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [428, 321], // 截取框的宽和高组成的数组。默认值为[260,260]
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
            $('#view').css('background-size', '100% 100%');
            console.log(dataURL);
            $("form").append("<input type='hidden' name='main_image' value='" + dataURL + "' />");
        }
    });
    //clipArea.destroy();
</script>
<script>

    //执行一个laydate实例
    // laydate.render({
    //     elem: '#test1',
    //     range: '~' //或 range: '~' 来自定义分割字符
    //         ,
    //     min: '<?php echo ($nowtimw); ?>'
    // });
    // laydate.render({
    //     elem: '#test2',
    //     range: '~' //或 range: '~' 来自定义分割字符
    //         ,
    //     min: '<?php echo ($nowtimw); ?>'
    // });
</script>
        </div>
                        <div class="layui-tab-item">当前项目</div>
                        <div class="layui-tab-item">历史项目</div>
                      </div>
                </div>
 
                <script>
                //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
                layui.use('element', function(){
                  var element = layui.element;
                  
                  //…
                });
               
                </script>
               


            </form>
        </div>

    </div>
    <div class="row clearfix footerBox">
        <div class="container">
            <div class="copyright fl">
                <p class="left">北京社居易有限公司 版权所有</p>
                <p class="right">
                    Copyright © EasyLife.com All rights reserved.2017-2020 京ICP证1166666号 京公网安备133333333444
                </p>
            </div>
        </div>
    </div>
</body>



</html>