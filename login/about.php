<?php
session_start();

// Include the database connection file
include '../php/connection.php';

// Initialize the customer username variable
$customerUName = 'Guest';

// Check if the 'customerId' index is set in the session
if (isset($_SESSION['customerId'])) {
    $customerId = $_SESSION['customerId'];

    // Fetch the customer's information from the database
    $checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
    $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
    $checkCustomerStmt->execute([$customerId]);
    $customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);

    // If the customer exists, update the customer username variable
    if ($customer) {
        $customerUName = $customer['userName'];
    }
}
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
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>
<body>
    <div class="container">
        <!-- navigation bar -->
        <header class="header">
             
          <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#" style="margin-left:-300px">Quantum Mobile</a>


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
                
                <div class="footer-links">

                    <h3>Welcome to Quantum Mobile!</h3><br>

                    <div class="box"><a href="#">Products</a></div>
                    <div class="box"><a href="#">Pricing</a></div>
                    <div class="box"><a href="#">Solutions</a></div>
                    <div class="box"><a href="#">Resources</a></div>

                    <img src="pic2.jpg" alt="Company Image">
                    
                <p>We are committed to providing top-notch technical support solutions tailored to meet the needs of your business. Our team of experienced professionals is dedicated to ensuring your systems run smoothly, minimizing downtime, and maximizing productivity.</p>
                <p>With our innovative tools and proactive approach, we strive to exceed your expectations and deliver exceptional customer service. Whether you need troubleshooting assistance, software updates, or system optimization, we've got you covered.</p>
                <p>Contact us today to learn more about our services and how we can help your business thrive in today's digital landscape.</p>
                </div>
                </div>
      
            </div>
        </div>
        <!-- footer -->
        <footer style="position:relative">
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




           





