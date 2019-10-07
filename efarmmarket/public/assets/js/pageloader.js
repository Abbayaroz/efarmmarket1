$(".sidebarPageLoader").click(function (e) {
        e.preventDefault();
        this_obj = $(this);
        $("#returnedData").LoadingOverlay("show");
        var url = this_obj.attr('href');
        targetUrl=url;
        targetTitle="";
        window.history.pushState({url: "" + targetUrl + ""}, targetTitle, targetUrl);
        $.get(url,{type:"js"},function (data) {
            $("#returnedData").html(data);
            $("#returnedData").LoadingOverlay("hide");
        });
    //$("#menu-nav a[href='" + window.location.pathname + "']").fadeTo(500, 1.0);

});
