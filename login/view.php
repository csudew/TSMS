<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header('Location: ../login/login.php?123');
    exit;
}

include '../php/connection.php';

// Get the adminId from the session
$customerId = $_SESSION['customerId'];

// Query to check if the adminId exists in the database
$checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
$checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
$checkCustomerStmt->execute([$customerId]);
$customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);
$customerName=$customer['name'];
$customerUName=$customer['userName'];


// Query to fetch tickets associated with the customer
$getTicketsQuery = "SELECT * FROM ticket WHERE customerId = ?";
$getTicketsStmt = $pdo->prepare($getTicketsQuery);
$getTicketsStmt->execute([$customerId]);
$tickets = $getTicketsStmt->fetchAll(PDO::FETCH_ASSOC);

// If adminId does not exist in the database, redirect to the login page
if (!$customer) {
    header('Location:../login/login.php?321');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the main CSS file -->
    <style>
        /* Additional CSS styles specific to the account page */
        .account-container {
            display: flex;
            justify-content: space-between;
            margin-top: 50px; /* Adjusted margin for better spacing */
        }
        .account-details,
        .password-reset {
            width: 60%; /* Adjusted width for better spacing */
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .account-details h2,
        .password-reset h2 {
            margin-top: 0; /* Remove top margin for consistency */
        }
        .password-reset {
            margin-left: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 20px); /* Adjusted width for better spacing */
            padding: 10px;
            border: 1px solid #cabff4;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group button {
            width: calc(100% - 20px); /* Adjusted width for better spacing */
            display: block;
            text-align: left;
            width: 100%;
            padding: 1em 0;
            color: #7288a2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
            margin-left:10px;
        }
        table{
            border: 1px solid #dadada;
        }
         thead {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #6CDDE6;
            padding: 10px 25px;
            table-layout: fixed;
            height: 20px;  
        }
        td{
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }   
        .frame7{
            display: flex;
            flex-direction: row;
            margin-left: 20px;
            background-color: aliceblue;
            height: 200px;
        }
        .frame1 {
            display: flex;
            flex-direction: row;
            margin-left: 20px;
            margin-right:20px
        }
    </style>
</head>
<body>
    <header class="header">
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#" style="margin-left:-300px">Quantum Mobile</a>
        <input type="checkbox" id="check">
        <label for="check" class="icon">
            <i class="bx bx-menu" id="menu-icon"></i>
            <i class="bx bx-x" id="close-icon"></i>
        </label>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="faq.php">FAQ</a>
            <a href="team.php">Our team</a>
            <a style="--i:2" href="ticket.php">Ticket</a>
            <a href="contactus.php">Contact us</a>
            <a class="login.php" href="<?php echo isset($_SESSION['customerId']) ? 'account.php' : 'login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?></a>
</a>
        </nav>
    </header>
    

    <div class="main">
        <div class="content">
           <div class="password-reset">
           <h2>View ticket Details </h2>

           <?php
    if(isset($_GET['ticketId'])) {
        $ticketId = $_GET['ticketId'];
        
        include_once ('../php/connection.php');

        $query = "SELECT ticket.*, customer.name AS customer_name, customer.email, customer.phonenumber
                  FROM ticket 
                  INNER JOIN customer ON ticket.customerId = customer.customerId
                  WHERE ticket.ticketId = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ticketId]);
        $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ticket) {
            echo "<div  style='margin-top:10px'>"; 
            echo "<font style='font-weight:bold;font-size:20px;'>
                        Status : 
                     ".$ticket['status'].
                    " </font></div>";
            echo "<div  style='margin-top:10px'>";
            echo "<font style='font-weight:bold;font-size:20px;'>
                    User Name : 
                 ".$ticket['customer_name'].
                " </font></div>";
            echo "<div  style='margin-top:10px'>";    
            echo "<font style='font-weight:bold;font-size:20px;'>
                User Email : 
             ".$ticket['email'].
            " </font></div>"; 
            echo "<div  style='margin-top:10px'>";  
            echo "<font style='font-weight:bold;font-size:20px;'>
                User Phone Number : 
             ".$ticket['phonenumber'].
            " </font></div>";
            
        
        }
        }

        
            
            ?>

           </div>

           <?php

echo "<div class='frame1' style='margin-top:20px'>"; 
echo "<font style='font-weight:bold;font-size:20px;'>
        Issue : 
     ".$ticket['subject'].
    " </font></div>";
echo "<div class='frame1' style='margin-top:20px'>
    <p>
        <font style='font-weight:bold;font-size:20px;'>
            Content: 
        </font>
        <br>
        </div>
        
        <div class='frame7' id='contentFrame' style='margin-right:20px;margin-top:20px'>
            <div style='margin-right:20px;margin-left:20px;margin-top:10px'>
                <p style='font-size:18px;text-align:justify'>".$ticket['message'].
                "
            </div>
                </p>
            </p>";
echo "</div>";
            
            if($ticket){
                if($ticket['status']==='Replied'){
                    $queryReplies = "SELECT * FROM reply WHERE ticketId = ?";
                    $stmtReplies = $pdo->prepare($queryReplies);
                    $stmtReplies->execute([$ticketId]);
                    $replies = $stmtReplies->fetchAll(PDO::FETCH_ASSOC);
        
                    foreach ($replies as $reply) {
                        echo "<div class='frame1' style='margin-top: 30px; margin-right:20px'>";
                        echo "<font style='font-weight:bold;font-size:x-large;'>Reply </font></div>";
                        echo "<div class='frame1' style='margin-top: 30px; margin-right:20px'>";
                        echo "<font style='font-weight:bold;font-size:20px;'>Title: ".$reply['subject']."</font></div>";
                        echo "<div class='frame1' style='margin-top: 30px; margin-right:20px'>";
                        echo "<font style='font-weight:bold;font-size:20px;'>Description:</font></div>";
                        echo "<div class='frame7' style='margin-top: 10px;'>";
                        echo "<div style='margin-left:20px; margin-right:20px;'>";
                        echo "<p style='font-size:18px;text-align:justify'>".$reply['message']."</p>";
                        echo "</div></div>";
                        echo "</div>";
                }}}
            ?>
        
           </div>
    </div>


    </script>

    <footer style="position:fixed">
        <div class="footer-content">
            <!-- Social media icons -->
            <ul class="socials">
                <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-youtube"></ion-icon></a></li>
            </ul>
            <!-- Footer menu -->
            <ul class="footmenu">
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
            </ul>
            <!-- Company copyright -->
            <p>&copy; 2024 PrimeSK</p>
        </div>
    </footer>

    <!-- Footer icons pack -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript file -->
    <script src="style.js"></script>
</body>
</html>