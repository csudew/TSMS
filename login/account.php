<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header('Location: ../login/login.php?123');
    exit;
}

include '../php/connection.php';

$customerId = $_SESSION['customerId'];

$checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
$checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
$checkCustomerStmt->execute([$customerId]);
$customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);
$customerName=$customer['name'];
$customerUName=$customer['userName'];

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
            width: 48%; /* Adjusted width for better spacing */
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
    </style>
</head>
<body>
    <header class="header">
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#" style="margin-left:-200px">Quantum Mobile</a>
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
            <a href="../php/logout.php">Logout</a>
        </nav>
    </header>
    

    <div class="main">
        <div class="content">
            <div class="footer-links">
                <h3>Welcome to your account.</h3><br>
            </div>    
                <div class="account-container">
                    <!-- Account details on the left side -->
                    <div class="account-details">
                        <h2>Account Details</h2><br>
                        <!-- Display user's account details here -->
                        <p>Name: <?php echo $customerName; ?></p><br>
                        <p>Username: <?php echo $customer['userName']; ?></p><br>
                        <p>Phone Number: <?php echo $customer['phonenumber']; ?></p><br>
                        <p>Email: <?php echo $customer['email']; ?></p><br>
                    </div>
                    <!-- Password reset form on the right side -->
                    <div class="password-reset">
                        <h2>Password Reset</h2><br>
                        <div class="form-group">
                        <?php
                            if (isset($_GET['success'])) {
                                echo "<p style='color: blue;'>"."Password Changed."."</p>"."
                                <script>
                                    setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                                    }, 5000);
                                </script>";
                                //unset($_SESSION['success_message']);
                            }
                   
                        ?>
                        </div>

                        <?php
                            if (isset($_GET['fail'])) {
                                echo "<p style='color: red;'>"."current password is wrong."."</p>"."
                                <script>
                                    setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                                    }, 5000);
                                </script>";
                                //unset($_SESSION['success_message']);
                            }
                            
                        ?>
                        <!-- Form to reset password -->
                        <form class="password-reset-form" action="../php/cpwchange.php" method="POST" >
                            <div class="form-group">
                                <label for="current-password">Current Password:</label>
                                <input type="password" id="cpw" name="cpw" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password">New Password:</label>
                                <input type="password" id="npw" name="npw" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" id="rpw" name="rpw" placeholder="Confirm New Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" style="">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>

    <script>
        function validatePassword() {
            var npw = document.getElementById("npw").value;
            var rpw = document.getElementById("rpw").value;

            if (npw != rpw) {
                alert("New Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>

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