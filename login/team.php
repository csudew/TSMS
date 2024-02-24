<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the main CSS file -->
    <style>
        .h1 {
            font-size:25px;
            display: block;
            text-align: center;
            height:fit-content;
        }
    
        .member {
            position:relative;
            display: grid;
            grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
            gap:10px;
        }
        
        .member img {
            width:250px;
            border-radius:20px;
            display: block;
            margin: 0 auto;
        }
        
        .member .imga {
            position: relative;
            text-align: center;
        }
        
        .member .imga p {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            padding: 5px;
            border-radius: 0 0 20px 20px;
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            margin: 0;
        }

        .member .imga:hover p {
            background-color: rgba(255, 255, 255, 1);
        }
    </style>
</head>
<body>
    <header class="header">
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#">Company name</a>
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
                <h2>Meet our Team</h2>
                <h3 style="color: rgb(86, 58, 156);">"some quotes like team motive"</h3>

            </div>
        </div>
    </div>

    <div class="member">
        <div class="imga">
            <img src="userProfile.jpg">
            <p>Name <br> job </p>
        </div>
        <div class="imga">
            <img src="userProfile.jpg">
            <p>Name <br> job </p>
        </div>
        <div class="imga">
            <img src="userProfile.jpg">
            <p>Name <br> job </p>
        </div>
        <div class="imga">
            <img src="userProfile.jpg">
            <p>Name <br> job </p>
        </div>
        <div class="imga">
            <img src="userProfile.jpg">
            <p>Name <br> job </p>
        </div>
    </div> <br><br>

    <footer>
        <div class="footer-content">
            <ul class="socials">
                <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-youtube"></ion-icon></a></li>
            </ul>
            <ul class="footmenu">
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
            </ul>
            <p>&copy; 2024 Company Name</p>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="style.js"></script>
</body>
</html>


