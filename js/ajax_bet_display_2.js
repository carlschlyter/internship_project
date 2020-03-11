$(document).ready(function(){
    $("#betBtn").click(function ShowUserBets(){

        $.get("./includes/get_user_bets.php", function(data){
            //GE FEEDBACK FRÅN SERVER
            console.log(data);
            // $("#userBets").html( data[3]['MatchName'] + ', ' + data[3]['MatchDate'] + ', ' + data[3]['BetterNick'] + ', ' + data[3]['GoalsHomeBet'] + ' - ' + data[3]['GoalsAwayBet']);
            // document.getElementById('userBets').innerHTML = data[0]['MatchName'];
            
            output = '';

            for(let i in data){
                output += '<tr><td>'+data[i].MatchName+','+'</td><td>'+data[i].MatchDate+': '+'</td><td>'+data[i].GoalsHomeBet+' - '+'</td><td>'+data[i].GoalsAwayBet+'</td></tr>';
            }

            $("#userBetsTable").html(output);

        },"json");

    });
});
