<?php
session_start();

include '../php/connection.php';

$customerUName = 'Guest';

if (isset($_SESSION['customerId'])) {
    $customerId = $_SESSION['customerId'];

    $checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
    $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
    $checkCustomerStmt->execute([$customerId]);
    $customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);

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
             
          <a class="logo" href="index.php">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="index.php" style="margin-left:-300px">Quantum Mobile</a>


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

                    <h1>Welcome to Quantum Mobile!</h1><br>

                    <img src="pic2.jpg" alt="Company Image">
                <font style="font-size:23px">    
                <p><b>Quantum Mobile</b> is a dynamic mobile network company that's committed to providing exceptional connectivity solutions.<br> We specialize in offering reliable <b>voice calls, high-speed internet, television, and home broadband services.</b></p><br>

                <p>Our goal is simple: to keep you connected, whether you're making calls, streaming your favorite shows, or browsing the web. <br>With a focus on innovation and customer satisfaction, we're dedicated to delivering a seamless mobile experience tailored to your needs.</p><br>

                <p>
                Join us as we redefine connectivity and bring you closer to what matters most.<br>Quantum Mobile - Connecting You Always..</p>
                </font>
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
                <li><a href="#">Privacy Policies</a></li>
                <li><a href="#">Terms and Services</a></li>
            </ul>
            <!-- Company copyright -->
            <p>&copy; 2024 Quantem Mobile Coperation</p>
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




           





