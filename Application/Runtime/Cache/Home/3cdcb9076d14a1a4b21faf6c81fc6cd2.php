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


</head>
<body>

<div class="shadeBox"></div>
<!-- <div id = "showCityBox" class = "province-switch" style = "display: none;">
</div> -->




<div class = "container">
    <div class = "testifyBox">
        <h2 >社区入驻认证</h2>
        <div class = "col-md-8">
            <ul class = "testUl" style = "padding-bottom: 0">
                <li>
                    <p>社区名</p>
                    <input type="text" name = "community_name">
                </li>
                <li>
                        <div>地址</div>
                        <p style = "height:20px"></p>
                        <div id="demo3" class="citys" style = "position:relative;top:-15px">
                            <p>
                                <select name="province" style = "width:100px"></select>
                                <select name="city" style = "width:100px"></select>
                                <select name="area" style = "width:100px"></select>
                                <select name="town" style = "width:100px"></select>
                            </p>
                        </div>

                </li>
                <li>
                    <p>详细地址</p>
                    <input type="text" name = "address">
                </li>
                <li>
                    <p>固定电话</p>
                    <input type="text" name = "telephone">
                </li>
                <li>
                    <p>运营者姓名</p>
                    <input type="text" name = "manger_name">
                </li>
                <li>
                    <p>运营者身份证号</p>
                    <input type="text" name = "id_number">
                </li>
            </ul>

        </div>
        <div class = "col-md-4">

            <div id="preview" class = "testImg">
                <img id="imghead" width=100% border=0 src='/shejuyi/Public/Home/imgs/uploadImg.png'>
            </div>


            <div class = "uploadBtn">
                <div class = "uploadImg">
                    上传机构营业执照
                </div>
                <input type="file" onchange="previewImage(this)">
            </div>


        </div>
        <div class = "clearfix"></div>

      


        <div class = "submitBox">
            <input type="submit" value = "提交">
        </div>

    </div>
</div>
</body>
<!-- 地址 -->
 <script type="text/javascript">
    var $town = $('#demo3 select[name="town"]');
    var townFormat = function(info){
        $town.hide().empty();
        if(info['code']%1e4&&info['code']<7e5){ //是否为“区”且不是港澳台地区
            $.ajax({
                url:"/shejuyi/Public/Town/"+info['code']+'.json',
                dataType:'json',
                success:function(town){
                    $town.show();
                    for(i in town){
                            $town.append('<option value="'+i+'">'+town[i]+'</option>');
                    }
                }
            });
        }
    };
    $('#demo3').citys({
        province:'福建',
        city:'厦门',
        area:'思明',
        onChange:function(info){
            townFormat(info);
        }
    },function(api){
        var info = api.getInfo();
        townFormat(info);
    });
// 提交社区认证信息
  $("input[type='submit']").click(function(){
        var community_name = $("input[name='community_name']").val(); //社区名字
        var province = $("select[name='province']")[0].value;       //社区所在省
        var city = $("select[name='city']")[0].value;                 //社区所在城市
        var area = $("select[name='area']")[0].value;               //社区所在区域
        var town = $("select[name='town']")[0].value;               //社区所在街道
        var address = $("input[name='address']").val();          //社区地址
        var manger_name = $("input[name='manger_name']").val();              //社区运营人员姓名
        var id_number   = $("input[name='id_number']").val();  //社区运营人员身份证号
        var telephone = $("input[name='telephone']").val();      //社区固定电话
        var option = $("select[name='town'] option");
        for(var i=0;i<=option.length-1;i++)
        {
            if(option[i].value==town)
            {
                var town_name = option[i].text;     //取得街道的名字
                break; 
            }
        }
        $.ajax({
            url: "<?php echo U('Community/doCommunityIdenty');?>",
            type: "POST",
            data: {
                community_name: community_name,  //社区名字
                province: province,     //社区所在省份
                city:city,              //社区所在市
                area:area,              //社区所在区/县
                town:town,              //社区所在镇/街道
                address:address,        //社区详细地址
                manger_name:manger_name,              //社区运营者姓名
                id_number:id_number,    //运营者身份证号
                telephone:telephone,   //社区固定电话
                town_name:town_name     //街道名字
            },
            dataType: "json",
            success: function (data) {
                if(data.state == 0)
                {
                   if(data.errorInfo == "")
                   {
                    layer.msg("系统错误,请联系社居易")
                   }
                   else{
                   layer.msg(data.errorInfo);
                    }
                }
                if(data.state == 1)
                {
                   layer.msg("认证成功", function(){
                       window.parent.parent.location.reload();
                    window.parent.close();
                    window.close();
                    }); 
                    // $("body").oneTime("3s",function(){
                    //     location.href = "/Home/Index/origanizationList"
                    // }) 
                }
            }
        });
        return false;
    })
</script>
</html>