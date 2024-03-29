<?php
session_start();

include '../php/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '../php/loginphp.php';
}


if (isset($_SESSION['customerId'])) {
    header('Location: account.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>
<body>
    <header class="header">
         
        <a class="logo" href="index.php">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>

        <a class="logo" href="index.php" style="margin-left:-200px">Quantum Mobile</a>
        <input type="checkbox" id="check">
        <label for="check" class="icon">
            <i class='bx bx-menu' id="menu-icon"></i> 
            <i class='bx bx-x' id="close-icon"></i>
        </label>
        <nav class="navbar"> <!-- Navigation links -->
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="faq.php">FAQ</a>
            <a href="team.php">Our team</a>
            <a href="help.php">Help</a>
            <a style="--i:2" href="ticket.php">Ticket</a>
            <a href="contactus/contact.php">Contact us</a>
            <a class="login.php" href="<?php echo isset($_SESSION['customerId']) ? 'account.php' : 'login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?></a>
           
        </nav>
    </header>

    <div class="main">
        <div class="content">
            
            <div class="footer-links">
                <h3>Log into your account.</h3><br>
    <div class="login-container">

        <h2>Login</h2>
        <div id="fmessage">
            <?php
                

                if (isset($_GET['error'])) {
                    echo "<p style='color: red;'>"."Invalid user name of password"."</p>"."
                    <script>
                        setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                        }, 5000);
                    </script>";
                    //unset($_SESSION['success_message']);
                }
                session_abort();
            ?>
    </div>
        <form class="login-form" action="../php/loginphp.php#" method="POST">
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account?</p> <br>
         <a class="login" href="signup.php" style="color: rgb(76, 22, 42);">Sign up</a></p>

    </div>
    </div>
    </div>
    </div>


   <!-- footer -->
   <footer>
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
                <li><a href="../html/privacy_policy.php"> Privacy Policy</a></li>
                <li><a href="../html/term_and_conditions.php">Terms of Service</a></li>
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



