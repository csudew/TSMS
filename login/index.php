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
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .my-button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      border: 1px solid #3498db;
      color: #3498db;
      border-radius: 5px;
      background-color: #fff;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

        /* Hover effect */
        .my-button:hover {
        background-color: #3498db;
        color: #fff;
        }

        .grid-block{
        display: grid;
        grid-template-columns: auto auto;
        /*background-color: #2196F3; */
        padding: 10px;
        box-shadow: 0 .05rem 1rem #434DC8;
        margin-top:50px
        }
        .grid-item3 {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        font-size: 30px;
        }
    </style>
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
                
    <div id="post1">

<div class="grid-block" style="background-color:#434DC8">
    <div class="grid-item">
        <div style="float: left;margin-top:70px"><p style="font-size:50px; font-weight: 700;"><font style="color:white">Unable to engage in vocalizations,<br> may I not initiate calls</p></font>
        <div style="margin-top:20px">
            <a href="ticket.php" class="my-button">Send Your Issue</a>
        </div>
        </div>
    </div>
    <div class="grid-item">
        <img src="../image/call.jpg" alt="Telephone" width="500" height="300" style="float:right;"></div>
    </div>
</div>

<!-- next poster -->

<div id="post2">
<div class="grid-block">
    <div class="grid-item"><img src="../image/phone.jpg" alt="Telephone" width="500" height="300" style="float:left;"></div>
    <div class="grid-item"><div style="float:right;margin-top:70px" ><p style="font-size:50px; font-weight: 700;">Still your internet is buffering <br> loading same way?</p>
    <div style="margin-top:20px">
            <a href="ticket.php" class="my-button">Send Your Issue</a>
    </div>
    </div>
 </div>
</div>

<div class="grid-block" style="background-color:#434DC8">
    <div class="grid-item">
        <div style="float: left;margin-top:70px"><p style="font-size:50px; font-weight: 700;"><font style="color:white">Struggling for continous and  hd <br> watching during raining?</p></font>
        <div style="margin-top:20px">
            <a href="ticket.php" class="my-button">Send Your Issue</a>
        </div>
        </div>
    </div>
    <div class="grid-item">
        <img src="../image/tv.jpg" alt="Telephone" width="500" height="300" style="float:right;"></div>
    </div>
</div>




<div id="post4" style="margin-bottom:50px">
    <div class="grid-block">
        <div class="grid-item3"><img src="../image/internet.jpg" alt="Telephone" width="500" height="300" style="float:left;"></div>
        <div class="grid-item3"><div style="float:right;margin-top:70px;margin-right:150px"><p style="font-size:50px; font-weight: 700;">Struggling connection  <br>during social media?</p>
        <div style="margin-top:20px">
            <a href="ticket.php" class="my-button">Send Your Issue</a>
        </div>
        </div>
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




           





