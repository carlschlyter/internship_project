$(document).ready(function(){

        $.get("./includes/process_results.php", function(data){
            //GE FEEDBACK FRÅN SERVER
            console.log(data);
            
            output = '';

            for(let i in data){
                output += '<tr><td>'+data[i].MatchName+','+'</td><td>'+data[i].MatchDate+': '+'</td><td>'+data[i].GoalsHome+' - '+'</td><td>'+data[i].GoalsAway+','+'</td>'+'<td>Mitt bet: </td>'+'<td>'+data[i].GoalsHomeBet+' - '+'</td><td>'+data[i].GoalsAwayBet+'</td>'+'<td>, Mina poäng: </td>'+'<td>'+data[i].LiveBetPoints+'</td>'+'<td>, Matchstatus: </td>'+'<td>'+data[i].Status+'</td></tr>';
            }

            $("#resultsTable").html(output);

        },"json");

        totalUserPoints();
});

function totalUserPoints(){
    $.get("./includes/get_total_user_points.php", function(data){
        //GE FEEDBACK FRÅN SERVER
        console.log(data); 
        let totPoints = '';

        totPoints += '<tr><td>Totala poäng: </td><td>'+data['TotPoints']+'</td></tr>';


        $("#totalUserPoints").html(totPoints);

    },"json");

}
