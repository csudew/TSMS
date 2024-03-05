<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Aname = $_POST["AName"];
    $AUname = $_POST["AUName"];
    $Agender = $_POST["gender"];
    $Aemail = $_POST["Aemail"];
    $APnum = $_POST["APnum"]; 
    $Acat = $_POST["Acategory"];
    $Apw = $_POST["Apw"];
    $ARpw = $_POST["ARpw"];
 
    if ($Apw !== $ARpw) {
        header("Location:../html/newmember.php?error=password");
        exit();
    }

    require_once "connection.php";

    $query = "SELECT * FROM admin WHERE email = ? OR userName = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$Aemail, $AUname]);
    $adminExists = $stmt->fetch();

    $query = "SELECT * FROM customer WHERE email = ? OR userName = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$Aemail, $AUname]);
    $customerExists = $stmt->fetch();

    if ($adminExists || $customerExists) {
        header("Location:../html/newmember.php?error=exists");
        exit();
    }

    $hashedPassword = password_hash($Apw, PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO admin (name, userName, email, phonenumber, gender, password, category) VALUES (?, ?, ?, ?, ?, ?, ?)"; 
        $stmt = $pdo->prepare($query);
        $stmt->execute([$Aname, $AUname, $Aemail, $APnum, $Agender, $hashedPassword, $Acat]);

        $pdo = NULL;
        $stmt = NULL;

        header("Location:../html/newmember.php?msg=add");
        exit();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../html/newmember.php");
}
?>
