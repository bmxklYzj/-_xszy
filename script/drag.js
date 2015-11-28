var i=setInterval(
    function getProgress(){
        var video=document.getElementById("my_video");
        var progressWrap = document.getElementById("progressWrap");
        var playProgress = document.getElementById("playProgress");
//            playProgress.hide();
        var percent = video.currentTime / video.duration;
        playProgress.style.width = percent * (progressWrap.offsetWidth) - 2 + "px";
        document.getElementById("showProgress").innerHTML = (percent * 100).toFixed(1) + "%";
    },1000
);


//反射調用
var invokeFieldOrMethod = function(element, method)
{
    var usablePrefixMethod;
    ["webkit", "moz", "ms", "o", ""].forEach(function(prefix) {
        if (usablePrefixMethod) return;
        if (prefix === "") {
            // 无前缀，方法首字母小写
            method = method.slice(0,1).toLowerCase() + method.slice(1);
        }
        var typePrefixMethod = typeof element[prefix + method];
        if (typePrefixMethod + "" !== "undefined") {
            if (typePrefixMethod === "function") {
                usablePrefixMethod = element[prefix + method]();
            } else {
                usablePrefixMethod = element[prefix + method];
            }
        }
    });

    return usablePrefixMethod;
};

//進入全屏
function launchFullscreen(element)
{
    //此方法不可以在異步任務中執行，否則火狐無法全屏
    if(element.requestFullscreen) {
        element.requestFullscreen();
    } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if(element.msRequestFullscreen){
        element.msRequestFullscreen();
    } else if(element.oRequestFullscreen){
        element.oRequestFullscreen();
    }
    else if(element.webkitRequestFullscreen)
    {
        element.webkitRequestFullScreen();
    }else{

        var docHtml  = document.documentElement;
        var docBody  = document.body;
        var flv  = document.getElementById('flv');
        var  cssText = 'width:100%;height:100%;overflow:hidden;';
        docHtml.style.cssText = cssText;
        docBody.style.cssText = cssText;
        flv.style.cssText = cssText+';'+'margin:0px;padding:0px;';
        document.IsFullScreen = true;

    }
}
//退出全屏
function exitFullscreen()
{
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if(document.oRequestFullscreen){
        document.oCancelFullScreen();
    }else if (document.webkitExitFullscreen){
        document.webkitExitFullscreen();
    }else{
        var docHtml  = document.documentElement;
        var docBody  = document.body;
        var flv  = document.getElementById('flv');
        docHtml.style.cssText = "";
        docBody.style.cssText = "";
        flv.style.cssText = "";
        document.IsFullScreen = false;
    }
}
document.getElementById('fullScreenBtn').addEventListener('click',function(){
    launchFullscreen(document.getElementById('my_video'));
    window.setTimeout(function exit(){
//檢查瀏覽器是否處於全屏
        if(invokeFieldOrMethod(document,'FullScreen') || invokeFieldOrMethod(document,'IsFullScreen') || document.IsFullScreen)
        {
            exitFullscreen();
        }
    },5000*1000);
},false);

//    播放暂停
var video=document.getElementById("my_video");
function play(){
    if ( video.paused || video.ended ){
        if ( video.ended ){
            video.currentTime = 0;
        }
        video.play();
        playBtn.innerHTML = "暂停";
        progressFlag = setInterval(getProgress, 60);
    }
    else{
        video.pause();
        playBtn.innerHTML = "播放";
        clearInterval(progressFlag);
    }
}




