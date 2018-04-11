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

<!-- <link rel="stylesheet" href="/Public/Home/css/region.css">
<link rel="stylesheet" href="/Public/Home/css/testfy.css">
<link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/detail.css">
<script src="/Public/Home/js/jquery-1.12.4.js"></script>
<script src="/Public/Home/js/bootstrap.js"></script>
<script src="/Public/Home/js/jquery.page.js"></script>
<script src="/Public/Home/js/upLoadImg.js"></script> -->


<link rel="stylesheet" href="/Public/Home/css/region.css">
<link rel="stylesheet" href="/Public/Home/css/testfy.css">
<link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/detail.css">

<link rel="stylesheet" href="/Public/Home/css/component.css">
<link rel="stylesheet" href="/Public/Home/css/layui.css">
<link rel="stylesheet" href="/Public/Home/css/score.css">

<script src="/Public/Home/js/jquery.page.js"></script>
<script src="/Public/Home/js/upLoadImg.js"></script>
<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>
</head>

<body>
    <div class="shadeBox"></div>
    <div id="showCityBox" class="province-switch" style="display: none;">
    </div>
    <div class="headLogin">
        <div class="left changeBan">
            <a href="javascript:;" id="cityChoose" class="region"><?php echo ($city); ?></a>
            <a class="on" href="">社会组织版</a>
            <a href="">社区版</a>
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
                <?php if($figure == 2): ?><ul class="dropdown-menu personalMenu">
                        <li>
                            <a href="/index.php/Home/Community/communityIdentify">认证状态</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Community/personinfo">账号设置</a>
                        </li>
                        <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                                <a href="/index.php/Home/Community/mycommunity">我的社区</a>
                            </li>
                            <li>
                                <a href="/index.php/Home/Project/communityProjectManger">我的项目<?php if($active>=1){ ?><span class="layui-badge-dot"></span><?php } ?></a>
                            </li>
                            <li>
                                <a href="">我的消息</a>
                            </li>

                            <li><?php endif; ?>
                        <a href="/index.php/Home/Community/logout">注销</a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="dropdown-menu personalMenu">
                        <li>
                            <a href="/index.php/Home/Origanization/origanizationIdentify">认证状态</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Origanization/personinfo">账号设置</a>
                        </li>
                        <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                                <a href="/index.php/Home/Origanization/myoriganization">我的机构</a>
                            </li>
                            <li>
                                <a href="/index.php/Home/Project/origanizationProjectManger">我的项目<?php if($active>=1){ ?><span class="layui-badge-dot"></span><?php } ?></a>
                            </li>
                            <li>
                                <a href="">我的消息</a>
                            </li><?php endif; ?>
                        <li>
                            <a href="/index.php/Home/Origanization/logout">注销</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="headNavBox">
        <div class="container">
            <div class="top">
                <a href="<?php echo ($index); ?>">
                    <div class="logo  col-md-6">
                        <img src="/Public/Home/imgs/logo.png" alt="">
                        <span>社居易</span>
                    </div>
                </a>
                <div class="mainNav col-md-6">
                    <div class="search">
                        <input class="form-control" type="text" />
                        <button type="submit" class="btn btn-default iconfont">&#xe61a;</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 40px;">
        <div class="detailBox">
            <div class="detail-bottom">
                <div class="col-md-1 orLogoBox">
                    <img class="orLogo" src="/Public/Home/imgs/or4.jpg" alt="">
                </div>
                <div class="col-md-5 community-tit">
                    <h3>中国社区</h3>
                    <p>致力于服务社区人民的一系活动</p>
                </div>
                <div class="col-md-6">
                <?php if($figure == 2): ?><a id="inviteOr" class="deliverBtn" href="javascript:;">邀请做项目</a><?php endif; ?>
                    <a class="deliverBtn" target='blank' href="/index.php/Home/Origanization/send_project">发布项目</a>
                </div>

            </div>

        </div>
        <div class="">
            <div class="col-md-8" style="padding: 0;">
                <div class="detail-head">
                    <ul class="detail-nav">
                        <li><a class="nav1 on" href="javascript:;">机构详情</a></li>
                        <li><a id="alreadyFinishProject" class="nav2" href="javascript:;">已完成的项目</a></li>
                        <li><a id="finishingProject" class="nav3" href="javascript:;">正在完成的项目</a></li>
                        <li><a id="alreadyDeliver" class="nav4" href="javascript:;">已发布的</a></li>
                    </ul>
                </div>
                <div class="detail-detail">
                    <div class="box box1" style="display: block;">
                        <div class="detail-item">
                            <span>机构简介</span>
                            <p></p>
                        </div>
                        <div class="detail-item">
                            <span class="left">服务领域</span>
                            <p class="left" style="line-height:  30px;"></p>
                        </div>
                        <div class="detail-item">
                            <span class="left">机构地址</span>
                            <p class="left" style="line-height:  30px;"></p>
                        </div>
                        <div class="detail-item">
                            <span class="left">联系方式</span>
                            <p class="left" style="line-height:  30px;"></p>
                        </div>
                        <div class="detail-item">
                            <span class="left">机构风采</span>
                            <p><img class="orDetail-img" src="" alt=""></p>
                        </div>
                    </div>

                    <div class="box box2" style="display: none;">
                        <ul class="clearfix">
                            <li class="clearfix pro-li">
                                <div class="left leftImg">
                                    <img src="/Public/Home/imgs/shequ1.jpg" alt="">
                                </div>
                                <div class="left leftCon">
                                    <dl>
                                        <!--<dt>项目名称</dt>-->
                                        <dd class="project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
                                    </dl>
                                    <dl>
                                        <dt>执行周期</dt>
                                        <dd>2017.07.11-2017.12.15</dd>
                                    </dl>
                                    <dl>
                                        <dt>落地社区</dt>
                                        <dd>如意社区</dd>
                                    </dl>
                                    <dl>
                                        <dt>评  分</dt>
                                        <dd>88分</dd>
                                    </dl>
                                </div>

                            </li>

                        </ul>


                    </div>

                    <div class="box box3" style="display: none;">
                        <ul class="clearfix">
                            <li class="clearfix pro-li">
                                <div class="left leftImg">
                                    <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                                </div>
                                <div class="left leftCon">
                                    <dl>
                                        <!--<dt>项目名称</dt>-->
                                        <dd class="project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
                                    </dl>
                                    <dl>
                                        <dt>执行周期</dt>
                                        <dd>2017.07.11-2017.12.15</dd>
                                    </dl>
                                    <dl>
                                        <dt>落地社区</dt>
                                        <dd>如意社区</dd>
                                    </dl>
                                    <dl>
                                        <dt>时 间</dt>
                                        <dd>2017-09-13 20:28</dd>
                                    </dl>
                                </div>

                            </li>


                        </ul>

                    </div>

                    <div class="box box4" style="display: none;">
                        <ul class="clearfix">
                            <li class="clearfix pro-li">
                                <div class="left leftImg">
                                    <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                                </div>
                                <div class="left leftCon">
                                    <dl>
                                        <!--<dt>项目名称</dt>-->
                                        <dd class="project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
                                    </dl>
                                    <dl>
                                        <dt>执行周期</dt>
                                        <dd>2017.07.11-2017.12.15</dd>
                                    </dl>
                                    <dl>
                                        <dt>落地社区</dt>
                                        <dd>如意社区</dd>
                                    </dl>
                                    <dl>
                                        <dt>时 间</dt>
                                        <dd>2017-09-13 20:28</dd>
                                    </dl>
                                </div>

                            </li>


                        </ul>

                    </div>

                </div>
            </div>
            <div class="col-md-4" style="padding: 0; padding-left: 30px;">

                <div class="organize-fan clearfix">
                    <div class="left" style="border-right: 1px solid #efefef;">
                        <p class="p1">10</p>
                        <p class="p2">关注</p>
                    </div>
                    <div class="left">
                        <p class="p1">10</p>
                        <p class="p2">粉丝</p>
                    </div>
                </div>
                <div class="latest-article clearfix">
                    <h3>最新项目</h3>
                    <ul class="latest-ulbox clearfix">
                        <li class="clearfix">
                            <div class="left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                            <div class="left right-detail">
                                <p class="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                                <p class="p2">2017-09-13 20:28</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                            <div class="left right-detail">
                                <p class="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                                <p class="p2">2017-09-13 20:28</p>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                            <div class="left right-detail">
                                <p class="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                                <p class="p2">2017-09-13 20:28</p>
                            </div>
                        </li>
                    </ul>

                </div>



            </div>


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
<script src="/Public/Home/js/cityBoxShow.js"></script>
<script>
    /*邀请做项目*/
    $("#inviteOr").click(function() {

        layer.open({
            type: 2,
            area: ['40%', '50%'],
            content: '/index.php/Home/Project/displayCommunityTendPorject?origanization_id=<?php echo ($id); ?>'
        });

    });



    $(".detail-nav li a").click(function() {
        $(this).addClass("on");
        $(".detail-nav li a").removeClass("on")
    });

    $(".detail-nav li .nav1").click(function() {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box1").css("display", "block");

    });
    $(".detail-nav li .nav2").click(function() {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box2").css("display", "block");
    });
    $(".detail-nav li .nav3").click(function() {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box3").css("display", "block");

    });
    $(".detail-nav li .nav4").click(function() {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box4").css("display", "block");

    });

    $.post("/index.php/Home/Home/getOriganizationInfo?id=<?php echo ($id); ?>", function(data) {

        var img = '<img class = "orLogo" src="' + data.sjy_origanization_logo_img_path + '" alt="">';
        $(".orLogoBox").html(img);

        var tit = "";
        tit += '<h3>' + data.sjy_origanization_name + '</h3>';

        $(".community-tit").html(tit);

        var html = "";
        console.log(data);
        html += '<div class = "detail-item">' +
            '<span  class = "left">机构简介</span>' +
            '<p  class = "left">' + data.sjy_origanization_introduce + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span class = "left">服务领域</span>' +
            '<p class = "left" style = "line-height:  30px;">' + data.sjy_origanization_type_name + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">机构地址</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.address_info.sjy_origanization_province_name + data.address_info.sjy_origanization_city_name + data.address_info.sjy_origanization_area_name + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">联系方式</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.sjy_origanization_phone + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">机构风采</span>' +
            '<p><img class = "orDetail-img" src="' + data.sjy_origanization_business_licence_path + '" alt=""></p>' +
            '</div>';

        $(".box1").html(html);




    });


    /*已完成的项目*/
    $(".nav2").click(function() {

        $.post("/index.php/Home/Project/completeProject?origanization_code=<?php echo ($id); ?>", function(data) {


            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<li class="clearfix pro-li">' +
                    '<a target="_blank" href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_info['sjy_id'] + '">' +
                    '<div class="left leftImg">' +
                    '<img src="http://p33g9t7dr.bkt.clouddn.com/' + data[i].main_image + '" alt="">' +
                    '</div>' +
                    '<div class="left leftCon">' +
                    '<dl>' +
                    '<dd class="project-tit">' + data[i].project_info.sjy_community_project_title + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>执行周期</dt>' +
                    '<dd>' + data[i].project_info.sjy_community_project_start_time + ' ~ ' + data[i].project_info.sjy_community_project_end_time + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>落地社区</dt>' +
                    '<dd>' + data[i].project_info['sjy_community_name'] + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>评  分</dt>' +
                    '<dd><div class="atar_Show">' +
                    '<p tip="' + data[i].score + '"></p>' +
                    '</div>' +
                    '<span></span></dd>' +
                    '</dl>' +
                    '</div>' +
                    '</a>' +
                    '</li>';
            }

            $(".box2 ul").html(html);
            //显示分数
            $(".show_number li p").each(function(index, element) {
                var num = $(this).attr("tip");
                var www = num * 2 * 16; //
                $(this).css("width", www);
                $(this).parent(".atar_Show").siblings("span").text(num + "分");
            });


        })



    });



    /*正在完成的项目*/

    $(".nav3").click(function() {

        $.post("/index.php/Home/Project/ingProject?origanization_code=<?php echo ($id); ?>", function(data) {

            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<li class="clearfix pro-li">' +
                    '<a href="/index.php/Home/Project/displayCommunityProject/id/' + data[i].project_detail['sjy_id'] + '" target="_blank" >' +
                    '<div class="left leftImg">' +
                    '<img src="http://p33g9t7dr.bkt.clouddn.com/' + data[i].main_image + '" alt="">' +
                    '</div>' +
                    '<div class="left leftCon">' +
                    '<dl>' +
                    '<dd class="project-tit">' + data[i].project_detail['sjy_community_project_title'] + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>服务对象</dt>' +
                    '<dd>' + data[i].project_detail['sjy_community_project_service_area'] + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>项目周期</dt>' +
                    '<dd>' + data[i].project_detail['sjy_community_project_start_time'] + ' ~ ' + data[i].project_detail['sjy_community_project_end_time'] + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>落地社区</dt>' +
                    '<dd>' + data[i].project_detail['sjy_community_name'] + '</dd>' +
                    '</dl>' +
                    '</div>' +
                    '</a>' +
                    '</li>';
            }

            $(".box3 ul").html(html);

            //显示分数
            $(".show_number li p").each(function(index, element) {
                var num = $(this).attr("tip");
                var www = num * 2 * 16; //
                $(this).css("width", www);
                $(this).parent(".atar_Show").siblings("span").text(num + "分");
            });


        })



    });


    /*已发布的项目*/

    $(".nav4").click(function() {

        $.post("/index.php/Home/Project/origanizationSendProject?origanization_code=<?php echo ($id); ?>", function(data) {

            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<li class="clearfix pro-li">' +
                    '<a href="/index.php/Home/Project/displayOriganizationProject/id/' + data[i].sjy_id + '" target="_blank">' +
                    '<div class="left leftImg">' +
                    '<img src="http://p33g9t7dr.bkt.clouddn.com/' + data[i].main_image + '" alt="">' +
                    '</div>' +
                    '<div class="left leftCon">' +
                    '<dl>' +
                    '<dd class="project-tit">' + data[i].sjy_origanization_project_title + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>服务对象</dt>' +
                    '<dd>' + data[i].sjy_origanization_project_service_area + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>执行周期</dt>' +
                    '<dd>' + data[i].sjy_origanization_project_start_time + ' ~ ' + data[i].sjy_origanization_project_end_time + '</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>发布时间</dt>' +
                    '<dd>' + data[i].sjy_origanization_project_send_time + '</dd>' +
                    '</dl>' +
                    '</div>' +
                    '</a>' +
                    '</li>';
            }

            $(".box4 ul").html(html);

            //显示分数
            $(".show_number li p").each(function(index, element) {
                var num = $(this).attr("tip");
                var www = num * 2 * 16; //
                $(this).css("width", www);
                $(this).parent(".atar_Show").siblings("span").text(num + "分");
            });


        })



    })
</script>

</html>