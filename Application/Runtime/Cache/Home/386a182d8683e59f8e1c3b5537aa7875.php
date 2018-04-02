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
    <link rel="stylesheet" href="/Public/Home/css/deliver.css">
    <link rel="stylesheet" href="/Public/Home/css/component.css">
    <link rel="stylesheet" href="/Public/Home/css/layui.css">

    <script src="/Public/Home/js/jquery.page.js"></script>
    <script src="/Public/Home/js/upLoadImg.js"></script>
    <script src="/Public/Home/js/layui.js"></script>




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
                <img src="<?php echo ($user_image); ?>" alt="">
                <span><?php echo ($showname); ?></span>
            </a>
            <?php if($figure == 2): ?><ul class="dropdown-menu personalMenu">
                        <li>
                            <a href="/index.php/Home/Community/communityIdentify">认证状态</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Community/personinfo">账号设置</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Community/mycommunity">我的社区</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Project/communityProjectManger">我的项目</a>
                        </li>
                        <li>
                            <a href="">我的消息</a>
                        </li>

                        <li>
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
                                <a href="/index.php/Home/Project/origanizationProjectManger">我的项目</a>
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
                <div class="logo  col-md-6">
                    <a href='<?php echo ($index); ?>'>
                        <img src="/Public/Home/imgs/logo.png" alt="">
                        <span>社居易</span>
                    </a>
                </div>
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
            <img style="width: 100%;height:  300px;" src="/Public/Home/imgs/zixun1.JPG" alt="">
            <div class="detail-bottom">

                <div class="col-md-8 community-tit">
                    <h3>“志愿青春，成长无虑”如意社区青少年服务项目</h3>
                    <p>致力于服务社区人民的一系活动</p>
                </div>
                <div class="col-md-4">


                </div>

            </div>
        </div>
        <div class="">
            <div class="col-md-8" style="padding: 0;">
                <div class="detail-head">
                    <ul class="detail-nav">
                        <li><a class="nav1 on" href="javascript:;">项目主页</a></li>
                        <li><a class="nav2" id = "viewProgress" href="javascript:;">项目进度</a></li>
                    </ul>
                    <?php if(($figure == 1) and ($project_status == 0)): ?><button type="button" class="layui-btn deliverBox" id="test1">
	                    <i class="layui-icon">&#xe67c;</i>发送项目书
	                    <button id="uploadPDF">上传</button>
                        </button><?php endif; ?>


                    <!--<form class = "deliverForm" action="/index.php/Home/Project/sendProjectBook" enctype="multipart/form-data">

                    <input type = 'hidden' name = 'project_id' value='<?php echo ($id); ?>' />
                    <input class = "deliver-input" type="file" name = "project_id" value = "发送项目书"  accept=".xls,.doc,.docx,.txt,.pdf" >
                    <div class = "deliveryPdf">发送项目书</div>
                    <input type = 'submit' value='提交' />
                </form>-->
                </div>
                <div class="detail-detail">
                    <div class="box box1" style="display: block;">
                        <div class="detail-item">
                            <span class="left">服务领域</span>
                            <p class="left" style="line-height:  30px;">青少年服务、党建服务、社区社工服务</p>
                        </div>

                        <div class="detail-item">
                            <span class="left">项目执行方</span>
                            <p class="left" style="line-height:  30px;">陈迪</p>
                        </div>
                        <div class="detail-item">
                            <span class="left">项目预算</span>
                            <p class="left" style="line-height:  30px;">12万</p>
                        </div>
                        <div class="detail-item">
                            <span class="left">项目周期</span>
                            <p class="left" style="line-height:  30px;">2017.07.11-2017.12.15</p>
                        </div>
                        <div class="detail-item">
                            <span class="left">征集周期</span>
                            <p class="left" style="line-height:  30px;">2017.07.11-2017.12.15</p>
                        </div>
                        <div class="detail-item">
                            <span class="left">项目内容</span>
                            <p class="left" style="line-height:  30px;">如意社区青少年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少 年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少如意社区青少年服务项目如意社区青少年服务项目 年服务项目如意社区青少年服务项目如意社区青少年服务项目
                            </p>
                        </div>

                        <div class="detail-item">
                            <span class="left">项目图片</span>
                            <p><img class="orDetail-img" src="/Public/Home/imgs/or-detail.jpg" alt=""></p>
                        </div>
                    </div>

                    <div class="box box2" style="display: none;">
                        <div>
                            <img style="width: 100%;" src="/Public/Home/imgs/building.png" alt="">
                        </div>
                        <div>
                            <ul class="cbp_tmtimeline">

                                <li>

                                    <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>4/10/13</span> <span>18:30</span></time>

                                    <div class="cbp_tmicon cbp_tmicon-phone"></div>

                                    <div class="cbp_tmlabel">

                                        <h2>Ricebean black-eyed pea</h2>

                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean black-eyed pea maize eggplant.
                                            Cabbage lentil cucumber chickpea sorrel gram garbanzo plantain lotus root bok choy squash cress potato summer purslane salsify fennel horseradish dulse. Winter purslane garbanzo artichoke broccoli lentil corn
                                            okra silver beet celery quandong. Plantain salad beetroot bunya nuts black-eyed pea collard greens radish water spinach gourd chicory prairie turnip avocado sierra leone bologi.</p>

                                    </div>

                                </li>


                            </ul>

                        </div>


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

    var project_id;


    $.post("/index.php/Home/Project/getCommunityProject/id/<?php echo ($id); ?>", function(data) {
        project_id = data.sjy_id;

        var tit = "";
        tit += '<h3>' + data.sjy_community_project_title + '</h3>';

        $(".community-tit").html(tit);

        var html = "";
        console.log(data);
        html += '<div class = "detail-item">' +
            '<span class = "left">发布社区</span>' +
            '<p class = "left" style = "line-height:  30px;">' +
            '<a href="/index.php/Home/Home/displayCommunityHome/id/' + data.sjy_community_id + '">' + data.sjy_community_name + '</a></p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span class = "left">服务领域</span>' +
            '<p class = "left" style = "line-height:  30px;">' + data.sjy_community_project_service_area + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">项目执行方</span>' +
            '<a href="/index.php/Home/Home/displayOriganizationHome/id/'+data.sjy_community_project_origanization+'">' + data.sjy_community_project_origanization_name + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">项目预算</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.sjy_community_project_plan_money + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">项目周期</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.sjy_community_project_start_time + '-' + data.sjy_community_project_end_time + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">征集周期</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.sjy_community_project_collect_start_time + '-' + data.sjy_community_project_collect_end_time + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">项目内容</span>' +
            '<p  class = "left" style = "line-height:  30px;">' + data.sjy_community_project_demand + '</p>' +
            '</div>' +
            '<div class = "detail-item">' +
            '<span  class = "left">项目图片</span>';

        console.log(data.project_image.length);

        for (var i = 0; i < data.project_image.length; i++) {
            html += '<p><img class = "orDetail-img" src="' + data.project_image[i].sjy_community_project_image + '" alt=""></p>';
        }
        html += '</div>';

        $(".box1").html(html);

    });

    layui.use('upload', function() {

        var upload = layui.upload;
        //执行实例
        var uploadPdf = upload.render({
            elem: '#test1', //绑定元素
            auto: false,
            bindAction: '#uploadPDF',
            url: "/index.php/Home/Project/sendProjectBook/project_id/<?php echo ($id); ?>",
            exts: 'pdf|doc|docx',
            done: function(res) {
                //上传完毕回调
                if (res.state == 1) {
                    layer.msg("发送成功");
                }
            },
            error: function() {
                //请求异常回调
            }
        });


    });



    /*进度查看*/

    $("#viewProgress").one("click", function () {
        $.get("/index.php/Home/Project/projectRate?project_id=" + project_id, function (data) {

            var html = '';

            for(var i = 0; i < data.length; i++){

                html += '<li>' +
                        '<time class="cbp_tmtime" datetime=""><span>'+ data[i].create_time.split(" ", 1) +'</span><span>'+ data[i].create_time.substring(10, 16)  + '</span></time>' +
                        '<div class="cbp_tmicon cbp_tmicon-phone">新</div>' +
                        '<div class="cbp_tmlabel">' +
                        '<h2>'+ data[i].sjy_projectrate_title +'</h2>' +
                        '<p>'+ data[i].sjy_project_rate_con +'</p>' +
                        '<div class="tm-m-photos">' +
                        '<ul class="tm-m-photos-thumb">';




                console.log( data[i].sjy_project_rate_image  );

                var imgString = data[i].sjy_project_rate_image;
                var imgArr = imgString.split("||");




                console.log(imgArr );
                console.log(imgArr.length );
                console.log(imgArr[0] );

                for( var j = 0; j < imgArr.length ; j ++ ) {


                    html +=  '<li  class = "scaleImg">\n' +
                            '<img src="http://p33g9t7dr.bkt.clouddn.com/'+ imgArr[j]+'?imageslim">\n' +
                            '<b class="tm-photos-arrow"></b>\n' +
                            '</li>';
                }

                html +=   '</ul>' +
                        '</div>' +'</div>'+
                        '</li>';


            }

            $(".cbp_tmtimeline").html(html);

            layer.photos({
                photos: '.scaleImg'
                ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
            });

        })
    });
















</script>