$(document).on("pageinit",function(){
    $("body").delegate(".list-select button", "vclick", function() {
        $.mobile.changePage($(this).data('url')+'&flavourName='+$(this).closest('li').find('input[type="text"]').val(),"fade");
    });
});