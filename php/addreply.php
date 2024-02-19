<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once ('connection.php');

    $ticketId=$_POST['ticketId'];
    $reply=$_POST['reply'];
    $subject=$_POST['subject'];

    $query = "INSERT INTO reply (ticketId, subject, message) VALUES (?, ?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$ticketId, $subject, $reply]);

    $updateQuery = "UPDATE ticket SET status = 'Replied' WHERE ticketId = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$ticketId]);

    $_SESSION['reply_success'] = true;

    header("Location: ../html/view.php?ticketId=$ticketId&msg=reply_sent");
    exit();
}
?>
