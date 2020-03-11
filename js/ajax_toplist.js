$(document).ready(function(){
    $.get("./includes/get_toplist.php", function(data){
        //GE FEEDBACK FRÅN SERVER
        console.log(data); 
        let toplist = '';

        for(let i in data){
            toplist += '<tr><td>'+data[i].BetterNick+': '+'</td><td>Totala poäng: </td><td>'+data[i].TotPoints+'</td></tr>';
        }

        $("#toplist").html(toplist);

    },"json");

});