<?php
session_start();
include 'connection.php';

if(isset($_GET['faqId'])) {
    $faqId = $_GET['faqId'];

    $deleteQuery = "DELETE FROM faq WHERE faqId = ?";
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->execute([$faqId]);

    header('Location: ../html/knowledge.php?message=Deleted Successfully');
    exit;
} else {
    header('Location: ../admin/knowledge.php?error=notset');
    exit;
}
?>
