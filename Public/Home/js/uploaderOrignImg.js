var uploader = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: 'lib/webuploader/0.1.5/Uploader.swf',


    // 文件接收服务端。
    server: 'goods/getGoodsDescriptionPhoto',


    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker',


    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    },
    compress: false,//不启用压缩
    resize: false,//尺寸不改变
    duplicate: true   //可重复上传
});
//当有文件添加进来的时候
uploader.on( 'fileQueued', function( file ) {  // webuploader事件.当选择文件后，文件被加载到文件队列中，触发该事件。等效于 uploader.onFileueued = function(file){...} ，类似js的事件定义。

});


// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader.on( 'uploadSuccess', function( file ,response) {
    var $list = $("#fileList");
    var $li = $(
            "<div id='des"+imgDes+"' style='float: left;'><div style='width: 108px;height: 108px;border: 1px solid rgb(219,219,219);text-align:center;'>"
            +"<img style='margin-top:4px'>"
            +"<div onclick='deleteDescriptionSession(\""+response.data.src+"\",\""+imgDes+"\")' style='text-align:center;cursor:pointer;background-color: black;width: 108px;height: 20px;filter:alpha(opacity:30);opacity:0.6;position: relative;top:-16px'>"
            +"<span style='color: red;filter:alpha(opacity:30);opacity:1;'>删&nbsp;除</span>"
            +"</div>"
            +"</div></div>"
        ),
        $img = $li.find('img');


    imgDes++;

// $list为容器jQuery实例
    $list.append( $li );

// 创建缩略图
// 如果为非图片文件，可以不用调用此方法。
// thumbnailWidth x thumbnailHeight 为 100 x 100
    uploader.makeThumb( file, function( error, src ) {   //webuploader方法
        if ( error ) {
            $img.replaceWith('<span>不能预览</span>');
            return;
        }

        $img.attr( 'src', src );
    }, 100, 100 );

    $( '#'+file.id ).addClass('upload-state-done');

});


// 文件上传失败，显示上传出错。
uploader.on( 'uploadError', function( file,response ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');


    $error.text('上传失败');
    parent.layer.msg(response.msg, {icon : 5,time : 1500});
});