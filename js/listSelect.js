$(document).on("pageinit",function(){
    $(".ui-content").delegate(".list-select button", "click", function() {
        $.mobile.changePage($(this).data('url')+'&flavourName='+$(this).closest('li').find('input[type="text"]').val(),"fade");
    });
});