<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cname = $_POST["name"];
    $CUname = $_POST["username"];
    $Cgender = $_POST["gender"];
    $Cemail = $_POST["email"];
    $CPnum = $_POST["phone"];
    $Cpw = $_POST["password"];

    $hashedPassword = password_hash($Cpw, PASSWORD_DEFAULT);

    try {
        require_once "connection.php";

        $checkCustomerQuery = "SELECT * FROM customer WHERE email = ? OR userName = ? OR name = ?";
        $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
        $checkCustomerStmt->execute([$Cemail, $CUname, $Cname]);
        $existingCustomer = $checkCustomerStmt->fetch();

        $checkAdminQuery = "SELECT * FROM admin WHERE email = ? OR userName = ? OR name = ?";
        $checkAdminStmt = $pdo->prepare($checkAdminQuery);
        $checkAdminStmt->execute([$Cemail, $CUname, $Cname]);
        $existingAdmin = $checkAdminStmt->fetch();

        if ($existingCustomer || $existingAdmin) {
            header("Location:../login/signup.php?error=exists");
            exit();
        }

        $insertQuery = "INSERT INTO customer (name, userName, email, phonenumber, Gender, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([$Cname, $CUname, $Cemail, $CPnum, $Cgender, $hashedPassword]);

        $pdo = NULL;
        $stmt = NULL;

        header("Location:../login/login.php");
        exit();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../login/signup.php");
}
?>
