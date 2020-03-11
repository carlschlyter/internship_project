<?php
include 'pdo_connect.php';

// if (isset($_POST['skicka'])){
    $firstName = trim($_POST['FirstName']);
    $lastName = trim($_POST['LastName']);
    $userName = trim($_POST['UserName']);
    $email = trim($_POST['Email']);
    $passWord = trim($_POST['PassWord']);
    $city = trim($_POST['City']);

    $firstName = filter_input(INPUT_POST, 'FirstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'LastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
    $userName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
    $password = password_hash($passWord, PASSWORD_DEFAULT);
    $city = filter_input(INPUT_POST, 'City', FILTER_SANITIZE_STRING);
// }

$returnArray = array();
$returnArray["STATUS"] = "NA";
$returnArray["MSG"] = "NA";

if ((isset($firstName) && !empty($firstName)) && (isset($lastName) && !empty($lastName)) && (isset($userName) && !empty($userName)) && (isset($email) && !empty($email)) && (isset($passWord) && !empty($password)) && (isset($city) && !empty($city))){
    $sql = "INSERT INTO Users(UserID, FirstName, LastName, Email, UserName, PassWord, City) VALUES(UUID(), '$firstName', '$lastName', '$email', '$userName', '$password', '$city')";
// echo $sql . '<br>';
    $stmt = $pdo->prepare($sql);    
    $stmt->execute();
    $returnArray["STATUS"] = "OK";
    $returnArray["MSG"] = "USER SAVED";
}else{
    
    $returnArray["STATUS"] = "FAIL";
    $returnArray["MSG"] = "ERR MSG";
}
echo json_encode($returnArray);

?>