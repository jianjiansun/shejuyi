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


<div class = "cityShow">
    <span class = "closeCityBox"></span>
    <div class = "title">
        <h2 class = "left">选择城市</h2>
        <div class = "right cityItem">
            <span class = "hotCity"> 热门城市 : </span>
            <a href="javascript:;" data-id = "110000">北京</a>
            <a href="javascript:;">上海</a>
            <a href="javascript:;" data-id = "120000">天津</a>
            <a href="javascript:;">杭州</a>
        </div>
    </div>
    <div class = "title-line">
    </div>
    <div class = "city-main" >
        <div class = "citys-l left">
            <ul>
                <li>
                    <span class = "letterItem">B</span>
                    <div class = "cityItem">
                        <a href="javascript:;" data-id = "110000">北京</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">C</span>
                    <div class = "cityItem">
                        <a href="javascript:;">成都</a>
                        <a href="javascript:;">重庆</a>
                        <a href="javascript:;">长沙</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">D</span>
                    <div class = "cityItem">
                        <a href="javascript:;">大连</a>
                        <a href="javascript:;">东莞</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">F</span>
                    <div class = "cityItem">
                        <a href="javascript:;">佛山</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">G</span>
                    <div class = "cityItem">
                        <a href="javascript:;">广州</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">H</span>
                    <div class = "cityItem">
                        <a href="javascript:;">杭州</a>
                        <a href="javascript:;">合肥</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">J</span>
                    <div class = "cityItem">
                        <a href="javascript:;">济南</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">L</span>
                    <div class = "cityItem">
                        <a href="javascript:;">廊坊</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class = "citys-r right">
            <ul>
                <li>
                    <span class = "letterItem">N</span>
                    <div class = "cityItem">
                        <a href="javascript:;">南京</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">Q</span>
                    <div class = "cityItem">
                        <a href="javascript:;">青岛</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">S</span>
                    <div class = "cityItem">
                        <a href="javascript:;">上海</a>
                        <a href="javascript:;">深圳</a>
                        <a href="javascript:;">苏州</a>
                        <a href="javascript:;">石家庄</a>
                        <a href="javascript:;">沈阳</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">T</span>
                    <div class = "cityItem">
                        <a href="javascript:;" data-id = "120000">天津</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">W</span>
                    <div class = "cityItem">
                        <a href="javascript:;">武汉</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">X</span>
                    <div class = "cityItem">
                        <a href="javascript:;">厦门</a>
                        <a href="javascript:;">西安</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">Y</span>
                    <div class = "cityItem">
                        <a href="javascript:;">烟台</a>
                    </div>
                </li>
                <li>
                    <span class = "letterItem">Z</span>
                    <div class = "cityItem">
                        <a href="javascript:;">中山</a>
                        <a href="javascript:;">珠海</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</div>

<script>
    $(".closeCityBox").click(function(){
        $(".shadeBox").css("display", "none");
        $("#showCityBox").css("display", "none");

    });

    $(".province-switch .cityShow a").click(function(){
        //console.log("ok");
        var txt = $(this).html();

       var cityid = $(this).attr("data-id");
        //console.log(cityid);

        sessionStorage.setItem("city", txt);

        $("#cityChoose").html(txt);

        $(".shadeBox").css("display", "none");
        $("#showCityBox").css("display", "none");


        $.ajax({
            url: "/index.php/Home/Community/setcity",
            type: "POST",
            data: {
                cityid : cityid
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.state == 1)
                {
                    window.location.reload(true)
                }
            },
            async:false
        });
        return false;



    });









</script>