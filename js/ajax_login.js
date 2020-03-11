$(document).ready(function(){
    $("#loginBtn").click(function(){
        let serializedData = $("#loginForm").serialize();
        console.log(serializedData);
        let request;
        
        //FORM VALIDATION
        //$(".std-input").val("REGGAD");

        var formdata = $(".std-input");
        $(".std-input").removeClass("error-class");
        var isError = false;
        for(var i=0;i<formdata.length;i++){
            if(formdata[i].value==""){
                isError = true;
                console.log(formdata[i].value);
                $(formdata[i]).addClass("error-class");
            }
        }
        
       
        if(isError==false){
            request = $.post("includes/process_login_form.php",serializedData,function(data){
                //GE FEEDBACK FRÅN SERVER
                console.log(data);
                if(data.STATUS=="OK"){
                // $("#login_result").html("LOGGED IN");
                    $("#login_result").html("YOU ARE LOGGED IN");
                }       
            },"json");

            // request = $.ajax({
            //     url: "includes/process_reg_form.php",
            //     type: "post",
            //     data: serializedData
            // });
 

            request.fail(function(_jqXHR, textStatus, errorThrown){
                $("#login_result").html("Det blev något fel när du klickade 'Logga in'.")
                console.log(
                    "Följande fel hände: " + textStatus, errorThrown
                );
            });
        }
        return false;
    });

});