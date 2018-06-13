var Carousel = function () {
};
var _h = 0;
var imgNum = 0;
var flag = true;
Carousel.prototype = {
    //容器选择器
    container:"",
    //图片地址数组
    datas:null,
    autoplaySpeed:null,
    autoplay:false,
    // 初始化
    init:function(options){
        this.container = options.container;
        this.datas = options.datas;
        this.autoplaySpeed = options.autoplaySpeed;
        this.autoplay = options.autoplay;
        $(this.container).html("");
        _h = parseInt($(this.container).css("height"));
        this.createCarousel(options);
        this.arrowHover();
        this.tabImg();
        this.setZindex();
        //判断是否需要自动播放
        if(options.autoplay || this.autoplay == true){
            this.autoPlay(this.autoplaySpeed);
        }else{
            console.log(0);
        }
        this.final();
    },
    createCarousel:function(options){
        this.createDOM(this.container,options);
    },
    // 生成DOM
    createDOM:function(container,options){
        console.log(options);
        var html = "";
        html = "<div class='carousel-box clearfix'>"+
            "<div class='transverse-box'>"+
            "</div>"+
            "<div class='vertical-box'>"+
            "<ul>"+
            "<div class='ul-box'></div>"+
            "</ul>"+
            "</div>"+
            /*"<span class='left-arrow'>‹</span>"+
            "<span class='right-arrow'>›</span>"+*/
            "</div>";
        $(container).html(html);
        var imgLength = options.datas.length;
        for(var i = 0;i<imgLength;i++){
            $(".transverse-box").append("<div class='img-item'><img src='"+options.datas[i]+"'></div>");
        }

        // $(".vertical-box ul").append("<li><img src='"+options.datas[0]+"'></li>");
        // $(".vertical-box ul").append("<li><img src='"+options.datas[1]+"'></li>");

        for(var i = 0; i < imgLength; i++){
            $(".vertical-box ul .ul-box").append("<li><img src='"+options.datas[i]+"'></li>");
        }
        $(".vertical-box ul .ul-box").append("<li><img src='"+options.datas[0]+"'></li>");
        $(".vertical-box ul .ul-box").append("<li><img src='"+options.datas[1]+"'></li>");

    },
    arrowHover:function(){
        $(".carousel-box").hover(function(){

            $(".left-arrow,.right-arrow").css("display","flex");

        },function(){

            $(".left-arrow,.right-arrow").css("display","none");
        })
    },
    // 点击左右箭头触发翻页
    tabImg:function(){
        var obj = this;
        $(".left-arrow").on("click",function(){

            obj.changeZindex_add();

        });
        $(".right-arrow").on("click",function(){

            obj.changeZindex_sub();

        })
    },
    // 设置初始zindex
    setZindex:function(){
        //左侧横向TAB
        imgNum = $(".transverse-box").find(".img-item").length;

        for(var i = 0;i<imgNum;i++){
            $(".img-item").eq(i).css({
                "zIndex":i
            });
            $(".img-item").eq(i).attr("Zindex",i);
        }
        (function setFaHeight(){
            var fa = document.querySelector(".transverse-box");
            var son = document.querySelector(".img-item");
            console.log(son.offsetHeight);
            fa.style.height=son.offsetHeight+'px';
        })();
    },
    //前翻
    changeZindex_add:function(){

        imgNum = $(".transverse-box").find(".img-item").length;
        //4

        var lastZindex =   $(".transverse-box").find(".img-item").eq(length-1).attr("zindex");
        var firstImgSrc =  $(".transverse-box").find(".img-item").eq(0).find("img").attr("src");

        var lastImgSrc =  $(".transverse-box").find(".img-item").eq(length-1).find("img").attr("src");
        var last2ImgSrc = $(".transverse-box").find(".img-item").eq(length-2).find("img").attr("src");


        $(".transverse-box").find(".img-item").eq(0).remove();

        $(".transverse-box").append("<div class='img-item' zindex='"+(parseInt(lastZindex)+1)+"'><img src='"+firstImgSrc+"'><div>");

        $(".img-item").css("height", _h + "px");

        var _top = parseInt( $(".ul-box").position().top );

        // 这个数字不对
        console.log( _top + "前");


        if( _top != ( imgNum - 3 ) * ( _h / 2 ) ){

            this.right_scroll_up();

        }else{

            this.right_scroll_down();
        }

        // $(".vertical-box ul").find("li").eq(0).find("img").attr("src",lastImgSrc);
        // $(".vertical-box ul").find("li").eq(1).find("img").attr("src",last2ImgSrc);
        $(".transverse-box").find(".img-item").eq(length-1).css({

            "zIndex":parseInt(lastZindex)+1,
            "opacity" : 0

        },500);

        $(".transverse-box").find(".img-item").eq(length-1).stop().animate({

            "opacity" : 1

        },500);
        var height = $(".img-item img").height();

    },
    // 后翻
    /*changeZindex_sub:function(){

     imgNum = $(".transverse-box").find(".img-item").length;

     var firstZindex = $(".transverse-box").find(".img-item").eq(0).attr("zindex");

     var lastImgSrc = $(".transverse-box").find(".img-item").eq(length-1).find("img").attr("src");

     var firstImgSrc =  $(".transverse-box").find(".img-item").eq(0).find("img").attr("src");
     var first2ImgSrc =  $(".transverse-box").find(".img-item").eq(1).find("img").attr("src");

     $(".transverse-box").find(".img-item").eq(length-1).remove();
     $(".transverse-box").prepend("<div class='img-item' zindex='"+(parseInt(firstZindex)-1)+"'><img src='"+lastImgSrc+"'><div>");
     $(".img-item").css("height",_h+"px");

     var _top = parseInt($(".ul-box").position().top);

     console.log( _top + "后" );

     if(_top == 0){
     this.right_scroll_down();
     }else{
     this.right_scroll_up();
     }

     $(".transverse-box").find(".img-item").eq(0).css({
     "zIndex":parseInt(firstZindex)-1
     }).siblings().css("opacity","0");
     $(".transverse-box").find(".img-item").eq(length-1).stop().animate({
     "opacity":1
     });


     },*/
    // 右侧上下滚动
    right_scroll_up:function(){
        if(!$(".ul-box").is(":animated")){

            var nowTop = parseInt($(".ul-box").css("top"));
            console.log( "nowTop" +  nowTop );

            if( nowTop == - ( 2 * _h ) ){
                nowTop = 0;
                $(".ul-box").css("top" , "0");
            }

            $(".ul-box").stop().animate({
                "top":  nowTop - _h/2 +"px"
            },500);

            var _top = parseInt( $(".ul-box").position().top );

            console.log("上面的" + _top );

            /* if( _top <= -( imgNum - 1 ) * ( _h / 2 )){
             flag = !flag;
             }*/
        }
        console.log("上");

    },
    /* right_scroll_down:function(){
     if(!$(".ul-box").is(":animated")){

     var nowTop = parseInt($(".ul-box").css("top"));

     $(".ul-box").stop().animate({
     "top":nowTop + _h/2+"px"
     },500);

     var _top = parseInt($(".ul-box").position().top);
     if(_top >= -_h/2){
     flag = !flag;
     }
     }
     console.log("下");
     },*/
    // 自动播放
    autoPlay:function(x){
        var obj = this;
        /*if(flag){*/
        this.changeZindex_add();
        /*}else{
         this.changeZindex_sub();
         }*/
        setTimeout(function(){obj.autoPlay(x)},x);
    },
    final:function(){
        $(".transverse-box").css("height",_h+"px");
        $(".vertical-box ul").css("maxHeight",_h+"px");
        $(".img-item").css("height",_h+"px");
        $(".vertical-box ul li").css("height",_h/2 +"px");
    }


};

