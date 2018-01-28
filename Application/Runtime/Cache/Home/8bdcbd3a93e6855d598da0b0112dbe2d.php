<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	 <script type="text/javascript" src = "/shejuyi/Public/Common/js/jquery.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/js/jquery-ui.min.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/layer/layer.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Common/js/jquery-ui.min.js"></script>
	 <link  rel="stylesheet" href = "/shejuyi/Public/Common/layui/css/layui.css" />
	 <script type="text/javascript" src = "/shejuyi/Public/Common/layui/layui.js"></script>
	 <script type="text/javascript" src="/shejuyi/Public/Home/js/jquery.citys.js"></script> 
	 <script type="text/javascript" src="/shejuyi/Public/Home/js/jquery.timers.min.js"></script> 
	

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyLife</title>
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/bootstrap.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/common.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/chooseCity.css">
  
    <script src = "/shejuyi/Public/Home/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/shejuyi/Public/Home/css/cityPicker.css">
     <script type="text/javascript" src="/shejuyi/Public/Home/js/cityData.js"></script>
      <script type="text/javascript" src="/shejuyi/Public/Home/js/cityPicker.js"></script>
</head>
<body>
<div class="shadeBox"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>

<?php if($islogin == 0): ?><div class = "headLogin">
    <div class = "container">
        <div class = "loginBox">
            <a href="login.html">登录</a>
            <span class = "splitLine"></span>
            <a href="register.html">注册</a>
           </div>
    </div>
</div>
<?php else: ?>
<script>
            //注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
  //…
});
</script>
<div class = "headLogin">
<div class = "container">
<div class = "loginBox">
            <ul class="layui-nav">
                  <li class="layui-nav-item">
                    <a href=""><img id="avator" style = "width:40px;height:40px;border-radius:50%" src = "/shejuyi<?php echo ($userinfo["sjy_community_user_image"]); ?>" />&nbsp;&nbsp;&nbsp;<?php echo ($showname); ?></a>
                    <dl class="layui-nav-child">
                     <?php if($isidentify == 0): ?><dd><a href="javascript:;" id = "doidentify">请先完成个人认证</a></dd>
                    <?php else: ?>
                      <dd id = "personinfo"><a href="javascript:;">个人信息</a></dd>
                     <dd id = "mycommunity"><a href="javascript:;">我的社区</a></dd>
                      <dd id = "myproject"><a href="javascript:;">我的项目</a></dd>
                      <dd id = "mymsg"><a href="javascript:;">我的消息</a></dd><?php endif; ?>
		    <dd><a href="/shejuyi/index.php/Home/Community/logout">注销</a></dd>
                    </dl>
                  </li>
            </ul>
</div>
</div>
</div>
<script type="text/javascript">
    //个人信息被点击
     //个人信息被点击
        $("#personinfo").click(function(){
            layer.open({
                    type:2,
                    title:"个人信息",
                    content:"/shejuyi/index.php/Home/Community/personinfo",
                    btnAlign: 'c',
                    area:["80%","95%"],
                    btn:["确定"],
                    yes:function(index, layero){
                      var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：
                      iframeWin.submit();
                      layer.close(layer.index);
                    }
               });
        })

        //我的社区被点击
       $("#mycommunity").click(function(){
            layer.open({
                type:2,
                title:"我的机构",
                content:"/shejuyi/index.php/Home/Community/mycommunity",
                area:["80%","95%"],
                btnAlign: 'c',
                btn:["确定"],
                yes:function(index, layero){
                      var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：
                      iframeWin.submit();
                      layer.close(layer.index);
                    },
                cancel:function(index,layero)
                 {
                     // top.location.hash = '';
                     history.replaceState(null,'',location.pathname+location.search);
                 }

            })
       })

        //我的项目被点击
       $("#myproject").click(function(){
            layer.open({
                type:2,
                title:"我的项目",
                content:"/shejuyi/index.php/Home/Community/myproject",
                area:["100%","95%"],
            })
       })
	     $("#doidentify").click(function(){
            //判断用户是否认证
            var res = isIdentify();
            if(!res)
            {
                return false;
            }
        })
          //判断用户是否认证逻辑
        function isIdentify()
        {
             if("<?php echo ($isidentify); ?>" == 1)
            {
                return true;
            }
            else
            {
                //未认证
                layer.open({
                    type:2,
                    title:"选择身份",
                    content:"chooserole",
                    btnAlign: 'c',
                    area:["80%","95%"],
                })
                return false;
            }

        }
</script><?php endif; ?>

<div class = "headNavBox">
    <div class = "container">
        <div class = "top">
            <div class = "logo  col-md-4">
                <img src="/shejuyi/Public/Home/imgs/logo.png" alt="">
                 <a href = "javascript:;" id = "Choosecity" class = "region"><?php echo ($city["city"]); ?></a>
                                 <input type="hidden" id="province" value="">
                  <input type="hidden" id="city" value="">
                  <script>
      var cityPicker = new IIInsomniaCityPicker({
          data: cityData,
          target: '#Choosecity',
          valType: 'k-v',
          hideCityInput: '#city',
          hideProvinceInput: '#province',
          callback: function(city_id){
              $.ajax({
                  url:"/shejuyi/index.php/Home/Community/setcity",
                  type:"post",
                  dataType:"json",
                  data:{cityid:city_id},
                  success:function(data)
                   {
                       if(data)
                       {
                           location.reload();
                       }
                   }
              })
  
          }
      });
  
      cityPicker.init();
  </script>

            </div>
         
        </div>

    </div>
    <div class = "container search">
        <form class="col-md-8" role="search">
            <input class="form-control" type="text" />
            <button type="submit" class="btn btn-default">在线搜索</button>
        </form>
        <div class = "col-md-4">
            <a class = "socialBtn btn-switch" href="">社会组织版</a>
            <a class = "comunityBtn btn-switch" href="">社区版</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <p class="programNum">
            共有 <span>10000</span> 个项目在线
        </p>
        <h4 class = "plateTit">社会组织信息</h4>

        <div class="col-md-9 column box-padding">
            <h3 class = "organizeTit"><?php echo ($origanization_info[0]["sjy_origanization_name"]); ?></h3>
             <div class="layui-carousel" id="test1">
                <div carousel-item>
                    <?php if(is_array($origanization_images)): foreach($origanization_images as $key=>$val): ?><img src = "/shejuyi<?php echo ($val["sjy_origanization_image"]); ?>" /><?php endforeach; endif; ?>
                </div>
            </div>
            <script>
                    layui.use('carousel', function(){
                      var carousel = layui.carousel;
                      //建造实例
                      carousel.render({
                        elem: '#test1'
                        ,width: '100%' //设置容器宽度
                        ,arrow: 'always' //始终显示箭头
                        //,anim: 'updown' //切换动画方式
                      });
                    });
            </script>
                    <ul class = "detail col-md-8">
                        <li>
                           <span>地址</span>:<span><?php echo ($origanization_info[0]["city"]); echo ($origanization_info[0]["area"]); echo ($origanization_info[0]["area"]); echo ($origanization_info[0]["sjy_origanization_address"]); ?></span><br />
                           <span>联系电话</span>:<span><?php echo ($origanization_info[0]["sjy_origanization_phone"]); ?></span><br />
                        </li>
                    </ul>
            

        </div>
        <ul class="col-md-3 column morningStarDetail">
            <li class = "topBox">
                <h3>项目情况
                    <span>项目类型</span>
                </h3>
                <p>
                    <a href = "">项目概况</a> <span>|</span>
                    <a href = "">情况鉴定</a> <span>|</span>
                    <a href = "">项目情况</a> <span>|</span>
                </p>
            </li>
            <li class = "morningStarMember">
                <p>项目人员</p>
                <p><span>89239 </span>人</p>
            </li>
            <li class = "morningStarMember">
                <p>项目人员</p>
                <p><span>89239 </span>人</p>
            </li>
            <li class = "morningStarMember">
                <p>项目人员</p>
                <p><span>89239 </span>人</p>
            </li>
            <li class = "morningStarDeclare">
                <p>*项目情况项目人员项目</p>
            </li>
        </ul>
    </div>
</div>

<div class = "container">
    <h4 class = "plateTit">需求对接</h4>
    <div class = "row clearfix demandMock">
    <?php if(is_array($plan_project)): foreach($plan_project as $key=>$val): ?><div class = "col-md-6 column">
            <div class = "col-md-5 column">
            <a href = "/shejuyi/index.php/Home/Community/project_info/id/<?php echo ($val["sjy_id"]); ?>">
                <img src="/shejuyi<?php echo ($val["plan_project_image"]); ?>" alt="">
            </a>
            </div>
            <div class = "col-md-7 column">
               <h3 class = "organizeTit"><?php echo ($val["sjy_origanization_project_title"]); ?></h3>
                <p>服务对象:<?php echo ($val["sjy_origanization_project_service_object"]); ?></p>
                <div>
                    <p class = "right">
                        <a class= "detailBtn" href="/shejuyi/index.php/Home/Community/project_info/id/<?php echo ($val["sjy_id"]); ?>">
                            了解详情
                        </a>
                        <a class= "detailBtn" href="/shejuyi/index.php/Home/Community/project_info/id/<?php echo ($val["sjy_id"]); ?>">
                            联系项目
                        </a>
                    </p>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
     
    </div>
</div>
<div class = "container">
    <h4 class = "plateTit">历史项目</h4>

    <div class = "col-md-6 column">
        <ul class = "serviceBrifUl">
        <?php if(is_array($old_project)): foreach($old_project as $key=>$res): ?><a href="">
                <li>
                    <div class = "left">
                        <h4><?php echo ($res["sjy_community_project_title"]); ?></h4>
                        <p>项目简介</p>
                    </div>
                    <div class = "right">
                        2017/1/4
                    </div>
                </li>
            </a><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="carousel slide" id="carousel-798614">
                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#carousel-798614">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-798614">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-798614">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="" src="/shejuyi/Public/Home/imgss/banner.jpg" />
                        <div class="carousel-caption">
                            <h4>
                                First Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="" src="/shejuyi/Public/Home/imgss/banner.jpg" />
                        <div class="carousel-caption">
                            <h4>
                                Second Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="" src="/shejuyi/Public/Home/imgss/banner.jpg" />
                        <div class="carousel-caption">
                            <h4>
                                Third Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div> <a class="left carousel-control" href="#carousel-798614" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-798614" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>



<div style = "height:  30px;"></div>



<div class="row clearfix  footSearch">
    <div class="container">
        <div class = "col-md-5">
            <p class = "p1">实现社会工作与服务资源的</p>
            <p class = "p2">精准匹配</p>
            <p class = "p3">一站式社区管理</p>
        </div>
        <div class = "col-md-7">
            <p class = "p4">社区活动 社会组织 精准搜索</p>
            <input class = "searchBox" type="text" placeholder="请输入项目名称和社会组织名称">
            <button class = "searchBtn">在线搜索</button>
        </div>

    </div>
</div>
<div class="row clearfix footerBox">
    <div class="container">
        <div class="f-title col-md-12">
            <div class="fl col-md-10">
                <ul class = "">
                    <li><a href="" target="_blank">了解社居易</a></li>
                    <li><a href="" target="_blank">关于社居易</a></li>
                    <li><a href="" target="_blank">联系我们</a></li>
                    <li><a href="" target="_blank">加入我们</a></li>
                    <li><a href="" target="_blank">隐私声明</a></li>
                    <li><a href="" target="_blank">网站地图</a></li>
                    <li><a href="" target="_blank">友情链接</a></li>
                    <li><a href="" target="_blank">经纪人登录</a></li>
                </ul>
            </div>
            <div class="col-md-2 fr">官方客服 1010 9666</div>
        </div>
        <div class = "fl">
            <div class="tab">
                <span class="">北京二手房</span>
                <span class="">北京二手房热门城市</span>
                <span class="">北京租房</span>
                <span>北京二手房说明</span>
                <span>北京二手房小区</span>
                <span class="">租房频道下的小区列表</span>
                <span>百科</span>
                <span>链家分站</span>
                <span class="">房产专题</span>
                <span class="hover">热门百科</span>
                <span class="">合作与友情链接</span>
            </div>
        </div>
        <div class="copyright fl">北京社居易有限公司 版权所有</div>
    </div>
</div>
</body>
<script src = "/shejuyi/Public/Home/js/cityBoxShow.js"></script>
</html>