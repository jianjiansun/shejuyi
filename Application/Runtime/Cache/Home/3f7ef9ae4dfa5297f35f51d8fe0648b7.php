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

<link rel="stylesheet" type="text/css" href="/Public/Home/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/Home/css/region.css">
    <link rel="stylesheet" href="/Public/Home/css/layui.css">
    <link rel="stylesheet" href="/Public/Home/css/page2.css">
    <link rel="stylesheet" href="/Public/Home/css/right-tab.css">

    <link rel="stylesheet" href="/Public/Home/css/deliver.css">

    <link rel="stylesheet" type="text/css" href="/Public/Home/css/webuploader.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/demo.css">

   
    <script src = "/Public/Home/js/layui.js"></script>
    <script src = "/Public/Home/js/layui.all.js"></script>


    <script src="/Public/Home/js/plugins/cover_js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/hammer.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript" src="/Public/Home/js/webuploader.js"></script>


</head>
<body>

<div class = "headLogin">
    <div class = "container">
        <div class = "left changeBan logoPer">
            <img src="/Public/Home/imgs/logo.png" alt="">
            <span>社居易</span>
        </div>
        <div class="right person">
           <!-- <img src="/Public/Home/imgs/personDl.jpg" alt="">-->
        </div>
    </div>
</div>
<!--4.3 项目书 -->
<div class = "tab-right-bar" style = "display: block;">
    <div class = "right-tab">
        <a class = "close-tab-right" href="javascript:;">项目书</a>
        <!--   <a href="javascript:;">我的意向社区</a>-->
    </div>
    <div class = "right-tab-content">
        <p></p>
        <ul class = "choose-organize-box">
            <li class = "choose-organize-item">
                <div class = "organize-choose-tit">
                    <span>机构A</span>
                    <a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>
                </div>
                <div class = "organize-proposal" style = "display: block;">
                    <p class = "proposal-detail">
                        <span>项目书一</span>
                        <a class = "download-btn" href="javascript:;">下载</a>
                    </p>
                    <p class = "proposal-detail">
                        <span>项目书二</span>
                        <a class = "download-btn" href="javascript:;">下载</a>
                    </p>
                    <p class = "proposal-detail">
                        <span>项目书三</span>
                        <a class = "download-btn" href="javascript:;">下载</a>
                    </p>
                </div>
            </li>
        </ul>

    </div>

    <script>

        $(".tab-right-bar").height($(window).height() );
        $(".choose-organize-box").height($(window).height());


        $(".organize-proposal").click(function () {
            $(".organize-proposal").css("display", "block");
        });






    </script>

</div>

<!--查看进度-->

<div class = "add-progress">
    <div class = "right-tab">
        <a class = "close-tab-right" href="javascript:;">项目进度</a>
        <!--   <a href="javascript:;">我的意向社区</a>-->
    </div>

    <ul class="layui-timeline" style = "width: 256px;">
        <li class="layui-timeline-item">
            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
            <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">8月18日</h3>
                <p>
                    layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                    <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                    <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                </p>
            </div>
        </li>
        <li class="layui-timeline-item">
            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
            <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">8月16日</h3>
                <p>杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有：</p>
                <ul>
                    <li>《登高》</li>
                    <li>《茅屋为秋风所破歌》</li>
                </ul>
            </div>
        </li>
    </ul>

    <script>

        $(".add-progress").height($(window).height() );
        $(".choose-organize-box").height($(window).height());

        $(".organize-proposal").click(function () {
            $(".organize-proposal").css("display", "block");
        });




    </script>
</div>

<!-- 添加进度 -->
<div class= "progressShader">
    <div class = "addProgressBox">

        <span class = "closeProgressBtn iconfont">&#xe60e;</span>

        <h2>敬老服务</h2>
        <div class="form-group">
            <label>活动介绍</label>
            <input class="programDetailTit" type="text">
        </div>
        
        <div class="form-group">
            <label>项目介绍</label>
            <textarea id = "formTextarea" name = "demand_describe" class="form-control" rows="3" ></textarea>
        </div>

        <div class = "clearfix" style = "height: 200px; position: relative;">
            <label >上传图片</label>
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
        <div class = "clearfix" style = "width: 100%;text-align: center;padding-top:80px;">
            <a href = "javascript:;" id = "deliverBtn" type="submit" class="btn btn-default deliver-btn">提交</a>
        </div>


    </div>
</div>








<div class="container main-container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">

                <div class="col-md-2 column  perperson">
                    <h2>个人信息</h2>
                    <div>
                        <img id = "userImg" src="<?php echo ($user_image); ?>" alt="  ">
                        <!--用户图片更换-->
                        <div class = "cropImgBox"  ontouchstart="">
                            <div class="cover-wrap">
                                <div class="coverBox" >
                                    <div id="clipArea" ></div>
                                    <div class="clipBtn">
                                        <button id="clipBtn">确定</button>
                                    </div>
                                </div>
                            </div>
                            <div class="changePicBtn">
                                点击更换图片
                                <input type="file" id="file">
                            </div>
                        </div>
                    </div>

                    <ul class="person-ul">
                        <li>
                            <a href="/index.php/Home/Origanization/origanizationIdentify">认证状态</a>
                        </li>

                        <li>
                            <a href="/index.php/Home/Origanization/personInfo">账号设置</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Origanization/myOriganization">我的机构</a>
                        </li>
                        <li>
                            <a  class = "on" href="/index.php/Home/Project/origanizationProjectManger">我的项目</a>
                        </li>
                        <li>
                            <a href="">我的消息</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 column perperson-con" style = "background: #FFFFFF;">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"  lay-id="a">邀请我</li>
                            <li id = "biding" lay-id="b">投标中</li>
                            <li id = "starting" lay-id="c">待开始</li>
                            <li id = "going" lay-id="d">进行中</li>
                            <li id = "apllyFinishProject" lay-id="e">结项申请</li>
                            <li id = "alreadyFinish" lay-id="f">已完成</li>
                        </ul>
                        <div class="layui-tab-content">

                            <!--社会组织 —— 我的项目 —— 1 邀请我的-->
                            <div class="layui-tab-item layui-show">

                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="100">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">

                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>服务对象</th>
                                            <th>状态</th>
                                            <th>征集周期</th>
                                            <th>邀请时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>投递项目书 详情</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>投递项目书 详情</td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination0"></div>
                            </div>

                            <!--社会组织 —— 我的项目 —— 2 投标中-->
                            <div class="layui-tab-item">

                                <div class="basic-information">

                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">

                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>投标人</th>
                                            <th>服务对象</th>
                                            <th>征集周期</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody2">
                                        <tr>

                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>详情 项目书</td>

                                        </tr>
                                        <tr>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>详情 项目书</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination1"></div>
                            </div>

                            <!--社会组织 —— 我的项目 —— 3 待开始-->
                            <div class="layui-tab-item">

                                <div class="basic-information">
                                    <table class="layui-table" >
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>投标人</th>
                                            <th>项目周期</th>
                                            <th>社区同意时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody3">
                                        <tr>

                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>开始 详情 项目书</td>

                                        </tr>
                                        <tr>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>开始 详情 项目书</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination2"></div>
                            </div>

                            <!--社会组织 —— 我的项目 —— 4 进行中 -->
                            <div class="layui-tab-item">

                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>项目周期</th>
                                            <th>开始时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody4">
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 添加进度 详情 项目书</td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 添加进度 详情 项目书</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination3"></div>

                            </div>
                            <!--社会组织 —— 我的项目 —— 5 结项申请 -->
                            <div class="layui-tab-item">

                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>项目周期</th>
                                            <th>开始时间</th>
                                            <th>申请结项时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody5">
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 添加进度 详情 项目书</td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 添加进度 详情 项目书</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination5"></div>

                            </div>


                            <!--社会组织 —— 我的项目 —— 6 已完成-->
                            <div class="layui-tab-item">

                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布方</th>
                                            <th>投标人</th>
                                            <th>要求周期</th>
                                            <th>实际周期</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody6">
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 详情 项目书</td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看进度 详情 项目书</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination4"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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


<script>
    /*个人图片的切换*/
    //上传封面
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [100, 100],// 截取框的宽和高组成的数组。默认值为[260,260]
        outputSize: [80, 80], // 输出图像的宽和高组成的数组。默认值为[0,0]，表示输出图像原始大小
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

            $("#userImg").attr("src", dataURL);

            $.ajax({
                url: "/index.php/Home/Origanization/douploadtouxiang",
                type: "POST",
                data: {
                    img: dataURL
                },
                dataType: "json",
                success: function (data) {
                    if(data.state == 1)
                    {
                        layer.msg('修改成功');
                        console.log(data.url)
                    }
                },
                async:false
            });
            return false;

        }
    });
    //clipArea.destroy();

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


    /*2.投标中*/
    $("#biding").click(function(){

        $.post("/index.php/Home/Project/alreadySendProject", function (data) {
            var html2 = '';



            for(var i = 0; i < data.data.length; i++){
                html2 += '<tr>' +
                        '<td>'+ data.data[i].project_detail.sjy_community_project_title +'</td>' +
                        '<td>'+ data.data[i].project_detail.sjy_community_name +'</td>' +
                        '<td>'+ data.data[i].project_detail.sjy_community_project_send_prople_name+'</td>' +
                        '<td>'+ data.data[i].project_detail.sjy_community_project_service_area+'</td>' +
                        '<td>'+ data.data[i].project_detail.sjy_community_project_collect_start_time + ' ~<br>'+ data.data[i].project_detail.sjy_community_project_collect_end_time +'</td>' +
                        '<td>'+ data.data[i].status_desc+'</td>' +
                        '<td><a href="/index.php/Home/Project/displayCommunityProject/id/'+data.data[i].project_id+'">详情</a> <a class = "projectBook" id = "'+ data.data[i].project_id +'" href="javascript:;">项目书</a></td>' +
                        '</tr>';
            }

            $("#tbody2").html(html2);

            /*项目书点击下载*/

            $(".projectBook").click(function () {





                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right:'0px'
                });

                $(".tab-right-bar").height($(window).height() );
                $(".right-tab-content").height($(window).height() );

                $(".close-tab-right").click(function () {
                    $(".tab-right-bar").animate({
                        right:'-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id , function (data) {

                    var html = '';
                    html += '<div class = "organize-choose-tit">\n' +
                            '<span>机构A</span>\n' +
                            '<a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>\n' +
                            '</div>\n' ;

                    console.log(data);

                    for ( var i = 0; i < data.length; i ++){

                        html +='<li class = "choose-organize-item">\n' +
                                '<p class = "proposal-detail">\n' +
                                '<span>'+ data[i].sjy_project_book_name +'</span>\n <br>' +
                                '</p>\n' +
                                '<p class = "proposal-detail">\n' +
                                '<span>'+ data[i].sjy_project_book_send_time +'</span>\n' +
                                '<a class = "download-btn" id = "'+ data[i].sjy_id +'" href="'+ data[i].sjy_project_path +'">下载</a>\n' +
                                '</p>\n' +
                                '</li>\n' ;

                    }

                    $(".choose-organize-box").html(html);



                    $(".dowmload-btn").click(function(){

                        var book_id = $(this).attr("id");

                       $.get("/index.php/Home/Project/downloadProjectBook", {"id" : book_id},function(data){


                       });
                    });


                })

            })




        });

    });




    /*3.待开始*/
    $("#starting").click(function () {

        $.post("/index.php/Home/Project/waitStart", function (data) {
            var html3 = '';

            for(var i = 0; i < data.length; i++){
                html3 += '<tr>' +
                        '<td class="communityProjectName">'+ data[i].project_detail.sjy_community_project_title +'</td>' +
                        '<td>'+ data[i].project_detail.sjy_community_project_send_prople_name+'</td>' +
                        '<td>'+ data[i].community_agreen_project_start_people+'</td>' +
                        '<td>'+ data[i].project_detail.sjy_community_project_start_time + ' ~<br>'+ data[i].project_detail.sjy_community_project_end_time +'</td>' +
                        '<td>'+ data[i].community_agreen_project_start_time+'</td>' +
                        '<td><a class = "startProject" sjy_id = "'+ data[i].sjy_id +'" id = "'+ data[i].project_id +'" href="javascript:;">开始</a> <a href="/index.php/Home/Project/displayCommunityProject/id/'+data[i].project_id+'">详情</a><br><a class = "projectBook" id = "'+ data[i].project_id +'" href="javascript:;">项目书</a></td>' +
                        '</tr>';
            }

            $("#tbody3").html(html3);

            /*是否开始项目*/
            $(".startProject").click(function () {

                var project_id = $(this).attr("id");
                var sjy_id = $(this).attr("sjy_id");

                var orText = $(this).parent().siblings('.communityProjectName').text();


                layer.open({
                    content: '<p>你是否确定要开始执行</p><p class = "ortext">'+orText +'</p>'
                    ,btn: ['确定', '取消']
                    ,yes: function(){

                        //按钮【按钮一】的回调

                        $.post("/index.php/Home/Project/origanizationStartProject", {"project_id": project_id ,"id" : sjy_id}, function (data) {

                            if(data.state == 1){
                                /*跳转到进行中*/

                                layer.closeAll();


                            }else{
                                layer.msg(data.errorInfo);

                            }

                        });


                    }
                    ,cancel: function(){
                        //右上角关闭回调

                        //return false 开启该代码可禁止点击该按钮关闭
                    }
                });
            });


            /*项目书点击下载*/

            $(".projectBook").click(function () {


                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right:'0px'
                });

                $(".tab-right-bar").height($(window).height() );
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function () {
                    $(".tab-right-bar").animate({
                        right:'-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id , function (data) {

                    var html = '';
                    html += '<div class = "organize-choose-tit">\n' +
                        '<span>机构A</span>\n' +
                        '<a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>\n' +
                        '</div>\n' ;

                    console.log(data);

                    for ( var i = 0; i < data.length; i ++){

                        html +='<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span>'+ data[i].sjy_project_book_name +'</span>\n <br>' +
                            '<span>'+ data[i].sjy_project_book_send_time +'</span>\n' +
                            '<a class = "download-btn" id = "'+ data[i].sjy_id +'" href="'+ data[i].sjy_project_path +'">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n' ;

                    }

                    $(".choose-organize-box").html(html);



                    $(".dowmload-btn").click(function(){

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {"id" : book_id},function(data){


                        });
                    });


                })

            })
        });
    });




    /*4. 进行中*/
    $("#going").click(function () {

        $.post("/index.php/Home/Project/ingProject", function(data){

            var html4 = '';

            for(var i = 0; i < data.length; i++){

                html4 += '<tr>' +
                    '<td class = "project-title">'+ data[i].project_detail.sjy_community_project_title+'</td>' +
                    '<td>'+ data[i].project_detail.sjy_community_name +'</td>' +
                    '<td>'+ data[i].project_detail.sjy_community_project_start_time + ' ~<br>'+data[i].project_detail.sjy_community_project_end_time +'</td>' +
                    '<td>'+ data[i].project_start_time +'</td>';


                if(data[i].status >= 10 && data[i].status <= 98){
                    html4 += '<td><a class = "progressStep" id = "'+ data[i].project_id +'" href="javascript:;">查看进度</a> ' +
                        '<a href="/index.php/Home/Project/displayCommunityProject/id/'+data[i].project_id+'">详情</a> <br>' +
                        '<a class = "addProgress" id = "'+ data[i].project_id +'" href="javascript:;">添加进度</a>   ' +
                        '<a class = "projectBook" id = "'+ data[i].project_id +'" href="javascript:;">项目书</a><br>' +
                        '<a class = "finishProject" id = "'+ data[i].project_id +'"  data_id = "'+ data[i].sjy_id +'"  href="javascript:;">结项目</a></td>' +
                        '</tr>';

                }else{
                    html4 += '<td><a class = "progressStep" id = "'+ data[i].project_id +'" href="javascript:;">查看进度</a> ' +
                        '<a href="/index.php/Home/Project/displayCommunityProject/id/'+data[i].project_id+'">详情</a> <br>' +
                        '<a class = "projectBook" id = "'+ data[i].project_id +'" href="javascript:;">项目书</a>' +
                        '<a class = "finishProject" id = "'+ data[i].project_id +'"  data_id = "'+ data[i].sjy_id +'"  href="javascript:;">结项目</a></td>' +
                        '</tr>';

                }



            }
            $("#tbody4").html(html4);

            /*4.1 查看进度*/
            $(".progressStep").click(function () {

                $(".add-progress").animate({
                    right:'0px'
                });

                $(".progressStep").height($(window).height() );
                $(".progressStep").height($(window).height() -200);
                $(".sure-btn-box").height( 200);

                $(".close-tab-right").click(function () {
                    $(".add-progress").animate({
                        right:'-320px'
                    });
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate" , {"project_id" : project_id}, function (data) {

                    console.log(data);
                    var text4 = '';

                    for(var i = 0; i < data.length; i ++){
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">'+ data[i].sjy_project_rate_con +'</h3>\n' +
                            '<p>' +  data[i].create_time +'</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });





            });



            /*4.3 项目书*/
            $(".projectBook").click(function () {

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right:'0px'
                });

                $(".tab-right-bar").height($(window).height() );
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function () {
                    $(".tab-right-bar").animate({
                        right:'-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id , function (data) {

                    var html = '';
                    html += '<div class = "organize-choose-tit">\n' +
                        '<span>机构A</span>\n' +
                        '<a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>\n' +
                        '</div>\n' ;

                    console.log(data);

                    for ( var i = 0; i < data.length; i ++){

                        html +='<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span>'+ data[i].sjy_project_book_name +'</span>\n <br>' +
                            '<span>'+ data[i].sjy_project_book_send_time +'</span>\n' +
                            '<a class = "download-btn" id = "'+ data[i].sjy_id +'" href="'+ data[i].sjy_project_path +'">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n' ;

                    }

                    $(".choose-organize-box").html(html);





                    $(".dowmload-btn").click(function(){

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {"id" : book_id},function(data){


                        });
                    });


                })

            });





            /*4.4 添加进度*/
            $(".addProgress").click(function () {

                $(".progressShader").css("display", "block");

                $(".closeProgressBtn").click(function () {
                    $(".progressShader").css("display", "none");
                });
                var project_id = $(this).attr("id");

                $("#deliverBtn").click(function () {


                    var rate_title = $(".programDetailTit").val();
                    var rate_desc = $("#formTextarea").val();
                    var project_rate_images = [];






                    for(var i = 0; i < $(".filelist li").length; i++){

                        /*  console.log($(".filelist li img").attr("src"));*/

                        var imgSrc = $(".filelist li img").attr("src");

                        project_rate_images.push(imgSrc);

                    }

                    if( rate_title == ""){
                        layer.msg('请填写项目进度标题');
                        return false;
                    }


                    if( rate_desc == ""){
                        layer.msg('请填写项目进度描述');
                        return false;
                    }


                    console.log(project_id);
                    console.log(rate_title);
                    console.log(rate_desc);
                    console.log(project_rate_images);


                    $.post("/index.php/Home/Project/addProjectRate",{'project_id' : project_id , "rate_title": rate_title, "rate_desc": rate_desc ,"project_rate_images":project_rate_images },function (data) {

                        if(data.state == 1){

                            layer.msg('添加进度成功');
                            window.location.href = "/index.php/Home/Project/origanizationProjectManger"
                        }
                    })
                });
            });


            /*4.5 结束项目*/
            $(".finishProject").click(function () {

                var project_title = $(this).parent().siblings('.project-title').text();

                var project_id = $(this).attr("id");
                var sjy_id = $(this).attr("data_id");


                layer.open({
                    content: '<p>是否要结束项目</p><p class = "ortext">'+project_title +'</p>'
                    ,btn: ['确定', '取消']
                    ,yes: function(){

                        //按钮【按钮一】的回调

                        $.post("/index.php/Home/Project/endProjectApply", {"project_id": project_id , "id" : sjy_id }, function (data) {

                            if(data.state == 1){
                                /*跳转到进行中*/

                                layer.closeAll();


                            }else{

                                layer.msg(data.errorInfo);

                            }

                        });


                    }
                    ,cancel: function(){
                        //右上角关闭回调

                        //return false 开启该代码可禁止点击该按钮关闭
                    }
                });
            })


        });

    });


    /*5 .结项申请中 */
    $("#apllyFinishProject").click(function () {
        $.post("/index.php/Home/Project/ingcommunityagreenend", function(data){

            var html5 = '';

            for(var i = 0; i < data.length; i++){

                html5 += '<tr>' +
                    '<td class = "project-title">'+ data[i].project_detail.sjy_community_project_title+'</td>' +
                    '<td>'+ data[i].project_detail.sjy_community_name +'</td>' +
                    '<td>'+ data[i].project_detail.sjy_community_project_start_time + ' ~<br>'+data[i].project_detail.sjy_community_project_end_time +'</td>' +
                    '<td>'+ data[i].project_start_time +'</td>'+
                    '<td>'+ data[i].project_apply_end_time +'</td>'+
                    '<td><a class = "progressStep" id = "'+ data[i].project_id +'" href="javascript:;">查看进度</a> ' +
                        '<a href="/index.php/Home/Project/displayCommunityProject/id/'+data[i].project_id+'">详情</a> <br>' +
                        '<a class = "projectBook" id = "'+ data[i].project_id +'" href="javascript:;">项目书</a><br>' +
                        '</tr>';




            }
            $("#tbody5").html(html5);

            /*5.1 查看进度*/
            $(".progressStep").click(function () {

                $(".add-progress").animate({
                    right:'0px'
                });

                $(".progressStep").height($(window).height() );
                $(".progressStep").height($(window).height() -200);
                $(".sure-btn-box").height( 200);

                $(".close-tab-right").click(function () {
                    $(".add-progress").animate({
                        right:'-320px'
                    });
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate" , {"project_id" : project_id}, function (data) {

                    console.log(data);
                    var text4 = '';

                    for(var i = 0; i < data.length; i ++){
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">'+ data[i].sjy_project_rate_con +'</h3>\n' +
                            '<p>' +  data[i].create_time +'</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });





            });



            /*5.3 项目书*/
            $(".projectBook").click(function () {

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right:'0px'
                });

                $(".tab-right-bar").height($(window).height() );
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function () {
                    $(".tab-right-bar").animate({
                        right:'-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id , function (data) {

                    var html = '';
                    html += '<div class = "organize-choose-tit">\n' +
                        '<span>机构A</span>\n' +
                        '<a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>\n' +
                        '</div>\n' ;

                    console.log(data);

                    for ( var i = 0; i < data.length; i ++){

                        html +='<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span>'+ data[i].sjy_project_book_name +'</span>\n <br>' +
                            '<span>'+ data[i].sjy_project_book_send_time +'</span>\n' +
                            '<a class = "download-btn" id = "'+ data[i].sjy_id +'" href="'+ data[i].sjy_project_path +'">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n' ;

                    }

                    $(".choose-organize-box").html(html);





                    $(".dowmload-btn").click(function(){

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {"id" : book_id},function(data){


                        });
                    });


                })

            });

        });

    });



    /*6 . 已完成 */
    $("#alreadyFinish").click(function () {
        $.post("/index.php/Home/Project/completeProject", function(data){

            var html6 = '';

            for(var i = 0; i < data.length; i++){
                html6 += '<tr>' +
                    '<td class = "project-title">'+ data[i].project_info.sjy_community_project_title+'</td>' +
                    '<td>'+ data[i].project_info.sjy_community_name +'</td>' +
                    '<td>'+ data[i].project_info.sjy_community_project_send_prople_name +'</td>' +
                    '<td>'+ data[i].project_info.sjy_community_project_start_time + ' ~<br>'+data[i].project_info.sjy_community_project_end_time +'</td>' +
                    '<td>'+ data[i].project_start_time + ' ~<br>'+data[i].project_end_time +'</td>' +
                    '<td><a class = "progressStep" id = "'+ data[i].project_id +'" href="javascript:;">查看进度</a> ' +
                    '<a href="/index.php/Home/Project/displayCommunityProject/id/'+data[i].project_id+'">详情</a> <br>' +
                    '<a class = "projectBook" id = "'+ data[i].project_id +'" href="javascript:;">项目书</a><br>' +
                    '</tr>';
            }

            $("#tbody6").html(html6);

            /*6.1 查看进度*/
            $(".progressStep").click(function () {

                $(".add-progress").animate({
                    right:'0px'
                });

                $(".progressStep").height($(window).height() );
                $(".progressStep").height($(window).height() -200);
                $(".sure-btn-box").height( 200);

                $(".close-tab-right").click(function () {
                    $(".add-progress").animate({
                        right:'-320px'
                    });
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate" , {"project_id" : project_id}, function (data) {

                    console.log(data);
                    var text4 = '';

                    for(var i = 0; i < data.length; i ++){
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">'+ data[i].sjy_project_rate_con +'</h3>\n' +
                            '<p>' +  data[i].create_time +'</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });





            });



            /*6.3 项目书*/
            $(".projectBook").click(function () {

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right:'0px'
                });

                $(".tab-right-bar").height($(window).height() );
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function () {
                    $(".tab-right-bar").animate({
                        right:'-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id , function (data) {

                    var html = '';
                    html += '<div class = "organize-choose-tit">\n' +
                        '<span>机构A</span>\n' +
                        '<a class = "agree-organization" href="javascript:;">上传时间 <span></span></a>\n' +
                        '</div>\n' ;

                    console.log(data);

                    for ( var i = 0; i < data.length; i ++){

                        html +='<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span>'+ data[i].sjy_project_book_name +'</span>\n <br>' +
                            '<span>'+ data[i].sjy_project_book_send_time +'</span>\n' +
                            '<a class = "download-btn" id = "'+ data[i].sjy_id +'" href="'+ data[i].sjy_project_path +'">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n' ;

                    }

                    $(".choose-organize-box").html(html);





                    $(".dowmload-btn").click(function(){

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {"id" : book_id},function(data){


                        });
                    });


                })

            });

        });

    });







    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage
                ,layer = layui.layer;

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination0'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数
                console.log("page0");

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });


        //执行一个laypage实例
        laypage.render({
            elem: 'pagination1'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数
                console.log("page1");
                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination2'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });


        //执行一个laypage实例
        laypage.render({
            elem: 'pagination3'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });
        //执行一个laypage实例
        laypage.render({
            elem: 'pagination4'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination5'
            ,count: 1000
            ,layout: ['limit', 'prev', 'page', 'next']
        });
        //执行一个laypage实例
        laypage.render({
            elem: 'pagination6'
            ,count: 1000 //数据总数，从服务端得到
            ,curr: location.hash.replace('#!fenye=', '') //获取hash值为fenye的当前页
            ,hash: 'fenye' //自定义hash值
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

    });





</script>
<script src="/Public/Home/js/extend-webuploader.js" type="text/javascript"></script>

</html>