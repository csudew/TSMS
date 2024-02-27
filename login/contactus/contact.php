<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .content{
            width: 80%;
            margin: auto;
            display:flex ;
            justify-content: center;
            padding: 10px 0px;
        }
        .image{
            border: 4px solid #77C1E0;
            border-radius: 30px;
            width: 100%;
        }
        .image img{
            border-radius: 30px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .text{
            padding-top: 20px;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
        }
        .text a{
            /* margin-left: 0; */
            text-decoration: none;
            font-weight: 600;
        }
        .join{
            padding: 15px 15px;
            background: transparent;
            border: 2px rgb(100, 100, 100) solid;
            color: black;
            border-radius: 50px;
            margin-top: 20px;
            transition: .5s ease;
        }
        .join:hover{
            transform: translateY(-3px);
        }
        .card{
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            transition: .5s ease;
        }
        .card img{
            transition: .5s ease;
            opacity: 0.6;
        }
        .card img:hover{
            opacity: 0.8;
        }
    </style>
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>
<body>
<div class="container">
        <!-- navigation bar -->
        <header class="header">
             
          <a class="logo" href="../index.php">
            <img src="../../icons/logo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="../index.php" style="margin-left:-200px">Quantum Mobile</a>


            <!-- click menu -->
            <input type="checkbox" id="check">
            <label for="check" class="icon">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
            </label>
            <nav class="navbar">
            <a href="../index.php">Home</a>
            <a href="../about.php">About Us</a>
            <a href="../faq.php">FAQ</a>
            <a href="../team.php">Our team</a>
            <a href="../help.php">Help</a>
            <a style="--i:2" href="../ticket.php">Ticket</a>
            <a href="contact.php">Contact us</a>
            <a class="../login.php" href="<?php echo isset($_SESSION['customerId']) ? '../account.php' : '../login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?></a>
               
            </nav>
        </header>
        <!-- main content -->
        <div class="main">
            <div class="content">
                <div class="image">
                    <img src="1.jpg" width="100%" alt="contact us">
                    <div class="text">
                        <h1>Need our help?</h1>
                        <a class="join" href="../ticket.php">Join Us Now</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                        <img src="phone.png" alt="phone"><br>
                        Call Us <br>
                        <i>011 2 224 448</i>
        
                </div>
                <div class="card">
                    <a class="button" href="mailto:qmobile@qmobile.com">
                        <img src="email.png" alt="email"><br>
                    </a>
                        Email Us <br>
                        <i>qmobile@qmobile.com</i>
                </div>
                <div class="card">
                        <img src="location.png" alt="location"><br>
                        No. 420, <br>
                        <i>Galle Road, Colombo</i>
                </div>
                <div class="card">
                    <a class="button" href="../ticket.php">
                        <img src="faq.png" alt="faq"><br>
                    </a>
                        Ticket<br>
                        <i>Send your Issue</i>
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




           





