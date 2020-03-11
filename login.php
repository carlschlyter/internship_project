<?php
include_once 'includes/pdo_connect.php';
include_once 'includes/pw_verify.php';
include 'includes/process_login_form.php';
include 'includes/topnav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/topnav.css">
    <title>Logga in</title>
</head>
<body>
    <div id="message"></div>
    <div id="main-div">
        <h1>Guessning app for advertising agencies</h1><br/>
        <h2>Log in to join a guessing game!</h2>
        <br>
        <p><i>Enter user name and password</i></p>
        <br>
        <form id="loginForm" action="" method="POST">
            <input class="std-input" id="loginUser" type="text" name="UserName" placeholder="Fyll i ditt användarnamn"><caption><i> Användarnamn</i></caption><br><br>
            <input class="std-input" id="loginPw" type="text" name="PassWord" placeholder="Fyll i ditt lösenord"><caption><i> Lösenord</i></caption><br><br>
            <input id="loginBtn" type="submit" name="login" value="Logga in">
        </form>
    </div> 
    <div id="login_result"></div> 
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
    <script type="text/javascript" src="js/ajax_login.js"></script>
</body>
</html>