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

<link rel="stylesheet" href="/Public/Home/css/layui.css">
<link rel="stylesheet" href="/Public/Home/css/page2.css">
<link rel="stylesheet" href="/Public/Home/css/testfy.css">
<link rel="shortcut icon" href="/Public/Home/img/easyLife.ico" />

<script src="/Public/Home/street/jquery.citys.js"></script>
<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>
<script src="/Public/Home/js/upLoadImg.js"></script>
<script src="/Public/Home/js/upLoadImg2.js"></script>
<script src="/Public/Home/js/upLoadImg3.js"></script>
<script src="/Public/Home/js/upLoadImg4.js"></script>


<script src="/Public/Home/js/plugins/cover_js/iscroll-zoom.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/hammer.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/lrz.all.bundle.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/plugins/cover_js/jquery.photoClip.min.js" type="text/javascript" charset="utf-8"></script>


</head>

<body>
    <div class="headLogin">

        <div class="left changeBan logoPer">
            <a href='<?php echo ($index); ?>'>
                <img src="/Public/Home/imgs/logo.png" alt="">
                <span>社居易</span>
            </a>
            <ul class="indexNavBox">
                <li><a href="<?php echo ($index); ?>">首页</a></li>
                <li><a href="/index.php/Home/Community/origanizationIndex">组织首页</a></li>
                <li><a href="/index.php/Home/Origanization/communityIndex">社区首页</a></li>
            </ul>
        </div>
        <div class="right person">
            <div class="dropdown pull-right">

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
                        </li>
                        <li>
                            <a class="" href="/index.php/Home/Community/send_project">发布项目</a>
                        </li><?php endif; ?>


                    <li>
                        <a href="/index.php/Home/Community/logout">注销</a>
                    </li>
                </ul>
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
                            <div class="user-img">
                                <img id="userImg" src="<?php echo ($user_image); ?>" alt="  ">
                                <span class="iconfont VIP-icon">&#xe65b;</span>
                            </div>
                            <p style="margin-top: 12px;">
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
                                <a class="on" href="/index.php/Home/Community/communityIdentify">认证状态</a>
                            </li>


                            <?php if(($isidentify == 1)): ?><li>
                                    <a href="/index.php/Home/Community/personInfo">账号设置</a>
                                </li><?php endif; ?>
                            <?php if(($isidentify == 1) and ($code > 0)): ?><li>
                                    <a href="/index.php/Home/Community/myCommunity">我的社区</a>
                                </li>
                                <li>
                                    <a href="/index.php/Home/Project/communityProjectManger">我的项目</a>
                                </li>
                                <li>
                                    <a class="" href="/index.php/Home/Community/send_project">发布项目</a>
                                </li><?php endif; ?>


                        </ul>
                    </div>
                    <div class="col-md-10 column perperson-con" style="background: #FFFFFF;">
                        <div class="testfyed">
                            <img src="/Public/Home/imgs/testfied.png" alt="">
                        </div>
                        <div class="layui-tab layui-tab-brief testfy" lay-filter="docDemoTabBrief">
                            <ul class="layui-tab-title">
                                <li class="layui-this" lay-id="a">社区认证</li>
                                <li lay-id="b">居干认证</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <!--社会组织认证-->
                                    <div class="col-md-8">
                                        <ul class="testUl" style="padding-bottom: 0">
                                            <li>
                                                <p>社区名</p>
                                                <input name="community_name" type="text"> <span class='iconfont'>&#xe60a;</span>
                                            </li>
                                            <li>
                                                <p>地址</p>
                                                <div id="demo" class="citys" style="margin-bottom: 10px;">
                                                    <p>
                                                        <select name="province"></select>
                                                        <select name="city"></select>
                                                        <select name="area"></select>
                                                        <select name="town" class="streetName"></select>
                                                    </p>
                                                </div>
                                                <div id="show"></div>
                                            </li>
                                            <li>
                                                <p>详细地址</p>
                                                <input name="address" type="text"> <span class='iconfont'>&#xe60a;</span>
                                            </li>
                                            <li>
                                                <p>固定电话</p>
                                                <input name="tel_code" type="text" value='<?php echo ($phonecode); ?>' style="width: 60px"> -
                                                <input name="telephone" class="dianhuaNum" type="text" style="width: 200px"> <span class='iconfont'>&#xe60a;</span>
                                                <div class="id-remider">
                                                    <p class="remider"></p>
                                                </div>

                                            </li>
                                            <li>
                                                <p>运营者姓名</p>
                                                <input name="manger_name" type="text"> <span class='iconfont'>&#xe60a;</span>
                                            </li>
                                            <li>
                                                <p id="personId">运营者身份证号</p>
                                                <input name="id_number" class="id-num" type="text"> <span class='iconfont'>&#xe60a;</span>
                                                <div class="id-remider">
                                                    <p class="remider"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <p style="color: #999; font-size: 12px;line-height: 20px"><span class="iconfont">&#xe60a;</span>为必填内容</p>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-md-4">

                                        <div id="preview" class="testImg">
                                            <img id="imghead" width=100% border=0 src='/Public/Home/imgs/uploadImg.png'>
                                        </div>


                                        <div class="uploadBtn">
                                            <div class="uploadImg">
                                                社区证明
                                            </div>
                                            <input type="file" onchange="previewImage(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                        </div>

                                        <div id="preview2" class="testImg">
                                            <img id="imghead2" width=100% border=0 src='/Public/Home/imgs/uploadImg.png'>
                                        </div>

                                        <div class="uploadBtn">
                                            <div class="uploadImg">
                                                手持身份证
                                            </div>
                                            <input type="file" onchange="previewImage2(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                        </div>


                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="submitBox">
                                        <input id="submitOr" type="submit" value="提交">
                                    </div>

                                </div>
                                <div class="layui-tab-item">
                                    <!--社工认证 -->
                                    <div class="col-md-8">
                                        <ul class="testUl">
                                            <li>
                                                <p>姓名</p>
                                                <input type="text" name="real_name"> <span class='iconfont'>&#xe60a;</span>
                                            </li>
                                            <li>
                                                <p>身份证号</p>
                                                <input name="id_card" class="id-num" type="text"> <span class='iconfont'>&#xe60a;</span>
                                                <div class="id-remider">
                                                    <p class="remider"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <p>微信号</p>
                                                <input name="wechat" type="text">
                                            </li>
                                            <li>
                                                <p style="color: #999; font-size: 12px;"><span class="iconfont">&#xe60a;</span>为必填内容</p>
                                            </li>

                                        </ul>

                                    </div>
                                    <div class="col-md-4">

                                        <div id="preview3" class="testImg">
                                            <img id="imghead3" border=0 src='/Public/Home/imgs/uploadImg.png'>
                                        </div>

                                        <div class="uploadBtn">
                                            <div class="uploadImg">
                                                手持身份证照
                                            </div>
                                            <input type="file" onchange="previewImage3(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="submitBox" style="margin-top: 300px;">
                                        <input id="submitOrMember" type="submit" value="提交">
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
                    Copyright © 2017-2018 社居易 京ICP备18019570
                </p>
            </div>
        </div>
    </div>
</body>
<script>
    if ("<?php echo ($isidentify); ?>" == 1) {
        //认证
        $(".testfyed").css("display", "block");
        $(".testfy").css("display", "none");


    } else {
        //没认证
        $(".testfyed").css("display", "none");
        $(".testfy").css("display", "block");
    }



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



    var isIDCard1 = /^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;

    $(".id-num").blur(function() {

        if (!isIDCard1.test($(this).val())) {
            console.log("身份验证");
            $(this).siblings(".id-remider").children(".remider").html("请输入正确的身份证号");
            console.log($(this).next().siblings(".remider"));
            return false
        } else {
            $(this).siblings(".id-remider").children(".remider").html("");
        }

    });


    var isDianhua = /^\d{7,8}$/; /*以电话开始结尾*/
    $(".dianhuaNum").blur(function() {

        if (!isDianhua.test($(this).val())) {
            $(this).siblings(".id-remider").children(".remider").html("请输入正确的电话号码");
        } else {
            $(this).siblings(".id-remider").children(".remider").html("");
        }

    });

    /*城市三级联动*/
    var $town = $('#demo select[name="town"]');
    var townFormat = function(info) {
        $town.hide().empty();
        if (info['code'] % 1e4 && info['code'] < 7e6) { //是否为“区”且不是港澳台地区
            $.ajax({
                url: '/Public/Home/street/Town/' + info['code'] + '.json',
                dataType: 'json',
                success: function(town) {
                    $town.show();
                    for (i in town) {
                        $town.append('<option value="' + i + '">' + town[i] + '</option>');
                    }
                }
            });
        }
    };
    $('#demo').citys({
        province: '福建',
        city: '厦门',
        area: '思明',
        onChange: function(info) {
            townFormat(info);
        }
    }, function(api) {
        var info = api.getInfo();
        townFormat(info);
    });



    /*社区认证*/
    $("#submitOr").click(function() {


        var community_name = $("input[name='community_name']").val();
        var province = $("select[name='province']")[0].value;
        var city = $("select[name='city']")[0].value;
        var area = $("select[name='area']")[0].value;
        var town = $("select[name='town']")[0].value;
        var address = $("input[name='address']").val();
        var town_name = $(".streetName").find("option:selected").text();
        var manger_name = $("input[name='manger_name']").val();
        var telephone = $("input[name='telephone']").val();
        var id_number = $("input[name='id_number']").val();
        var community_identify_img = $("#imghead").attr("src");
        var logo_img = $("#imghead2").attr("src");

        console.log(community_name);
        console.log(province);
        console.log(city);
        console.log(area);
        console.log(town);
        console.log(town_name);
        console.log(address);
        console.log(manger_name);
        console.log(telephone);
        console.log(id_number);
        console.log(logo_img);
        console.log(community_identify_img);

        if (community_name == "") {
            layer.msg('请填写社区机构名');
            return false;
        }
        if (address == "") {
            layer.msg('请填写详细地址');
            return false;
        }
        if (telephone == "") {
            layer.msg('请填写电话');
            return false;
        }

        if (manger_name == "") {
            layer.msg('请填写运营者姓名');
            return false;
        }
        if (id_number == "") {
            layer.msg('请填写运营者身份证号');
            return false;
        }

        if (community_identify_img.indexOf('data:image') == -1) {
            layer.msg('请上传营业执照');
            return false;
        }

        if (logo_img.indexOf('data:image') == -1) {
            layer.msg('请上社区logo');
            return false;
        }

        $.ajax({
            url: "/index.php/Home/Community/doCommunityIdentify",
            type: "POST",
            data: {
                community_name: community_name,
                province: province,
                city: city,
                area: area,
                town: town,
                address: address,
                town_name: town_name,
                tel_code: "010",
                telephone: telephone,
                manger_name: manger_name,
                id_number: id_number,
                logo_img: logo_img,
                community_identify_img: community_identify_img

            },
            dataType: "json",
            success: function(data) {
                if (data.state == 1) {
                    layer.msg("认证成功");
                    window.location.href = "/index.php/Home/Community/"
                }
            },
            async: false
        });
        return false;
    });


    /*社工认证*/
    $("#submitOrMember").click(function() {

        var real_name = $("input[name='real_name']").val();
        var id_card = $("input[name='id_card']").val();
        var wechat = $("input[name='wechat']").val();

        var id_card_img = $("#imghead3").attr("src");

        if (real_name == "") {
            layer.msg('社工姓名');
            return false;
        }
        if (id_card == "") {
            layer.msg('身份证号');
            return false;
        }
        if (wechat == "") {
            layer.msg('微信号');
            return false;
        }
        if (id_card_img.indexOf('data:image') == -1) {
            layer.msg('手持身份证照片');
            return false;
        }
        console.log(real_name);
        console.log(id_card);
        console.log(id_card_img);

        /**/
        $.ajax({
            url: "/index.php/Home/Community/doCommunityPersonIdentify",
            type: "POST",
            data: {
                real_name: real_name,
                id_card: id_card,
                id_card_img: id_card_img,
                wechat: wechat
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.state == 1) {

                    window.location.href = "/index.php/Home/Community/";
                }
            },
            async: false
        });
        return false;
    });
</script>

</html>