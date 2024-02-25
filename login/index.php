<?php
session_start();

// Include the database connection file
include '../php/connection.php';

// Fetch the customer's information if available
$customerUName = isset($_SESSION['customerId']) ? $_SESSION['customerId'] : 'Guest';

$customerId = $_SESSION['customerId'];

$checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
$checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
$checkCustomerStmt->execute([$customerId]);
$customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);
$customerName=$customer['name'];
$customerUName=$customer['userName'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
   
    </style>
</head>
<body>
    <div class="container">
        <!-- navigation bar -->
        <header class="header">
             
          <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#" style="margin-left:-500px">Quantum Mobile - About us</a>


            <!-- click menu -->
            <input type="checkbox" id="check">
            <label for="check" class="icon">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
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
               
            </nav>
        </header>
        <!-- main content -->
        <div class="main">
            <div class="content">
              
            </div>
        </div>
        <!-- footer -->
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
                <p>&copy; 2024 Quantum Mobile</p>
            </div>
        </footer>
    </div>
    <!-- Footer icons pack -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript file -->
    <script src="style.js"></script>
</body>
</html>




           





