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

<div class = "addMemberBox">
    <span class = "closeCityBox"></span>
    <h3>添加成员</h3>
    <div class = "add">
        <p class = "addTit">请输入添加成员的的电话号</p>
        <input class = "searchBox" type="text">
        <button  class = "addSearchBtn">搜索</button>

        <div class = "InfoBox">

            <p class = "returnInfo" style = "display: none">
                该成员不存在，请先进行确认。
            </p>

            <div class = "exitMember" style = "display: none">
                <img src="../imgs/personDl.jpg" alt="">
                <p>A0启明星</p>
            </div>

        </div>



    </div>

    <div class = "addBtn">
        <button class = "inviteBtn" disabled = "disabled">邀请绑定</button>
        <button class = "cancelBtn">取消</button>
    </div>
</div>

<script>

    $(".closeCityBox").click(function(){
        $(".shadeBox").css("display", "none");
        $("#showCityBox").css("display", "none");

    });

    $(".cancelBtn").click(function(){
        $(".shadeBox").css("display", "none");
        $("#showCityBox").css("display", "none");

    });

    $(".addSearchBtn").click(function () {

        var phone = $(".searchBox").val();
        console.log(phone);
        $.ajax({
            url: "/index.php/Home/Origanization/searchNameByPhone",
            type: "POST",
            data: {
                phone : phone
            },
            dataType: "json",
            success: function (data) {

                console.log(data);

                if(data.state == 99) {
                    var html = '';
                    html += '<p class = "returnInfo">'+ data.errorInfo +'</p>';
                    $(".InfoBox").html(html);
                }

                if(data.state == 1) {
                    var html = '';
                    html += '<div class = "exitMember">' +
                            '<img src="'+ data.image +'" alt="">' +
                            '<p>'+ data.name +'</p>' +
                            '</div>';
                    $(".InfoBox").html(html);
                    $(".inviteBtn").removeAttr("disabled")
                }

                if(data.state == 2) {
                    var html = '';
                    html += '<p class = "returnInfo">'+ data.errorInfo +'</p>';
                    $(".InfoBox").html(html);
                }
                if(data.state == 3) {
                    var html = '';
                    html += '<p class = "returnInfo">'+ data.errorInfo +'</p>';
                    $(".InfoBox").html(html);
                }
                if(data.state == -1) {
                    var html = '';
                    html += '<p class = "returnInfo">'+ data.errorInfo +'</p>';
                    $(".InfoBox").html(html);
                }
            },
            async:false
        });
        return false;
    });



    $(".inviteBtn").click(function () {

        var phone = $(".searchBox").val();
        console.log(phone);

        $.ajax({
            url: "/index.php/Home/Origanization/doAddStaff",
            type: "POST",
            data: {
                phone : phone
            },
            dataType: "json",
            success: function (data) {

                console.log(data);

                if(data.state == 1) {
                    layer.msg("邀请成功");
                    $(".shadeBox").css("display", "none");
                    $("#showCityBox").css("display", "none");
                    var html = '';
                    html += '<tr>' +
                            '<td>'+ data.user_info.sjy_origanization_user_real_name +'</td>' +
                            '<td class = "sjy_origanization_login_id">'+ data.user_info.sjy_origanization_login_id +'</td>' +
                            '<td>'+ data.user_info.sjy_origanization_user_email +'</td>' +
                            '<td>' +
                            '<a class="layui-btn layui-btn-primary layui-btn-xs">查看</a>' +
                            '<a class="layui-btn layui-btn-xs">编辑</a>' +
                            '<a class="layui-btn layui-btn-danger layui-btn-xs deleteEmployees" href = "javascript:;">删除</a>' +
                            '</td>' +
                            '</tr>';

                    $("#tableBody").append(html);

                }


            },
            async:false
        });
        return false


    })



</script>