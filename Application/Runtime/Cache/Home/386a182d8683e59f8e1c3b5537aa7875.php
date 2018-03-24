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

<head>
    <link rel="stylesheet" href="/Public/Home/css/region.css">
    <link rel="stylesheet" href="/Public/Home/css/testfy.css">
    <link rel="stylesheet" href="/Public/Home/css/chooseCity.css">
    <link rel="stylesheet" href="/Public/Home/css/page2.css">
    <link rel="stylesheet" href="/Public/Home/css/detail.css">
    <link rel="stylesheet" href="/Public/Home/css/deliver.css">
    <link rel="stylesheet" href="/Public/Home/css/component.css">
    <link rel="stylesheet" href="/Public/Home/css/layui.css">

    <script src = "/Public/Home/js/jquery.page.js"></script>
    <script src = "/Public/Home/js/upLoadImg.js"></script>
    <script src = "/Public/Home/js/layui.js"></script>




</head>
<body>
<div class="shadeBox"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>
<div class = "headLogin">
    <div class = "container">
        <div class = "left changeBan">
            <a href = "javascript:;" id = "cityChoose" class = "region"><?php echo ($city); ?></a>
            <a class = "on"  href="">社会组织版</a>
            <a href="">社区版</a>
        </div>
        <div class="right person">
            <img src="<?php echo ($user_image); ?>" alt="">
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
        <img style = "width: 100%;height:  300px;" src="/Public/Home/imgs/zixun1.JPG" alt="">
        <div class = "detail-bottom">

            <div class = "col-md-8 community-tit">
                <h3>“志愿青春，成长无虑”如意社区青少年服务项目</h3>
                <p>致力于服务社区人民的一系活动</p>
            </div>
            <div class = "col-md-4" >


            </div>

        </div>
    </div>
    <div class="">
        <div class = "col-md-8" style="padding: 0;">
            <div class = "detail-head">
                <ul class = "detail-nav">
                    <li><a class = "nav1 on" href="javascript:;">项目主页</a></li>
                    <li><a class = "nav2" href="javascript:;">项目进度</a></li>
                </ul>
				<?php if($figure == 1): ?><button type="button" class="layui-btn deliverBox" id="test1">
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
            <div class = "detail-detail">
                 <div class = "box box1" style = "display: block;">
                     <div class = "detail-item">
                         <span class = "left">服务领域</span>
                         <p class = "left" style = "line-height:  30px;">青少年服务、党建服务、社区社工服务</p>
                     </div>

                     <div class = "detail-item">
                         <span  class = "left">项目执行方</span>
                         <p class = "left" style = "line-height:  30px;">陈迪</p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">项目预算</span>
                         <p  class = "left" style = "line-height:  30px;">12万</p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">项目周期</span>
                         <p  class = "left" style = "line-height:  30px;">2017.07.11-2017.12.15</p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">征集周期</span>
                         <p  class = "left" style = "line-height:  30px;">2017.07.11-2017.12.15</p>
                     </div>
                     <div class = "detail-item">
                         <span  class = "left">项目内容</span>
                         <p  class = "left" style = "line-height:  30px;">如意社区青少年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少
                             年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少年服务项目如意社区青少如意社区青少年服务项目如意社区青少年服务项目
                             年服务项目如意社区青少年服务项目如意社区青少年服务项目</p>
                     </div>

                     <div class = "detail-item">
                         <span  class = "left">项目图片</span>
                         <p><img class = "orDetail-img" src="/Public/Home/imgs/or-detail.jpg" alt=""></p>
                     </div>
                 </div>

                <div class = "box box2" style = "display: none;" >
                    <div>
                        <img style = "width: 100%;" src="/Public/Home/imgs/building.png" alt="">
                    </div>
                    <div>
                        <ul class="cbp_tmtimeline">

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>4/10/13</span> <span>18:30</span></time>

                                <div class="cbp_tmicon cbp_tmicon-phone"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Ricebean black-eyed pea</h2>

                                    <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean black-eyed pea maize eggplant. Cabbage lentil cucumber chickpea sorrel gram garbanzo plantain lotus root bok choy squash cress potato summer purslane salsify fennel horseradish dulse. Winter purslane garbanzo artichoke broccoli lentil corn okra silver beet celery quandong. Plantain salad beetroot bunya nuts black-eyed pea collard greens radish water spinach gourd chicory prairie turnip avocado sierra leone bologi.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-11T12:04"><span>4/11/13</span> <span>12:04</span></time>

                                <div class="cbp_tmicon cbp_tmicon-screen"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Greens radish arugula</h2>

                                    <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-13 05:36"><span>4/13/13</span> <span>05:36</span></time>

                                <div class="cbp_tmicon cbp_tmicon-mail"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Sprout garlic kohlrabi</h2>

                                    <p>Parsnip lotus root celery yarrow seakale tomato collard greens tigernut epazote ricebean melon tomatillo soybean chicory broccoli beet greens peanut salad. Lotus root burdock bell pepper chickweed shallot groundnut pea sprouts welsh onion wattle seed pea salsify turnip scallion peanut arugula bamboo shoot onion swiss chard. Avocado tomato peanut soko amaranth grape fennel chickweed mung bean soybean endive squash beet greens carrot chicory green bean. Tigernut dandelion sea lettuce garlic daikon courgette celery maize parsley komatsuna black-eyed pea bell pepper aubergine cauliflower zucchini. Quandong pea chickweed tomatillo quandong cauliflower spinach water spinach.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-15 13:15"><span>4/15/13</span> <span>13:15</span></time>

                                <div class="cbp_tmicon cbp_tmicon-phone"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Watercress ricebean</h2>

                                    <p>Peanut gourd nori welsh onion rock melon mustard jícama. Desert raisin amaranth kombu aubergine kale seakale brussels sprout pea. Black-eyed pea celtuce bamboo shoot salad kohlrabi leek squash prairie turnip catsear rock melon chard taro broccoli turnip greens. Fennel quandong potato watercress ricebean swiss chard garbanzo. Endive daikon brussels sprout lotus root silver beet epazote melon shallot.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-16 21:30"><span>4/16/13</span> <span>21:30</span></time>

                                <div class="cbp_tmicon cbp_tmicon-earth"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Courgette daikon</h2>

                                    <p>Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jícama bell pepper carrot onion corn plantain garbanzo. Sierra leone bologi komatsuna celery peanut swiss chard silver beet squash dandelion maize chicory burdock tatsoi dulse radish wakame beetroot.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-17 12:11"><span>4/17/13</span> <span>12:11</span></time>

                                <div class="cbp_tmicon cbp_tmicon-screen"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Greens radish arugula</h2>

                                    <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>

                                </div>

                            </li>

                            <li>

                                <time class="cbp_tmtime" datetime="2013-04-18 09:56"><span>4/18/13</span> <span>09:56</span></time>

                                <div class="cbp_tmicon cbp_tmicon-phone"></div>

                                <div class="cbp_tmlabel">

                                    <h2>Sprout garlic kohlrabi</h2>

                                    <p>Parsnip lotus root celery yarrow seakale tomato collard greens tigernut epazote ricebean melon tomatillo soybean chicory broccoli beet greens peanut salad. Lotus root burdock bell pepper chickweed shallot groundnut pea sprouts welsh onion wattle seed pea salsify turnip scallion peanut arugula bamboo shoot onion swiss chard. Avocado tomato peanut soko amaranth grape fennel chickweed mung bean soybean endive squash beet greens carrot chicory green bean. Tigernut dandelion sea lettuce garlic daikon courgette celery maize parsley komatsuna black-eyed pea bell pepper aubergine cauliflower zucchini. Quandong pea chickweed tomatillo quandong cauliflower spinach water spinach.</p>

                                </div>

                            </li>

                        </ul>

                    </div>


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

    var project_id;


    $.post("/index.php/Home/Project/getCommunityProject/id/<?php echo ($id); ?>", function (data) {
        project_id = data.sjy_id;

        var tit  = "";
        tit += '<h3>'+ data.sjy_community_project_title +'</h3>';

        $(".community-tit").html(tit);

        var html = "";
        console.log(data);
        html += '<div class = "detail-item">' +
                '<span class = "left">发布社区</span>' +
                '<p class = "left" style = "line-height:  30px;">'+
                '<a href="/index.php/Home/Home/displayCommunityHome/id/'+data.sjy_community_id+'">'+data.sjy_community_name +'</a></p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span class = "left">服务领域</span>' +
                '<p class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_service_area +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">项目执行方</span>' +
                '<p class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_origanization_name +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">项目预算</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_plan_money +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">项目周期</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_start_time + '-' + data.sjy_community_project_end_time+'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">征集周期</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_collect_start_time + '-' + data.sjy_community_project_collect_end_time  +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">项目内容</span>' +
                '<p  class = "left" style = "line-height:  30px;">'+ data.sjy_community_project_demand +'</p>' +
                '</div>' +
                '<div class = "detail-item">' +
                '<span  class = "left">项目图片</span>' ;

                console.log(data.project_image.length);

                for( var i = 0; i < data.project_image.length; i ++ ){
                    html += '<p><img class = "orDetail-img" src="'+ data.project_image[i].sjy_community_project_image +'" alt=""></p>' ;
                }
                html +=  '</div>';

        $(".box1").html(html);

    });

    layui.use('upload', function(){

        var upload = layui.upload;

        //执行实例
        var uploadPdf = upload.render({
            elem: '#test1' //绑定元素
            ,auto: false
            ,bindAction: '#uploadPDF'
            ,url:"/index.php/Home/Project/sendProjectBook/project_id/<?php echo ($id); ?>"
            ,exts: 'pdf|doc|docx'
            ,done: function(res){
                //上传完毕回调
                if(res.state == 1)
                {
                    layer.msg("发送成功");
                }
            }
            ,error: function(){
                //请求异常回调
            }
        });


    });













</script>