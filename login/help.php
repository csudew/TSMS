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
        .account-details,
        .password-reset {
            width: 48%; 
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <script>
        let calcScrollValue = () => {
	let scrollProgress = document.getElementById("scrbtn");
	let progressValue = document.getElementById("scrbtn-value");
	let pos = document.documentElement.scrollTop;
	let calcHeight =
	  document.documentElement.scrollHeight -
	  document.documentElement.clientHeight;
	let scrollValue = Math.round((pos * 100) / calcHeight);
	if (pos > 100) {
	  scrollProgress.style.display = "grid";
	} else {
	  scrollProgress.style.display = "none";
	}
	scrollProgress.addEventListener("click", () => {
	  document.documentElement.scrollTop = 0;
	});
	scrollProgress.style.background = `conic-gradient(#77C1E0 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
  };
  
  window.onscroll = calcScrollValue;
  window.onload = calcScrollValue;
    </script>
</head>
<body>
    <div class="container">
        <!-- navigation bar -->
        <header class="header">
             
          <a class="logo" href="index.php">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="index.php" style="margin-left:-200px">Quantum Mobile</a>


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
            <a href="help.php">Help</a>
            <a style="--i:2" href="ticket.php">Ticket</a>
            <a href="contactus/contact.php">Contact us</a>
            <a class="login.php" href="<?php echo isset($_SESSION['customerId']) ? 'account.php' : 'login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?></a>
               
            </nav>
        </header>
        <!-- main content -->
        <div class="main">
        <div id="scrbtn">
				<span id="scrbtn-value">&#x1F815;</span>
			</div>
            <div class="content">
                <h1>Need a Help?</h1>
                <div style="margin-top:30px;margin-left:20px">
                <div class="account-details">
                <div style="color:#006a98">
                    <h3>How to Sign up?</h3>
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 1 : </b>In navigation bar, click Login button <br>
                <img src="../image/navlogin.png" alt="navlogin" style="width:500px;height:50px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 2 : </b>In login page you can see the Signup button. Click it. <br>
                <img src="../image/signupbtn.png" alt="signupbtn" style="width:400px;height:300px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 3 : </b>Now you will redirect to Signup page. Fill the form and click the signup button. <br>
                <img src="../image/signupform.png" alt="signupform" style="width:350px;height:550px;margin-top:20px">
                </div>
                </div>
            </div>


            <div style="margin-top:30px;margin-left:20px">
                <div class="account-details">
                <div style="color:#006a98">
                    <h3>How to Log In?</h3>
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 1 : </b>In navigation bar, click Login button <br>
                <img src="../image/navlogin.png" alt="navlogin" style="width:500px;height:50px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 2 : </b>Enter the Email and Password, and click Log in button <br>
                <img src="../image/login.png" alt="login" style="width:400px;height:300px;margin-top:20px">
                </div>
                </div>
            </div>

            <div style="margin-top:30px;margin-left:20px">
                <div class="account-details">
                <div style="color:#006a98">
                    <h3>How to send your Issue?</h3>
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 1 : </b>After log in to the web page, click Ticket button in navigation bar <br>
                <img src="../image/navlogin.png" alt="navlogin" style="width:500px;height:50px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 2 : </b>Scroll down bit. You can see add new ticket form. Select the category of your issue, Enter a subject, Describe your issue in content and click submit button. <br>
                <img src="../image/addreply.png" alt="addreply" style="width:600px;height:400px;margin-top:20px">
                </div>
                </div>
            </div>

            <div style="margin-top:30px;margin-left:20px">
                <div class="account-details">
                <div style="color:#006a98">
                    <h3>How to view the reply to your ticket?</h3>
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 1 : </b>After log in to the web page, click Ticket button in navigation bar <br>
                <img src="../image/navlogin.png" alt="navlogin" style="width:500px;height:50px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 2 : </b>In here you can see previous submitted ticket table. you can see the status of the ticket <br>
                <img src="../image/replytable.png" alt="replytable" style="width:600px;height:350px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 3 : </b>The status "New" means, you don't have a reply yet. The status "Replied" mean you have a reply. To view reply click the view button of the ticket row <br>
                <img src="../image/viewticket.png" alt="viewticket" style="width:600px;height:350px;margin-top:20px">
                In the view page, You can see your submitted ticket and the reply you got.
                </div>
                </div>
            </div>

            <div style="margin-top:30px;margin-left:20px">
                <div class="account-details">
                <div style="color:#006a98">
                    <h3>How to view FAQ?</h3>
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 1 : </b>In the navigation bar,click the FAQ button. <br>
                <img src="../image/faqbtn.png" alt="faqbtn" style="width:500px;height:50px;margin-top:20px">
                </div>
                <div style="margin-left:20px;margin-top:20px">
                <b style="color:#434DC8">Step 2 : </b>In here you can find FAQ. <br>
                <img src="../image/faq.png" alt="faq" style="width:500px;height:150px;margin-top:20px">
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




           





