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

    <link rel="stylesheet" href="/Public/Home/css/region.css">
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/layui.css">
<link rel="stylesheet" href="/Public/Home/css/right-tab.css">
<link rel="shortcut icon" href="/Public/Home/img/easyLife.ico" />
<script src="/Public/Home/js/layui.js"></script>
<link rel="stylesheet" href="/Public/Home/css/carousel.css">
<script src="/Public/Home/js/carousel.js"></script>

</head>

<body>
    <div class="shadeBox" style="display: none;"></div>
    <div id="showCityBox" class="province-switch" style="display: none;">
    </div>

    <div class="headLogin">
        <div class="left changeBan">
            <a href="javascript:;" id="cityChoose" class="region"><?php echo ($city); ?></a>
            <a class="on" href="/index.php/Home/Community/origanizationIndex" target="_blank">社会组织版</a>
            <a href="/index.php/Home/Origanization/communityIndex" target="_blank">社区版</a>
        </div>
        <div class="right person">
            <div class="dropdown pull-right">

                <?php if(($isidentify == 1) and ($code > 0)): ?><a class="myOwnIndex" href="/index.php/Home/Home/displayCommunityHome"><?php echo ($community_name); ?></a><?php endif; ?>

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
                        <a href="/index.php/Home/Community/communityIdentify">认证状态</a>
                    </li>
                    <?php if(($isidentify == 1)): ?><li>
                            <a href="/index.php/Home/Community/personInfo">账号设置</a>
                        </li><?php endif; ?>
                    <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                            <a href="/index.php/Home/Community/myCommunity">我的社区</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Project/communityProjectManger">我的项目<?php if($active >= 1): ?><span class="layui-badge-dot"></span><?php endif; ?></a>
                        </li><?php endif; ?>
                    <li>
                        <a class = "" href="/index.php/Home/Community/send_project">发布项目</a>
                    </li>

                    <li>
                        <a href="/index.php/Home/Community/logout">注销</a>
                    </li>
                </ul>
            </div>


        </div>

    </div>

    <div class="headNavBox">
        <div class="container">
            <div class="top">
                <div class="logo  col-md-6">
                    <img src="/Public/Home/imgs/logo.png" alt="">
                    <span>社居易</span>


                </div>
                <div class="mainNav col-md-6">
                    <div class="search">
                        <input id="searchText" class="form-control" type="text" />
                        <button id="searchAll" type="submit" class="btn btn-default iconfont">&#xe61a;</button>

                    </div>
                </div>

            </div>
        </div>

    </div>


    <!--轮播图-->
    <div class="container">
        <div id="banner1" style="width: 1170px; height: 360px;"></div>
    </div>
    <script>
        window.onload = function() {
            var banner1 = new Carousel();
            //图片地址数组。不要少于三张
            var imgSrcDate = ["/Public/Home/imgs/ban1.png", "/Public/Home/imgs/ban2.png", "/Public/Home/imgs/ban3.png", "/Public/Home/imgs/ban4.png"];
            banner1.init({
                container: "#banner1",
                datas: imgSrcDate,
                autoplaySpeed: 3000,
                autoplay: true
            });


        }
    </script>


    <div class="container house-list">
        <div class="row clearfix  col-md-9">
            <div class="allNavShowBox clearfix">
                <a class="on  all" href="javascript:;" flag="0">全部</a>

                <ul class="nav navbar-nav classNav">
                    <?php if(is_array($service_object)): foreach($service_object as $key=>$vo): ?><li>
                            <a href="javascript:;" flag="<?php echo ($vo['sjy_id']); ?>"><?php echo ($vo['service_object_name']); ?></a>
                        </li><?php endforeach; endif; ?>
                </ul>
                <a href="javascript:;" class="more">更多</a>
            </div>

            <div style="height: 0; clear: both;"></div>
            <ul class="buildImg" id="projectList">

            </ul>

            <div style="text-align: center" id="test1"></div>

        </div>
        <div class="col-md-3 program-box">
            <div class="publish-program">
                <?php if(($isidentify == 1) and ($code > 0)): ?><a class="publish-btn" target='_blank' href="/index.php/Home/Community/send_project">发布项目</a><?php endif; ?>

            </div>


            <div class="programTit">
                <p class="tit-p1">基本信息</p>
            </div>
            <div class="paddingBox">
                <dl>
                    <dt>项目总数</dt>
                    <dd><span><?php echo ($project_num); ?></span> 个</dd>
                </dl>
                <dl>
                    <dt>入驻机构</dt>
                    <dd><span><?php echo ($origanization_num); ?></span> 家</dd>
                </dl>
                <dl>
                    <dt>入驻社区</dt>
                    <dd><span><?php echo ($community_num); ?></span> 家</dd>
                </dl>
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
<script src="/Public/Home/js/cityBoxShow.js"></script>

<script>
    /* 折叠更多哦*/
    var flag = false;

    $(".more").click(function() {
        if (flag) {
            $(".classNav").css({
                "height": "74px",
                "overflow": "hidden"
            });
            flag = false;
        } else {
            $(".classNav").css({
                "height": "auto"
            });
            flag = true;
        }
    });



    /*首次加载*/
    var searchFunc = function(text = '', type = '') {

        var count;
        /*搜索 */



        $.get("/index.php/Home/Search/getCount?type=" + type + "&search_body=" + text, function(data) {
            var html = "";

            count = Number(data);
            // console.log(count + "count");


            // for (var i = 0; i < data.data.length; i++) {
            //     html += '<li>' +
            //         '<a href="/index.php/Home/Project/displayCommunityProject?id=' + data.data[i].sjy_id + '">' +
            //         '<div class="col-md-3 column" >' +
            //         '<img  src="' + data.data[i].project_image_path + '" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">' +
            //         '</div>' +
            //         '<div class="col-md-7 column house-list-info" style="padding-top: 10px;">' +
            //         '<p class = "projectTit">' +
            //         '<span class = "tit">' + data.data[i].sjy_community_project_title + '</span>' +
            //         '</p>' +
            //         '<p class = "where">' +
            //         '<span  class = "sp2 sp">发布方</span><i>|</i>' +
            //         '<span class = "region region1">' + data.data[i].community_info.sjy_community_name + '</span>' +
            //         '</p>' +
            //         '<p class = "where">' +
            //         '<span  class = "sp3 sp">服务对象</span><i>|</i>' +
            //         '<span class = "region">' + data.data[i].sjy_community_project_service_area + '</span>' +
            //         '</p>' +
            //         '<div class = "type">' +
            //         '<span class = "iconfont">&#xe61f;</span>' +
            //         '<span>' + data.data[i].address.sjy_community_province_name + '</span>-<span>' + data.data[i].address.sjy_community_area_name + '</span>-<span>' + data.data[i].address.sjy_community_street_name + '</span>' +
            //         '</div>' +
            //         '</div>' +
            //         '</a>' +
            //         '</li>';


            // }


            // $("#projectList").html(html);


            layui.use('laypage', function() {

                var laypage = layui.laypage;

                //执行一个laypage实例
                laypage.render({
                    elem: 'test1',
                    count: count //数据总数，从服务端得到
                        ,
                    limit: 10,
                    jump: function(obj, first) {
                        //obj包含了当前分页的所有参数，比如：
                        console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                        console.log(obj.limit); //得到每页显示的条数

                        $.get("/index.php/Home/Search/searchCommunityProject?type=" + type + "&search_body=" + text + "&page=" + obj.curr, function(data) {
                            var html = "";

                            for (var i = 0; i < data.data.length; i++) {
                                html += '<li>' +
                                    '<a href="/index.php/Home/Project/displayCommunityProject?id=' + data.data[i].sjy_id + '">' +
                                    '<div class="col-md-3 column" >' +
                                    '<img  src="' + data.data[i].project_image_path + '" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">' +
                                    '</div>' +
                                    '<div class="col-md-7 column house-list-info" style="padding-top: 10px;">' +
                                    '<p class = "projectTit">' +
                                    '<span class = "tit">' + data.data[i].sjy_community_project_title + '</span>' +
                                    '</p>' +
                                    '<p class = "where">' +
                                    '<span  class = "sp2 sp">发布方</span><i>|</i>' +
                                    '<span class = "region region1">' + data.data[i].community_info.sjy_community_name + '</span>' +
                                    '</p>' +
                                    '<p class = "where">' +
                                    '<span  class = "sp3 sp">服务对象</span><i>|</i>' +
                                    '<span class = "region">' + data.data[i].sjy_community_project_service_area + '</span>' +
                                    '</p>' +
                                    '<div class = "type">' +
                                    '<span class = "iconfont">&#xe61f;</span>' +
                                    '<span>' + data.data[i].address.sjy_community_province_name + '</span>-<span>' + data.data[i].address.sjy_community_area_name + '</span>-<span>' + data.data[i].address.sjy_community_street_name + '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>' +
                                    '</li>';


                            }
                            $("#projectList").html(html);

                        });

                        //首次不执行
                        if (!first) {
                            //do something



                        }
                    }
                });

            });


        });

    };

    searchFunc();

    /*搜索 */
    var text = $("#searchText").val();
    var type = "";

    /*为老服务， 司法矫正 等taB 项的切换*/
    $(".classNav > li > a").click(function() {

        type = $(this).attr('flag');
        console.log(type);

        $(".classNav > li > a").removeClass("on");

        $(this).addClass('on');
        search(text, type);

    });


    /*搜索的时候， 请求的接口*/
    var search = function(text = '', type = '') {
        searchFunc(text, type);
        // $.ajax({
        //     url: "/index.php/Home/Search/searchCommunityProject",
        //     type: "GET",
        //     data: {
        //         type: type,
        //         search_body: text
        //     },
        //     dataType: "json",
        //     success: function(data) {

        //         searchFunc();

        //     },
        //     async: false
        // });
        // return false;

    };

    /*按下搜索按钮*/
    $("#searchAll").click(function() {
        text = $("#searchText").val();
        console.log(text);
        $(".classNav > li > a").removeClass("on");
        $('.classNav > li > a:first').addClass('on');
        search(text, 0);

    });





    /*回车也可以了*/

    $("body").keydown(function() {
        if (event.keyCode == "13") {
            $(".classNav > li > a").removeClass("on");
            $(".classNav > li > a:first").addClass('on');
            text = $("#searchText").val();
            search(text, 0);

        }
    });
</script>











</html>