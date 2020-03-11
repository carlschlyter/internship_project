<?php
include 'pdo_connect.php';
include 'includes/pw_verify.php';
include 'includes/process_login_form.php';

session_start();

$userId = $_SESSION['User']['UserID'];

$sql = 
"SELECT SUM(bets.LiveBetPoints) AS TotPoints, betters.BetterNick
FROM Bets AS bets
JOIN Betters AS betters ON bets.BetterID = betters.BetterID
JOIN Matches AS matches ON matches.MatchID = bets.MatchID
WHERE matches.Status = 'färdig'
GROUP BY betters.BetterNick
ORDER BY TotPoints DESC";

$cmd = $pdo->prepare($sql);
$cmd->execute();
$toplist = $cmd->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($toplist);

?>