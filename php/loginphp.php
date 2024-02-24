<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cemail = $_POST["email"];
    $Cpw = $_POST["password"];

    try {
        require_once "connection.php";

        $checkCustomerQuery = "SELECT * FROM customer WHERE email = ? ";
        $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
        $checkCustomerStmt->execute([$Cemail]);
        $existingCustomer = $checkCustomerStmt->fetch();

        $checkAdminQuery = "SELECT * FROM admin WHERE email = ? ";
        $checkAdminStmt = $pdo->prepare($checkAdminQuery);
        $checkAdminStmt->execute([$Cemail]);
        $existingAdmin = $checkAdminStmt->fetch();

        if (!$existingCustomer && !$existingAdmin) {
            header("Location: ../login/login.php?error=invalid");
            exit();
        } else {
            if ($existingCustomer && password_verify($Cpw, $existingCustomer['password'])) {
                $_SESSION['customerId'] = $existingCustomer['customerId'];
                header("Location: index.php?customerId=" . $existingCustomer['email']);
                exit();
            } elseif ($existingAdmin && password_verify($Cpw, $existingAdmin['password'])) {
                $_SESSION['adminId'] = $existingAdmin['adminId'];
                header("Location: ../admin.php"); 
                exit();
            } else {
                header("Location: ../login/login.php?error=invalid");
                exit();
            }
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
?>