$(document).bind("mobileinit",function(){
    $('.survey-form-questioner').submit(function(event){
        event.preventDefault();
        window.open('product.php?'+$(this).serialize(),'_self');
    });
});