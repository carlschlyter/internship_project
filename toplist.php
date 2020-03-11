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
    <title>Home</title>
</head>
<body>
    <div id="main-div" id="main-results-div">
        <div class="heading-part">
            <h1>Guessning app for advertising agencies</h1><br>
            <h2>Activate your customers' target groups with a guessning game!</h2>
            <br>
            <br>
            <h3>Current toplist for guessers:</h3>
        </div>
        <div class="match-display">
            <!-- <table id="resultsTable"></table>
            <table id="totalUserPoints"></table> -->
            <table id="toplist"></table>
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
    <script type="text/javascript" src="js/ajax_toplist.js"></script>
    
</body>
</html>