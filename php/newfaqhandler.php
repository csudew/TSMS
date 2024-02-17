<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Fcat=$_POST["category"];
    $Fsubject=$_POST["ksubject"];
    $Fcontent=$_POST["kcontent"];
    $Ffile=$_POST["kfile"];


    try {
        require_once "connection.php";

        $query="INSERT INTO faq (type,title,content) VALUES(?,?,?);"; 

        $stmt=$pdo->prepare($query);

        $stmt->execute([$Fcat,$Fsubject,$Fcontent]);

        $faqId = $pdo->lastInsertId();

        if ($Ffile['error'] == 0) {
             $query = "INSERT INTO faqfile (faqId, file) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$faqId, $Ffile['name']]);
        }

        $pdo=NULL;
        $stmt=NULL;

        if($Ffile !== NULL){
            
        }

        header("Location:../html/knowledge.php?msg=add");
        exit();

        die();
    } catch (PDOException $e) {
        die("Query Failed: ".$e->getMessage());
    }

}else{
    header("Location:../html/faq.php");
}