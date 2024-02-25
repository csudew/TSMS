<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once "connection.php";

        $customer_id = $_SESSION['customerId'];
    
        $category = $_POST['Category'];
        $subject = $_POST['subject'];
        $message = $_POST['content'];

        $sql = "SELECT * FROM customer WHERE customerId = :cid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cid', $customer_id);
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$customer) {
            $_SESSION['error_message'] = "Customer not found in the database. Please make sure the customer exists.";

            header("Location:  ../login/ticket.php?fmsg=failed");
            exit();
        } else {

            
    
            $query = "INSERT INTO ticket (category, customerid,  subject, message) 
                      VALUES (:category, :customerid,  :subject, :message)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':customerid', $customer_id);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            header("Location:  ../login/ticket.php?msg=successs");
            exit();
    
            //$_SESSION['success_message'] = "Ticket added to the database.";

        }

        $pdo = null;


        
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        header("Location: ../login/ticket.php");
        exit();
    } finally {
        $pdo = null;
    }
}
?>