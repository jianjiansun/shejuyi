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


<script type="text/javascript" src = "/Public/Home/js/gt.js"></script>

</head>
<body>
<!-- 模态框（Modal） -->
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  loginBox">
        <div class="modal-content">
            <div class="modal-header">
                <a class="iconfont right closeBtn" data-dismiss="modal" aria-hidden="true">
                    &#xe60e;
                </a>
                <h4 class="modal-title" id="myModalLabel">
                    社会工作者
                </h4>
            </div>
            <div class="modal-body">
                <ul id="myTab" class="switchTab">
                    <li class="active">
                        <a href="#login" data-toggle="tab">
                            登录
                        </a>
                    </li>
                    <li>
                        <a href="#register" data-toggle="tab">注册</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <!--登录-->
                    <div class="tab-pane fade in active" id = "login">
                        <form class="form-horizontal" role="form">

                            <input type='hidden' value='2' />
                            <div class="form-group-border">
                                <input type="text" class="form-input phoneNum" id="username" placeholder="请输入手机号" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                                <input type="password" class="form-input pswNum" id="password" placeholder="请输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                            </div><br />
                            <div id="embed-captcha"></div>
                            <div class="form-group">
                                <p class = "remider"></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" id = "login-btn" class="submit-btn">登 录</button>
                                <p><a class="right recall-psw" href="">找回密码</a></p>
                            </div>
                        </form>
                    </div>
                    <!--注册-->
                    <div class="tab-pane fade" id = "register" >
                        <form  class="form-horizontal" role="form">
                            <input type='hidden' value='2' />
                            <div class="form-group-border">
                                <input type="text" class="form-input phoneNum" id="Rusername" placeholder="请输入手机号" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                                <input type="password" class="form-input pswNum" id="Rpassword1" placeholder="请输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                                <input type="password" class="form-input pswNum" id="Rpassword2" placeholder="请再次输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                            </div>
                            <div class="form-group">
                                <p class = "remider"></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" id = "register-btn" class="submit-btn">注 册</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--登录注册验证-->
<script>
    var regPhone = /^1[3|4|5|8|7][0-9]\d{4,8}$/;
    var regPassword = /^[A-Za-z0-9]{6,20}$/;



    var handlerEmbed = function (captchaObj) {
    $("#login-btn").click(function () {
        
                    var validate = captchaObj.getValidate();
                    if (!validate) {
                       $("#login .remider").html("请先完成验证");
                       return false;
                    }

                    if( ! regPhone.test($("#username").val()) ){
                        $("#login .remider").html("请输入有效的手机号码");
                        return false;
                    }
                    if( ! regPassword.test( $("#password").val() ) ){
                        $("#login .remider").html("请输入正确密码");
                        return false;
                    }
                    $.ajax({
                        url : "/index.php/home/Login/dologin",
                        data: {
                                type : 1,
                                phone : $("#username").val(),
                                password : $("#password").val(),
                                geetest_challenge: validate.geetest_challenge,
                                geetest_validate: validate.geetest_validate,
                                geetest_seccode: validate.geetest_seccode
                            },
                        type : "post",
                        dataType : "json",
                        success : function (data) {

                            if(data.state == 2){
                                window.location.href = "/index.php/home/Origanization/index";
                            } else {
                                captchaObj.reset(); // 调用该接口进行重置
                                $("#login .remider").html(data.msg);
                            }
                        },
                        async:false
                    });
                    return false;

                });
   
    captchaObj.onError(function () {
                    layer.msg('sorry~请刷新页面重试');
                            // 出错啦，可以提醒用户稍后进行重试
    });
    captchaObj.appendTo("#embed-captcha");
}

    $("#register-btn").click(function () {

        if( ! regPhone.test($("#Rusername").val()) ){
            $("#register .remider").html("请输入有效的手机号码");
            return false;
        }
        if( ! regPassword.test($("#Rpassword1").val()) ){
            $("#register .remider").html("密码由6~20位数字或字母组成");
            return false;
        }
        if( !($("#Rpassword1").val() == $("#Rpassword2").val() ) ){
            $("#register .remider").html("两次输入密码不一致");
            return false;
        }
        $.ajax({
            url : "/index.php/home/Login/doregister",
            data: {type : 1, phone : $("#Rusername").val() , password : $("#Rpassword1").val(), repassword:$("#Rpassword2").val()},
            type : "post",
            dataType : "json",
            success : function (data) {
                if(data.state == 3){
                    window.location.href = "/index.php/home/Origanization/index";
                } else {
                    $("#register .remider").html(data.msg);
                }
            },
            async:false
        });
        return false;
    });
</script>


<!-- 模态框（Modal） -->
<div class="modal fade" id="loginModel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  loginBox">
        <div class="modal-content">
            <div class="modal-header">
                <a class="iconfont right closeBtn" data-dismiss="modal" aria-hidden="true">
                    &#xe60e;
                </a>
                <h4 class="modal-title" id="myModalLabel2">
                    社区
                </h4>
            </div>
            <div class="modal-body">
                <ul id="myTab2" class="switchTab">
                    <li class="active">
                        <a href="#login2" data-toggle="tab">
                            登录
                        </a>
                    </li>
                    <li>
                        <a href="#register2" data-toggle="tab">注册</a>
                    </li>
                </ul>
                <div id="myTabContent2" class="tab-content">
                    <!--登录-->
                    <div class="tab-pane fade in active" id = "login2">
                        <form class="form-horizontal" role="form">

                            <input type='hidden' value='2' />
                            <div class="form-group-border">
                                <input type="text" class="form-input phoneNum" id="username2" placeholder="请输入手机号" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                                <input type="password" class="form-input pswNum" id="password2" placeholder="请输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                            </div><br />
                            <div id="embed-captcha2"></div>
                            <div class="form-group">
                                <p class = "remider"></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" id = "login-btn2" class="submit-btn">登 录</button>
                                <p><a class="right recall-psw" href="">找回密码</a></p>
                            </div>
                        </form>
                    </div>
                    <!--注册-->
                    <div class="tab-pane fade" id = "register2" >
                        <form  class="form-horizontal" role="form">
                            <input type='hidden' value='2' />
                            <div class="form-group-border">
                                <input type="text" class="form-input phoneNum" id="Rusername2" placeholder="请输入手机号" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                                <input type="password" class="form-input pswNum" id="Rpassword21" placeholder="请输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')" >
                                <input type="password" class="form-input pswNum" id="Rpassword22" placeholder="请再次输入密码" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
                            </div>
                            <div class="form-group">
                                <p class = "remider"></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" id = "register-btn2" class="submit-btn">注 册</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--登录注册验证-->
<script>
    var regPhone = /^1[3|4|5|7|8][0-9]\d{4,8}$/;
    var regPassword = /^[A-Za-z0-9]{6,20}$/;
    var handlerEmbed2 = function(captchaObj){
            $("#login-btn2").click(function () {
               
                            var validate = captchaObj.getValidate();
                            if (!validate) {
                               $("#login2 .remider").html("请先完成验证");
                               return false;
                            }

                            if( ! regPhone.test($("#username2").val()) ){
                                $("#login2 .remider").html("请输入有效的手机号码");
                                return false;
                            }
                            if( ! regPassword.test($("#password2").val()) ){
                                $("#login2 .remider").html("请输入正确密码");
                                return false;
                            }
                            $.ajax({
                                url : "/index.php/home/Login/dologin",
                                data: 
                                    {
                                        type : 2, 
                                        phone : $("#username2").val() ,
                                        password : $("#password2").val(),
                                        geetest_challenge: validate.geetest_challenge,
                                        geetest_validate: validate.geetest_validate,
                                        geetest_seccode: validate.geetest_seccode
                                    },
                                type : "post",
                                dataType : "json",
                                success : function (data) {

                                    if(data.state == 2){
                                        window.location.href = "/index.php/home/Community/index";
                                    } else {
                                        captchaObj.reset(); // 调用该接口进行重置
                                        $("#login2 .remider").html(data.msg);
                                    }
                                },
                                async:false
                            });
                            return false;

                        });
                
                captchaObj.onError(function () {
                    layer.msg('sorry~请刷新页面重试')
                            // 出错啦，可以提醒用户稍后进行重试
            });
            captchaObj.appendTo("#embed-captcha2");
}

    $("#register-btn2").click(function () {

        if( ! regPhone.test($("#Rusername2").val()) ){
            $("#register2 .remider").html("请输入有效的手机号码");
            return false;
        }
        if( ! regPassword.test($("#Rpassword21").val()) ){
            $("#register2 .remider").html("密码由6~20位数字或字母组成");
            return false;
        }
        if( !($("#Rpassword21").val().replace(/(^\s*)|(\s*$)/g, "") == $("#Rpassword22").val()) ){
            $("#register2 .remider").html("两次输入密码不一致");
            return false;
        }
        $.ajax({
            url : "/index.php/home/Login/doregister",
            data: {type : 2, phone : $("#Rusername2").val() , password : $("#Rpassword21").val(), repassword:$("#Rpassword22").val()},
            type : "post",
            dataType : "json",
            success : function (data) {
                if(data.state == 3){
                    window.location.href = "/index.php/home/Community/index";
                } else {
                    $("#register2 .remider").html(data.msg);
                }
            },
            async:false
        });
        return false;
    });
</script>




<div class="banner">
    <img src="/Public/Home/imgs/banner.png" alt="">
</div>


<div class="container">
    <div class="row clearfix bannerCon">
        <img class='logo' src="/Public/Home/imgs/logo.png" alt="">
        <h1></h1>
        <div class="contant">
            <h2>实现社会工作服务资源的精准匹配</h2>
            <h4>一站式服务</h4>
        </div>
        <p class="declare">
            <span class="iconfont">&#xe659;</span>
            所有信息为真实的数据，关于不正当竞争虚假信息郑重声明
        </p>
    </div>
</div>
<div class="container">
    <div class="row clearfix classify">
        <div class="col-md-6">
            <dl class="shegong assort">
                <dt class="col-md-2"><img src="/Public/Home/imgs/shegong.png" alt=""></dt>
                <dd class="col-md-4">
                    所有信息均为真实数据, 关于不正当竞争虚假信息郑重声明
                </dd>
                <dd class="col-md-6">
                    <a class="classifyBtn" href="javascript:;" data-toggle="modal" data-target="#loginModel">社会工作者</a>
                </dd>
            </dl>
        </div>
        <div class="col-md-6 column">
            <dl class="shegong assort">
                <dt class="col-md-2"><img src="/Public/Home/imgs/shequ.png" alt=""></dt>
                <dd class="col-md-4">
                    所有信息均为真实数据, 关于不正当竞争虚假信息郑重声明
                </dd>
                <dd class="col-md-6">
                    <a class="classifyBtn" href="javascript:;" data-toggle="modal"  data-target="#loginModel2">社区</a>
                </dd>
            </dl>
        </div>
    </div>
</div>
<div style = "background: #ffffff;padding-bottom: 80px;">
   <!--  <div class="container" style = "background: #ffffff;">
        <div class="row clearfix">
            <div class="indexTit">
                <div class="col-md-11">
                    <h2>社会组织
                        <span>推荐</span>
                    </h2>
                    <p>所有信息均为真实数据, 关于不正当竞争虚假信息郑重声明</p>
                </div>
                <div class="col-md-1 readMore">
                    <a href="#">查看更多</a>
                </div>
            </div>
            <div class="col-md-3 column">
                <a href="html/detail.html">
                    <div class="imgBox">
                        <img src="/Public/Home/imgs/lvnong.png" alt="">
                    </div>
                    <div class="programDetail"><p>北京市通州区启明星社区社会工作事务所</p></div>
                </a>


            </div>
            <div class="col-md-3 column">
                <div class="imgBox">
                    <img src="/Public/Home/imgs/qimingxing.png" alt="">
                </div>
                <div class="programDetail"><p>北京市通州区启明星社区社会工作事务所</p></div>
            </div>
            <div class="col-md-3 column">
                <div class="imgBox">
                    <img src="/Public/Home/imgs/tonghuishuyuan.jpg" alt="">

                </div>
                <div class="programDetail"><p>北京市通州区启明星社区社会工作事务所</p></div>
            </div>
            <div class="col-md-3 column">
                <div class="imgBox">
                    <img src="/Public/Home/imgs/xinhuadangjian.png" alt="">
                </div>
                <div class="programDetail"><p>北京市通州区启明星社区社会工作事务所</p></div>
            </div>
        </div>

    </div> -->
</div>

<!-- <div class="container" >
    <div class="row clearfix">
        <div class="indexTit">
            <div class="col-md-11">
                <h2>社区最新项目
                    <span>推荐</span>
                </h2>
                <p>所有信息均为真实数据, 关于不正当竞争虚假信息郑重声明</p>
            </div>
            <div class="col-md-1 readMore">
                <a href="#">查看更多</a>
            </div>
        </div>

        <div class="col-md-3 column">
            <a href="html/detail1.html">
                <div class="imgBox1">
                    <img src="/Public/Home/imgs/shequ1.jpg" alt="">
                    <p class="addressTag">北京市—通州区</p>
                </div>
                <div class="imgShader">
                </div>
                <div class="programDetail"><p>夕阳红社区养老服务</p></div>

            </a>

        </div>
        <div class="col-md-3 column">
            <div class="imgBox1">
                <img src="/Public/Home/imgs/shequ2.jpg" alt="">
                <p class="addressTag">北京市—通州区</p>
            </div>
            <div class="imgShader">
            </div>
            <div class="programDetail"><p>夕阳红社区养老服务</p></div>
        </div>
        <div class="col-md-3 column">
            <div class="imgBox1">
                <img src="/Public/Home/imgs/shequ3.jpg" alt="">
                <p class="addressTag">北京市—通州区</p>
            </div>
            <div class="imgShader">
            </div>
            <div class="programDetail"><p>夕阳红社区养老服务</p></div>
        </div>
        <div class="col-md-3 column">
            <div class="imgBox1">
                <img src="/Public/Home/imgs/shequ4.JPG" alt="">
                <p class="addressTag">北京市—通州区</p>
            </div>
            <div class="imgShader">
            </div>
            <div class="programDetail"><p>夕阳红社区养老服务</p></div>
        </div>
    </div>

    <div style="height: 100px;"></div>
</div> -->
<div class="row clearfix footerBox">
    <div class="container">
        <div class="copyright fl">
            <p class = "left">北京社居易有限公司 版权所有</p>
            <p class = "right">
                Copyright © 2017-2018 社居易 京ICP备18019570
            </p>
        </div>
    </div>
</div>
</body>

<script>
    
       
    // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode 
    //社会工作者
    var g = 0;  
    $('#loginModel').on('show.bs.modal', function () {
    if(g==0)
    {
  
            $.ajax({
                // 获取id，challenge，success（是否启用failback）
                url: "/index.php/home/Login/verify?t=" + (new Date()).getTime(), // 加随机数防止缓存
                type: "get",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    // 使用initGeetest接口
                    // 参数1：配置参数
                    // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                    initGeetest({
                        gt: data.gt,
                        challenge: data.challenge,
                        new_captcha: data.new_captcha,
                        product: "float", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                        offline: !data.success, // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                        width:'100%'
                        // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
                    }, handlerEmbed);
                }
            });
    }
    g++;

})

   //社区
   // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode 
    var c = 0;  
    $('#loginModel2').on('show.bs.modal', function () {

           if('<?php echo ($figure); ?>'==2)
           {
              //已经登录，则不用再次登录
              window.location.href='/Community/index';
           }
   
            if(c==0)
            {
          
                    $.ajax({
                        // 获取id，challenge，success（是否启用failback）
                        url: "/index.php/home/Login/verify?t=" + (new Date()).getTime(), // 加随机数防止缓存
                        type: "get",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            // 使用initGeetest接口
                            // 参数1：配置参数
                            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                            initGeetest({
                                gt: data.gt,
                                challenge: data.challenge,
                                new_captcha: data.new_captcha,
                                product: "float", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                                offline: !data.success, // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                                width:'100%'
                                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
                            }, handlerEmbed2);
                        }
                    });
            }
            c++;

})
</script>