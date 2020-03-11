<?php
include 'pdo_connect.php';
include 'includes/pw_verify.php';
include 'includes/process_login_form.php';

session_start();

$userId = $_SESSION['User']['UserID'];

$sql = "SELECT matches.MatchName, matches.MatchDate, matches.GoalsHome, matches.GoalsAway, matches.Status, bets.GoalsHomeBet, bets.GoalsAwayBet, bets.LiveBetPoints, betters.BetterNick
FROM Matches AS matches
JOIN Bets AS bets ON matches.MatchID = bets.MatchID
JOIN Betters AS betters ON bets.BetterID = betters.BetterID
WHERE betters.UserID = '$userId'
AND matches.Status = 'färdig'
ORDER BY matches.MatchDate";

$cmd = $pdo->prepare($sql);
$cmd->execute();
$results = $cmd->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($results);

?>