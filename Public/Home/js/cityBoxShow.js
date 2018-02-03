/*遮罩的地址*/

$(function () {

    console.log($("#cityChoose"));

    $("#cityChoose").click(function(){
        $("#showCityBox").load("/Home/Changeprovince/index").css("display", "block");
        $(".shadeBox").css("display", "block");
    });


    $(".addMember").click(function () {
        $("#showCityBox").load("addMember.html").css("display", "block");
        $(".shadeBox").css("display", "block");


    })


});