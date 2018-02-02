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
    <link rel="stylesheet" href="/Public/Home/css/testfy.css">
    <link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
    <link rel="stylesheet" href="/Public/Home/css/page2.css">
    <link rel="stylesheet" href="/Public/Home/css/detail.css">
    <script src = "/Public/Home/js/jquery-1.12.4.js"></script>
    <script src = "/Public/Home/js/bootstrap.js"></script>
    <script src = "/Public/Home/js/jquery.page.js"></script>
    <script src = "/Public/Home/js/upLoadImg.js"></script>

</head>
<body>
<div class="shadeBox"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>
<div class = "headLogin">
    <div class = "container">
        <div class = "left changeBan">
            <a href = "javascript:;" id = "cityChoose" class = "region">北京</a>
            <a href="">社会组织版</a>
            <a class = "on" href="">社区版</a>
        </div>
        <div class="right person">
            <img src="/Public/Home/imgs/personDl.jpg" alt="">
        </div>
    </div>
</div>
<div class = "headNavBox">
    <div class = "container">
        <div class = "top">
            <div class = "logo  col-md-6">
                <img src="/Public/Home/imgs/logo.png" alt="">
                <span>社居易</span>
            </div>
            <div  class = "mainNav col-md-6">
                <div class = "search">
                    <input class="form-control" type="text" />
                    <button type="submit" class="btn btn-default iconfont">&#xe61a;</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class = "container" style = "margin-bottom: 40px;">
    <div class="detailBox">
        <div class = "detail-bottom">
            <div class = "col-md-1 orLogoBox">
                <img class = "orLogo" src="/Public/Home/imgs/or4.jpg" alt="">
            </div>
            <div class = "col-md-7 community-tit">
                <h3></h3>
                <p></p>
            </div>
            <div class = "col-md-4">
                <a class = "deliverBtn" href="deliver.html">发布项目</a>
            </div>

        </div>

    </div>
    <div class="">
        <div class = "col-md-8" style="padding: 0;">
            <div class = "detail-head">
                <ul class = "detail-nav">
                    <li><a class = "nav1 on" href="javascript:;">社区详情</a></li>
                    <li><a class = "nav2" href="javascript:;">正在招标</a></li>
                    <li><a class = "nav3" href="javascript:;">正在进行</a></li>
                    <li><a class = "nav4" href="javascript:;">已完成的项目</a></li>
                </ul>
            </div>
            <div class = "detail-detail">
                 <div class = "box box1" style = "display: block;">
                     <div class = "detail-item">
                         <span>社区简介</span>
                         <p></p>
                     </div>
                     <div class = "detail-item">
                         <span class = "left">服务领域</span>
                         <p class = "left" style = "line-height:  30px;"></p>
                     </div>

                     <div class = "detail-item">
                         <span  class = "left">机构主任</span>
                         <p class = "left" style = "line-height:  30px;"></p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">机构地址</span>
                         <p  class = "left" style = "line-height:  30px;"></p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">联系方式</span>
                         <p  class = "left" style = "line-height:  30px;"></p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">社区风采</span>
                         <p></p>
                     </div>
                 </div>

                <div class = "box box2" style = "display: none;" >
                    <ul class = "clearfix">
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ1.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ1.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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

                <div class = "box box3" style = "display: none;">
                    <ul class = "clearfix">
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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

                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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

                <div class = "box box4" style = "display: none;">
                    <ul class = "clearfix">
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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

                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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
                        <li class = "clearfix pro-li">
                            <div class = "left leftImg">
                                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                            </div>
                            <div class = "left leftCon">
                                <dl>
                                    <!--<dt>项目名称</dt>-->
                                    <dd class = "project-tit">“志愿青春，成长无虑”如意社区青少年服务项目</dd>
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
        <div class = "col-md-4" style = "padding: 0; padding-left: 30px;">

            <div class = "organize-fan clearfix">
                <div class = "left" style = "border-right: 1px solid #efefef;">
                    <p class = "p1">10</p>
                    <p class = "p2">关注</p>
                </div>
                <div class = "left">
                    <p class = "p1">10</p>
                    <p class = "p2">粉丝</p>
                </div>
            </div>
            <div class = "latest-article clearfix">
                <h3>最新项目</h3>
                <ul class = "latest-ulbox clearfix">
                    <li class = "clearfix">
                        <div class = "left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                        <div class = "left right-detail">
                            <p class ="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                            <p class = "p2">2017-09-13 20:28</p>
                        </div>
                    </li>
                    <li class = "clearfix">
                        <div class = "left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                        <div class = "left right-detail">
                            <p class ="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                            <p class = "p2">2017-09-13 20:28</p>
                        </div>
                    </li>

                    <li class = "clearfix">
                        <div class = "left left-img"><img src="/Public/Home/imgs/shequ3.jpg" alt=""></div>
                        <div class = "left right-detail">
                            <p class ="p1">“志愿青春，成长无虑”如意社区青少年服务项目</p>
                            <p class = "p2">2017-09-13 20:28</p>
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
            <p class = "left">北京社居易有限公司 版权所有</p>
            <p class = "right">
                Copyright © EasyLife.com All rights reserved.2017-2020  京ICP证1166666号 京公网安备133333333444
            </p>
        </div>
    </div>
</div>
</body>
<script src = "/Public/Home/js/cityBoxShow.js"></script>
<script>
    $(".detail-nav li a").click(function () {
        $(this).addClass("on");
        $(".detail-nav li a").removeClass("on")
    });

    $(".detail-nav li .nav1").click(function () {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box1").css("display", "block");

    });
    $(".detail-nav li .nav2").click(function () {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box2").css("display", "block");

    });
    $(".detail-nav li .nav3").click(function () {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box3").css("display", "block");

    });

    $(".detail-nav li .nav4").click(function () {
        $(".detail-nav li a").removeClass("on");
        $(this).addClass("on");
        $(".detail-detail .box").css("display", "none");
        $(".detail-detail .box4").css("display", "block");
    });

    $.post("/index.php/Home/Home/getCommunityInfo?id=<?php echo ($id); ?>", function (data) {

        var img = '<img class = "orLogo" src="'+ data.sjy_community_logo_img_path +'" alt="">';
        $(".orLogoBox").html(img);

        var tit  = "";
        tit += '<h3>'+ data.sjy_community_name +'</h3>';

        $(".community-tit").html(tit);

        var html = "";
        console.log(data);
        html += '<div class = "detail-item">' +
                '<span>社区简介</span>' +
                '<p>'+ data.sjy_community_introduce +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">社区地址</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.address_info.sjy_community_city_name + data.address_info.sjy_community_area_name + data.address_info.sjy_community_street_name+data.address_info.sjy_community_address +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">联系方式</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.sjy_community_phone +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">社区风采</span>' +
                '<p><img class = "orDetail-img" src="'+ data.community_images+'" alt=""></p>' +
                '</div>';

        $(".box1").html(html);

    });

    $.post("/index.php/Home/Project/getCommunityTenderProject?id=<?php echo ($id); ?>", function (data) {

        var html = "";
        console.log(data);
        for( var i = 0; i < data.data.length; i++){
            html += '<li class = "clearfix pro-li">' +
                    '<a href="/index.php/Home/Project/displayCommunityProject/id/'+data.data[i].sjy_id+'">'+
                    '<div class = "left leftImg">' +
                    '<img src="'+ data.data[i].project_images +'" alt="">' +
                    '</div>' +
                    '<div class = "left leftCon">' +
                    '<dl>' +
                    '<dd class = "project-tit">'+ data.data[i].sjy_community_project_title +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>招标周期</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_collect_start_time + '~'+ data.data[i].sjy_community_project_collect_end_time+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>执行周期</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_start_time + '~'+ data.data[i].sjy_community_project_end_time+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>落地社区</dt>' +
                    '<dd>'+ data.data[i].sjy_community_name +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>服务对象</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_service_area +'</dd>' +
                    '</dl>' +
                    '</div>' +
                    '</a>'+
                    '</li>';
        }

        $(".box2 ul").html(html);

    });


    $.post("http://120.24.242.45/shejuyi/index.php/Home/Origanizationback/getcommunityingproject?id=26", function (data) {

        var html = "";
        console.log(data);
        for( var i = 0; i < data.data.length; i++){
            html += '<li class = "clearfix pro-li">' +
                    '<div class = "left leftImg">' +
                    '<img src="http://120.24.242.45/shejuyi'+ data.data[i].project_images +'" alt="">' +
                    '</div>' +
                    '<div class = "left leftCon">' +
                    '<dl>' +
                    '<dd class = "project-tit">'+ data.data[i].sjy_community_project_title +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>项目周期</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_start_time + '~'+ data.data[i].sjy_community_project_end_time+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>落地社区</dt>' +
                    '<dd>'+ data.data[i].sjy_community_name+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>执行机构</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_origanization_name +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>服务对象</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_service_area +'</dd>' +
                    '</dl>' +
                    '</div>' +
                    '</li>';
        }

        $(".box3 ul").html(html);

    });

    $.post("http://120.24.242.45/shejuyi/index.php/Home/Origanizationback/getcommunityoldproject?id=26", function (data) {

        var html = "";
        console.log(data);
        for( var i = 0; i < data.data.length; i++){
            html += '<li class = "clearfix pro-li">' +
                    '<div class = "left leftImg">' +
                    '<img src="http://120.24.242.45/shejuyi'+ data.data[i].project_images +'" alt="">' +
                    '</div>' +
                    '<div class = "left leftCon">' +
                    '<dl>' +
                    '<dd class = "project-tit">'+ data.data[i].sjy_community_project_title +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>项目周期</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_start_time + '~'+ data.data[i].sjy_community_project_end_time+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>落地社区</dt>' +
                    '<dd>'+ data.data[i].sjy_community_name+'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>执行机构</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_origanization_name +'</dd>' +
                    '</dl>' +
                    '<dl>' +
                    '<dt>服务对象</dt>' +
                    '<dd>'+ data.data[i].sjy_community_project_service_area +'</dd>' +
                    '</dl>' +
                    '</div>' +
                    '</li>';
        }

        $(".box4 ul").html(html);

    });















</script>
</html>