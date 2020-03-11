
$(document).ready(function(){
    $("#submitBtn").click(function(){
        let serializedData = $("#regForm").serialize();
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
            request = $.post("includes/process_reg_form.php",serializedData,function(data){
                //GE FEEDBACK FRÅN SERVER
                console.log(data);
                // $("#result").html("REGGAD");

            },"json");

            // request = $.ajax({
            //     url: "includes/process_reg_form.php",
            //     type: "post",
            //     data: serializedData
            // });
            
            request.done(function(_jqXHR, _textStatus, response){
                console.log("A " + response);

                $("#result").html("DITT KONTO ÄR SKAPAT!");
            });

            request.fail(function(_jqXHR, textStatus, errorThrown){
                $("#result").html("Det blev något fel när du klickade 'Skapa konto'.")
                console.error(
                    "Följande fel hände: " + textStatus, errorThrown
                );
            });
        }
        return false;
    });

});

