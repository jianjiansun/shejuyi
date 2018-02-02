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
</head>
<body>
<div class="shadeBox"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>

<div class = "headLogin">
    <div class = "left changeBan">
        <a href = "javascript:;" id = "cityChoose" class = "region"><?php echo ($city); ?></a>
        <a href="">社会组织版</a>
        <a class = "on" href="">社区版</a>
    </div>
    <div class="right person">
        <div class="dropdown pull-right">

            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <img src="<?php echo ($user_image); ?>" alt="">
                <span><?php echo ($showname); ?></span>
            </a>
            <ul class="dropdown-menu personalMenu">
                <li>
                    <a href="/index.php/Home/Community/communityIdentify">认证状态</a>
                </li>
                <li>
                    <a href="/index.php/Home/Community/personinfo">账号设置</a>
                </li>
                <li>
                    <a href="/index.php/Home/Community/mycommunity">我的机构</a>
                </li>
                <li>
                    <a href="personal4.html">我的项目</a>
                </li>
                <li>
                    <a href="">我的消息</a>
                </li>

                <li>
                    <a href="/index.php/Home/Community/logout">注销</a>
                </li>
            </ul>
        </div>


    </div>

</div>

<!--<div class = "headNavBox">
    <div class = "container">
        <div class = "top">
            <div class = "logo  col-md-7">
                <img src="/Public/Home/imgs/logo.png" alt="">
                <span>社居易</span>
            </div>
            <ul class = "mainNav col-md-5">
                <li>
                    <a class = "" href="/index.php/Home/Community/send_project">发布项目</a>
                </li>
            </ul>
        </div>
    </div>
    <div class = "container">
        <div class = "search">
            <input class="form-control" type="text" />
            <button type="submit" class="btn btn-default">在线搜索</button>
        </div>
    </div>
</div>-->
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
            <!-- <li>
                <div class="col-md-4 column" >
                    <img  src="/Public/Home/imgs/she.jpg" alt="" style = "height: 200px;width: 200px;border: 1px solid #cccccc;">
                </div>
                <div class="col-md-6 column house-list-info" style="padding-top: 56px;">
                    <p class = "where">
                        <span class = "region region1">社居易社会组织</span>
                    </p>
                    <p class = "where">
                        <span  class = "sp3 sp">服务领域</span>
                        <span class = "region">青少年</span>
                    </p>
                    <div class = "type">
                        <span class = "iconfont">&#xe61f;</span>
                        <span>北京市</span>-<span>通州区</span>-<span>永顺</span>
                    </div>
                </div>
                <div class="col-md-2 column house-list-price">
                    <div class = "price">
                        <a class= "detailBtn" href="">了解详情</a>
                        <a class= "detailBtn" href="">联系项目</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-4 column" >
                    <img  src="/Public/Home/imgs/qimingxing.png" alt="" style = "height: 200px;width: 200px;border: 1px solid #cccccc;">
                </div>
                <div class="col-md-6 column house-list-info" style="padding-top: 56px;">
                    <p class = "where">
                        <span class = "region region1">启明星社会组织</span>
                    </p>
                    <p class = "where">
                        <span  class = "sp3 sp">服务领域</span>
                        <span class = "region">失业人员</span>
                    </p>
                    <div class = "type">
                        <span class = "iconfont">&#xe61f;</span>
                        <span>北京市</span>-<span>通州区</span>-<span>永顺</span>
                    </div>
                </div>
                <div class="col-md-2 column house-list-price">
                    <div class = "price">
                        <a class= "detailBtn" href="">了解详情</a>
                        <a class= "detailBtn" href="">联系项目</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-4 column" >
                    <img  src="/Public/Home/imgs/lvnong.png" alt="" style = "height: 200px;width: 200px;border: 1px solid #cccccc;">
                </div>
                <div class="col-md-6 column house-list-info" style="padding-top: 56px;">
                    <p class = "where">
                        <span class = "region region1">绿农社会组织</span>
                    </p>
                    <p class = "where">
                        <span  class = "sp3 sp">服务领域</span>
                        <span class = "region">失业人员</span>
                    </p>
                    <div class = "type">
                        <span class = "iconfont">&#xe61f;</span>
                        <span>北京市</span>-<span>通州区</span>-<span>永顺</span>
                    </div>
                </div>
                <div class="col-md-2 column house-list-price">
                    <div class = "price">
                        <a class= "detailBtn" href="">了解详情</a>
                        <a class= "detailBtn" href="">联系项目</a>
                    </div>
                </div>
            </li> -->


        </ul>

        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li class="disabled"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>

    </div>
    <div class = "col-md-3 program-box">
        <div  class= "publish-program">
            <a class= "publish-btn" href="/index.php/Home/Community/send_project">发布项目</a>
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

<script>

    $.post("/index.php/Home/Community/getoriganizationlist/page/1", function (data) {
        var html = "";
        console.log(data.data[0]);
         for(var i = 0; i < data.data.length ; i ++) {
            var href = '/index.php/Home/Home/displayOriganizationHome/id/'+data.data[i].sjy_id;


             html+=  '<li>' +
                     '<a href="'+href+'">'+
                     '<div class="col-md-3 column" >' +
                     '<img  src="'+data.data[i].sjy_origanization_logo_img_path+'" alt="" style = "height: 140px;width: 190px;border: 1px solid #cccccc;">' +
                     '</div>' +
                     '<div class="col-md-7 column house-list-info" style="padding-top: 10px;">' +
                     '<p class = "projectTit">' +
                     '<span class = "tit">'+data.data[i].sjy_origanization_name+'</span>' +
                     '</p>' +
                     '<p class = "where">' +
                     '<span  class = "sp2 sp">发布方</span><i>|</i>' +
                     '<span class = "region region1">'+data.data[i].sjy_origanization_type_name+'</span>' +
                     '</p>' +
                     '<p class = "where">' +
                     '<span  class = "sp3 sp">服务对象</span><i>|</i>' +
                     '<span class = "region">'+  data.data[i].sjy_origanization_project_service_area +'</span>' +
                     '</p>' +
                     '<div class = "type">' +
                     '<span class = "iconfont">&#xe61f;</span>' +
                     '<span>'+data.data[i].address.sjy_origanization_city_name+'</span>-<span>'+data.data[i].address.sjy_origanization_area_name+'</span>-<span>'+  data.data[i].address.sjy_origanization_street_name +'</span>' +
                     '</div>' +
                     '</div>' +
                     '</a>'+
                     '</li>';



         }
        $("#projectList").html(html);

     });



</script>


</html>