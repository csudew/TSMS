<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cname = $_POST["name"];
    $CUname = $_POST["username"];
    $Cgender = $_POST["gender"];
    $Cemail = $_POST["email"];
    $CPnum = $_POST["phone"];
    $Cpw = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($Cpw, PASSWORD_DEFAULT);

    try {
        require_once "connection.php";

        // Check if the email exists in the customer table
        $checkCustomerQuery = "SELECT * FROM customer WHERE email = ? ";
        $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
        $checkCustomerStmt->execute([$Cemail]);
        $existingCustomer = $checkCustomerStmt->fetch();

        // Check if the email exists in the admin table
        $checkAdminQuery = "SELECT * FROM admin WHERE email = ? ";
        $checkAdminStmt = $pdo->prepare($checkAdminQuery);
        $checkAdminStmt->execute([$Cemail]);
        $existingAdmin = $checkAdminStmt->fetch();

        // If email exists in either table, redirect with error
        if ($existingCustomer || $existingAdmin) {
            header("Location:../login/signup.php?error=exists");
            exit();
        }

        // Insert into customer table if email doesn't exist in either table
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
