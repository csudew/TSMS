<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the priority and ticketId are set
    if(isset($_POST['priority']) && isset($_POST['ticketId'])) {
        // Include the database connection file
        include_once('connection.php');

        // Retrieve the priority and ticketId from the POST data
        $priority = $_POST['priority'];
        $ticketId = $_POST['ticketId'];

        // Prepare and execute the SQL query to update the priority in the ticket table
        $query = "UPDATE ticket SET priority = ? WHERE ticketId = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$priority, $ticketId]);

        // Redirect back to the view.php page with the ticketId
        header("Location: ../admin.php");
        exit();
    }
} else {
    // Redirect back to the view.php page if the form was not submitted
    header("Location: ../html/view.php");
    exit();
}
?>
