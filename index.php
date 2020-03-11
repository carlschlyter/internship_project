<?php
include 'includes/pdo_connect.php';
include 'includes/pw_verify.php';
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
    <title>Home</title>
</head>
<body>
    <div id="main-div">
        <div class="heading-part">
            <h1>Guessing app for advertising agencies</h1><br>
            <h2>Activate your customers' target groups with a guessning game!</h2>
            <br>
            <br>
            <h3>Current games to make guesses on:</h3>
        </div>
        <div class="match-display">
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
        </div>
        <div class="reg-push">
            <a href="register.php"><p>Registrera dig </p></a><p>eller </p><a href="login.php"><p>logga in </p></a><p>för att betta på EM-matcherna!</p>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/ajax_bet.js"></script>
</body>
</html>

