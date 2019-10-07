$(document).ready(function(){
    var increment =1;
   $("#category").change(function(){
       this_obj = $(this);
       var value = this_obj.val();
       if(value==1){
           $("#catHide").show(1500);
       }else{
           $("#catHide").hide(1500);
       }
   });
   $("#agree").click(function () {
        this_obj = $(this);
        var isChecked = this_obj.is(":checked");
        if(isChecked){
            $("#registerBtn").removeAttr("disabled");
        }else{
            $("#registerBtn").attr("disabled","disabled")
        }
   });
   $(".close").click(function () {
      $("#areas").hide();
   });
   $("body").on("click",".add",function () {
     this_obj = $(this);
     increment +=1;
     $(".putContent").append(' <div class="form-group" id='+"rem"+increment+'>\n' +
         '                            <div class="input-group my-2" >\n' +
         '                                <div class="input-group-prepend">\n' +
         '                                    <span class="input-group-text">\n' +
         '                                        <i class="fa fa-file-image-o"></i>Add image <br />\n' +
         '                                    </span>\n' +
         '                                </div>\n' +
         '                                <input type="file" class="form-control" name="propertyPicture[]" />\n' +
         '                                <button type="button" class="btn btn-danger remove ml-2 p-0" style="border-radius: 40%" data-remove = '+increment+' >&nbsp;<i class="fa fa-trash"></i>&nbsp;</button>\n' +
         '                                <button type="button" class="btn add ml-2 p-0" style="background: rgb(9,45,89);color: white; border-radius: 40%">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>\n' +
         '                            </div>\n' +
         '                        </div>')
   });
    $("body").on("click",".remove",function () {
        this_obj = $(this);
        var rem_id=parseInt(this_obj.attr("data-remove"));
        if(rem_id!==1) {
            $("#rem" + rem_id).remove();
        }
    });
    $('body').on('change','#filterProperty',function () {
        $("#returnedData").LoadingOverlay("show");
        this_obj = $(this);
        var value = this_obj.val();
        var url = this_obj.attr('url');
        $.get(url,{type:value},function (data) {
            $("#returnedData").html(data);
            $("#returnedData").LoadingOverlay("hide");
        });
    });
    $("#alerter").fadeOut(8000);
    $("#alerter2").fadeOut(8000);
    $(".multiple").click(function () {
        this_obj  = $(this);
        var isChecked = this_obj.is(":checked");
        if(isChecked){
            $(".single").prop('checked',true);
            var noOfChecked = $(".single").closest('.contentChecked').find(':checkbox:checked');
            if(noOfChecked.length>=5){
                $("#onFiveSubmit").removeAttr('disabled');
            }else{
                $("#onFiveSubmit").attr('disabled','disabled')
            }
        }else{
            $(".single").prop('checked',false);
            $("#onFiveSubmit").attr('disabled','disabled')
        }
    });
    $(".single").click(function () {
        this_obj  = $(this);
        var isChecked = this_obj.is(":checked");
        if(isChecked){
            var noOfChecked = $(".single").closest('.contentChecked').find(':checkbox:checked');
            if(noOfChecked.length>=5){
                $("#onFiveSubmit").removeAttr('disabled');
            }else{
                $("#onFiveSubmit").attr('disabled','disabled')
            }
        }else{
            this_obj.prop('checked',false);
            var noOfChecked = $(".single").closest('.contentChecked').find(':checkbox:checked');
            if(noOfChecked.length >=5) {
                $("#onFiveSubmit").removeAttr('disabled')
            }else{
                $("#onFiveSubmit").attr('disabled','disabled');
            }
        }
    });
});