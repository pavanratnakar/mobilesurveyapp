$(document).on("pageinit",'#splash',function(){
    setTimeout(function(){
        $.mobile.changePage($('#splash').data("redirect"),"fade");
    },4000);
});