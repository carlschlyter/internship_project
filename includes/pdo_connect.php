<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'praktik_projektet';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    // $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(),(int)$e->getCOde());
    }

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>