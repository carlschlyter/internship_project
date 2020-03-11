
<?php
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
    <title>Registera</title>
</head>
<body>
    <div id="main-div">
        <h1>Guessing app for advertising agencies</h1>
        <h2>Create an account to join a guessning game!</h2>
        <br>
        <div id="the-form-container">
            <form id="regForm" method="POST" action="register.php">
                <input class="std-input" id="FirstName" type="text" name="FirstName"><caption><i> Förnamn</i></caption><br><br>    
                <input class="std-input" id="LastName" type="text" name="LastName"><caption><i> Efternamn</i></caption><br><br>
                <input class="std-input" id="Email" type="text" name="Email"><caption><i> Epost</i></caption><br><br>
                <input class="std-input" id="UserName" type="text" name="UserName"><caption><i> Användarnamn</i></caption><br><br>
                <input class="std-input" id="PassWord" type="text" name="PassWord"><caption><i> Lösenord</i></caption><br><br>
                <input class="std-input" id="City" type="text" name="City"><caption><i> Stad</i></caption><br><br>
                <input id="submitBtn" type="submit" name="skicka" value="Skapa Konto"><caption><i> Obs! Om du klickar "Skapa konto" accepterar du att vi lagrar dina ifyllda uppgifter.</i></caption><br>
            </form>
        </div>
    </div>
    <div id="result"></div>
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
    <script type="text/javascript" src="js/ajax_reg.js"></script>
</body>
</html>

