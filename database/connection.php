<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "toko_elektronik";

try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e){
    die("Could not connect to the database $dbname :" . $e->getMessage());
}