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
    <link rel="stylesheet" href="/Public/Home/css/right-tab.css">

    <script src = "/Public/Home/js/jquery-1.12.4.js"></script>
    <script src = "/Public/Home/js/bootstrap.js"></script>
    <script src = "/Public/Home/js/layui.js"></script>
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


<div class = "tab-right-bar" style = "display: none;">
    <div class = "right-tab">
       <a href="javascript:;">意向 <br>机构</a>
        <!--   <a href="javascript:;">我的意向社区</a>-->
    </div>
    <div class = "right-tab-content">
        <p></p>
       <ul class = "choose-organize-box">
           <li class = "choose-organize-item">
               <div class = "organize-choose-tit">
                   <span>机构A</span>
                   <a class = "agree-organization" href="javascript:;">同意</a>
               </div>
               <div class = "organize-proposal">
                   <p class = "proposal-detail">
                       <span>项目书一</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书二</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书三</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
               </div>
           </li>
           <li class = "choose-organize-item">
               <div class = "organize-choose-tit">
                   <span>机构B</span>
                   <a class = "agree-organization" href="javascript:;">同意</a>
               </div>
               <div class = "organize-proposal">
                   <p class = "proposal-detail">
                       <span>项目书一</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书二</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书三</span>
                       <a class = "download-btn" href="javascript:;">下载</a>
                   </p>
               </div>
           </li>
           <li class = "choose-organize-item">
               <div class = "organize-choose-tit">
                   <span>机构C</span>
                   <a class = "agree-organization" href="javascript:;"><input type="checkbox">同意</a>
               </div>
               <div class = "organize-proposal">
                   <p class = "proposal-detail">
                       <span>项目书一</span>
                       <a class = "download-btn" href="http://127.0.0.1/index.php/Home/Project/downloadProjectBook/id/40">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书二</span>
                       <a class = "download-btn" href="http://127.0.0.1/index.php/Home/Project/downloadProjectBook/id/40">下载</a>
                   </p>
                   <p class = "proposal-detail">
                       <span>项目书三</span>
                       <a class = "download-btn" href="http://127.0.0.1/index.php/Home/Project/downloadProjectBook/id/40">下载</a>
                   </p>
               </div>
           </li>
       </ul>
        <div class = "sure-btn-box">
            <a class="sure-btn" href="javascript:;">确定</a>
            <p class = 'remider'> 注意: 确认所选机构就不能再改啦！</p>
        </div>






    </div>

    <script>

        $(".tab-right-bar").height($(window).height() );
        $(".right-tab-content").height($(window).height() -200);
        $(".sure-btn-box").height( 200);



    </script>

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
                            <a href="/index.php/Home/Community/personInfo">账号设置</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Community/myCommunity">我的社区</a>
                        </li>
                        <li>
                            <a  class = "on" href="/index.php/Home/Project/communityProjectManger">我的项目</a>
                        </li>
                        <li>
                            <a href="">我的消息</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 column perperson-con" style = "background: #FFFFFF;">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"  lay-id="a">征集中</li>
                            <li  lay-id="b">待开始</li>
                            <li  lay-id="c">执行中</li>
                            <li  lay-id="d">结项中</li>
                            <li  lay-id="e">已完成</li>
                        </ul>
                        <div class="layui-tab-content">

                            <div class="layui-tab-item layui-show">
                                <!--社会组织 —— 我的项目 —— 邀请我的-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="160">
                                            <col width="160">
                                            <col width="140">
                                        </colgroup>
                                        <thead>
                                        <tr>

                                            <th>项目名称</th>
                                            <th>发布人</th>
                                            <th>服务对象</th>
                                            <th>征集周期</th>
                                            <th>执行时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tbody1">
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>意向机构 详情</td>
 
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>意向机构 详情</td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination0"></div>
                            </div>

                            <div class="layui-tab-item">
                                <!--社会组织 —— 我的项目 —— 已发送项目书-->
                                <div class="basic-information">

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
                                            <th>序号</th>
                                            <th>项目名称</th>
                                            <th>发布人</th>
                                            <th>执行机构</th>
                                            <th>服务对象</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td>查看</td>

                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td>查看</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination1"></div>
                            </div>
                            <div class="layui-tab-item">
                                <!--社会组织 —— 我的项目 —— 待批复-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>发布人</th>
                                            <th>执行机构</th>
                                            <th>服务对象</th>
                                            <th>开始时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody id = "tBody">
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>进度 查看</td>

                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>进度 查看</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination2"></div>
                            </div>

                            <div class="layui-tab-item">
                                <!--社会组织 —— 我的项目 —— 正在进行-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="60">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>项目名称</th>
                                            <th>执行机构</th>
                                            <th>服务对象</th>
                                            <th>申请结项日期</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td>同意 拒绝 查看 进度</td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td>同意 拒绝 查看 进度</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination3"></div>

                            </div>

                            <div class="layui-tab-item">
                                <!--社会组织 —— 我的项目 —— 待结项目-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="60">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>项目名称</th>
                                            <th>执行机构</th>
                                            <th>服务对象</th>
                                            <th>实际周期</th>
                                            <th>要求周期</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination4"></div>

                            </div>
                            <div class="layui-tab-item">

                                <!--社会组织 —— 我的项目 —— 我发布的-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="80">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>项目名称</th>
                                            <th>服务对象</th>
                                            <th>项目周期</th>
                                            <th>发布时间</th>
                                            <th>发布者</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看</td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>查看</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination5"></div>
                            </div>
                            <div class="layui-tab-item">

                                <!--社会组织 —— 我的项目 —— 已完成的项目-->
                                <div class="basic-information">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="80">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                            <col width="200">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>项目名称</th>
                                            <th>项目方</th>
                                            <th>结项日期</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2016-11-29</td>
                                            <td>人生就像是一场修行</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>2016-11-28</td>
                                            <td>于千万年之中，时间的无涯的荒野里…</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--分页-->
                                <div class = "pagination" id="pagination6"></div>
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


            console.log(dataURL);

            $("#userImg").attr("src", dataURL);


            $.ajax({
                url: "/index.php/Home/Origanization/douploadtouxiang",
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
                    }
                },
                async:false
            });
            return false;



        }
    });
    //clipArea.destroy();

    $.post("/index.php/Home/Project/communityTenderProject", function (data) {

        var html = '';
        for(var i = 0; i < data.data.length; i++){
            html += '<tr>\n' +
                '<td>'+  data.data[i].sjy_community_project_title+'</td>\n' +
                '<td>'+ data.data[i].sjy_community_project_send_prople_name +'</td>\n' +
                '<td>'+ data.data[i].sjy_community_project_service_area +'</td>\n' +
                '<td>'+ data.data[i].sjy_community_project_collect_start_time+'~<br>'+data.data[i].sjy_community_project_collect_end_time +'</td>\n' +
                '<td>'+ data.data[i].sjy_community_project_start_time+'~<br>'+ data.data[i].sjy_community_project_end_time  +'</td>\n' +
                '<td><a href="/index.php/Home/Project/displayCommunityProject/id/'+data.data[i].sjy_id+'">查看</a><br><a class = "intention-organization" href="javascript:;">意向机构</a></td>\n' +
                '\n' +
                '</tr>';
        }


        $("#tbody1").html(html);
        $(".intention-organization").click(function () {
            $(".tab-right-bar").css("display" , "block");

        })




    });

    $.ajax({
        url: "/index.php/Home/Origanization/douploadtouxiang",
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
            }
        },
        async:false
    });



    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage
                ,layer = layui.layer;

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination0'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数
                console.log("page0");

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });


        //执行一个laypage实例
        laypage.render({
            elem: 'pagination1'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数
                console.log("page1");
                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination2'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });


        //执行一个laypage实例
        laypage.render({
            elem: 'pagination3'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });
        //执行一个laypage实例
        laypage.render({
            elem: 'pagination4'
            ,count: 70 //数据总数，从服务端得到
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

        //执行一个laypage实例
        laypage.render({
            elem: 'pagination5'
            ,count: 1000
            ,layout: ['limit', 'prev', 'page', 'next']
        });
        //执行一个laypage实例
        laypage.render({
            elem: 'pagination6'
            ,count: 1000 //数据总数，从服务端得到
            ,curr: location.hash.replace('#!fenye=', '') //获取hash值为fenye的当前页
            ,hash: 'fenye' //自定义hash值
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                }
            }
        });

    });


</script>

</html>