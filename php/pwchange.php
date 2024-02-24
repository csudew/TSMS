<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header('Location: login/login.php');
    exit;
}

// Include the database connection file
include 'connection.php';

// Get the adminId from the session
$adminId = $_SESSION['adminId'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve current password and new password from the form
    $currentPassword = $_POST['cpw'];
    $newPassword = $_POST['npw'];
    $reEnteredPassword = $_POST['rpw'];

    // Check if new password matches re-entered password
    if ($newPassword !== $reEnteredPassword) {
        $error = "New passwords do not match.";
    } else {
        // Fetch the current password from the database
        $getPasswordQuery = "SELECT password FROM admin WHERE adminId=?";
        $stmt = $pdo->prepare($getPasswordQuery);
        $stmt->execute([$adminId]);
        $adminData = $stmt->fetch();

        // Verify if the entered current password matches the one stored in the database
        if (password_verify($currentPassword, $adminData['password'])) {
            // Hash the new password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updatePasswordQuery = "UPDATE admin SET password=? WHERE adminId=?";
            $updateStmt = $pdo->prepare($updatePasswordQuery);
            $updateStmt->execute([$newHashedPassword, $adminId]);

            // Redirect to admin account page with success message
            header("Location: ../html/adminaccount.php?success=password_changed");
            exit;
        } else {
            $error = "Current password is incorrect.";
            header("Location: ../html/adminaccount.php?fail=password_not_match");
            exit;
        }
    }
}
?>
