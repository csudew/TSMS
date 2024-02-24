<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header('Location: ../login/login.php?123');
    exit;
}

include '../php/connection.php';

// Get the customer ID from the session
$customerId = $_SESSION['customerId'];

// Fetch the current password from the database
$getPasswordQuery = "SELECT password FROM customer WHERE customerId = ?";
$getPasswordStmt = $pdo->prepare($getPasswordQuery);
$getPasswordStmt->execute([$customerId]);
$storedPassword = $getPasswordStmt->fetchColumn();

if (!$storedPassword) {
    // Customer not found or password not retrieved
    header('Location: ../login/login.php?321');
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['cpw'];
    $newPassword = $_POST['npw'];
    $confirmPassword = $_POST['rpw'];

    // Validate current password
    if (password_verify($currentPassword, $storedPassword)) {
        // Current password is correct, proceed to update password
        if ($newPassword === $confirmPassword) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update password in the database
            $updatePasswordQuery = "UPDATE customer SET password = ? WHERE customerId = ?";
            $updatePasswordStmt = $pdo->prepare($updatePasswordQuery);
            $updatePasswordStmt->execute([$hashedPassword, $customerId]);

            // Redirect to account page with success message
            header('Location:  ../login/account.php?success=password_changed');
            exit;
        } else {
            // Passwords do not match
            header('Location: ../login/account.php?fail=password_not_match');
            exit;
        }
    } else {
        // Incorrect current password
        header('Location:  ../login/account.php?error=incorrect_password');
        exit;
    }
} else {
    // Redirect to account page if accessed directly
    header('Location:  ../login/account.php');
    exit;
}
?>
