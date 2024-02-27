<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header('Location: login/login.php');
    exit;
}

include 'connection.php';

$adminId = $_SESSION['adminId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['cpw'];
    $newPassword = $_POST['npw'];
    $reEnteredPassword = $_POST['rpw'];

    if ($newPassword !== $reEnteredPassword) {
        $error = "New passwords do not match.";
    } else {
        $getPasswordQuery = "SELECT password FROM admin WHERE adminId=?";
        $stmt = $pdo->prepare($getPasswordQuery);
        $stmt->execute([$adminId]);
        $adminData = $stmt->fetch();

        if (password_verify($currentPassword, $adminData['password'])) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updatePasswordQuery = "UPDATE admin SET password=? WHERE adminId=?";
            $updateStmt = $pdo->prepare($updatePasswordQuery);
            $updateStmt->execute([$newHashedPassword, $adminId]);

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
