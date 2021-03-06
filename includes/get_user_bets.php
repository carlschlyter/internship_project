<?php
include 'pdo_connect.php';
include 'includes/pw_verify.php';
include 'includes/process_login_form.php';

session_start();

$userId = $_SESSION['User']['UserID'];

$sql = "SELECT matches.MatchName, matches.MatchDate, betters.BetterNick, bets.GoalsHomeBet, bets.GoalsAwayBet, bets.WinningTeamBet
FROM Matches as matches
JOIN Bets as bets ON matches.MatchID = bets.MatchID
JOIN Betters as betters ON bets.BetterID = betters.BetterID
WHERE betters.UserID = '$userId'
ORDER BY MatchName";

$cmd = $pdo->prepare($sql);
$cmd->execute();
$userBets = $cmd->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($userBets);

?>

