$(document).ready(function() {
    $('.survey-form-1').submit(function(event){
        event.preventDefault();
        window.open('product.php?'+$(this).serialize(),'_self');
        // $.mobile.loadPage( "second.php", true, {
        //  type: "get",
        //  data: $( ".survey-form-1" ).serialize(),
        //  pageContainer: $("#second")
        // });
    });
    $('.survey-form-questioner').submit(function(event){
        event.preventDefault();
        window.open('product.php?'+$(this).serialize(),'_self');
    });
});