/*$(document).ready(function(){
    $("#hideSidebar").click(function(){
        $("#sidebar").toggle(function () {
            var style = $("#sidebar").attr('style');
            if(style=='display: none;'){
                $("#sidebar").removeClass('d-none d-sm-block');
            }else{
                $("#sidebar").removeClass('d-none d-sm-block');
            }
        });
    });
        $("#trigger").click(function () {
            $("#sidebar").slideToggle(700);
        })
});*/
$("#hideSidebar").click(function (e) {
    e.preventDefault();
    $("#sidebar").toggle(600);
    $("#sidebar").transition="all 0.5 all";
});
$("#trigger").click(function () {
    $("#sidebar").slideToggle(700);
})