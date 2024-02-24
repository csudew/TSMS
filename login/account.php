<!DOCTYPE html>
<html lang="en">
<head>
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
        }
    </style>
</head>
<body>
    <header class="header">
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#">Quantum Mobile</a>
        <input type="checkbox" id="check">
        <label for="check" class="icon">
            <i class="bx bx-menu" id="menu-icon"></i>
            <i class="bx bx-x" id="close-icon"></i>
        </label>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="">Services</a>
            <a href="">Contact us</a>
            <a href="#team"><u>Our team</u></a>
            <a class="login" href="login.html">Login</a>
        </nav>
    </header>
    

    <div class="main">
        <div class="content">
            <div class="footer-links">
                <h3>Welcome to your account.</h3><br>
                <div class="account-container">
                    <!-- Account details on the left side -->
                    <div class="account-details">
                        <h2>Account Details</h2><br>
                        <!-- Display user's account details here -->
                        <p>User ID: <!-- User ID here --></p><br>
                        <p>Name: <!-- User's name here --></p><br>
                        <p>Username: <!-- User's username here --></p><br>
                        <p>Phone Number: <!-- User's phone number here --></p><br>
                        <p>Email: <!-- User's email here --></p><br>
                        <p>Select Gender: <!-- User's gender here --></p><br>
                    </div>
                    <!-- Password reset form on the right side -->
                    <div class="password-reset">
                        <h2>Password Reset</h2><br>
                        <!-- Form to reset password -->
                        <form class="password-reset-form" action="#" method="POST">
                            <div class="form-group">
                                <label for="current-password">Current Password:</label>
                                <input type="password" id="current-password" name="current-password" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password">New Password:</label>
                                <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm New Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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