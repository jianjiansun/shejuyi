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
<div class="banner" style="height: 420px;">
    <img src="/Public/Home/imgs/banner.jpg" alt="" style="height: 420px;">
</div>

<div class = "headNavBox">
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
                <li>
                    <a class = "" href="">我的机构</a>
                </li>
                <li>
                    <a class = "" href="">我的项目</a>
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
            </li>


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
</html>