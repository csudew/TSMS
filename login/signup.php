<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the main CSS file -->
    <style>
       
        
    </style>
</head>
<body>
    <header class="header"> <!-- Header with navigation bar -->
         
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>

        <a class="logo" href="#">Quantum Mobile</a> <!-- Company logo and name -->
        <input type="checkbox" id="check"> <!-- Checkbox for the mobile menu -->
        <label for="check" class="icon">
            <i class='bx bx-menu' id="menu-icon"></i> <!-- Menu icon -->
            <i class='bx bx-x' id="close-icon"></i> <!-- Close icon -->
        </label>
        <nav class="navbar"> <!-- Navigation links -->
            <a style="--i:0" href="index.html">Home</a>
            <a style="--i:1" href="about.html">About</a>
            <a style="--i:2" href="#">Support</a>
           
        </nav>
    </header>

    <div class="main">
        <div class="content">
            
            <div class="footer-links">
                <h3>Create your account.</h3>
    <div class="login-container">

        <h2>Sign Up</h2>
        <form class="login-form" action="../php/signupphp.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
            <input type="email" name="email" placeholder="Email" required>
            
            <div id="fmessage">
            <?php
                    session_start();

                    if (isset($_GET['error'])) {
                        echo "<p style='color: red;'>"."Email already in use."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
            </div>
            
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="repassword" id="repassword" placeholder="Re-enter Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account?</p> <br>
         <a class="login" href="login.html" style="color: rgb(76, 22, 42);">Log In</a></p>
        

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
</div>
<!-- Footer icons pack -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- JavaScript file -->
<script src="style.js"></script>

<script>
        function validateForm() {
            var phoneInput = document.getElementById("phone");
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phoneInput.value)) {
                alert("Phone number must contain exactly 10 digits.");
                return false;
            }

            var passwordInput = document.getElementById("password");
            if (passwordInput.value.length > 10) {
                alert("Password must be at most 10 characters long.");
                return false;
            }
            var password = document.getElementById("password").value;
            var repassword = document.getElementById("repassword").value;
            if (password !== repassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true; 
        }
    </script>

</body>
</html>







