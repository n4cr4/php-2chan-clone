<?php
$user = 'n4cr4';
$pass = 'jupitersk';

try {
    // $pdo = new PDO('mysql:host=localhost;dbname=2chan-true', $user, $pass); // Unknown database
    $pdo = new PDO('mysql:host=localhost;dbname=2chan-clone', $user, $pass);
    // echo 'DBとの接続に成功';
} catch (PDOException $error){
    echo $error->getMessage();
}