<?php

session_start();

if (isset($_SESSION['User'])){
    echo "Inloggad som: " . ($_SESSION['User']['UserName']);?>
    <!-- <p>Inloggad</p> -->
        <form action="" method="POST">
            <input type="submit" name="logout" value="Logout" id="logoutbtn">
        </form>
    <?php    
}

class Db {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'praktik_projektet';
    private $charset = 'utf8';
    public  $pdo;

    public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";    

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}

?>