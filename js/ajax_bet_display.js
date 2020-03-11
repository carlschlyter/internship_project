$(document).ready(function(){
    $("#betBtn").click(function ShowUserBets(){

        let xhr = new XMLHttpRequest();

        xhr.open('GET', './includes/get_user_bets.php', true); 

        xhr.onload = function(){
            if(this.status == 200){
                let userBets = JSON.parse(this.responseText);
                // console.log(this.responseText);
                // output = this.responseText;
                // console.log(output);
                output = '';

                for(let i in userBets){
                    // output += '<ul>' +
                    // '<li>'+userBets[i].MatchName+' - '+userBets[i].MatchDate+' - '+userBets[i].GoalsHomeBet+' - '+userBets[i].GoalsAwayBet+
                    // '</ul>';  
                    output += '<tr><td>'+userBets[i].MatchName+','+'</td><td>'+userBets[i].MatchDate+','+'</td><td>'+userBets[i].GoalsHomeBet+'-'+'</td><td>'+userBets[i].GoalsAwayBet+'</td></tr>';
                }

                document.getElementById('userBetsTable').innerHTML = output;
            }
        }

        xhr.send();
    });

});


