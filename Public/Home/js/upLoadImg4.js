//图片上传预览    IE是用了滤镜。
function previewImage4(file)
{
    var MAXWIDTH  = 240;
    var MAXHEIGHT = 200;
    var div = document.getElementById('preview4');

    if (file.files && file.files[0])
    {
        var fileData = file.files[0];
        var size = fileData.size;   //注意，这里读到的是字节数

        var isAllow = false;
        var maxSize = 1;
        maxSize = maxSize * 1024 * 1024;   //转化为字节

        isAllow = size <= maxSize;


        if(!isAllow){
            alert("图片太大");
            layer.msg(666666);
            return false;
        }

        div.innerHTML ='<img id="imghead4">';
        var img = document.getElementById('imghead4');

        if( img.fileSize>102400){
            alert('请上传80*80像素 或者大小小于100k的图片');
            return false;
        }



        img.onload = function(){
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            img.width  =  rect.width;
            img.height =  rect.height;
            //img.style.marginLeft = rect.left+'px';
            img.style.marginTop = rect.top+'px';
        };
        var reader = new FileReader();
        reader.onload = function(evt){
            img.src = evt.target.result;
        };
        reader.readAsDataURL(file.files[0]);
    }
    else //兼容IE
    {
        var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
        file.select();
        var src = document.selection.createRange().text;
        div.innerHTML = '<img id="imghead4">';
        var img = document.getElementById('imghead4');
        img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
        status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        div.innerHTML = "<div id='imghead4' style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
    }
}
function clacImgZoomParam( maxWidth, maxHeight, width, height ){
    var param = {top:0, left:0, width:width, height:height};
    if( width>maxWidth || height>maxHeight )
    {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;

        if( rateWidth > rateHeight )
        {
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
        }else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
        }
    }
    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;
}
