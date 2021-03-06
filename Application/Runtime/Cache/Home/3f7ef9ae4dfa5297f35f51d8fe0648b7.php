<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>社居易</title>
    <meta name='description' content='社居易，致力于社区工作简单化' />
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/Home/css/common.css">
    <link rel="stylesheet" href="/Public/Home/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
    <script src="/Public/Home/js/jquery-1.12.4.js"></script>
    <script src="/Public/Home/js/bootstrap.js"></script>
    <script src="/Public/Home/js/autoResizeImage.js"></script>

    <link rel="stylesheet" type="text/css" href="/Public/Home/css/iconfont/iconfont.css">
<link rel="stylesheet" href="/Public/Home/css/region.css">
<link rel="stylesheet" href="/Public/Home/css/layui.css">
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/right-tab.css">

<link rel="stylesheet" href="/Public/Home/css/deliver.css">

<link rel="stylesheet" type="text/css" href="/Public/Home/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/css/demo.css">
<link rel="shortcut icon" href="/Public/Home/img/easyLife.ico" />


<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>


<script src="/Public/Home/js/plugins/cover_js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/hammer.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/Public/Home/js/webuploader.js"></script>


</head>
<script>
    layui.use('element', function() {
        element = layui.element;

        //获取hash来切换选项卡，假设当前地址的hash为lay-id对应的值
        // var layid = location.hash.replace(/^#docDemoTabBrief=/, '');
        // element.tabChange('docDemoTabBrief', layid); //假设当前地址为：http://a.com#test1=222，那么选项卡会自动切换到“发送消息”这一项

        //监听Tab切换，以改变地址hash值
        element.on('tab(docDemoTabBrief)', function() {
            location.hash = 'docDemoTabBrief=' + this.getAttribute('lay-id');
        });
    });
</script>

<body>
    <!-- 4.1 邀请我 实现发送项目书-->
    <div class="layui-layer-shade" id="shade1" times="1" style="z-index:1014;display: none; background-color: rgb(0, 0, 0); opacity: 0.3;"></div>
    <div class="layui-layer layui-layer-dialog" id="layer3" type="dialog" times="3" showtime="0" contype="string" style="z-index: 1017;display: none; width: 400px; height: 300px; top: 165px; left: 751.5px;">
        <div class="layui-layer-title" style="cursor: move;">信息</div>
        <div id="layer4" class="layui-layer-content" style="height: 258px;">
            <p>选择发送的项目书</p><br>
            <button type="button" class="layui-btn deliverBox or-deliverBtn" style="width: 358px;" id="test1">
            <i class="layui-icon">&#xe67c;</i>发送项目书 <br>
            <button class = "isUpload" id="uploadPDF">上传</button>
            </button>
        </div>
        <span class="layui-layer-setwin">
        <a id = "closeDeliver" class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a>
    </span>
        <span class="layui-layer-resize"></span>
    </div>
    <div class="headLogin">

        <div class="left changeBan logoPer">
            <a href='<?php echo ($index); ?>'>
                <img src="/Public/Home/imgs/logo.png" alt="">
                <span>社居易</span>
            </a>
            <ul class="indexNavBox">
                <li><a href="<?php echo ($index); ?>">首页</a></li>
                <li><a href="/index.php/Home/Community/origanizationIndex">组织首页</a></li>
                <li><a href="/index.php/Home/Origanization/communityIndex">社区首页</a></li>
            </ul>
        </div>
        <div class="right person">
            <div class="dropdown pull-right">

                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <div class="user-img" style="display: inline-block">
                        <img src="<?php echo ($user_image); ?>" alt="">
                        <span class="iconfont VIP-icon" style="right: -20px;">&#xe65b;</span>
                    </div>
                    <span><?php echo ($showname); if($active >= 1): ?><span class="layui-badge-dot"></span><?php endif; ?>
                    </span>
                </a>
                <ul class="dropdown-menu personalMenu">
                    <li>
                        <a href="/index.php/Home/Project/origanizationIdentify">认证状态</a>
                    </li>
                    <?php if(($isidentify == 1)): ?><li>
                            <a href="/index.php/Home/Project/personInfo">账号设置</a>
                        </li><?php endif; ?>
                    <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                            <a href="/index.php/Home/Project/myOriganization">我的机构</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Project/origanizationProjectManger">我的项目<?php if($active >= 1): ?><span class="layui-badge-dot"></span><?php endif; ?></a>
                        </li><?php endif; ?>
                    <li>
                        <a class="" href="/index.php/Home/Home/displayOriganizationHome">机构主页</a>
                    </li>

                    <li>
                        <a href="/index.php/Home/Origanization/logout">注销</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!--4.3 项目书 -->
    <div class="tab-right-bar" style="display: block;">
        <div class="right-tab">
            <a class="close-tab-right" href="javascript:;">项目书</a>
            <!--   <a href="javascript:;">我的意向社区</a>-->
        </div>
        <div class="right-tab-content">
            <p></p>
            <ul class="choose-organize-box">
                <li class="choose-organize-item">
                    <!--<div class="organize-choose-tit">-->
                    <!--<span>机构A</span>-->
                    <!--<a class="agree-organization" href="javascript:;">上传时间 <span></span></a>-->
                    <!--</div>-->
                    <div class="organize-proposal" style="display: block;">
                        <!-- <p class="proposal-detail">
                            <span>项目书一</span>
                            <a class="download-btn" href="javascript:;">下载</a>
                        </p>
                        <p class="proposal-detail">
                            <span>项目书二</span>
                            <a class="download-btn" href="javascript:;">下载</a>
                        </p>
                        <p class="proposal-detail">
                            <span>项目书三</span>
                            <a class="download-btn" href="javascript:;">下载</a>
                        </p> -->
                    </div>
                </li>
            </ul>

        </div>

        <script>
            $(".tab-right-bar").height($(window).height());
            $(".choose-organize-box").height($(window).height());


            $(".organize-proposal").click(function() {
                $(".organize-proposal").css("display", "block");
            });
        </script>

    </div>

    <!--查看进度-->

    <div class="add-progress">
        <div class="right-tab">
            <a class="close-tab-right" href="javascript:;">项目进度</a>
            <!--   <a href="javascript:;">我的意向社区</a>-->
        </div>

        <ul class="layui-timeline" style="width: 256px;">
        </ul>

        <script>
            $(".add-progress").height($(window).height());
            $(".choose-organize-box").height($(window).height());

            $(".organize-proposal").click(function() {
                $(".organize-proposal").css("display", "block");
            });
        </script>
    </div>

    <!-- 添加进度 -->
    <div class="progressShader">
        <div class="addProgressBox">

            <span class="closeProgressBtn iconfont">&#xe60e;</span>

            <h2>敬老服务</h2>
            <div class="form-group">
                <label>活动介绍</label>
                <input class="programDetailTit" type="text">
            </div>

            <div class="form-group">
                <label>项目介绍</label>
                <textarea id="formTextarea" name="demand_describe" class="form-control" rows="3"></textarea>
            </div>

            <div class="clearfix" style="height: 200px; position: relative;">
                <label>上传图片</label>
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
            <div class="clearfix" style="width: 100%;text-align: center;padding-top:80px;">
                <a href="javascript:;" id="deliverBtn" type="submit" class="btn btn-default deliver-btn">提交</a>
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
                            <div class="user-img">
                                <img id="userImg" src="<?php echo ($user_image); ?>" alt="  ">
                                <span class="iconfont VIP-icon">&#xe65b;</span>
                            </div>
                            <p style="margin-top: 12px;">
                                VIP有效期 :<br>
                                <span class="blue-btn" style="background:#ffa34a;color: #ffffff;">2018-05-01~2019-05-01</span>
                            </p>



                            <!--用户图片更换-->
                            <div class="cropImgBox" ontouchstart="">
                                <div class="cover-wrap">
                                    <div class="coverBox">
                                        <div id="clipArea"></div>
                                        <div class="clipBtn">
                                            <button id="clipBtn">确定</button>
                                            <button onClick="javascript:$('.cover-wrap').fadeOut();">关闭</button>
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
                            <?php if(($isidentify == 1)): ?><li>
                                    <a href="/index.php/Home/Origanization/personInfo">账号设置</a>
                                </li><?php endif; ?>
                            <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                                    <a href="/index.php/Home/Origanization/myOriganization">我的机构</a>
                                </li>
                                <li>
                                    <a class="on" href="/index.php/Home/Project/origanizationProjectManger">我的项目</a>
                                </li>
                                <li>
                                    <a href="/index.php/Home/Home/displayOriganizationHome">机构主页</a>
                                </li><?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-10 column perperson-con" style="background: #FFFFFF;">
                        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                            <ul class="layui-tab-title">
                                <li id="inviteMe" class="layui-this" lay-id="a">邀请我
                                    <?php if($invitenNum > 0): ?><span id='numa' class="layui-badge"><?php echo ($invitenNum); ?></span><?php endif; ?>
                                </li>
                                <li id="biding" lay-id="b">投标中
                                    <?php if($sendNum > 0): ?><span id='numb' class="layui-badge"><?php echo ($sendNum); ?></span><?php endif; ?>
                                </li>
                                <li id="starting" lay-id="c">待开始
                                    <?php if($waitStatNum > 0): ?><span id='numc' class="layui-badge"><?php echo ($waitStatNum); ?></span><?php endif; ?>
                                </li>
                                <li id="going" lay-id="d">进行中
                                    <?php if($ingNum > 0): ?><span id='numd' class="layui-badge"><?php echo ($ingNum); ?></span><?php endif; ?>
                                </li>
                                <li id="apllyFinishProject" lay-id="e">结项申请
                                    <?php if($applyEndNum > 0): ?><span id='nume' class="layui-badge"><?php echo ($applyEndNum); ?></span><?php endif; ?>
                                </li>
                                <li id="alreadyFinish" lay-id="f">已完成</li>
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
                                            <tbody id="tbody1">

                                            </tbody>
                                        </table>


                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination0"></div>
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
                                            <tbody id="tbody2">

                                            </tbody>
                                        </table>

                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination1"></div>
                                </div>

                                <!--社会组织 —— 我的项目 —— 3 待开始-->
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
                                                    <th>项目周期</th>
                                                    <th>社区同意时间</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody3">

                                            </tbody>
                                        </table>
                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination2"></div>
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
                                                <col width="216">
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
                                            <tbody id="tbody4">


                                            </tbody>
                                        </table>
                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination3"></div>

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
                                                <col width="290">
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
                                            <tbody id="tbody5">

                                            </tbody>
                                        </table>
                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination5"></div>

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
                                                <col width="290">
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
                                            <tbody id="tbody6">

                                            </tbody>
                                        </table>
                                    </div>

                                    <!--分页-->
                                    <div class="pagination" id="pagination4"></div>

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
                <p class="left">北京社居易有限公司 版权所有</p>
                <p class="right">
                    Copyright © 2017-2018 社居易 京ICP备18019570
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
        size: [100, 100], // 截取框的宽和高组成的数组。默认值为[260,260]
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
            $('#view').css('background-size', '100% 100%');

            $("#userImg").attr("src", dataURL);

            $.ajax({
                url: "/index.php/Home/Origanization/douploadtouxiang",
                type: "POST",
                data: {
                    img: dataURL
                },
                dataType: "json",
                success: function(data) {
                    if (data.state == 1) {
                        layer.msg('修改成功');
                        console.log(data.url)
                    }
                },
                async: false
            });
            return false;

        }
    });
    //clipArea.destroy();

    window.webuploader = {
        config: {
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


    /*5 .结项申请中 */

    var applyFinishProjectFunc = function() {
        $.post("/index.php/Home/Project/ingcommunityagreenend", function(data) {

            var html5 = '';

            for (var i = 0; i < data.length; i++) {

                html5 += '<tr>' +
                    '<td class = "project-title">' + data[i].project_detail.sjy_community_project_title + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_name + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_start_time + ' ~<br>' + data[i].project_detail.sjy_community_project_end_time + '</td>' +
                    '<td>' + data[i].project_start_time + '</td>' +
                    '<td>' + data[i].project_apply_end_time + '</td>' +
                    '<td><a class = "see-progress" id = "' + data[i].project_id + '" href="javascript:;">查看进度</a> ' +
                    '<a target="_blank"  class = "see-detail" href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a> <br>' +
                    '<a class = "projectBook" id = "' + data[i].project_id + '" href="javascript:;">项目书</a><br>' +
                    '</tr>';




            }
            $("#tbody5").html(html5);

            /*5.1 查看进度*/
            $(".see-progress").click(function() {


                $("#shade1").css("display", "block");

                $(".add-progress").animate({
                    right: '0px'
                });

                $(".progressStep").height($(window).height());
                $(".progressStep").height($(window).height() - 200);
                $(".sure-btn-box").height(200);

                $(".close-tab-right").click(function() {
                    $(".add-progress").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate", {
                    "project_id": project_id
                }, function(data) {

                    console.log(data);
                    var text4 = '';

                    for (var i = 0; i < data.length; i++) {
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">' + data[i].sjy_project_rate_con + '</h3>\n' +
                            '<p>' + data[i].create_time + '</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });





            });



            /*5.3 项目书*/
            $(".projectBook").click(function() {

                $("#shade1").css("display", "block");

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right: '0px'
                });

                $(".tab-right-bar").height($(window).height());
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function() {
                    $(".tab-right-bar").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id, function(data) {

                    var html = '';


                    console.log(data);

                    for (var i = 0; i < data.length; i++) {

                        html += '<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span class = "DocTit">' + data[i].sjy_project_book_name + '</span>\n <br>' +
                            '<span>' + data[i].sjy_project_book_send_time + '</span>\n' +
                            '<a class = "download-btn" id = "' + data[i].sjy_id + '" href="' + data[i].sjy_project_path + '">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n';

                    }

                    $(".choose-organize-box").html(html);





                    $(".dowmload-btn").click(function() {

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {
                            "id": book_id
                        }, function(data) {


                        });
                    });


                })

            });

        });
    };
    $("#apllyFinishProject").click(function() {

        applyFinishProjectFunc();

    });



    /*4. 进行中*/

    var goingFunc = function() {
        $.post("/index.php/Home/Project/ingProject", function(data) {

            var html4 = '';

            for (var i = 0; i < data.length; i++) {

                html4 += '<tr>' +
                    '<td class = "project-title">' + data[i].project_detail.sjy_community_project_title + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_name + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_start_time + ' ~<br>' + data[i].project_detail.sjy_community_project_end_time + '</td>' +
                    '<td>' + data[i].project_start_time + '</td>';


                if (data[i].status >= 10 && data[i].status <= 98) {
                    html4 += '<td><a class = "see-progress" id = "' + data[i].project_id + '" href="javascript:;">查看进度</a> ' +
                        '<a class = "see-detail" target="_blank"  href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a> <br>' +
                        '<a class = "addProgress" id = "' + data[i].project_id + '" href="javascript:;">添加进度</a>   ' +
                        '<a class = "projectBook" id = "' + data[i].project_id + '" href="javascript:;">项目书</a><br>' +
                        '<a class = "finishProject" id = "' + data[i].project_id + '"  data_id = "' + data[i].sjy_id + '"  href="javascript:;">结项目</a></td>' +
                        '</tr>';

                } else {
                    html4 += '<td><a class = "progressStep" id = "' + data[i].project_id + '" href="javascript:;">查看进度</a> ' +
                        '<a class = "see-detail" target="_blank" href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a> <br>' +
                        '<a class = "projectBook" id = "' + data[i].project_id + '" href="javascript:;">项目书</a>' +
                        '<a class = "finishProject" id = "' + data[i].project_id + '"  data_id = "' + data[i].sjy_id + '"  href="javascript:;">结项目</a></td>' +
                        '</tr>';

                }



            }
            $("#tbody4").html(html4);

            /*4.1 查看进度*/
            $(".see-progress").click(function() {

                $("#shade1").css("display", "block");

                $(".add-progress").animate({
                    right: '0px'
                });

                $(".progressStep").height($(window).height());
                $(".sure-btn-box").height(200);

                $(".close-tab-right").click(function() {
                    $(".add-progress").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate", {
                    "project_id": project_id
                }, function(data) {

                    console.log(data);
                    var text4 = '';

                    for (var i = 0; i < data.length; i++) {
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">' + data[i].sjy_project_rate_con + '</h3>\n' +
                            '<p>' + data[i].create_time + '</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });





            });



            /*4.3 项目书*/
            $(".projectBook").click(function() {


                $("#shade1").css("display", "block");

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right: '0px'
                });

                $(".tab-right-bar").height($(window).height());
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function() {
                    $(".tab-right-bar").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id, function(data) {

                    var html = '';

                    console.log(data);

                    for (var i = 0; i < data.length; i++) {

                        html += '<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span class = "DocTit">' + data[i].sjy_project_book_name + '</span>\n <br>' +
                            '<span>' + data[i].sjy_project_book_send_time + '</span>\n' +
                            '<a class = "download-btn" id = "' + data[i].sjy_id + '" href="' + data[i].sjy_project_path + '">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n';

                    }

                    $(".choose-organize-box").html(html);





                    $(".dowmload-btn").click(function() {

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {
                            "id": book_id
                        }, function(data) {


                        });
                    });


                })

            });





            /*4.4 添加进度*/
            $(".addProgress").click(function() {
                var project_id = $(this).attr("id");
                layer.open({
                    type: 2,
                    title: "添加进度",
                    content: "displayAddProjectRate?project_id=" + project_id,
                    btnAlign: "c",
                    btn: ['确定', '取消'],
                    area: ["40%", "60%"],
                    yes: function(index, layero) {
                        //获取子页面窗口
                        var iframeWin = window[layero.find('iframe')[0]['name']];
                        iframeWin.dosubmit(); //子页面点击确认
                    },
                    cancel: function(index, layero) {

                    }
                })

            });


            /*4.5 结项目*/
            $(".finishProject").click(function() {

                var project_title = $(this).parent().siblings('.project-title').text();

                var project_id = $(this).attr("id");
                var sjy_id = $(this).attr("data_id");


                layer.open({
                    content: '<p>是否要结束项目</p><p class = "ortext">' + project_title + '</p>',
                    btn: ['确定', '取消'],
                    yes: function() {

                        //按钮【按钮一】的回调

                        $.post("/index.php/Home/Project/endProjectApply", {
                            "project_id": project_id,
                            "id": sjy_id
                        }, function(data) {

                            if (data.state == 1) {


                                var numd = Number($("#numd").text()) - 1;
                                if (numd == 0) {
                                    $("#numd").remove();
                                }
                                $("#numd").text(numd);

                                var nume = 0;

                                if ($("#apllyFinishProject").children().is("span")) {
                                    console.log("span");
                                    nume = Number($("#nume").text()) + 1;
                                    $("#nume").text(nume);

                                } else {
                                    console.log("not span");
                                    nume = nume + 1;
                                    $("#apllyFinishProject").append('<span id="nume" class="layui-badge">1</span>');

                                }

                                applyFinishProjectFunc();

                                layer.msg('项目将进入结项申请', function() {
                                    element.tabChange("docDemoTabBrief", "e");
                                })



                            } else {

                                layer.msg(data.errorInfo);

                            }

                        });


                    },
                    cancel: function() {
                        //右上角关闭回调

                        //return false 开启该代码可禁止点击该按钮关闭
                    }
                });
            })


        });
    };
    $("#going").click(function() {

        goingFunc();

    });




    /*3.待开始*/

    var startingFunc = function() {
        $.post("/index.php/Home/Project/waitStart", function(data) {
            var html3 = '';

            for (var i = 0; i < data.length; i++) {
                html3 += '<tr>' +
                    '<td class="communityProjectName">' + data[i].project_detail.sjy_community_project_title + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_send_prople_name + '</td>' +
                    '<td>' + data[i].community_agreen_project_start_people + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_start_time + ' ~<br>' + data[i].project_detail.sjy_community_project_end_time + '</td>' +
                    '<td>' + data[i].community_agreen_project_start_time + '</td>' +
                    '<td><a class = "startProject" sjy_id = "' + data[i].sjy_id + '" id = "' + data[i].project_id + '" href="javascript:;">开始</a> ' +
                    '<a class="see-detail" target="_blank" href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a><br>' +
                    '<a class = "projectBook" id = "' + data[i].project_id + '" href="javascript:;">项目书</a></td>' +
                    '</tr>';
            }

            $("#tbody3").html(html3);

            /*3.1  是否开始项目*/
            $(".startProject").click(function() {

                var project_id = $(this).attr("id");
                var sjy_id = $(this).attr("sjy_id");

                var orText = $(this).parent().siblings('.communityProjectName').text();


                layer.open({
                    content: '<p>你是否确定要开始执行</p><p class = "ortext">' + orText + '</p>',
                    btn: ['确定', '取消'],
                    yes: function() {

                        //按钮【按钮一】的回调

                        $.post("/index.php/Home/Project/origanizationStartProject", {
                            "project_id": project_id,
                            "id": sjy_id
                        }, function(data) {

                            if (data.state == 1) {

                                var numc = Number($("#numc").text()) - 1;
                                if (numc == 0) {
                                    $("#numc").remove();
                                }
                                $("#numc").text(numc);

                                var numd = 0;

                                if ($("#going").children().is("span")) {
                                    console.log("span");
                                    numd = Number($("#numd").text()) + 1;
                                    $("#numd").text(numd);

                                } else {
                                    console.log("not span");
                                    numd = numd + 1;
                                    $("#going").append('<span id="numd" class="layui-badge">1</span>');

                                }

                                goingFunc();

                                /*跳转到进行中*/
                                layer.msg('项目将进入进行中', function() {
                                    element.tabChange("docDemoTabBrief", "d");
                                });




                            } else {
                                layer.msg(data.errorInfo);

                            }

                        });


                    },
                    cancel: function() {
                        //右上角关闭回调

                        //return false 开启该代码可禁止点击该按钮关闭
                    }
                });
            });


            /* 3.3 项目书点击下载*/

            $(".projectBook").click(function() {


                $("#shade1").css("display", "block");

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right: '0px'
                });

                $(".tab-right-bar").height($(window).height());
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function() {
                    $(".tab-right-bar").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "block");
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id, function(data) {

                    var html = '';

                    console.log(data);

                    for (var i = 0; i < data.length; i++) {

                        html += '<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span class = "DocTit">' + data[i].sjy_project_book_name + '</span>\n <br>' +
                            '<span>' + data[i].sjy_project_book_send_time + '</span>\n' +
                            '<a class = "download-btn" id = "' + data[i].sjy_id + '" href="' + data[i].sjy_project_path + '">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n';

                    }

                    $(".choose-organize-box").html(html);



                    $(".dowmload-btn").click(function() {

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {
                            "id": book_id
                        }, function(data) {


                        });
                    });


                })

            })
        });
    };


    $("#starting").click(function() {
        startingFunc();
    });



    /*2.投标中*/


    var bindingFunc = function() {

        $.post("/index.php/Home/Project/alreadySendProject", function(data) {
            var html2 = '';



            for (var i = 0; i < data.data.length; i++) {
                html2 += '<tr>' +
                    '<td>' + data.data[i].project_detail.sjy_community_project_title + '</td>' +
                    '<td>' + data.data[i].project_detail.sjy_community_name + '</td>' +
                    '<td>' + data.data[i].project_detail.sjy_community_project_send_prople_name + '</td>' +
                    '<td>' + data.data[i].project_detail.sjy_community_project_service_area + '</td>' +
                    '<td>' + data.data[i].project_detail.sjy_community_project_collect_start_time + ' ~<br>' + data.data[i].project_detail.sjy_community_project_collect_end_time + '</td>' +
                    '<td>' + data.data[i].status_desc + '</td>' +
                    '<td><a target="_blank" class="see-detail" href="/index.php/Home/Project/displayCommunityProject/id/' + data.data[i].project_id + '">详情</a>' +
                    '<a class = "projectBook" id = "' + data.data[i].project_id + '" href="javascript:;">项目书</a></td>' +
                    '</tr>';
            }

            $("#tbody2").html(html2);

            /*2.1 项目书点击下载*/

            $(".projectBook").click(function() {


                $("#shade1").css("display", "block");

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right: '0px'
                });

                $(".tab-right-bar").height($(window).height());
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function() {
                    $(".tab-right-bar").animate({
                        right: '-320px'
                    });
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id, function(data) {

                    var html = '';

                    console.log(data);

                    for (var i = 0; i < data.length; i++) {


                        html += '<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span class = "DocTit">' + data[i].sjy_project_book_name + '</span>\n <br>' +
                            '<span>' + data[i].sjy_project_book_send_time + '</span>\n' +
                            '<a class = "download-btn" id = "' + data[i].sjy_id + '" href="' + data[i].sjy_project_path + '">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n';

                    }

                    $(".choose-organize-box").html(html);



                    $(".dowmload-btn").click(function() {

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {
                            "id": book_id
                        }, function(data) {


                        });
                    });


                })

            })




        });
    };

    $("#biding").click(function() {
        bindingFunc();
    });



    /*1. 邀请我*/
    var inviteMeFunc = function() {
        $.post("/index.php/Home/Project/invite", function(data) {

            var html1 = '';

            //        console.log(data);


            for (var i = 0; i < data.length; i++) {

                html1 += '<tr>' +
                    '<td>' + data[i].project_detail.sjy_community_project_title + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_name + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_service_area + '</td>' +
                    '<td>' + data[i].status_desc + '</td>' +
                    '<td>' + data[i].project_detail.sjy_community_project_collect_start_time + ' ~<br>' + data[i].project_detail.sjy_community_project_collect_end_time + '</td>' +
                    '<td>' + data[i].invitate_time + '</td>' +
                    '<td><a target="_blank" class="see-detail" style="width: 68px; text-align: center;"  href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a> ' +
                    '<a id = "agreeOrganization" class = "projectBook" style="width: 68px; text-align: center;"  data-id = "' + data[i].project_id + '" href="javascript:;">同意</a></td>' +
                    '</tr>';
            }

            $("#tbody1").html(html1);


            /*点击同意的操作*/
            $("#agreeOrganization").click(function() {

                $("#shade1").css("display", "block");
                $("#layer3").css("display", "block");

                $("#closeDeliver").click(function() {
                    $("#shade1").css("display", "none");
                    $("#layer3").css("display", "none");
                });

                var $id = $(this).attr("data-id");

                console.log($id + "$id ");


                layui.use('upload', function() {

                    var upload = layui.upload;
                    //执行实例
                    var uploadPdf = upload.render({
                        elem: '#test1', //绑定元素
                        auto: false,
                        bindAction: '#uploadPDF',
                        url: "/index.php/Home/Project/sendProjectBook/project_id/" + $id,
                        exts: 'pdf|doc|docx',
                        done: function(res) {
                            //上传完毕回调
                            if (res.state == 1) {
                                layer.msg("发送成功");
                                layer.msg('发送成功', function() {
                                    $("#shade1").css("display", "none");
                                    $("#layer3").css("display", "none");

                                    var numa = Number($("#numa").text()) - 1;
                                    if (numa == 0) {
                                        $("#numa").remove();
                                    }
                                    $("#numa").text(numa);

                                    var numb = 0;

                                    if ($("#biding").children().is("span")) {
                                        console.log("span");
                                        numb = Number($("#numb").text()) + 1;
                                        $("#numb").text(numb);

                                    } else {
                                        console.log("not span");
                                        numb = numb + 1;
                                        $("#biding").append('<span id="numb" class="layui-badge">1</span>');

                                    }

                                    bindingFunc();

                                    layer.msg("即将进入投标中", function() {
                                        element.tabChange("docDemoTabBrief", "b");


                                    })

                                });
                            } else {
                                layer.msg(res.errorMsg);
                            }
                        },
                        error: function() {
                            //请求异常回调
                        }
                    });


                });

            })

        });
    };

    $("#inviteMe").click(function() {
        inviteMeFunc();
    });


    inviteMeFunc();


    /*6 . 已完成 */
    $("#alreadyFinish").click(function() {
        $.post("/index.php/Home/Project/completeProject", function(data) {

            var html6 = '';

            for (var i = 0; i < data.length; i++) {
                html6 += '<tr>' +
                    '<td class = "project-title">' + data[i].project_info.sjy_community_project_title + '</td>' +
                    '<td>' + data[i].project_info.sjy_community_name + '</td>' +
                    '<td>' + data[i].project_info.sjy_community_project_send_prople_name + '</td>' +
                    '<td>' + data[i].project_info.sjy_community_project_start_time + ' ~<br>' + data[i].project_info.sjy_community_project_end_time + '</td>' +
                    '<td>' + data[i].project_start_time + ' ~<br>' + data[i].project_end_time + '</td>' +
                    '<td><a class = "see-progress" id = "' + data[i].project_id + '" href="javascript:;">查看进度</a> ' +
                    '<a target="_blank"  class = "see-detail" href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_id + '">详情</a> <br>' +
                    '<a class = "projectBook" id = "' + data[i].project_id + '" href="javascript:;">项目书</a>' +
                    '<a class = "download-btn" id = "' + data[i].project_id + '" href="/index.php/Home/Project/reportBook/project_id/' + data[i].project_id + '">报告书</a><br>' +
                    '</tr>';
            }

            $("#tbody6").html(html6);

            /*6.1 查看进度*/
            $(".see-progress").click(function() {

                $("#shade1").css("display", "block");

                $(".add-progress").animate({
                    right: '0px'
                });

                $(".progressStep").height($(window).height());
                $(".progressStep").height($(window).height() - 200);
                $(".sure-btn-box").height(200);

                $(".close-tab-right").click(function() {
                    $(".add-progress").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });

                var project_id = $(this).attr("id");

                $.get("/index.php/Home/Project/projectRate", {
                    "project_id": project_id
                }, function(data) {

                    console.log(data);
                    var text4 = '';

                    for (var i = 0; i < data.length; i++) {
                        text4 += '<li class="layui-timeline-item">\n' +
                            '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>\n' +
                            '<div class="layui-timeline-content layui-text">\n' +
                            '<h3 class="layui-timeline-title">' + data[i].sjy_project_rate_con + '</h3>\n' +
                            '<p>' + data[i].create_time + '</p>' +
                            '</div>\n' +
                            '</li>';

                    }

                    $(".layui-timeline").html(text4);
                });
            });


            /*6.3 项目书*/
            $(".projectBook").click(function() {

                $("#shade1").css("display", "block");

                var proName = $(this).parent().siblings('.proName').text();
                console.log(proName + "proName");

                $(".tab-right-bar").animate({
                    right: '0px'
                });

                $(".tab-right-bar").height($(window).height());
                $(".right-tab-content").height($(window).height());

                $(".close-tab-right").click(function() {
                    $(".tab-right-bar").animate({
                        right: '-320px'
                    });

                    $("#shade1").css("display", "none");
                });


                var id = $(this).attr("id");
                console.log(id);

                $.post("/index.php/Home/Project/origanizationGetProjectBookList/project_id/" + id, function(data) {

                    var html = '';

                    console.log(data);

                    for (var i = 0; i < data.length; i++) {

                        html += '<li class = "choose-organize-item">\n' +
                            '<div class = "proposal-detail">\n' +
                            '<span class = "DocTit">' + data[i].sjy_project_book_name + '</span>\n <br>' +
                            '<span>' + data[i].sjy_project_book_send_time + '</span>\n' +
                            '<a class = "download-btn" id = "' + data[i].sjy_id + '" href="' + data[i].sjy_project_path + '">下载</a>\n' +
                            '</div>\n' +
                            '</li>\n';

                    }

                    $(".choose-organize-box").html(html);



                    $(".dowmload-btn").click(function() {

                        var book_id = $(this).attr("id");

                        $.get("/index.php/Home/Project/downloadProjectBook", {
                            "id": book_id
                        }, function(data) {


                        });
                    });

                })
            });
        });
    });
</script>

<script src="/Public/Home/js/extend-webuploader.js" type="text/javascript"></script>

</html>