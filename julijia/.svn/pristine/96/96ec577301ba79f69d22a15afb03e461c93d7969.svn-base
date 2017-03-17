$(document).ready(function(){
    // 图片上下滚动
    var count = $("#imageMenu li").length - 5; /* 显示 6 个 li标签内容 */
    var interval = $("#imageMenu li:first").width();
    var curIndex = 0;

    $('.scrollbutton').click(function(){
        if( $(this).hasClass('disabled') ) return false;

        if ($(this).hasClass('smallImgUp')) --curIndex;
        else ++curIndex;

        $('.scrollbutton').removeClass('disabled');
        if (curIndex == 0) $('.smallImgUp').addClass('disabled');
        if (curIndex == count-1) $('.smallImgDown').addClass('disabled');

        $("#imageMenu ul").stop(false, true).animate({"marginLeft" : -curIndex*interval + "px"}, 600);
    });
    // 解决 ie6 select框 问题
    $.fn.decorateIframe = function(options) {
        if ($.browser.msie && $.browser.version < 7) {
            var opts = $.extend({}, $.fn.decorateIframe.defaults, options);
            $(this).each(function() {
                var $myThis = $(this);
                //创建一个IFRAME
                var divIframe = $("<iframe />");
                divIframe.attr("id", opts.iframeId);
                divIframe.css("position", "absolute");
                divIframe.css("display", "none");
                divIframe.css("display", "block");
                divIframe.css("z-index", opts.iframeZIndex);
                divIframe.css("border");
                divIframe.css("top", "0");
                divIframe.css("left", "0");
                if (opts.width == 0) {
                    divIframe.css("width", $myThis.width() + parseInt($myThis.css("padding")) * 2 + "px");
                }
                if (opts.height == 0) {
                    divIframe.css("height", $myThis.height() + parseInt($myThis.css("padding")) * 2 + "px");
                }
                divIframe.css("filter", "mask(color=#fff)");
                $myThis.append(divIframe);
            });
        }
    };
    $.fn.decorateIframe.defaults = {
        iframeId: "decorateIframe1",
        iframeZIndex: -1,
        width: 0,
        height: 0
    };
    //放大镜视窗
    $("#bigView").decorateIframe();
    //点击到中图
    var midChangeHandler = null;

    $("#imageMenu li img").bind("click", function(){
        if ($(this).attr("id") != "onlickImg") {
            midChange($(this).attr("src").replace("small", "mid"));
            $("#imageMenu li").removeAttr("id");
            $(this).parent().attr("id", "onlickImg");
        }
    }).bind("mouseover", function(){
        if ($(this).attr("id") != "onlickImg") {
            window.clearTimeout(midChangeHandler);
            midChange($(this).attr("src").replace("small", "mid"));
            $(this).css({ "border": "3px solid #959595" });
        }
    }).bind("mouseout", function(){
        if($(this).attr("id") != "onlickImg"){
            $(this).removeAttr("style");
            midChangeHandler = window.setTimeout(function(){
                midChange($("#onlickImg img").attr("src").replace("small", "mid"));
            }, 1000);
        }
    });
    function midChange(src) {
        $("#midimg").attr("src", src).load(function() {
            changeViewImg();
        });
    }
    //大视窗看图
    function mouseover(e) {
        if ($("#winSelector").css("display") == "none") {
            $("#winSelector,#bigView").show();
        }
        $("#winSelector").css(fixedPosition(e));
        e.stopPropagation();
    }
    function mouseOut(e) {
        if ($("#winSelector").css("display") != "none") {
            $("#winSelector,#bigView").hide();
        }
        e.stopPropagation();
    }
    $("#midimg").mouseover(mouseover); //中图事件
    $("#midimg,#winSelector").mousemove(mouseover).mouseout(mouseOut); //选择器事件

    var $divWidth = $("#winSelector").width(); //选择器宽度
    var $divHeight = $("#winSelector").height(); //选择器高度
    var $imgWidth = $("#midimg").width(); //中图宽度
    var $imgHeight = $("#midimg").height(); //中图高度
    var $viewImgWidth = $viewImgHeight = $height = null; //IE加载后才能得到 大图宽度 大图高度 大图视窗高度

    function changeViewImg() {
        $("#bigView img").attr("src", $("#midimg").attr("src").replace("mid", "big"));
    }
    changeViewImg();
    $("#bigView").scrollLeft(0).scrollTop(0);
    function fixedPosition(e) {
        if (e == null) {
            return;
        }
        var $imgLeft = $("#midimg").offset().left; //中图左边距
        var $imgTop = $("#midimg").offset().top; //中图上边距
        X = e.pageX - $imgLeft - $divWidth / 2; //selector顶点坐标 X
        Y = e.pageY - $imgTop - $divHeight / 2; //selector顶点坐标 Y
        X = X < 0 ? 0 : X;
        Y = Y < 0 ? 0 : Y;
        X = X + $divWidth > $imgWidth ? $imgWidth - $divWidth : X;
        Y = Y + $divHeight > $imgHeight ? $imgHeight - $divHeight : Y;

        if ($viewImgWidth == null) {
            $viewImgWidth = $("#bigView img").outerWidth();
            $viewImgHeight = $("#bigView img").height();
            if ($viewImgWidth < 200 || $viewImgHeight < 200) {
                $viewImgWidth = $viewImgHeight = 800;
            }
            $height = $divHeight * $viewImgHeight / $imgHeight;
            $("#bigView").width($divWidth * $viewImgWidth / $imgWidth);
            $("#bigView").height($height);
        }
        var scrollX = X * $viewImgWidth / $imgWidth;
        var scrollY = Y * $viewImgHeight / $imgHeight;
        $("#bigView img").css({ "left": scrollX * -1, "top": scrollY * -1 });
        $("#bigView").css({ "top": 258, "left": $(".preview").offset().left + $(".preview").width() + 15 });

        return { left: X, top: Y };
    }



    function G(s){
        return document.getElementById(s);
    }

    function getStyle(obj, attr){
        if(obj.currentStyle){
            return obj.currentStyle[attr];
        }else{
            return getComputedStyle(obj, false)[attr];
        }
    }

    function Animate(obj, json){
        if(obj.timer){
            clearInterval(obj.timer);
        }
        obj.timer = setInterval(function(){
            for(var attr in json){
                var iCur = parseInt(getStyle(obj, attr));
                iCur = iCur ? iCur : 0;
                var iSpeed = (json[attr] - iCur) / 5;
                iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
                obj.style[attr] = iCur + iSpeed + 'px';
                if(iCur == json[attr]){
                    clearInterval(obj.timer);
                }
            }
        }, 30);
    }

    var oPic = G("picBox");
    var oList = G("listBox");

    var oPrev = G("prev");
    var oNext = G("next");
    var oPrevTop = G("prevTop");
    var oNextTop = G("nextTop");

    var oPicLi = oPic.getElementsByTagName("li");
    var oListLi = oList.getElementsByTagName("li");
    var len1 = oPicLi.length;
    var len2 = oListLi.length;

    var oPicUl = oPic.getElementsByTagName("ul")[0];
    var oListUl = oList.getElementsByTagName("ul")[0];
    var w1 = oPicLi[0].offsetWidth;
    var w2 = oListLi[0].offsetWidth;

    oPicUl.style.width = w1 * len1 + "px";
    oListUl.style.width = w2 * len2 + "px";

    var index = 0;

    var num = 5;
    var num2 = Math.ceil(num / 2);

    function Change(){

        Animate(oPicUl, {left: - index * w1});

        if(index < num2){
            Animate(oListUl, {left: 0});
        }else if(index + num2 <= len2){
            Animate(oListUl, {left: - (index - num2 + 1) * w2});
        }else{
            Animate(oListUl, {left: - (len2 - num) * w2});
        }

        for (var i = 0; i < len2; i++) {
            oListLi[i].className = "";
            if(i == index){
                oListLi[i].className = "on";
            }
        }
    }

    oNextTop.onclick = oNext.onclick = function(){
        index ++;
        index = index == len2 ? 0 : index;
        Change();
    };

    oPrevTop.onclick = oPrev.onclick = function(){
        index --;
        index = index == -1 ? len2 -1 : index;
        Change();
    };

    for (var i = 0; i < len2; i++) {
        oListLi[i].index = i;
        oListLi[i].onclick = function(){
            index = this.index;
            Change();
        }
    }

});


/**
 *  倒计时调用
 */
if( $("#second").find('font').length )
{
    var time = parseInt( $("#second").attr('data-val') );
    if( time )
    {
        countDown( time );
    }
    $("#second").prevAll('.black').css('display','block');
}

/**
 * 倒计时方法
 * @param maxtime
 * @param index
 */
function countDown( maxtime  )
{
    var timer = setInterval(function()
    {
        if( maxtime >=0 )
        {
            second = Math.floor( maxtime % 60);       //计算秒
            minite = Math.floor((maxtime / 60) % 60); //计算分
            hour = Math.floor((maxtime / 3600) % 24 ); //计算小时
            day = Math.floor((maxtime / 3600) / 24);
            msg = hour+':'+minite+':'+second;
            $("#second").find('font').html( msg );
            --maxtime;
        }
        else
        {
            clearInterval( timer );
            $("#second").find('font').html( '活动结束' );
        }
    }, 1000);
}


/**
 *  输入数字验证
 */
$("#num").keyup(function () {
    var num = $.trim($(this).val());
    if( num )
    {
        var reg = /^[1-9]\d{0,9}$/;
        if ( !reg.test(num) )
        {
            $(this).val(1);
        }
        var kc = $.trim($("#kc").text());
        if( parseInt(kc) < parseInt(num) )
        {
            layer.msg('您所填写的数量超过库存');
            $(this).val(1);
        }
    }
});

/**
 * 减产品数量
 */
$("#reduce").click(function () {
    var num = $.trim($("#num").val())?$.trim($("#num").val()):0;
    if( num == 0 )
    {
        $("#num").val(1);
    }else
    {
        if( num > 1 )
        {
            var num = parseInt(num)-1;
            $("#num").val(num);
        }else
        {
            $("#num").val(parseInt(num));
        }
    }
});

/**
 * 加产品数量
 */
$("#plus").click(function () {
    var num = $.trim($("#num").val())?$.trim($("#num").val()):0;
    var addNum = parseInt(num)+1;
    var kc = $.trim($("#kc").text());
    if( parseInt(kc) < parseInt(addNum) )
    {
        layer.msg('您所填写的数量超过库存');
        $("#num").val(1);
    }else
    {
        $("#num").val(addNum);
    }
});