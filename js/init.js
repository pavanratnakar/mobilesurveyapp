$(document).on("pageinit",'#splash',function(){
    setTimeout(function(){
        $.mobile.changePage("survey.php","fade");
    },4000);
});