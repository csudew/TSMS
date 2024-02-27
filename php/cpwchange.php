<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header('Location: ../login/login.php?123');
    exit;
}

include '../php/connection.php';

$customerId = $_SESSION['customerId'];

$getPasswordQuery = "SELECT password FROM customer WHERE customerId = ?";
$getPasswordStmt = $pdo->prepare($getPasswordQuery);
$getPasswordStmt->execute([$customerId]);
$storedPassword = $getPasswordStmt->fetchColumn();

if (!$storedPassword) {
    header('Location: ../login/login.php?321');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['cpw'];
    $newPassword = $_POST['npw'];
    $confirmPassword = $_POST['rpw'];

    if (password_verify($currentPassword, $storedPassword)) {
        if ($newPassword === $confirmPassword) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updatePasswordQuery = "UPDATE customer SET password = ? WHERE customerId = ?";
            $updatePasswordStmt = $pdo->prepare($updatePasswordQuery);
            $updatePasswordStmt->execute([$hashedPassword, $customerId]);

            header('Location:  ../login/account.php?success=password_changed');
            exit;
        } else {
            header('Location: ../login/account.php?fail=password_not_match');
            exit;
        }
    } else {
        header('Location:  ../login/account.php?error=incorrect_password');
        exit;
    }
} else {
    header('Location:  ../login/account.php');
    exit;
}
?>
