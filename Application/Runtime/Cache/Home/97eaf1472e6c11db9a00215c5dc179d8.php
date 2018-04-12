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
<link rel="stylesheet" href="/Public/Home/css/chooseCity.css">

<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>
<script src="/Public/Home/js/upLoadImgBig.js"></script>


<script src="/Public/Home/js/plugins/cover_js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/hammer.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/jQuery.upload.min.js"></script>
<link rel="stylesheet" href="/Public/Home/css/upload.css">


</head>

<body>
    <div class="shadeBox" style="display: none;"></div>
    <div id="showCityBox" class="province-switch" style="display: none;"></div>
    <div class="headLogin">
        <div class="container">
            <div class="left changeBan logoPer">
                <a href='<?php echo ($index); ?>'>
                    <img src="/Public/Home/imgs/logo.png" alt="">
                    <span>社居易</span>
                </a>
            </div>
            <div class="right person">
                <!--<img src="/Public/Home/imgs/personDl.jpg" alt="">-->
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
                            <div class = "user-img">
                                <img id="userImg" src="<?php echo ($user_image); ?>" alt="  ">
                                <span class = "iconfont VIP-icon">&#xe65b;</span>
                            </div>
                            <p style = "margin-top: 12px;">
                                VIP有效期 :<br>
                                <span class="blue-btn" style="background:#ffa34a;color: #ffffff;">2018-05-01~2019-05-01</span>
                            </p>
                            <!--用户图片更换-->
                            <div class="cropImgBox" ontouchstart="">
                                <div class="cover-wrap">
                                    <div class="coverBox">
                                        <div id="clipArea"></div>
                                        <div class="clipBtn">
                                            <button id="clipBtn">确定</button>
                                            <button onClick="javascript:$('.cover-wrap').fadeOut();">关闭</button>
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
                                <a href="/index.php/Home/Community/personInfo">账号设置</a>
                            </li>
                            <li>
                                <a class="on" href="/index.php/Home/Community/myCommunity">我的社区</a>
                            </li>
                            <li>
                                <a href="/index.php/Home/Project/communityProjectManger">我的项目</a>
                            </li>
                            <li>
                                <a href="">我的消息</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10 column perperson-con" style="background: #FFFFFF;">
                        <div class="layui-tab layui-tab-brief">
                            <ul class="layui-tab-title">
                                <li class="layui-this" lay-id="a">基本信息</li>
                                <li lay-id="b">员工管理</li>
                                <li lay-id="c">机构风采</li>
                            </ul>
                            <div class="layui-tab-content">

                                <div class="layui-tab-item layui-show">
                                    <!--社会组织 —— 我的机构 —— 基本信息-->
                                    <form class="layui-form layui-form-pane basic-information" action="">
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">社区名称</label>
                                            <div class="layui-input-block">
                                                <input name="community_name" disabled="disabled" required="" value="" placeholder="请输机构名字" autocomplete="off" class="layui-input" type="text">
                                                <a class="iconfont">&#xe600;</a>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">社区地址</label>
                                            <div class="layui-input-block">
                                                <input name="address" disabled="disabled" value="" required="" placeholder="请输入机构地址" autocomplete="off" class="layui-input" type="text">
                                                <!--<a class="iconfont" lay-event="edit">&#xe600;</a>-->
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">固定电话</label>
                                            <div class="layui-input-block">
                                                <input name="tel_code" value="" class="layui-input landlinePhoneNum" type="text" style="width: 42px;margin-right: 4px;">
                                                <input name="phone" value="" required="" placeholder="请输入固定电话号" autocomplete="off" class="layui-input landlinePhoneNum" type="text" style="width: 355px;">
                                                <a class="iconfont">&#xe600;</a>
                                                <div class="id-remider">
                                                    <p class="remider"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">社区简介</label>
                                            <div class="layui-input-block">
                                                <textarea placeholder="请输入内容" id="textareaIntro" class="layui-textarea"></textarea>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="sure"><a href="javascript:;" id="sureBtn1" class="layui-btn">确定</a></div>

                                </div>

                                <div class="layui-tab-item">
                                    <!--社会组织 —— 我的机构 —— 员工管理-->
                                    <div class="basic-information">
                                        <a class="addMember" href="javascript:;">添加社工</a>
                                        <table class="layui-table">
                                            <colgroup>
                                                <col width="100">
                                                <col width="200">
                                                <col width="200">
                                                <col width="200">
                                                <col width="200">
                                                <col width="200">
                                                <col width="200">

                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>姓名</th>
                                                    <th>手机号</th>
                                                    <th>邮箱</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="layui-tab-item">
                                    <!--社会组织 —— 我的机构 —— 机构风采-->
                                    <div class="basic-information">
                                        <div class="img-box full">
                                            <section class=" img-section">
                                                 <p class="up-p">社区风采：<span class="up-span">上传一张社区风采</span></p>
                                                <div class="case">
                                                    <div class="upload" style='width:500px;height:300px' data-type="png,jpg,jpeg,gif" action='/index.php/Home/Community/uploadcommunityimgs' data-num='1' id='case2'></div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript">
    
    $(function() {
        $("#case2").upload();
       
    })
</script>

<script>

    //初始化信息显示
    $.ajax({
        url: "/index.php/Home/Community/getCommunityInfo",
        type: "POST",
        data: {},
        dataType: "json",
        success: function(data) {
            $('input[name=community_name]').val(data.sjy_community_name);
            $('input[name=address]').val(data.address_info.sjy_community_city_name + data.address_info.sjy_community_area_name + data.address_info.sjy_community_street_name + data.address_info.sjy_community_address);
            $('input[name=tel_code]').val(data.sjy_community_phone.split('-')[0]);
            $('input[name=phone]').val(data.sjy_community_phone.split('-')[1]);
            $('#textareaIntro').val(data.sjy_community_introduce)
        },
        async: false
    });
    /*个人图片的切换*/
    //上传封面
    //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    var clipArea = new bjj.PhotoClip("#clipArea", {
        size: [200, 200], // 截取框的宽和高组成的数组。默认值为[260,260]
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
            $('#view').css('background-size', '100% 100%');


            $("#userImg").attr("src", dataURL);

            $.ajax({
                url: "/index.php/Home/Community/douploadtouxiang",
                type: "POST",
                data: {
                    img: dataURL
                },
                dataType: "json",
                success: function(data) {
                    if (data.state == 1) {
                        layer.msg('修改成功');
                        console.log(data.url)
                    } else {
                        layer.msg(data.errorInfo);
                    }
                },
                async: false
            });
            return false;

        }
    });
    //clipArea.destroy();




    $(".basic-information .layui-input-block .iconfont").on("click", function() {
        $(this).prev("input").removeAttr("disabled").css("border", "1px solid #bbb");

        $(".basic-information .layui-input-block .layui-input").blur(function() {
            $(this).attr("disabled", "disabled").css("border", "1px solid #e6e6e6");
        });
    });
    /*手机号验证*/
    var landlinePhone = /^\d{7,8}$/;

    $(".landlinePhoneNum").blur(function() {

        if (!landlinePhone.test($(this).val())) {
            console.log("身份验证");
            $(this).siblings(".id-remider").children(".remider").html("请输入正确电话号码");
            console.log($(this).next().siblings(".remider"));
            $(this).removeAttr("disabled");
            return false
        } else {
            $(this).siblings(".id-remider").children(".remider").html("");
            $(this).attr("disabled", "disabled");
        }

    });


    $("#sureBtn1").click(function() {


        var community_name = $("input[name='community_name']").val();
        var tel_code = $("input[name='tel_code']").val();
        var phone = $("input[name='phone']").val();
        var introduce = $("#textareaIntro").val();

        console.log(tel_code);
        console.log(phone);
        console.log(introduce);

        if (community_name == "") {
            layer.msg('请填写社区名');
            return false;
        }


        $.ajax({
            url: "/index.php/Home/Community/updateCommunityInfo",
            type: "POST",
            data: {
                community_name: community_name,
                tel_code: tel_code,
                phone: phone,
                introduce: introduce
            },
            dataType: "json",
            success: function(data) {

                if (data.state == 1) {
                    layer.msg('修改成功');
                }
            },
            async: false
        });
        return false;
    });

    $.ajax({
        url: "/index.php/Home/Community/getcommunityimgs",
        type: "get",
        data: {},
        dataType: "json",
        success: function(data) {
            if (data) {
                $("#case2").attr('data-value', 'http://p33g9t7dr.bkt.clouddn.com/' + data);
            } else {
                // $("#imghead").attr('src', '/Public/Home/imgs/a11.png')
            }
        }
    })
    $("#sureBtn3").click(function() {

        var file = $("#imghead").attr("src");

        console.log(file);

        $.ajax({
            url: "/index.php/Home/Community/uploadcommunityimgs",
            type: "POST",
            data: {
                file: file
            },
            dataType: "json",
            success: function(data) {

                if (data.state == 1) {
                    layer.msg('上传成功');
                }

            },
            async: false
        });
        return false;

    });



    /*社会组织员工管理  */
    $.ajax({
        url: "/index.php/Home/Community/getStaffList",
        type: "get",
        data: {
            page: 1
        },
        dataType: "json",
        success: function(data) {

            //console.log(data);
            var html = '';
            for (var i = 0; i < data.data.length; i++) {
                if(data.data[i].sjy_community_user_email != null )
                {
                    var email = data.data[i].sjy_community_user_email;
                }else{
                    var email = '';
                }
                html += '<tr>' +
                    '<td>' + data.data[i].sjy_community_user_real_name + '</td>' +
                    '<td class = "sjy_community_login_id">' + data.data[i].sjy_community_login_id + '</td>' +
                    '<td>' + email + '</td>' +
                    '<td>' +
                    '<a class="layui-btn layui-btn-danger layui-btn-xs deleteEmployees" href = "javascript:;">删除</a>' +
                    '</td>' +
                    '</tr>';

                //  console.log(i);

            }

            $("#tableBody").html(html);

            $(".deleteEmployees").click(function() {

                //console.log( $(this).parents("tr") );

                var phone = $(this).parents("tr").children(".sjy_community_login_id").text();
                //  console.log(phone);

                $(this).parents("tr").remove();

                $.ajax({
                    url: "/index.php/Home/Community/delStaff",
                    type: "POST",
                    data: {
                        phone: phone
                    },
                    dataType: "json",
                    success: function(data) {

                        //console.log(data);
                        if (data.state == 1) {
                            layer.msg('删除成功');
                        }

                    },
                    async: false
                });
                return false;

            });
        },
        async: false
    });
</script>

</html>