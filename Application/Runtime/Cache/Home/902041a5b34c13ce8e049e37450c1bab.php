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
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/layui.css">
<script src="/Public/Home/js/layui.js"></script>
</head>

<body>
<div class="shadeBox" style = "display: none;"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>

<div class = "headLogin">
    <div class = "left changeBan">
        <a href = "javascript:;" id = "cityChoose" class = "region"><?php echo ($city); ?></a>
        <a class = "on"  href="">社会组织版</a>
        <a href="">社区版</a>
    </div>

    <div class="right person">
        <div class="dropdown pull-right">
            <?php if(($isidentify == 1) and ($code > 0)): ?><a class = "myOwnIndex" href="/index.php/Home/Home/displayOriganizationHome">社会组织主页</a><?php endif; ?>
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <div class = "user-img" style = "display: inline-block">

                    <img src="<?php echo ($user_image); ?>" alt="">
                    <span class = "iconfont VIP-icon" style = "right: -20px;">&#xe65b;</span>
                </div>


                <span><?php echo ($showname); if($active >= 1): ?><span class="layui-badge-dot"></span><?php endif; ?></span>
            </a>
            <ul class="dropdown-menu personalMenu">
                <li>
                    <a href="/index.php/Home/Origanization/origanizationIdentify">认证状态</a>
                </li>
                <?php if(($isidentify == 1)): ?><li>
                        <a href="/index.php/Home/Origanization/personinfo">账号设置</a>
                    </li><?php endif; ?>
                 <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                        <a href="/index.php/Home/Origanization/myoriganization">我的机构</a>
                    </li>
                    <li>
                        <a href="/index.php/Home/Project/origanizationProjectManger">我的项目<?php if($active >= 1): ?><span class="layui-badge-dot"></span><?php endif; ?></a>
                    </li>
                    <li>
                        <a href="/index.php/Home/Home/diaplayOriganizationHome">机构主页</a>
                    </li><?php endif; ?>
                <li>
                    <a href="/index.php/Home/Origanization/logout">注销</a>
                </li>
            </ul>
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


<!--轮播图-->


<div class="container">
    <div id="ifocus">
        <div id="ifocus_pic">
            <div id="ifocus_piclist" style="left:0; top:0;">
                <ul>
                    <li><a href="#"><img src="/Public/Home/imgs/zixun1.JPG" alt="" /></a></li>
                    <li><a href="#"><img src="/Public/Home/imgs/zixun2.JPG" alt="" /></a></li>
                    <li><a href="#"><img src="/Public/Home/imgs/zixun3.jpg" alt="" /></a></li>
                </ul>
            </div>
            <div id="ifocus_opdiv"></div>
            <div id="ifocus_tx">
                <ul>
                    <li class="current">忧伤在我心中沉静下来，宛如降临在寂静山林中的夜色</li>
                    <li class="normal">我就像一只停泊在海滩上的小船，聆听着晚潮奏</li>
                    <li class="normal">生命是上天赋予的，我们惟有献出生命，才能真正得到它</li>
                </ul>
            </div>
        </div>
        <div id="ifocus_btn">
            <ul>
                <li class="current"><img src="/Public/Home/imgs/zixun1.JPG" alt="" /></li>
                <li class="normal"><img src="/Public/Home/imgs/zixun2.JPG" alt="" /></li>
                <li class="normal"><img src="/Public/Home/imgs/zixun3.jpg" alt="" /></li>
            </ul>
        </div>
    </div>

</div>




<div class="container house-list">
    <div class="row clearfix  col-md-9">
        <ul class="nav navbar-nav classNav">
            <li class="active">
                <a href="">为老服务</a>
            </li>
            <li>
                <a href="">青少年服务</a>
            </li>
            <li>
                <a href="">医务服务</a>
            </li>
            <li>
                <a href="">司法矫正</a>
            </li>
            <li>
                <a href="">心理服务</a>
            </li>
            <li>
                <a href="">社区服务</a>
            </li>
            <li>
                <a href="">党建</a>
            </li>
        </ul>
        <div style="height: 0; clear: both;"></div>
        <ul class = "buildImg" id = "projectList">


            <li>
                <div class="col-md-3 column" >
                    <img  src="/Public/Home/imgs/shequ2.jpg" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">
                </div>
                <div class="col-md-7 column house-list-info" style="padding-top: 10px;">
                    <p class = "projectTit">
                        <span class = "tit">夕阳红社区养老服务</span>
                    </p>
                    <p class = "where">
                        <span  class = "sp2 sp">发布方</span><i>|</i>
                        <span class = "region region1">社居易社会组织</span>
                    </p>
                    <p class = "where">
                        <span  class = "sp3 sp">服务领域</span><i>|</i>
                        <span class = "region">青少年</span>
                    </p>
                    <div class = "type">
                        <span class = "iconfont">&#xe61f;</span>
                        <span>北京市</span>-<span>通州区</span>-<span>永顺</span>
                    </div>

                </div>
            </li>
        </ul>

        <div style="text-align: center" id="test1"></div>

    </div>
    <div class = "col-md-3 program-box">
        <div  class= "publish-program">
            <?php if(($isidentify == 1) and ($code > 0)): ?><a class= "publish-btn" href="/index.php/Home/Origanization/send_project">发布项目</a><?php endif; ?>

        </div>
        
        
        <div class= "programTit">
            <p class = "tit-p1">基本信息</p>
        </div>
        <div class = "paddingBox">
            <dl>
                <dt>项目总数</dt>
                <dd><span>12333</span> 个</dd>
            </dl>
            <dl>
                <dt>入驻机构</dt>
                <dd><span>123</span> 家</dd>
            </dl>
            <dl>
                <dt>入驻社区</dt>
                <dd><span>12344</span> 家</dd>
            </dl>
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

<!-- 因为这个插件， 所以就不可以出来那个地址选择了 -->
<!--<script src = "../js/slider.js"></script>-->
<script>

    /*分页*/
    var count;

    $.post("/index.php/Home/Origanization/getprojectlist/page/1", function (data) {
        var html = "";

         count = Number(data.count);
        console.log(count + "count");


        for(var i = 0; i < data.data.length ; i ++) {
            html+=  '<li>' +
                    '<a href="/index.php/Home/Project/displayCommunityProject?id='+data.data[i].sjy_id+'">'+
                    '<div class="col-md-3 column" >' +
                    '<img  src="'+ data.data[i].project_image_path +'" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">' +
                    '</div>' +
                    '<div class="col-md-7 column house-list-info" style="padding-top: 10px;">' +
                    '<p class = "projectTit">' +
                    '<span class = "tit">'+ data.data[i].sjy_community_project_title +'</span>' +
                    '</p>' +
                    '<p class = "where">' +
                    '<span  class = "sp2 sp">发布方</span><i>|</i>' +
                    '<span class = "region region1">'+  data.data[i].community_info.sjy_community_name +'</span>' +
                    '</p>' +
                    '<p class = "where">' +
                    '<span  class = "sp3 sp">服务对象</span><i>|</i>' +
                    '<span class = "region">'+  data.data[i].sjy_community_project_service_area +'</span>' +
                    '</p>' +
                    '<div class = "type">' +
                    '<span class = "iconfont">&#xe61f;</span>' +
                    '<span>'+  data.data[i].address.sjy_community_province_name +'</span>-<span>'+  data.data[i].address.sjy_community_area_name +'</span>-<span>'+  data.data[i].address.sjy_community_street_name +'</span>' +
                    '</div>' +
                    '</div>' +
                    '</a>'+
                    '</li>';


        }


        $("#projectList").html(html);


        layui.use('laypage', function(){

            var laypage = layui.laypage;

            //执行一个laypage实例
            laypage.render({
                elem: 'test1'
                ,count: count//数据总数，从服务端得到
                ,limit: 10
                ,jump: function(obj, first){
                    //obj包含了当前分页的所有参数，比如：
                    console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                    console.log(obj.limit); //得到每页显示的条数

                    $.post("/index.php/Home/Origanization/getprojectlist/page/"+ obj.curr, function (data) {
                        var html = "";

                        for(var i = 0; i < data.data.length ; i ++) {
                            html+=  '<li>' +
                                    '<a href="/index.php/Home/Project/displayCommunityProject?id='+data.data[i].sjy_id+'">'+
                                    '<div class="col-md-3 column" >' +
                                    '<img  src="'+ data.data[i].project_image_path +'" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">' +
                                    '</div>' +
                                    '<div class="col-md-7 column house-list-info" style="padding-top: 10px;">' +
                                    '<p class = "projectTit">' +
                                    '<span class = "tit">'+ data.data[i].sjy_community_project_title +'</span>' +
                                    '</p>' +
                                    '<p class = "where">' +
                                    '<span  class = "sp2 sp">发布方</span><i>|</i>' +
                                    '<span class = "region region1">'+  data.data[i].community_info.sjy_community_name +'</span>' +
                                    '</p>' +
                                    '<p class = "where">' +
                                    '<span  class = "sp3 sp">服务对象</span><i>|</i>' +
                                    '<span class = "region">'+  data.data[i].sjy_community_project_service_area +'</span>' +
                                    '</p>' +
                                    '<div class = "type">' +
                                    '<span class = "iconfont">&#xe61f;</span>' +
                                    '<span>'+  data.data[i].address.sjy_community_province_name +'</span>-<span>'+  data.data[i].address.sjy_community_area_name +'</span>-<span>'+  data.data[i].address.sjy_community_street_name +'</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>'+
                                    '</li>';


                        }
                        $("#projectList").html(html);

                    });


                    //首次不执行
                    if(!first){
                        //do something



                    }
                }
            });

        });

    });










</script>











</html>