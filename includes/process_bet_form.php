<?php
include 'pdo_connect.php';
include 'includes/pw_verify.php';
include 'includes/process_login_form.php';

session_start();

// if (isset($_POST['skicka'])){
    $matchName = trim($_POST['MatchName']);
    $goalsHome = trim($_POST['GoalsHome']);
    $goalsAway = trim($_POST['GoalsAway']);

    $matchName = filter_input(INPUT_POST, 'MatchName', FILTER_SANITIZE_STRING);
    $goalsHome = filter_input(INPUT_POST, 'GoalsHome', FILTER_SANITIZE_NUMBER_INT);
    $goalsAway = filter_input(INPUT_POST, 'GoalsAway', FILTER_SANITIZE_NUMBER_INT);
// }

$returnArray = array();
$returnArray["STATUS"] = "NA";
$returnArray["MSG"] = "NA";

$userId = $_SESSION['User']['UserID'];

if ((isset($matchName) && !empty($matchName)) && (isset($goalsHome) && !is_null($goalsHome)) && (isset($goalsAway) && !is_null($goalsAway))){
    $sql = "INSERT INTO Bets(BetID, BetterID, MatchID, GoalsHomeBet, GoalsAwayBet, WinningTeamBet, GoalsHomeAct, GoalsAwayAct, WinningTeamAct, LiveBetPoints, LiveBetPointsWinning, LiveBetPointsTotal) 
    VALUES(
        UUID(),
        (SELECT BetterID FROM Betters WHERE UserID = '$userId'),
        (SELECT MatchID FROM Matches WHERE MatchName = '$matchName'), 
        $goalsHome,
        $goalsAway,
        (SELECT CASE 
            WHEN '$goalsHome' > '$goalsAway' THEN 'home' 
            WHEN '$goalsHome' < '$goalsAway' THEN 'away' 
            ELSE 'draw' 
            END), 
        NULL,
        NULL,
        NULL,
        0,
        NULL,
        NULL
        )";

// echo $sql . '<br>';
    $stmt = $pdo->prepare($sql);    
    $stmt->execute();
    $returnArray["STATUS"] = "OK";
    $returnArray["MSG"] = "BET SAVED";
}else{
    $returnArray["STATUS"] = "FAIL";
    $returnArray["MSG"] = "ERR MSG";
}
echo json_encode($returnArray);



?>