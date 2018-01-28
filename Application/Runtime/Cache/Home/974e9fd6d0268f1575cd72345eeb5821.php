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
    <link rel="stylesheet" href="/Public/Home/css/testfy.css">


    <script src = "/Public/Home/street/jquery.citys.js"></script>
    <script src = "/Public/Home/js/layui.js"></script>
    <script src = "/Public/Home/js/layui.all.js"></script>
    <script src = "/Public/Home/js/upLoadImg.js"></script>
    <script src = "/Public/Home/js/upLoadImg2.js"></script>
    <script src = "/Public/Home/js/upLoadImg3.js"></script>
    <script src = "/Public/Home/js/upLoadImg4.js"></script>

</head>
<body>
<div class = "headLogin">
    <div class = "container">
        <div class = "left changeBan logoPer">
            <a href="main.html">
                <img src="/Public/Home/imgs/logo.png" alt="">
                <span>社居易</span>
            </a>

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
                        <img src="/Public/Home/imgs/personDl.jpg" alt="  ">

                    </div>

                    <ul class="person-ul">
                        <li>
                            <a   class = "on" href="/index.php/Home/Origanization/chooseIdentify">认证状态</a>
                        </li>

                        <li>
                            <a href="/index.php/Home/Origanization/personinfo">账号设置</a>
                        </li>
                        <li>
                            <a href="personal3.html">我的机构</a>
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
                            <li class="layui-this"  lay-id="a">社会组织认证</li>
                            <li  lay-id="b">社工认证</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <!--社会组织认证-->
                                <div class = "col-md-8">
                                    <ul class = "testUl" style = "padding-bottom: 0">
                                        <li>
                                            <p>机构名</p>
                                            <input type="text" name = "origanization_name">  <span class = 'iconfont'>&#xe60a;</span>
                                        </li>
                                        <li>
                                            <p>地址</p>
                                            <div  id="demo" style = "margin-bottom: 10px;">
                                                <p>
                                                    <select name="province"></select>
                                                    <select name="city"></select>
                                                    <select name="area"></select>
                                                </p>
                                            </div>
                                            <div id="show"></div>
                                        </li>
                                        <li>
                                            <p>详细地址</p>
                                            <input name = "address"  type="text"> <span class = 'iconfont'>&#xe60a;</span>
                                        </li>
                                        <li>
                                            <p>固定电话</p>
                                            <input name = "tel_code" value='<?php echo ($phonecode); ?>' type="text" style="width: 60px" disabled="disabled" > -
                                            <input name = "telephone" class="dianhuaNum" type="text" style="width: 200px"> <span class = 'iconfont'>&#xe60a;</span>
                                            <div class = "id-remider">
                                                <p class = "remider"></p>
                                            </div>

                                        </li>
                                        <li>
                                            <p>服务领域</p>
                                            <select name="origanization_type" id="">
                                            <?php if(is_array($service_area)): foreach($service_area as $key=>$val): ?><option value="<?php echo ($val["sjy_id"]); ?>"><?php echo ($val["sjy_origanization_type_name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </li>
                                        <li>
                                            <p>运营者姓名</p>
                                            <input name = "manger_name" type="text"> <span class = 'iconfont'>&#xe60a;</span>
                                        </li>
                                        <li>
                                            <p id = "personId">运营者身份证号</p>
                                            <input name = "id_number" class = "id-num" type="text"> <span class = 'iconfont'>&#xe60a;</span>
                                            <div class="id-remider">
                                                <p class = "remider"></p>
                                            </div>
                                        </li>
                                        <li>
                                            <p style="color: #999; font-size: 12px;line-height: 20px"><span class = "iconfont">&#xe60a;</span>为必填内容</p>
                                        </li>
                                    </ul>

                                </div>
                                <div class = "col-md-4">

                                    <div id="preview" class = "testImg">
                                        <img id="imghead" width=100% border=0 src='/Public/Home/imgs/uploadImg.png'>
                                    </div>


                                    <div class = "uploadBtn">
                                        <div class = "uploadImg">
                                            上传机构营业执照
                                        </div>
                                        <input type="file" onchange="previewImage(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                    </div>

                                    <div id="preview2" class = "testImg">
                                        <img id="imghead2" width=100% border=0 src='/Public/Home/imgs/uploadImg.png'>
                                    </div>

                                    <div class = "uploadBtn">
                                        <div class = "uploadImg">
                                            上传组织Logo
                                        </div>
                                        <input type="file" onchange="previewImage2(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                    </div>


                                </div>
                                <div class = "clearfix"></div>

                                <div class = "submitBox">
                                    <input id = "submitOr" type="submit" value = "提交">
                                </div>

                            </div>
                            <div class="layui-tab-item">
                                <!--社工认证 -->
                                <div class = "col-md-8">
                                    <ul class = "testUl">
                                        <li>
                                            <p>姓名</p>
                                            <input name = "real_name" type="text"> <span class = 'iconfont'>&#xe60a;</span>
                                        </li>
                                        <li>
                                            <p>身份证号</p>
                                            <input name = "id_card" class = "id-num" type="text"> <span class = 'iconfont'>&#xe60a;</span>
                                            <div class="id-remider">
                                                <p class = "remider"></p>
                                            </div>
                                        </li>
                                        <li>
                                            <p>微信号</p>
                                            <input name = "wechat" type="text">
                                        </li>
                                        <li>
                                            <p style="color: #999; font-size: 12px;"><span class = "iconfont">&#xe60a;</span>为必填内容</p>
                                        </li>

                                    </ul>

                                </div>
                                <div class = "col-md-4">

                                    <div id="preview3" class = "testImg">
                                        <img id="imghead3"  border=0 src='/Public/Home/imgs/uploadImg.png'>
                                    </div>

                                    <div class = "uploadBtn">
                                        <div class = "uploadImg">
                                            上传社工证明
                                        </div>
                                        <input type="file" onchange="previewImage3(this)" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg">
                                    </div>
                                    <div id="preview4" class = "testImg">
                                        <img id="imghead4"  border=0 src='/Public/Home/imgs/uploadImg.png'>
                                    </div>

                                    <div class = "uploadBtn">
                                        <div class = "uploadImg">
                                            手持身份证照
                                        </div>
                                        <input type="file" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" onchange="previewImage4(this)">
                                    </div>

                                </div>
                                <div class = "clearfix"></div>
                                <div class = "submitBox">
                                    <input id = "submitOrMember" type="submit" value = "提交">
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
            <p class = "left">北京社居易有限公司 版权所有</p>
            <p class = "right">
                Copyright © EasyLife.com All rights reserved.2017-2020  京ICP证1166666号 京公网安备133333333444
            </p>
        </div>
    </div>
</div>
</body>
<script>
    var isIDCard1=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;

    $(".id-num").blur(function () {

        if( ! isIDCard1.test($(this).val()) ){
            console.log("身份验证");
            $(this).siblings(".id-remider").children(".remider").html("请输入正确的身份证号");
            console.log($(this).next().siblings(".remider"));
            return false
        }else{
            $(this).siblings(".id-remider").children(".remider").html("");
        }

    });


    var isDianhua  = /^\d{7,8}$/; /*以电话开始结尾*/
    $(".dianhuaNum").blur(function () {

        if(! isDianhua.test( $(this).val()) ){
            $(this).siblings(".id-remider").children(".remider").html("请输入正确的电话号码");
        }else{
            $(this).siblings(".id-remider").children(".remider").html("");
        }

    });

    /*城市三级联动*/
    $('#demo').citys({code:350206});

    /*社会组织认证*/
    $("#submitOr").click(function(){


        var origanization_name = $("input[name='origanization_name']").val(); //社会组织名字
        var province = $("select[name='province']")[0].value;       //社会组织所在省
        var city = $("select[name='city']")[0].value;                 //社会组织所在城市
        var area = $("select[name='area']")[0].value;               //社会组织所在区域
        var address = $("input[name='address']").val();          //社会组织地址
        var manger_name = $("input[name='manger_name']").val();              //社会组织运营人员姓名
        var telephone = $("input[name='telephone']").val();      //社会组织固定电话
        var origanization_type = $("select[name=origanization_type]").val();   //社会组织类型
        var id_number = $("input[name='id_number']").val();   //运营者身份证号
        var business_licence_img = $("#imghead").attr("src");
        var logo_img = $("#imghead2").attr("src");

        console.log(origanization_name);
        console.log(province);
        console.log(city);
        console.log(area);
        console.log(address);
        console.log(manger_name);
        console.log(telephone);
        console.log(id_number);
        console.log(business_licence_img);
        console.log(logo_img);
        if( origanization_name == ""){
            layer.msg('请填写社会组织名字');
            return false;
        }
        if( address == ""){
            layer.msg('请填写详细地址');
            return false;
        }
        if( telephone == ""){
            layer.msg('请填写电话');
            return false;
        }

        if( manger_name == ""){
            layer.msg('请填写运营者姓名');
            return false;
        }
        if( id_number == ""){
            layer.msg('请填写运营者身份证号');
            return false;
        }
        if( business_licence_img.indexOf('data:image') == -1){
            layer.msg('请上传营业执照');
            return false;
        }
        if( logo_img.indexOf('data:image') == -1){
            layer.msg('请上传组织logo');
            return false;
        }

        $.ajax({
            url: "http://120.24.242.45/shejuyi/index.php/Home/Origanizationback/doOriganizationIdenty",
            type: "POST",
            data: {
                origanization_name : origanization_name,
                province : province,
                city : city,
                area : area,
                address : address,
                tel_code : "<?php echo ($phonecode); ?>",
                telephone :telephone,
                manger_name :manger_name,
                id_number :id_number,
                origanization_type : 2,
                business_licence_img : business_licence_img,
                logo_img :logo_img
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.state == 1)
                {
                    window.location.href = "main.html"
                }
            },
            async:false
        });
        return false;
    });


    /*社工认证*/
    $("#submitOrMember").click(function(){

        var real_name = $("input[name='real_name']").val();
        var id_card = $("input[name='id_card']").val();
        var wechat = $("input[name='wechat']").val();
        var id_card_img = $("#imghead3").attr("src");
        var staff_img = $("#imghead4").attr("src");

        if( real_name == ""){
            layer.msg('社工姓名');
            return false;
        }
        if( id_card == ""){
            layer.msg('身份证号');
            return false;
        }
        if( wechat == ""){
            layer.msg('微信号');
            return false;
        }
        if( id_card_img.indexOf('data:image') == -1){
            layer.msg('手持身份证照片');
            return false;
        }
        if( staff_img.indexOf('data:image') == -1){
            layer.msg('社工证明');
            return false;
        }
        console.log(real_name);
        console.log(id_card);
        console.log(id_card_img);
        console.log(staff_img);

        /**/
        $.ajax({
            url: "http://120.24.242.45/shejuyi/index.php/Home/Origanizationback/doOriganizationPersonIdenty",
            type: "POST",
            data: {
                real_name :  real_name,
                id_card : id_card,
                id_card_img : id_card_img,
                staff_img : staff_img,
                wechat: wechat
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.state == 1) {
                   window.location.href = "main.html";
                }
            },
            async:false
        });
        return false;
    });
</script>

</html>