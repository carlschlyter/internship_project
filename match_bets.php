<?php
include_once 'includes/pdo_connect.php';
include_once 'includes/pw_verify.php';
include 'includes/process_login_form.php';
include 'includes/topnav.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/topnav.css">
    <title>Match Bets</title>
</head>
<body>
    <div id="main-div">
        <h1>Guessning app for advertising agencies</h1>
        <br>
        <p><i>Choose a game an guess the result!</i></p>
        <br>
        <form id="betForm" action="" method="POST">
            <select class="std-input"  id="betMatchSel" name="MatchName" type="text">
                <?php
                    $commandstr = "SELECT MatchName, MatchDate FROM Matches ORDER BY MatchDate";
                    $cmd = $pdo->prepare($commandstr);
                    $cmd->execute();
                    $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row) {
                        echo '<option value="'.$row['MatchName'].'">'.$row['MatchName'].' - '.$row['MatchDate'].'</option>';
                        // echo '<option name="MatchName" value="">'.$row['MatchName'].'</option>';
                    }
                ?>
            </select><br><br>        
            <!-- <input class="std-input" id="" type="text" name="MatchName" placeholder="Välj match i listan"><caption><i> Match</i></caption><br><br> -->
            <input class="std-input" id="betGoalsHomeSel" type="text" name="GoalsHome" placeholder="Gissa antal hemmamål"><caption><i> Hemmamål</i></caption><br><br>
            <input class="std-input" id="betGoalsAwaySel" type="text" name="GoalsAway" placeholder="Gissa antal bortamål"><caption><i> Bortamål</i></caption><br><br>
            <input id="betBtn" type="submit" name="bet" value="Skicka in/Visa">
        </form>
        <br>
        <div id="betResult"></div><br>
        <h3>Dina bets som <?php echo '"'.$_SESSION['User']['UserName'].'"'.':' ; ?></h3><br>
        <div id="userBets"></div>
        <table id="userBetsTable"></table>
        <br>
        <h3>Aktuella matcher att betta på:</h3>
        <!-- <br>
        <input type="submit" id="betButton" value="Skicka bet">
        <br> -->
        <br>
        <div id="match-display-betting">
            <table class="matchesTable"></table>
            <?php
                // $sql = 'SELECT MatchName, MatchDate FROM Matches ORDER BY MatchDate';
                // $stmt = $pdo->prepare($sql);
                // $stmt->execute([]);
                // $matches = $stmt->fetchAll();
                
                // foreach($matches as $match){
                // echo $match->MatchName . ' - ' . $match->MatchDate . '<br>';  
                // }
            ?>
                <!-- <script>        
                    document.getElementById('inputGoalsHome').onchange = function(){winningTeam()};
                    document.getElementById('inputGoalsAway').onchange = function(){winningTeam()};

                    function winningTeam(){
                        if (document.getElementById('inputGoalsHome').value > document.getElementById('inputGoalsAway').value){
                            document.getElementById('inputWinningTeam').value = 'Hemmavinst';
                            console.log('Hoppsan');
                        } else if (document.getElementById('inputGoalsHome').value < document.getElementById('inputGoalsAway').value){
                            document.getElementById('inputWinningTeam').value = 'Bortavinst';
                            console.log('Haleluja');
                        } else {
                            document.getElementById('inputWinningTeam').value = 'Oavgjort';
                            console.log('Jesus!');
                        }        
                    }                
                </script> -->
                <?php

            ?>
        </div>
        <pre>
        <?php 
        // echo ($_SESSION['User']['UserID']);
        // var_dump($matches); 
        ?>
        </pre>
        <div id="betFormGreet">
            <br><h4>Lycka till!</h4>    
        </div>
        <!-- <div id="bet-form">
            <h3>Fyll i dina tippningar:</h3><br>
            <form action="">
                <input class="std-input-bet" id="MatchNameBet" type="text" name="MatchNameBet"><caption><i>  Matchnamn </i></caption><br><br>
                <input class="std-input-bet" id="GoalsHomeBet" type="text" name="GoalsHomeBet"><caption><i>  Antal mål hemmalaget</i></caption><br><br>    
                <input class="std-input-bet" id="GoalsAwayBet" type="text" name="GoalsAwayBet"><caption><i>  Antal Mål bortalaget</i></caption><br><br>
                <input class="std-input-bet" id="WinningTeamBet" type="text" name="WinningTeamBet"><caption><i>  Vinnande lag? </i></caption><br>
            </form>
        </div>             -->
    </div>
    <script>
        function openSlideMenu(){
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main-div').style.marginLeft = '250px';
        }
    </script>

    <script>
        function closeSlideMenu(){
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('main-div').style.marginLeft = '0';
        }
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/ajax_bet.js"></script>
    <script type="text/javascript" src="js/ajax_bet_display_2.js"></script>
</body>
</html>
