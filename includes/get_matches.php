<?php
include 'pdo_connect.php';
include 'includes/pw_verify.php';
include 'includes/process_login_form.php';

session_start();

$userId = $_SESSION['User']['UserID'];

$sql = "SELECT MatchName, MatchDate, GoalsHome, GoalsAway, Status
FROM Matches
WHERE Status != 'färdig'
ORDER BY MatchDate";

$cmd = $pdo->prepare($sql);
$cmd->execute();
$matches = $cmd->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($matches);

?>