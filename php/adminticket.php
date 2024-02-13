<?php
session_start();

        // Sanitize input data
        $category = $_POST['Category'];
        $cname = $_POST['CName'];
        $cemail = $_POST['CEmail'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        require_once "connection.php";

        // Check if the customer exists
        $sql = "SELECT * FROM customer WHERE name = :cname AND email = :cemail";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cname', $cname);
        $stmt->bindParam(':cemail', $cemail);
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$customer) {
            $_SESSION['error_message'] = "Customer not found in the database. Please make sure the customer exists.";
            header("Location: ../html/tickets.php");
            exit();
        } else {
            $customer_id = $customer['customerId']; 

            // Insert ticket into the database
            $query = "INSERT INTO ticket (category, customerid, priority, status, subject, message) 
                      VALUES (:category, :customerid, :priority, :status, :subject, :message)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':customerid', $customer_id);
            $stmt->bindParam(':priority', $priority);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            $_SESSION['success_message'] = "Ticket add to database.";
            header("Location: ../html/tickets.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        header("Location: ../html/tickets.php");
        exit();
    }

    // Close connection
    $pdo = null;
}
?>
