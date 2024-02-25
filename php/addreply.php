<?php

session_start(); // Start the session to access session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('connection.php');

    $ticketId = $_POST['ticketId'];
    $reply = $_POST['reply'];
    $subject = $_POST['subject'];
    
    // Retrieve adminId from session
    $adminId = $_SESSION['adminId'];

    $query = "INSERT INTO reply (ticketId, adminId, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$ticketId, $adminId, $subject, $reply]);

    $updateQuery = "UPDATE ticket SET status = 'Replied' WHERE ticketId = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$ticketId]);

    $_SESSION['reply_success'] = true;

    header("Location: ../html/view.php?ticketId=$ticketId&msg=reply_sent");
    exit();
}
?>
