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

<link rel="stylesheet" href="/Public/Home/css/layui.css">
<script src="/Public/Home/js/layui.all.js"></script>

<table class="layui-table" style=" width:94%; margin-left: 3%; margin-top: 20px; margin-bottom: 20px;">
    <colgroup>
        <col width="200">
        <col width="200">
        <col width="200">
        <col width="200">

    </colgroup>
    <thead>
        <tr>
            <th>名称</th>
            <th>服务对象</th>
            <th>征集周期</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a class="layui-btn layui-btn-danger layui-btn-xs">邀请</a>
            </td>

        </tr>
    </tbody>
</table>

<script>
    $.post("/index.php/Home/Project/communityTenderProject", function(data) {

        var html = '';
        console.log(data);
        console.log(data.data.length);

        for (var i = 0; i < data.data.length; i++) {
            html += '<tr>' +
                '<td class = "project_title">' + data.data[i].sjy_community_project_title + '</td>' +
                '<td>' + data.data[i].sjy_community_project_service_area + '</td>' +
                '<td>' + data.data[i].sjy_community_project_collect_start_time + ' ~ ' + data.data[i].sjy_community_project_collect_end_time + '</td>' +
                '<td>' +
                '<a class="layui-btn layui-btn-danger layui-btn-xs inviteBtn" id = "' + data.data[i].sjy_id + '" href = "javascript:;" >邀请</a>' +
                '</td>' +
                '</tr>';
        }

        $("#tableBody").html(html);

        $(".inviteBtn").click(function() {

            var project_title = $(".project_title").text();
            var agreeOrganization = '<?php echo ($origanization_name); ?>';

            var project_id = $(this).attr("id");

            var origanization_id = '<?php echo ($origanization_code); ?>';

            layer.confirm('是否确定?<br><p style = "color: red;">' + project_title + '</p>由<p style = "color: red;">' + agreeOrganization + '</p>', {
                btn: ['确定', '取消'] //可以无限个按钮
            }, function(index, layero) {



                console.log( project_id + "project_id");
                console.log( origanization_id + "origanization_id");
                

                $.post("/index.php/Home/Project/inviteOriganization", {
                    "project_id": project_id,
                    'origanization_code':origanization_id
                }, function(data) {


                    if (data.state == 1) {
                        layer.msg(data.errorInfo, function () {
                            parent.layer.closeAll();
                        })
                    } else {

                        layer.msg(data.errorInfo);
                    }

                });


            }, function(index) {
                //按钮【按钮二】的回调
            });

        });

    })
</script>