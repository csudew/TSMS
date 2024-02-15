<?php

$servername="localhost";
$username="root";
$password="";

try {
    $pdo= new PDO("mysql:host=$servername;dbname=tsms",$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //echo"Connected Successfully";
} catch (PDOException $e) {
    echo"Connection Failed : ". $e->getMessage();
}