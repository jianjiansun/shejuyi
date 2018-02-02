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
    <link rel="stylesheet" href="/Public/Home/css/layui.css">
    <link rel="stylesheet" href="/Public/Home/css/page2.css">

    <script src = "/Public/Home/js/layui.all.js"></script>

    <script src="/Public/Home/js/plugins/cover_js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/hammer.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Home/js/plugins/cover_js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<div class = "headLogin">
    <div class = "container">
        <div class = "left changeBan logoPer">
            <img src="/Public/Home/imgs/logo.png" alt="">
            <span>社居易</span>
        </div>
        <div class="right person">
           <!-- <img src="/Public/Home/imgs/personDl.jpg" alt="">-->
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
                        <img id = "userImg" src="<?php echo ($user_image); ?>" alt="  ">
                        <!--用户图片更换-->
                        <div class = "cropImgBox"  ontouchstart="">
                            <div class="cover-wrap">
                                <div class="coverBox" >
                                    <div id="clipArea" ></div>
                                    <div class="clipBtn">
                                        <button id="clipBtn">确定</button>
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
                            <a href="/index.php/Home/Community/communityIdentify">认证状态</a>
                        </li>

                        <li>
                            <a class = "on" href="/index.php/Home/Community/personInfo">账号设置</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Community/myCommunity">我的社区</a>
                        </li>
                        <li>
                            <a href="personal4.html">我的项目</a>
                        </li>
                        <li>
                            <a href="">我的消息</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 column perperson-con" style = "background: #FFFFFF;">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"  lay-id="a">账号信息</li>
                        </ul>

                        <div class="layui-tab-content" style = "min-height: 556px;">
                            <div class="layui-tab-item layui-show">
                                <div style = "height:  30px;"></div>
                                <form class="layui-form  personal-information" action="">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">姓名</label>
                                        <div class="layui-input-block">
                                            <input name="realname" value="" disabled="disabled" class="layui-input" type="text">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">手机号</label>
                                        <div class="layui-input-block">
                                            <input name="phone" value="" disabled="disabled" class="layui-input testPhoneNum" type="text">
                                            <a class="iconfont" >&#xe600;</a>
                                            <div class="id-remider">
                                                <p class = "remider"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">微信号</label>
                                        <div class="layui-input-block">
                                            <input name="wechat" value="" disabled="disabled" class="layui-input" type="text">
                                            <a class="iconfont" >&#xe600;</a>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">邮箱</label>
                                        <div class="layui-input-block">
                                            <input name="email" value="" disabled="disabled" class="layui-input testMailBox" type="text">
                                            <a class="iconfont">&#xe600;</a>
                                            <div class="id-remider">
                                                <p class = "remider"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">所在机构</label>
                                        <div class="layui-input-block">
                                            <input name='communityname' required="" disabled="disabled" value="" class="layui-input" type="text">
                                        

                                        </div>
                                    </div>


                                </form>
                                <div class="sure"><a id = "sureBtn" class="layui-btn">确定</a></div>
                            </div>
                        </div>
                    </div><!--box1 end-->
                </div>
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
<script>

    //初始化信息显示
    $.ajax({
        url: "/index.php/Home/Community/getPersonInfo",
        type: "POST",
        data: {},
        dataType: "json",
        success: function (data) {
           $('input[name=realname]').val(data.sjy_community_user_real_name);
           $('input[name=phone]').val(data.sjy_community_login_id);
           $('input[name=wechat]').val(data.sjy_community_user_wechat);
           $('input[name=communityname]').val(data.sjy_community_name);
           $('input[name=email]').val(data.sjy_community_user_email)
        },
        async:false
    });

    /*个人图片的切换*/
    //上传封面
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [200, 200],// 截取框的宽和高组成的数组。默认值为[260,260]
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
            $('#view').css('background-size','100% 100%');


            $("#userImg").attr("src", dataURL);

            $.ajax({
                url: "/index.php/Home/Community/douploadtouxiang",
                type: "POST",
                data: {
                    img: dataURL
                },
                dataType: "json",
                success: function (data) {
                    if(data.state == 1)
                    {
                        layer.msg('修改成功');
                        console.log(data.url)
                    }else{
                        layer.msg(data.errorInfo);
                    }
                },
                async:false
            });
            return false;

        }
    });
    //clipArea.destroy();








    $(".personal-information .layui-input-block .iconfont").on("click", function () {
        $(this).prev("input").removeAttr("disabled").css("border", "1px solid #bbb");

        $(".personal-information .layui-input-block .layui-input").blur(function () {
            $(this).attr("disabled", "disabled").css("border", "1px solid #e6e6e6");
        });
    });

    /*手机号验证*/
    var regPhone = /^1[3|4|5|8][0-9]\d{4,8}$/;

    $(".testPhoneNum").blur(function () {

        if( ! regPhone.test($(this).val()) ){
            console.log("身份验证");
            $(this).siblings(".id-remider").children(".remider").html("请输入正确电话号码");
            console.log($(this).next().siblings(".remider"));
            $(this).removeAttr("disabled");
            return false
        }else{
            $(this).siblings(".id-remider").children(".remider").html("");
            $(this).attr("disabled", "disabled");
        }

    });

    /*邮箱验证*/

    var regMailBox = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;

    $(".testMailBox").blur(function () {

        if( ! regMailBox.test($(this).val()) ){
            console.log("身份验证");
            $(this).siblings(".id-remider").children(".remider").html("请输入正确的邮箱");
            console.log($(this).next().siblings(".remider"));
            $(this).removeAttr("disabled");
            return false
        }else{
            $(this).siblings(".id-remider").children(".remider").html("");
            $(this).attr("disabled", "disabled");
        }

    });

    $("#sureBtn").click(function () {
        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var wechat = $("input[name='wechat']").val();

        console.log(email);
        console.log(phone);
        console.log(wechat);

        if( phone == ""){
            layer.msg('请填写电话');
            return false;
        }


        $.ajax({
            url: "/index.php/Home/Community/updatePersonInfo",
            type: "POST",
            data: {
                email : email,
                phone : phone,
                wechat : wechat
            },
            dataType: "json",
            success: function (data) {

                if(data.state == 1) {
                    layer.msg('修改成功');
                }

            },
            async:false
        });
        return false;

    });



    /*社区上传 机构风采*/




</script>
</html>