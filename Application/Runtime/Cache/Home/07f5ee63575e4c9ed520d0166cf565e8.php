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
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/region.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/testfy.css">
    <link rel="stylesheet" href="/shejuyi/Public/Home/css/chooseCity.css">
    <script src = "/shejuyi/Public/Home/js/bootstrap.js"></script>
    <script src = "/shejuyi/Public/Home/js/jquery.page.js"></script>
    <script src = "/shejuyi/Public/Home/js/upLoadImg.js"></script>
    <script type="text/javascript" src="/shejuyi/Public/Home/js/cityData.js"></script>
    <script type="text/javascript" src="/shejuyi/Public/Home/js/cityPicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/shejuyi/Public/Home/css/cityPicker.css">
</head>
<body>
<script>
// $(".send_project_book").click(function(){
      layui.use('upload', function(){
      var upload = layui.upload;

      //执行实例
      var uploadInst = upload.render({
        elem: '#send_project_book' //绑定元素
        ,url:'/shejuyi/index.php/Home/Origanization/file_upload/community_id/<?php echo ($community_info[0]["sjy_id"]); ?>/project_id/<?php echo ($projectinfo["sjy_id"]); ?>'
        ,exts: 'pdf|doc|docx'
        ,done: function(res){
          //上传完毕回调
          if(res.state == 1)
          {
            layer.msg("发送成功");
          }
        }
        ,error: function(){
          //请求异常回调
        }
      });
    });
// })

</script>
<div class="shadeBox"></div>
<div id = "showCityBox" class = "province-switch" style = "display: none;">
</div>
<?php if(empty($loginhead)): if($islogin == 0): ?><div class = "headLogin">
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

<?php else: ?>
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
    <a href=""><img id="avator" style = "width:40px;height:40px;border-radius:50%" src="/shejuyi<?php echo ($user_image); ?>" class="layui-nav-img">&nbsp;&nbsp;&nbsp;<?php echo ($showname); ?></a>
    <dl class="layui-nav-child">
     <?php if($isidentify == 0): ?><dd><a href="javascript:;" id = "doidentify">请先完成个人认证</a></dd>
     <?php else: ?>
          <dd id="personinfo"><a href="javascript:;">个人信息</a></dd>
          <dd id="myoriganization"><a href="javascript:;">我的机构</a></dd>
          <dd id="myproject"><a href="javascript:;">我的项目</a></dd>
          <dd><a href="javascript:;">我的消息</a></dd><?php endif; ?>
    <dd><a href="/shejuyi/index.php/Home/Origanization/logout">注销</a></dd>
    </dl>
  </li>
</ul>
</div>
</div>
</div>
<script type="text/javascript">
    //个人信息被点击
        $("#personinfo").click(function(){
            layer.open({
                    type:2,
                    title:"个人信息",
                    content:"/shejuyi/index.php/Home/Origanization/personinfo",
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
       $("#myoriganization").click(function(){
            layer.open({
                type:2,
                title:"我的机构",
                content:"/shejuyi/index.php/Home/Origanization/myoriganization",
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
                content:"/shejuyi/index.php/Home/Origanization/myproject",
                area:["95%","95%"],
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
</script><?php endif; endif; ?>
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
                  url:"/shejuyi/index.php/Home/Origanization/setcity",
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

<div class = "container">
    <div class = "testifyBox">
        <h2 ><?php echo ($projectinfo["sjy_community_project_title"]); ?></h2>
        <div class = "col-md-12">
            <?php if($isshowbutton == 1): ?><div class = "oneTalk">
                <a href="javascript:;" id="send_project_book">
                    发送项目书
                </a>
            </div><?php endif; ?>

            <ul class = "testUl peopleInfo">
                <li>
                    <p>服务对象 :<span><?php echo ($projectinfo["sjy_community_project_service_area"]); ?></span></p>
                </li>
                <li>
                    <p>项目地点 : <span><?php echo ($community_info[0]["sjy_community_name"]); ?></span><span> <a href = "/shejuyi/index.php/Home/Origanization/communityinfo/id/<?php echo ($community_info[0]["sjy_id"]); ?>">社区详情</a></span></p>
                    <?php echo ($community_info[0]["province"]); echo ($community_info[0]["city"]); echo ($community_info[0]["area"]); echo ($community_info[0]["street"]); echo ($community_info[0]["sjy_community_address"]); ?><br />
                    <?php echo ($community_info[0]["sjy_community_phone"]); ?>
                </li>
		<li>
		    <p>招标周期:<span><?php echo ($projectinfo["sjy_community_project_collect_start_time"]); ?>-<?php echo ($projectinfo["sjy_community_project_collect_end_time"]); ?></span></p>
		</li>
                <li>
                    <p>执行周期: <span><?php echo ($projectinfo["sjy_community_project_start_time"]); ?>-<?php echo ($projectinfo["sjy_community_project_end_time"]); ?></span></p>
                </li>
                <li>
                    <p> 需求简介: <span><?php echo ($projectinfo["sjy_community_project_demand"]); ?></span></p>

                </li>
		<?php if(is_array($projectinfo["project_image"])): foreach($projectinfo["project_image"] as $key=>$val): ?><li class = "detailImg">
                    <img src="/shejuyi<?php echo ($val["sjy_community_project_image"]); ?>" alt="">
                </li><?php endforeach; endif; ?>
               <?php if($origanization_base_info != null): ?><p>项目执行方信息</p>
                     <li><p>项目方名称:<span><?php echo ($origanization_base_info['sjy_origanization_name']); ?></span></p></li>
                     <li><p>联系电话:<span><?php echo ($origanization_base_info['sjy_origanization_phone']); ?></span></p></li>
                     <li><p>地址:<span><?php echo ($origanization_base_info['position_info']); ?></span></p></li><?php endif; ?>
            </ul>
              <?php if($rateinfo != null): if(is_array($rateinfo)): foreach($rateinfo as $key=>$val): ?><a name="rate<?php echo ($val["sjy_id"]); ?>"></a>
              	<?php echo ($val["sjy_projectrate_title"]); ?><br />
                <?php echo ($val["create_time"]); ?><br />
                <?php echo ($val["sjy_project_rate_con"]); ?>
             	 <hr class="layui-bg-orange"><?php endforeach; endif; endif; ?>
        </div>

        <div class = "clearfix"></div>
        <div style = "height: 50px;"></div>
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
<script>
   
    //     layui.use('upload', function(){
    //          var upload = layui.upload;
    //      var uploadInst = upload.render({
    //           elem: '#send_project_book'
    //           url: '/shejuyi/index.php/Home/Origanization/file_upload/community_id/<?php echo ($community_info[0]["sjy_id"]); ?>/project_id/<?php echo ($projectinfo["sjy_id"]); ?>',
    //            ,done: function(res){
    //                 //上传完毕回调
    //             }
    //             ,error: function(){
    //               //请求异常回调
    //             }
    //           ext: 'pdf|doc|docx'
    //     });      
    // })
	 $("#Chooseicity").click(function(){
             layer.open({
                    type:2,
                    title:"选择城市",
                    content:"/shejuyi/index.php/Home/Origanization/choosecity",
                    btnAlign: 'c',
                    area:["80%","95%"],
                    btn:["确定","重置"],
                    yes:function(index,layero)
                    {
                        var iframeWin = window[layero.find('iframe')[0]['name']];
                        var res = iframeWin.choose_city();  //子页面点击确认
                        if(res)
                        {

                           layer.closeAll();
                           window.location.reload();
                        }
                    }
                })
        })
</script>
</html>