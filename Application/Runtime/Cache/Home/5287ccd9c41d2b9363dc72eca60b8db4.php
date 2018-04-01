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

<script src="/Public/Home/js/layui.js"></script>
<script src="/Public/Home/js/layui.all.js"></script>
<link rel="stylesheet" href="/Public/Home/css/layui.css">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>添加项目进度</title>
<style type="text/css">
* {
        margin: 0;
        padding: 0;
    }
    
    #upBox {
        text-align: center;
        width: 500px;
        padding: 20px;
        border: 1px solid #666;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        position: relative;
        border-radius: 10px;
    }
    
    #inputBox {
        width: 100%;
        height: 40px;
        border: 1px solid cornflowerblue;
        color: cornflowerblue;
        border-radius: 20px;
        position: relative;
        text-align: center;
        line-height: 40px;
        overflow: hidden;
        font-size: 16px;
    }
    
    #inputBox input {
        width: 114%;
        height: 40px;
        opacity: 0;
        cursor: pointer;
        position: absolute;
        top: 0;
        left: -14%;
    }
    
    #imgBox {
        text-align: left;
    }
    
    .imgContainer {
        display: inline-block;
        width: 32%;
        height: 150px;
        margin-left: 1%;
        border: 1px solid #666666;
        position: relative;
        margin-top: 30px;
        box-sizing: border-box;
    }
    
    .imgContainer img {
        width: 100%;
        height: 150px;
        cursor: pointer;
    }
    
    .imgContainer p {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 30px;
        background: black;
        text-align: center;
        line-height: 30px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        display: none;
    }
    
    .imgContainer:hover p {
        display: block;
    }
    /* #btn {
        /* display: inline-block; */
    /* text-align: center; */
    /* margin: auto; */
    /* line-height: 30px;
        outline: none;
        width: 100px;
        height: 30px;
        background: cornflowerblue;
        border: 1px solid cornflowerblue;
        color: white;
        cursor: pointer;
        margin-top: 30px;
        border-radius: 5px; */
}
*/
</style>
</head>

<body>
    <form class="layui-form" id="upBox" action="/index.php/Home/Project/addProjectRate">
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type='hidden' name='project_id' value='<?php echo ($project_id); ?>' />
                <input type="text" name="rate_title" required lay-verify="required" placeholder="请输入进度标题" autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <textarea name="rate_desc" required lay-verify="required" placeholder="请输入进度内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div style="width: 100%;position: relative;">

                <div id="inputBox"><input type="file" title="请选择图片" id="file" multiple accept="image/png,image/jpg,image/gif,image/JPEG" />点击选择图片</div>
                <div id="imgBox"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" style='display:none' id="btn" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>
    </form>
    <script src="/Public/Home/js/uploadImg20180401sjj.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        function dosubmit() {
            $("button").trigger("click");
        }
        imgUpload({
            inputId: 'file', //input框id
            imgBox: 'imgBox', //图片容器id
            buttonId: 'btn', //提交按钮id
            upUrl: '/index.php/Home/Project/addProjectRate', //提交地址
            data: 'rate_img', //参数名
            num: "5" //上传个数
        })
    </script>


    <script>
        //Demo
        layui.use('form', function() {
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data) {

                $.ajax({
                    url: 'xxoo.php',
                    type: 'post',
                    dataType: 'json',
                    data: data.field,
                    success: function(data) {

                    },
                })
                return false;
            });
        });
    </script>
</body>

</html>