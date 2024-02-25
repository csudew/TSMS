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

    // Check if passwords match
    if ($Apw !== $ARpw) {
        header("Location:../html/newmember.php?error=password");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($Apw, PASSWORD_DEFAULT);

    try {
        require_once "connection.php";

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
