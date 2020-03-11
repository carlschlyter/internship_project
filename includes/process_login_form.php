<?php
include_once 'pdo_connect.php';
include_once 'pw_verify.php';


if (isset($_POST['logout'])){
    session_destroy();
    header('location: index.php');
} else 
    if (isset($_POST['UserName'])){

    $userName = $_POST['UserName'];    
    $passWord = $_POST['PassWord'];
    $userName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
    $passWord = filter_input(INPUT_POST, 'PassWord', FILTER_SANITIZE_STRING);

    class User {
        private $db;
        public  $is_logged_in = false;

        public function __construct() {
            $obj = new Db();
            $this->db = $obj->pdo;
        }

        public function login($userName, $passWord){
            $stmt = $this->db->prepare("SELECT * FROM Users WHERE UserName = :user");
            $stmt->execute([':user' => $userName]);
            $user = $stmt->fetch();
            // var_dump($userName);
            // var_dump($user['UserName']);
            // var_dump($passWord);
            if(password_verify($passWord, $user['PassWord'])){
                $_SESSION['User'] = ['UserID' => $user['UserID'], 'Email' => $user['Email'], 'UserName' => $user['UserName']];
                return true;
            } else {
                session_destroy();
                return false;
            }
        }
    }

    $user = new User();
    $returnArray = array();
    $returnArray["STATUS"] = "NA";
    $returnArray["MSG"] = "NA";
      
    
    
    if ($user->login($userName, $passWord)){
        //echo ";
        $returnArray["STATUS"] = "OK";
        $returnArray["MSG"] = "Inloggad som : " . ($_SESSION['User']['UserName']);
    } else {
        $returnArray["STATUS"] = "FAIL";
        $returnArray["MSG"] = "ERR MSG";
    }
    echo json_encode($returnArray);
}

?>