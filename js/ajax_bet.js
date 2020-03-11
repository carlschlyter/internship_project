$(document).ready(function(){

    displayMatches();
    displayUserBets();

    $("#betBtn").click(function(){
        let serializedData = $("#betForm").serialize();
        // console.log(serializedDataGoals);
        console.log(serializedData);
        // console.log(serializedDataMatch);
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
            request = $.post("includes/process_bet_form.php",serializedData,function(data){
                //GE FEEDBACK FRÅN SERVER
                console.log(data);
                // $("#result").html("REGGAD");
                // displayUserBets();
            },"json");

            // request = $.ajax({
            //     url: "includes/process_reg_form.php",
            //     type: "post",
            //     data: serializedData
            // });
            
            // request.done(function(_jqXHR, _textStatus, response){
            //     console.log("A " + response);

            //     $("#betResult").html("DITT BET ÄR GJORT!");
            // });

            // request.fail(function(_jqXHR, textStatus, errorThrown){
            //     $("#betResult").html("Det blev något fel när du klickade 'Skicka in'.")
            //     console.error(
            //         "Följande fel hände: " + textStatus, errorThrown
            //     );
            // });
        }
        return false;
    });

});

function displayUserBets(){
    $.get("./includes/get_user_bets.php", function(data){
        //GE FEEDBACK FRÅN SERVER
        console.log(data);
        // $("#userBets").html( data[3]['MatchName'] + ', ' + data[3]['MatchDate'] + ', ' + data[3]['BetterNick'] + ', ' + data[3]['GoalsHomeBet'] + ' - ' + data[3]['GoalsAwayBet']);
        // document.getElementById('userBets').innerHTML = data[0]['MatchName'];
        
        output = '';

        for(let i in data){
            output += '<tr><td>'+data[i].MatchName+','+'</td><td>'+data[i].MatchDate+','+'</td><td>'+data[i].GoalsHomeBet+' - '+'</td><td>'+data[i].GoalsAwayBet+'</td></tr>';
        }

        $("#userBetsTable").html(output);

    },"json");

}

function displayMatches(){
    $.get("./includes/get_matches.php", function(data){
        //GE FEEDBACK FRÅN SERVER
        console.log(data);        
        output = '';
        for(let i in data){
            output += '<tr><td>'+data[i].MatchName+','+'</td><td>'+data[i].MatchDate+','+'</td>'+'<td>Aktuellt resultat: </td>'+'<td>'+data[i].GoalsHome+'-'+'</td><td>'+data[i].GoalsAway+', '+'</td><td>'+data[i].Status+'</td></tr>';
        }

        $(".matchesTable").html(output);

    },"json");
}


